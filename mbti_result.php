<?php
include "Config/config.php";
include "Config/session.php";
include "Function/machine_learning.php";
$active = "mbti";
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}




if (
    $_SERVER['REQUEST_METHOD'] !== 'GET' || 
    !isset($_GET['file']) || 
    trim($_GET['file']) === ''
)
{
    header("Location: index.php");
    exit();
}

$filename=$_GET['file'];
$stmt = $pdo->prepare("SELECT * FROM file WHERE filename = ?");
$stmt->execute([$filename]);  // 加上 .txt 才是 dataset 表中存储的完整名称
$file = $stmt->fetch(PDO::FETCH_ASSOC);


$data=false;
$features=false;
$tfidf=false;

$stmt2 = $pdo->prepare("SELECT * FROM dataset WHERE filename = ?");
$stmt2->execute([$filename]);
$exist = $stmt2->fetch(PDO::FETCH_ASSOC);

if( $exist &&
    !empty($exist['model_result_txt']) &&
    !empty($exist['tfidf_result_txt']) &&
    !empty($exist['features'])
){
    $model_result      = $exist['model_result_txt'];
    $tfidf_content     = $exist['tfidf_result_txt'];
    $features_content  = $exist['features'];

    // 解析 JSON 内容
    $data     = json_decode($model_result, true);
    $tfidf    = json_decode($tfidf_content, true);
    $features = json_decode($features_content, true);
}else{
    $data = getModelData($filename);
    $features = getFeatures($filename);
    $tfidf= getTfidf($filename);
    storeDB($filename,$data,$features, $tfidf);
}

if ($data=== false) {
        header("Location: index.php");
        exit;
}


//read data
include "Required/header.php";
?>

<!-- 引入 Chart.js -->

<section class="container px-5 py-5">
  <div class="text-center mb-5">
    <h2 class="text-gradient fw-bold display-5"><span style="-webkit-text-fill-color: white;">🧠</span>  MBTI Personality Results</h2>
    <p class="text-secondary">Detailed breakdown for each participant based on uploaded chats.</p>
  </div>
<?php 

foreach ($data as $user) {
    $feature = null;

    foreach ($features as $f) {
        if ($f['user_id'] == $user['user']) {
             
            $feature = $f;
            break;
        }
    }


?>
  <!-- 每个用户/文件的分析结果卡片 Start -->
  <div class="bg-dark text-white px-5 p-4 rounded-4 mb-4 border border-secondary shadow-sm">
    <div class="d-flex align-items-center mb-4">
    <!-- MBTI 动图 -->
    <img src="mbti/<?php echo $user['mbti']?>.gif" width="120"  class="me-4" alt="INTJ Character">

    <!-- 所有信息在右边 -->
   <div class="d-flex justify-content-between w-100">
  <!-- 左边：基本信息 -->
    <div>
        <h4 class="text-gradient mb-1"><?php echo $user['user']?></h4>
        <p class="text-muted mb-1 small"><code><?php echo $file['file_name_ori']?></code></p>
        <p class="text-secondary mb-1 small">
        Uploaded: <?php echo date("F j, Y, g:i A", strtotime($file['uploaded_at'])); ?>
        </p>
        <h5 class="mb-0">MBTI Type: <span class="badge bg-success"><?php echo $user['mbti']?></span></h5>
    </div>

  <!-- 右边：补充信息（例如MBTI描述或统计信息） -->
    <div class="small ">
        <div class="d-flex justify-content-between mb-1">
            <span class="text-info">💬 Avg Words/Msg:</span>
            <span class="text-light"><?php echo number_format($feature['avg_word_length'], 2); ?></span>
        </div>
        <div class="d-flex justify-content-between mb-1">
            <span class="text-danger">😂 Emoji Usage:</span>
            <span class="text-warning">~<?php echo number_format($feature['emoji_count'] * 100, 2); ?>%</span>
        </div>
        <div class="d-flex justify-content-between mb-0">
            <span class="text-primary">🧠 Sentiment Score:</span>
            <span class="<?php echo ($feature['sentiment_score'] > 0 ? 'text-success' : ($feature['sentiment_score'] < 0 ? 'text-danger' : 'text-muted')); ?>">
                <?php echo ($feature['sentiment_score'] > 0 ? '+' : '') . number_format($feature['sentiment_score'] * 100, 2) . '%'; ?>
            </span>
        </div>
        </div>
</div>
    
    </div>


    <!-- 活跃时间段 Chart -->
    <div class="mb-4">
      <h6 class="text-info">🕒 Active Time Distribution</h6>
      <canvas id="activeChart_<?php echo $user['user'];?>" width="600" height="300"></canvas>
    </div>

    <!-- Top 10 Words -->
    <div>
      <h6 class="text-warning">🔤 Top 10 Words Used</h6>
      <ul class="list-group list-group-flush">
        <?php 
            foreach ($tfidf[$user['user']] as $word => $count){

        ?>
        <li class="list-group-item bg-dark text-white border-secondary d-flex justify-content-between">
          <span><?php echo htmlspecialchars($word); ?></span><span class="text-secondary"><?php echo $count?> times</span>
        </li>

        <?php
            }
        ?>
        
       
      </ul>
    </div>
  </div>
  <!-- 每个用户/文件的分析结果卡片 End -->
<?php }?>
</section>

<script>
  window.addEventListener('DOMContentLoaded', () => {
    <?php foreach ($data as $user) { 
        $feature = null;

        foreach ($features as $f) {
            if ($f['user_id'] == $user['user']) {
                
                $feature = $f;
                break;
            }
        }
        
        $periods = [];
        for ($i = 0; $i <= 7; $i++) {
            $key = 'period_' . $i;
            $periods[] = isset($feature[$key]) ? round($feature[$key], 4) : 0;
        }
        $js_array = implode(', ', $periods);
    ?>
        
        
    
      const ctx_<?php echo $user['user']; ?> = document.getElementById("activeChart_<?php echo $user['user'];?>").getContext("2d");

      new Chart(ctx_<?php echo $user['user']; ?>, {
        type: "bar",
        data: {
          labels: [
            "12AM - 3AM", "3AM - 6AM", "6AM - 9AM", "9AM - 12PM",
            "12PM - 3PM", "3PM - 6PM", "6PM - 9PM", "9PM - 12AM"
          ],
          datasets: [{
            label: "Activity Ratio",
            data: [<?php echo $js_array; ?>],
            backgroundColor: "<?php echo randomRGBA();?>"
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
              max: 1.0,
              title: {
                display: true,
                text: "Activity Ratio (0 ~ 1)"
              }
            },
            x: {
              title: {
                display: true,
                text: "Period for a day"
              }
            }
          },
          plugins: {
            tooltip: {
              callbacks: {
                label: function (context) {
                  const value = context.parsed.y;
                  return `Activity: ${(value * 100).toFixed(1)}%`;
                }
              }
            }
          }
        }
      });
    <?php } ?>
  });
</script>





<?php

include "Required/footer.php";


?>

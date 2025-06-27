<?php
include "Config/config.php";
include "Config/session.php";
$active = "mbti";
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}


$stmt = $pdo->prepare("SELECT id, user_id, filename, file_name_ori, file_size, file_type, file_status, uploaded_at 
                       FROM file WHERE user_id = ? ORDER BY uploaded_at DESC");
$stmt->execute([$_SESSION['user_id']]);
$files = $stmt->fetchAll(PDO::FETCH_ASSOC);
//read data
include "Required/header.php";
?>

<!-- Upload Section -->
<section class="container py-5 px-4 position-relative overflow-hidden">
  <!-- 背景渐变浮动球 -->
  <div class="position-absolute top-0 start-50 translate-middle-x opacity-10" style="z-index: 0;">
    <div class="rounded-circle bg-gradient" style="width: 300px; height: 300px; filter: blur(100px);"></div>
  </div>

  <!-- Upload Title -->
  <div class="text-center mb-4 position-relative" data-aos="fade-up" style="z-index: 1;">
    <h2 class="fw-bold display-6 text-gradient">
      <span style="-webkit-text-fill-color: white;">📂</span> Upload Your File
    </h2>
    <p class="text-secondary">Select your WhatsApp text file to analyze your personality.</p>
  </div>

  <!-- File Input Form -->
  <div class="row justify-content-center position-relative" style="z-index: 1;">
    <div class="col-md-8">
      <form method="post" enctype="multipart/form-data" id="Form" class="p-4 bg-dark border border-secondary rounded-4 shadow-sm">
        <div class="mb-3">
          <label for="uploadFile" class="form-label text-white">Choose a .txt file</label>
          <input class="form-control bg-secondary text-light" type="file" name="uploadFile" id="uploadFile" accept=".txt" required>
          <span class="ml-2 form-text text-warning">Maximum file size: 2MB only.</span>
        </div>
        <div class="text-end mt-3">
             <button type="submit" class="login-btn ">📤 Submit</button>
        </div>
       
      </form>
    </div>
  </div>
</section>

<!-- File List Section -->
<section class="container py-5 px-4 position-relative">
  <!-- Title -->
  <div class="text-center mb-4 position-relative" data-aos="fade-up">
    <h2 class="fw-bold display-6 text-gradient"><span style="-webkit-text-fill-color: white;">🗂️</span> Uploaded Files</h2>
    <p class="text-secondary">Here are the files you've uploaded.</p>
  </div>

  <!-- File List -->
  <div class="row justify-content-center">
  <div class="col-md-10">
    <div class="p-4 bg-dark border border-secondary rounded-4 shadow-sm">
      <ul class="list-group list-group-flush">
        
       <?php if (count($files) === 0): ?>
        <li class="list-group-item bg-dark text-secondary text-center border-secondary">
            📭 No files uploaded yet.
        </li>
          <?php else: ?>
              <?php foreach ($files as $file): ?>
                  <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white border-secondary">
                      <span><?= htmlspecialchars($file['file_name_ori']) ?></span>
                      <div class="d-flex gap-2">
                          <?php if ($file['file_status'] === 'Processing'): ?>
                              <div class="login-btn d-inline-flex align-items-center disabled px-3 py-1 processing"  data-value="<?php echo $file['filename'];?>">
                                  <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                  Processing...
                              </div>
                          <?php else: ?>
                              <a href="mbti_result.php?file=<?php echo $file['filename']?>" class="login-btn btn-sm btn-success" target="_blank">📄 View</a>
                          <?php endif; ?>

                          <form class="deleteForm" action="delete.php" method="post" style="display:inline;">
                              <input type="hidden" name="filename" value="<?= htmlspecialchars($file['filename']) ?>">
                              <button type="submit" id="deleteBtn"class="login-btn btn-sm bg-danger">🗑️ Delete</button>
                          </form>
                      </div>
                  </li>
              <?php endforeach; ?>
          <?php endif; ?>
      </ul>

      <!-- 如果没有文件时 -->
      <!-- <p class="text-secondary text-center mt-3">📭 No files uploaded yet.</p> -->
    </div>
  </div>
</div>
</section>



<?php
$script.=<<<EOF
  $(document).ready(function () {
    $('#uploadFile').on('change', function () {
      const file = this.files[0];
      if (file && file.size > 2 * 1024 * 1024) { // 2MB
        swal.inputFailed('❗ File is too large. Please upload a .txt file smaller than 2MB.');
        $(this).val(''); // 清空文件输入
      }
    });
    
    $('#Form').on('submit', async function (event) {
    event.preventDefault();

    const fileInput = $('#uploadFile')[0];
    const file = fileInput.files[0];
    if (!file) {
        swal.inputFailed('⚠️ No file selected', 'Please choose a file before submitting.');
        return;
    }

    const submitBtn = $(this).find('button[type="submit"]'); // 自动找 form 里的提交按钮
    const originalText = submitBtn.text();

    // 🔃 开始 loading
    submitBtn.prop('disabled', true).text('Uploading...');

    const formData = new FormData();
    formData.append('file', file);

    try {
        const response = await $.ajax({
            url: 'API/fileCheck.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false
        });

        if (response.success) {
            queueCall(response.file);  
            swal.successMBTI('File validated successfully!');
        } else {
            swal.error(response.message);
        }
    } catch (err) {
        swal.error('Could not contact the server.', 'Server Error');
    } finally {
        // ✅ 结束 loading
        submitBtn.prop('disabled', false).text(originalText);
    }
});

$('.processing').each(function () {
    const el = $(this);
    const filename = el.data('value');

    if (filename) {
        // 👇 第一次立即 call
        queueCall(filename, function (success) {
            if (success) {
                replaceProcessing(filename);
            }
        });

        // ⏳ 每隔 1 分钟 call 一次（每个 filename 独立轮询）
        const interval = setInterval(() => {
            queueCall(filename, function (success) {
                if (success) {
                    replaceProcessing(filename);
                    clearInterval(interval); // ✅ 完成就停止轮询
                }
            });
        }, 30000); // 30 秒
    }
});

$('.deleteForm').on('submit', function(e) {
  e.preventDefault();
  const form = $(this); 

  Swal.fire({
    title: 'Are you sure you want to delete?',
    text: "Once deleted, this cannot be recovered.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    iconColor: '#ff5555',
    background: '#1e1e1e',
    color: '#ffffff',
    confirmButtonText: 'Yes, Delete',
    cancelButtonText: 'Cancel'
  }).then((result) => {
    if (result.isConfirmed) {
      form.off('submit').submit();  // 移除绑定后再提交，防止无限循环
    }
  });
});
    
});
EOF;
include "Required/footer.php";


?>

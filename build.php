<?php
include "Config/config.php";
include "Config/session.php";

$active = "build";
include "Required/header.php";
?>
<section id="build" class="container py-5 px-5 position-relative overflow-hidden">
  <!-- 背景渐变浮动球 -->
  <div class="position-absolute top-0 start-50 translate-middle-x opacity-10" style="z-index: 0;">
    <div class="rounded-circle bg-gradient" style="width: 280px; height: 280px; filter: blur(100px);"></div>
  </div>

  <!-- 标题 -->
  <div class="text-center mb-5 position-relative" data-aos="fade-up" style="z-index: 1;">
    <h2 class="fw-bold display-5 text-gradient">
      <span class="me-2" style="-webkit-text-fill-color: white !important;">🛠️</span> Build
    </h2>
    <p class="text-secondary">A breakdown of the technologies, structure, and architecture powering our platform.</p>
  </div>

  <!-- 技术栈卡片 -->
  <div class="row g-4 justify-content-center position-relative" style="z-index: 1;">
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
      <div class="p-4 bg-dark border border-secondary rounded-4 shadow-sm h-100">
        <h5 class="fw-semibold text-white mb-2">📦 Backend</h5>
        <p class="text-secondary small mb-0">Built with Python using FastAPI for high-performance asynchronous processing. Handles file uploads, data parsing, and model execution locally.</p>
      </div>
    </div>

    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
      <div class="p-4 bg-dark border border-secondary rounded-4 shadow-sm h-100">
        <h5 class="fw-semibold text-white mb-2">🧠 ML Model</h5>
        <p class="text-secondary small mb-0">Trained on MBTI-tagged datasets. Utilizes NLP techniques (TF-IDF, N-grams) and models like Random Forest and SVM for personality prediction.</p>
      </div>
    </div>

    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
      <div class="p-4 bg-dark border border-secondary rounded-4 shadow-sm h-100">
        <h5 class="fw-semibold text-white mb-2">🎨 Frontend</h5>
        <p class="text-secondary small mb-0">Crafted with Bootstrap 5. Animated with AOS. Designed for clarity and speed — fully responsive, light/dark adaptable.</p>
      </div>
    </div>

    <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
      <div class="p-4 bg-dark border border-secondary rounded-4 shadow-sm h-100">
        <h5 class="fw-semibold text-white mb-2">🔒 Security</h5>
        <p class="text-secondary small mb-0">All files are processed in-session and deleted immediately. No data is stored or uploaded to the cloud — ensuring full privacy.</p>
      </div>
    </div>

    <div class="col-md-4" data-aos="fade-up" data-aos-delay="500">
      <div class="p-4 bg-dark border border-secondary rounded-4 shadow-sm h-100">
        <h5 class="fw-semibold text-white mb-2">📁 File Handling</h5>
        <p class="text-secondary small mb-0">Supports `.txt` WhatsApp exports. Extracts user-wise content, filters noise (e.g., Manglish, emojis), and feeds structured text into the model.</p>
      </div>
    </div>
  </div>

  <div class="row justify-content-center mt-5" data-aos="fade-up" data-aos-delay="500">
  <div class="col-lg-10 text-center">
    <h3 class="text-white fw-bold">📡 How the Website Interacts with the Python API</h3>
    <p class="text-secondary">These examples demonstrate how your website communicates with the local mbti prediction engine via HTTP requests.</p>
  </div>
</div>
  <!-- Code Section (内嵌代码展示) -->
    <div class="row justify-content-center mt-5 position-relative" style="z-index: 1;" data-aos="fade-up" data-aos-delay="600">
    <div class="col-lg-10">
        <div class="p-4 bg-dark border border-secondary rounded-4 shadow-sm">
        <h5 class="fw-semibold text-white mb-3">🧾 /checkFile — Upload and Validate Documents</h5>
        <pre class="text-secondary small mb-0" style="white-space: pre-wrap; font-family: 'Fira Code', 'JetBrains Mono', Consolas, 'Courier New', monospace;">
<code>
$filename = 'whatsapp_history';
$filePath = 'uploads/whatsapp.txt';  // localupload

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost:8000/checkFile",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => array(
        "file" => new CURLFile($filePath),
        "filename" => $filename
    )
));

$response = curl_exec($curl);
curl_close($curl);

echo $response;
</code>
</pre>
        </div>
    </div>
    </div>

  <!-- Code Section (内嵌代码展示) -->
    <div class="row justify-content-center mt-5 position-relative" style="z-index: 1;" data-aos="fade-up" data-aos-delay="600">
    <div class="col-lg-10">
        <div class="p-4 bg-dark border border-secondary rounded-4 shadow-sm">
        <h5 class="fw-semibold text-white mb-3">🧾 /features — Request User's features data (CSV)</h5>
        <pre class="text-secondary small mb-0" style="white-space: pre-wrap; font-family: 'Fira Code', 'JetBrains Mono', Consolas, 'Courier New', monospace;">
<code>
$filename = 'whatsapp_history';

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost:8000/features",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => array(
        "filename" => $filename
    )
));

$response = curl_exec($curl);
curl_close($curl);

echo $response;
</code>
</pre>
        </div>
    </div>
    </div>

      <!-- Code Section (内嵌代码展示) -->
    <div class="row justify-content-center mt-5 position-relative" style="z-index: 1;" data-aos="fade-up" data-aos-delay="600">
    <div class="col-lg-10">
        <div class="p-4 bg-dark border border-secondary rounded-4 shadow-sm">
        <h5 class="fw-semibold text-white mb-3">🧾 /tfidf — Request Top 10 TF-IDF Keywords</h5>
        <pre class="text-secondary small mb-0" style="white-space: pre-wrap; font-family: 'Fira Code', 'JetBrains Mono', Consolas, 'Courier New', monospace;">
<code>
$filename = 'whatsapp_history';

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost:8000/tfidf",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => array(
        "filename" => $filename
    )
));

$response = curl_exec($curl);
curl_close($curl);

echo $response;
</code>
</pre>
        </div>
    </div>
    </div>

    <!-- Code Section (内嵌代码展示) -->
    <div class="row justify-content-center mt-5 position-relative" style="z-index: 1;" data-aos="fade-up" data-aos-delay="600">
    <div class="col-lg-10">
        <div class="p-4 bg-dark border border-secondary rounded-4 shadow-sm">
        <h5 class="fw-semibold text-white mb-3">🧾 /model — Request MBTI Analysis Result</h5>
        <pre class="text-secondary small mb-0" style="white-space: pre-wrap; font-family: 'Fira Code', 'JetBrains Mono', Consolas, 'Courier New', monospace;">
<code>
$filename = 'whatsapp_history';

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost:8000/model",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => array(
        "filename" => $filename
    )
));

$response = curl_exec($curl);
curl_close($curl);

echo $response;
</code>
</pre>
        </div>
    </div>
    </div>

    <div class="row justify-content-center mt-5 position-relative" style="z-index: 1;" data-aos="fade-up" data-aos-delay="600">
    <div class="col-lg-10">
        <div class="p-4 bg-dark border border-secondary rounded-4 shadow-sm">
        <h5 class="fw-semibold text-white mb-3">🧾 / — Check FastAPI in active or not</h5>
        <pre class="text-secondary small mb-0" style="white-space: pre-wrap; font-family: 'Fira Code', 'JetBrains Mono', Consolas, 'Courier New', monospace;">
          <code>
          $response = file_get_contents("http://localhost:8000/");
          echo $response;
          </code>
        </pre>
        </div>
    </div>
    </div>

  <!-- 注脚 -->
  <div class="text-center mt-5 position-relative" data-aos="fade-up" data-aos-delay="700" style="z-index: 1;">
  <p class="text-secondary small fst-italic">
    Some features are powered by trusted external APIs — carefully selected to improve performance without compromising your privacy.
  </p>
  <p class="text-secondary small fst-italic">
    All other components still work locally to ensure instant feedback and strong data control.
  </p>
</div>
</section>



<?php
include "Required/footer.php";
?>

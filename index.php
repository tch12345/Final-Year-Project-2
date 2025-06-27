<?php
include "Config/config.php";
include "Config/session.php";
$active="introduction";
include "Required/header.php";
?>
 
    <section id="introduction" class="container py-5 px-5">
      <!-- 背景渐变浮动球 -->
    <div class="position-absolute top-0 start-50 translate-middle-x opacity-10" style="z-index: 0;">
      <div class="rounded-circle bg-gradient" style="width: 300px; height: 300px; filter: blur(100px);"></div>
    </div>
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <h1 class="display-4 fw-bold mb-3 text-gradient">
                    Discover Your MBTI<br>Through WhatsApp
                </h1>
                <p class="fs-5 text-light mb-4">
                    Belial uses AI to analyze your WhatsApp messages and reveal your MBTI personality type.
                </p>
                <p class="text-secondary">
                    Understand yourself better through real data. Learn how you express emotions, make decisions, and interact with others — all based on your chat style.
                </p>
                <a href="#how-to-use" class="btn btn-outline-light mt-3 px-4 py-2 text-secondary rounded-pill shadow-sm custom-hover-black">
                    Learn How →
                </a>
            </div>
            <div class="col-lg-6 text-center" data-aos="fade-left">
                <img src="Image/dashboard_1.jpg" alt="MBTI AI Illustration"
                    class="img-fluid rounded-4 shadow-lg"
                    style="max-height: 420px; object-fit: cover;">

            </div>
        </div>
    </section>

    <!-- 🔹 How to Use Section -->
    <section id="how-to-use" class="container py-5 px-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold display-5 text-gradient">How It Works</h2>
            <p class="text-secondary">Just 3 simple steps to uncover your MBTI</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="p-4 border rounded-4 h-100 text-center bg-dark">
                    <h4 class="fw-semibold mb-3">1. Upload</h4>
                    <p>Export your WhatsApp chat and upload the file to our platform securely.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="p-4 border rounded-4 h-100 text-center bg-dark">
                    <h4 class="fw-semibold mb-3">2. Analyze</h4>
                    <p>Our AI reads and processes your messages using NLP + MBTI algorithms.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="p-4 border rounded-4 h-100 text-center bg-dark">
                    <h4 class="fw-semibold mb-3">3. Discover</h4>
                    <p>Get your personality breakdown, MBTI type, and communication insights.</p>
                </div>
            </div>
        </div>
    </section>

<section id="intro-video" class="container-fluid px-5 bg-black">
  <div class="text-center mb-4" data-aos="fade-up">
    <h2 class="fw-bold display-5 text-gradient">Watch It in Action</h2>
    <p class="text-secondary">See how Belial analyzes your MBTI in real-time</p>
  </div>

  <div class="d-flex justify-content-center" data-aos="zoom-in">
    <div class="position-relative w-100 overflow-hidden rounded-4 px-3 pt-3"
         style="
           max-width: 1296px;
           aspect-ratio: 1296 / 670;
           background: repeating-linear-gradient(
             45deg,
             red 0%, orange 10%, yellow 20%, green 30%, cyan 40%, blue 50%, violet 60%, red 70%
           );
           background-size: 400% 400%;
           animation: waveColorShift 60s linear infinite;
         ">

      

      <!-- Video Content -->
      <video autoplay muted loop playsinline preload="auto"
             class="position-relative z-3 rounded w-auto"
             style="
               position: absolute;
               left: 50%;
               bottom: 0;
               transform: translateX(-50%) translateY(1%);
               height: 90%;
               object-fit: cover;
             ">
        <source src="Demo/demo.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </div>
  </div>
</section>

<section id="get-started" class="container px-5 py-5">
  <div class="row align-items-center">
    <!-- 左图像 -->
    <div class="col-lg-6 text-center mb-5 mb-lg-0 " data-aos="fade-right">
     <img src="Image/dashboard_2.png" alt="Start AI Analysis"
        class="img-fluid rounded-4 shadow-lg"
        style="max-height: 420px; object-fit: cover;">
    </div>

    <!-- 右侧内容 -->
    <div class="col-lg-6" data-aos="fade-left">
      <h1 class="display-4 fw-bold mb-3 text-gradient">
        Start Your MBTI Journey<br>With Just One File
      </h1>
      <p class="fs-5 text-light mb-4">
        Upload your exported WhatsApp chat and let our AI work its magic.
      </p>
      <p class="text-secondary">
        Your conversations hold more than memories. They contain the essence of who you are. Our model turns them into meaningful personality insights.
      </p>

      <!-- 中间按钮 -->
      
      <?php 
        if(isset($_SESSION['user_id'])){
          echo '<div class="d-flex justify-content-end mt-4">
        <a href="mbti.php" class="btn btn-outline-light px-3 py-2 text-secondary rounded-pill shadow-sm custom-hover-black">
          Upload Now →
        </a>
      </div>';
        }else{
          echo '<div class="d-flex justify-content-end mt-4">
        <a href="login.php" class="btn btn-outline-light px-3 py-2 text-secondary rounded-pill shadow-sm custom-hover-black">
          Upload Now →
        </a>
      </div>';
        }
      ?>
    </div>
    
  </div>
</section>


<?php
include "Required/footer.php";
?>
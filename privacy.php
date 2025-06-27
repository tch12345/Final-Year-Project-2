<?php
include "Config/config.php";
include "Config/session.php";

$active="privacy";
include "Required/header.php"
?>
<section id="privacy-policy" class="container py-5 px-5">
  <!-- 背景渐变浮动球 -->
  <div class="position-absolute top-0 start-50 translate-middle-x opacity-10" style="z-index: 0;">
    <div class="rounded-circle bg-gradient" style="width: 300px; height: 300px; filter: blur(100px);"></div>
  </div>

  <!-- 标题 -->
  <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="800">
    <h2 class="fw-bold display-5 text-gradient">
      <span style="color: white !important; -webkit-text-fill-color: white !important; margin-right: 8px;">🔒</span> Privacy Policy
    </h2>
    <p class="text-secondary" data-aos="fade-down" data-aos-delay="100">
      We are committed to protecting your privacy and ensuring your data is safe at all times.
    </p>
  </div>

  <div class="row g-4 justify-content-center">
    <!-- Card 1 -->
    <div class="col-md-6" data-aos="zoom-in-up" data-aos-delay="100" data-aos-duration="800">
      <div class="p-4 bg-dark text-light border border-secondary rounded-4 shadow-lg h-100">
        <h5 class="fw-semibold mb-2">📁 1. No Storage</h5>
        <p class="text-secondary mb-0">
          Your uploaded WhatsApp chat file is never stored permanently. It is processed temporarily for analysis and automatically deleted immediately after use.
        </p>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-md-6" data-aos="zoom-in-up" data-aos-delay="200" data-aos-duration="800">
      <div class="p-4 bg-dark text-light border border-secondary rounded-4 shadow-lg h-100">
        <h5 class="fw-semibold mb-2">🕒 2. One-Time Processing</h5>
        <p class="text-secondary mb-0">
          Your file is processed once to generate your MBTI result and then discarded right away. We do not retain a copy or reuse your data.
        </p>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col-md-6" data-aos="zoom-in-up" data-aos-delay="300" data-aos-duration="800">
      <div class="p-4 bg-dark text-light border border-secondary rounded-4 shadow-lg h-100">
        <h5 class="fw-semibold mb-2">🙅‍♂️ 3. No Sharing or Selling</h5>
        <p class="text-secondary mb-0">
          We do not share, sell, or transmit your data to any third parties. Your privacy is fully respected and protected at all times.
        </p>
      </div>
    </div>

    <!-- Card 4 -->
    <div class="col-md-6" data-aos="zoom-in-up" data-aos-delay="400" data-aos-duration="800">
      <div class="p-4 bg-dark text-light border border-secondary rounded-4 shadow-lg h-100">
        <h5 class="fw-semibold mb-2">🛡️ 4. Secure Local Processing</h5>
        <p class="text-secondary mb-0">
          All file analysis is done locally by our Python engine, running in a secure environment. Our backend is not connected to external APIs, reducing the risk of any data breach.
        </p>
      </div>
    </div>

    <!-- Card 5 -->
    <div class="col-md-6" data-aos="zoom-in-up" data-aos-delay="500" data-aos-duration="800">
      <div class="p-4 bg-dark text-light border border-secondary rounded-4 shadow-lg h-100">
        <h5 class="fw-semibold mb-2">🌐 5. Safe Hosting via Cloudflare</h5>
        <p class="text-secondary mb-0">
          The website is securely hosted through Cloudflare, providing strong protection against attacks, ensuring encrypted traffic, and minimizing any unauthorized access.
        </p>
      </div>
    </div>

    <!-- Card 6 -->
    <div class="col-md-6" data-aos="zoom-in-up" data-aos-delay="600" data-aos-duration="800">
      <div class="p-4 bg-dark text-light border border-secondary rounded-4 shadow-lg h-100">
        <h5 class="fw-semibold mb-2">👁️ 6. Transparent Privacy Approach</h5>
        <p class="text-secondary mb-0">
          We believe in full transparency. You are welcome to review how your data is used, and we only keep it as long as needed to deliver your results — no longer.
        </p>
      </div>
    </div>

      <!-- Card 7 -->
  <div class="col-md-6" data-aos="zoom-in-up" data-aos-delay="700" data-aos-duration="800">
    <div class="p-4 bg-dark text-light border border-secondary rounded-4 shadow-lg h-100">
      <h5 class="fw-semibold mb-2">🧾 7. Text Only</h5>
      <p class="text-secondary mb-0">
        Only the text content in your WhatsApp export is analyzed. We do not access or process media files such as images, videos, or stickers.
      </p>
    </div>
  </div>


  <!-- Card 8 -->
  <div class="col-md-6" data-aos="zoom-in-up" data-aos-delay="800" data-aos-duration="800">
    <div class="p-4 bg-dark text-light border border-secondary rounded-4 shadow-lg h-100">
      <h5 class="fw-semibold mb-2">🧍 8. You Are in Control</h5>
      <p class="text-secondary mb-0">
        We never collect data without your permission. Uploading a file is optional, and no background tracking is performed.
      </p>
    </div>
  </div>


    <!-- Card 9 -->
  <div class="col-md-6" data-aos="zoom-in-up" data-aos-delay="900" data-aos-duration="800">
    <div class="p-4 bg-dark text-light border border-secondary rounded-4 shadow-lg h-100">
      <h5 class="fw-semibold mb-2">🔐 9. Session Policy</h5>
      <p class="text-secondary mb-0">
        We use temporary sessions to keep your login secure. No advertising or tracking cookies are used, and sessions are cleared when you log out.
      </p>
    </div>
  </div>


  <!-- Card 10 -->
<div class="col-md-6" data-aos="zoom-in-up" data-aos-delay="1000" data-aos-duration="800">
  <div class="p-4 bg-dark text-light border border-secondary rounded-4 shadow-lg h-100">
    <h5 class="fw-semibold mb-2">⚖️ 10. Data Ethics</h5>
    <p class="text-secondary mb-0">
      We follow strong privacy principles, even though we are not under formal laws like GDPR. We minimize data use, avoid external APIs, and respect your privacy.
    </p>
  </div>
</div>
  </div>






  <!-- Contact -->
  <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="700" data-aos-duration="800">
    <p class="text-secondary">
      📬 Have questions or concerns? Feel free to reach out via 
      <a href="mailto:1211201053@student.mmu.edu.my" class="text-decoration-none text-secondary fw-semibold">email</a>.
    </p>
  </div>
</section>






<?php

include "Required/footer.php"
?>
<?php
include "Config/config.php";
include "Config/session.php";

$active = "about";
include "Required/header.php";
?>

<section id="about" class="container py-5 px-4 position-relative overflow-hidden">
  <!-- 背景渐变浮动球 -->
  <div class="position-absolute top-0 start-50 translate-middle-x opacity-10" style="z-index: 0;">
    <div class="rounded-circle bg-gradient" style="width: 300px; height: 300px; filter: blur(100px);"></div>
  </div>

  <!-- 标题 -->
  <div class="text-center mb-5 position-relative" data-aos="fade-up" style="z-index: 1;">
    <h2 class="fw-bold display-5 text-gradient">
     <span class="me-2" style="-webkit-text-fill-color: white !important;">👥</span>
      About Us
    </h2>
    <p class="text-secondary">From student project to meaningful insight — here's our journey.</p>
  </div>

  <!-- 内容 -->
  <div class="row justify-content-center position-relative" style="z-index: 1;">
    <div class="col-md-10" data-aos="fade-up" data-aos-delay="100">
      <div class="p-5 bg-dark text-light border border-secondary rounded-4 shadow-sm">
        <p class="text-secondary mb-4">
          This platform is a final-year project by a student passionate about AI, psychology, and purposeful design.
It began as a study of language and personality and grew into a fully functional, privacy-conscious system.
        </p>

        <p class="text-secondary mb-4">
          Leveraging modern NLP techniques and MBTI theory, this tool analyzes your WhatsApp messages — locally, securely, and instantly —
          to predict your personality type.
        </p>

        <p class="text-secondary mb-4">
          We don't keep your data. Nothing is stored. No tracking. Everything is processed once and discarded.
          Your curiosity deserves both respect and security.
        </p>

        <p class="text-secondary mb-0">
          Designed with care, coded with precision — this is student work with real-world ambition.
        </p>
      </div>
    </div>
  </div>

  <!-- Timeline -->
  <div class="row justify-content-center mt-5">
    <div class="col-md-10">
      <h4 class="text-gradient fw-semibold mb-4 text-center" data-aos="fade-up" data-aos-delay="200"><span class="me-2" style="-webkit-text-fill-color: white !important;">🛠️</span> Our Design Journey</h4>
      <div class="timeline position-relative ps-2" style="border-left: 2px solid #6c757d;">
        <!-- Timeline item -->
        <div class="timeline-item position-relative mb-5" data-aos="fade-right" data-aos-delay="300">
          <div class="timeline-dot position-absolute start-0 translate-middle bg-gradient rounded-circle" style="width: 14px; height: 14px; top: 8px;"></div>
          <div class="ms-4 ps-3 bg-dark border border-secondary rounded-4 shadow-sm">
            <h6 class="fw-semibold text-white pt-2">🔍 Discovery</h6>
            <p class="text-secondary mb-2">Studied how personality traits are reflected in everyday text-based conversations.</p>
          </div>
        </div>

        <div class="timeline-item position-relative mb-5" data-aos="fade-left" data-aos-delay="400">
          <div class="timeline-dot position-absolute start-0 translate-middle bg-gradient rounded-circle" style="width: 14px; height: 14px; top: 8px;"></div>
          <div class="ms-4 ps-3 bg-dark border border-secondary rounded-4 shadow-sm">
            <h6 class="fw-semibold text-white pt-2">🧠 Model Training</h6>
            <p class="text-secondary mb-2">Fine-tuned NLP models using MBTI-labeled datasets for better accuracy.</p>
          </div>
        </div>

        <div class="timeline-item position-relative mb-5" data-aos="fade-right" data-aos-delay="500">
          <div class="timeline-dot position-absolute start-0 translate-middle bg-gradient rounded-circle" style="width: 14px; height: 14px; top: 8px;"></div>
          <div class="ms-4 ps-3 bg-dark border border-secondary rounded-4 shadow-sm">
            <h6 class="fw-semibold text-white pt-2">💻 Development</h6>
            <p class="text-secondary mb-2">Built a full-stack system to handle upload, analysis, and secure deletion.</p>
          </div>
        </div>

        <div class="timeline-item position-relative mb-5" data-aos="fade-left" data-aos-delay="600">
          <div class="timeline-dot position-absolute start-0 translate-middle bg-gradient rounded-circle" style="width: 14px; height: 14px; top: 8px;"></div>
          <div class="ms-4 ps-3 bg-dark border border-secondary rounded-4 shadow-sm">
            <h6 class="fw-semibold text-white pt-2">🔐 Privacy First</h6>
            <p class="text-secondary mb-2">Ensured privacy through local-only analysis and automatic deletion.</p>
          </div>
        </div>

        <div class="timeline-item position-relative" data-aos="zoom-in" data-aos-delay="700">
          <div class="timeline-dot position-absolute start-0 translate-middle bg-gradient rounded-circle" style="width: 14px; height: 14px; top: 8px;"></div>
          <div class="ms-4 ps-3 bg-dark border border-secondary rounded-4 shadow-sm">
            <h6 class="fw-semibold text-white pt-2">🚀 Launch</h6>
            <p class="text-secondary mb-2">Soft-launched to peers, gathered feedback, and continued to improve.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center mt-5" data-aos="fade-up" data-aos-delay="800">
  <div class="col-md-10">
    <div class="bg-dark border border-secondary rounded-4 shadow-sm p-4">
      <h5 class="fw-semibold text-white mb-3">
        🎯 Our Philosophy
      </h5>
      <p class="text-secondary mb-3">
        We believe in meaningful AI — tools that are not just smart, but also ethical, secure, and accessible. Every decision in this project was made with user trust and transparency in mind.
      </p>
      <p class="text-secondary mb-0">
        From choosing local processing over cloud storage to refining model explainability, our mission was clear: deliver personality insights in a way that's fast, safe, and truly yours.
      </p>
    </div>
  </div>
</div>


    <!-- Contact -->
    <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="800">
    <p class="text-secondary">
        💌 Want to collaborate or know more? Email us at
        <a href="mailto:1211201053@student.mmu.edu.my" class="text-decoration-none text-secondary fw-semibold">1211201053@student.mmu.edu.my</a>
    </p>

    <p class="text-secondary small fst-italic mt-2">
        This project was created as a final-year university submission — proudly built in Malaysia.
    </p>

    <div class="mt-3 d-flex justify-content-center gap-4">
        <a href="https://github.com/tch12345" target="_blank" class="text-secondary text-decoration-none d-flex align-items-center">
            <i class="bi bi-github me-2"></i>
        </a>
        <a href="https://www.linkedin.com/in/tan-chee-han-554066265/" target="_blank" class="text-secondary text-decoration-none d-flex align-items-center">
            <i class="bi bi-linkedin me-2"></i>
        </a>
    </div>

    <p class="text-muted small mt-3 mb-0">
        © <?php echo date("Y"); ?> PersonalityAI. All rights reserved.
    </p>
</div>


  </div>
</section>


<?php
include "Required/footer.php";
?>

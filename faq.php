<?php
include "Config/config.php";
include "Config/session.php";

$active="faq";
include "Required/header.php"
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<section id="faq" class="container py-5 px-5">
  <!-- 背景渐变浮动球 -->
  <div class="position-absolute top-0 start-50 translate-middle-x opacity-10" style="z-index: 0;">
    <div class="rounded-circle bg-gradient" style="width: 300px; height: 300px; filter: blur(100px);"></div>
  </div>
  
  <div class="text-center mb-5" data-aos="fade-up">
    <h2 class="fw-bold display-5 d-flex justify-content-center align-items-center">
      <span style="color: white !important; -webkit-text-fill-color: white !important; margin-right: 10px;">❓</span>
      <span class="text-gradient">Frequently Asked Questions</span>
    </h2>
    <p class="text-secondary">Got questions? We've got answers.</p>
  </div>

  <div class="accordion accordion-flush bg-transparent" id="faqAccordion">

    <!-- Q1 -->
    <div class="accordion-item bg-dark text-white rounded-4 mb-3 shadow" data-aos="fade-up" data-aos-delay="100">
      <h2 class="accordion-header">
        <button class="accordion-button bg-dark text-white collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne">
          🔐 Is my WhatsApp data stored?
        </button>
      </h2>
      <div id="faqOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          No. Your data is used one time for analysis and automatically deleted after processing.
        </div>
      </div>
    </div>

    <!-- Q2 -->
    <div class="accordion-item bg-dark text-white rounded-4 mb-3 shadow" data-aos="fade-up" data-aos-delay="200">
      <h2 class="accordion-header">
        <button class="accordion-button bg-dark text-white collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo">
          🧠 How does the AI determine my MBTI?
        </button>
      </h2>
      <div id="faqTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          The system uses natural language processing (NLP) techniques and machine learning trained on MBTI-labeled data to analyze your communication style.
        </div>
      </div>
    </div>

    <!-- Q3 -->
    <div class="accordion-item bg-dark text-white rounded-4 mb-3 shadow" data-aos="fade-up" data-aos-delay="300">
      <h2 class="accordion-header">
        <button class="accordion-button bg-dark text-white collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree">
          ⏱️ How long does it take to get results?
        </button>
      </h2>
      <div id="faqThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          Processing usually completes within a few seconds to a minute. However, depending on file size and server load, it may occasionally take up to 5 minutes.
        </div>
      </div>
    </div>

    <!-- Q4 -->
    <div class="accordion-item bg-dark text-white rounded-4 mb-3 shadow" data-aos="fade-up" data-aos-delay="400">
      <h2 class="accordion-header">
        <button class="accordion-button bg-dark text-white collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faqFour">
          📁 What file format should I upload?
        </button>
      </h2>
      <div id="faqFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          Please upload the exported ".txt" file from your WhatsApp chat. You can find this option in your chat export settings.
        </div>
      </div>
    </div>

    <!-- Q5 -->
    <div class="accordion-item bg-dark text-white rounded-4 mb-3 shadow" data-aos="fade-up" data-aos-delay="500">
    <h2 class="accordion-header">
        <button class="accordion-button bg-dark text-white collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faqFive">
        ✅ Do I need to log in to use the service?
        </button>
    </h2>
    <div id="faqFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
        Yes. You need to log in to access the upload and analysis features. This helps us manage user sessions securely.
        </div>
    </div>
    </div>

    <div class="accordion-item bg-dark text-white rounded-4 mb-3 shadow" data-aos="fade-up" data-aos-delay="300">
  <h2 class="accordion-header">
    <button class="accordion-button bg-dark text-white collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faqExport">
      📁 How do I export my WhatsApp chat history?
    </button>
  </h2>
  <div id="faqExport" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
    <div class="accordion-body">
      To export your chat history from <strong><i class="fab fa-android text-success"></i> Android</strong>:
      <ol class="mb-3">
        <li>Open <strong>WhatsApp</strong> on your phone.</li>
        <li>Go to the chat you want to export.</li>
        <li>Tap the <strong>⋮</strong> menu (top right) → <strong>More</strong> → <strong>Export chat</strong>.</li>
        <li>Choose <em>Without Media</em> (recommended for smaller files).</li>
        <li>Select how to share the file (e.g. email it to yourself).</li>
      </ol>
      To export from <strong><i class="fab fa-apple text-light"></i> iPhone</strong>:
      <ol class="mb-3">
        <li>Open <strong>WhatsApp</strong> on your iPhone.</li>
        <li>Open the chat you want to export.</li>
        <li>Tap the contact/group name at the top.</li>
        <li>Scroll down and tap <strong>Export Chat</strong>.</li>
        <li>Select <em>Without Media</em> and choose how to share the file.</li>
      </ol>
      📎 For more details, see:
      <a href="https://faq.whatsapp.com/1180414079177245/?locale=en_US&amp;cms_platform=android" target="_blank" rel="noopener noreferrer">
        <u>WhatsApp Official Guide</u>
      </a>.
    </div>
  </div>
    </div>

    <div class="accordion-item bg-dark text-white rounded-4 mb-3 shadow" data-aos="fade-up" data-aos-delay="600">
  <h2 class="accordion-header">
    <button class="accordion-button bg-dark text-white collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faqSix">
      📄 What chat file formats are supported?
    </button>
  </h2>
  <div id="faqSix" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
    <div class="accordion-body">
      Currently, we only support a few specific WhatsApp export formats due to limited data availability. Make sure your chat file follows one of the following structures:
      <br><br>

      <code>2023/06/18 14:23 - John: [message]</code><br>
      <code>2023/6/8 9:15 - Alice: [message]</code><br>
      <code>[06/18/2023, 9:15 AM] Alice: [message]</code>
      
      <br><br>
      If your chat file doesn't follow these formats, it may not be processed correctly.
    </div>
  </div>
    </div>

    <div class="accordion-item bg-dark text-white rounded-4 mb-3 shadow" data-aos="fade-up" data-aos-delay="700">
  <h2 class="accordion-header">
    <button class="accordion-button bg-dark text-white collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faqSeven">
      🔒 How does the system work, and is my data safe?
    </button>
  </h2>
  <div id="faqSeven" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
    <div class="accordion-body">
      Our website is hosted securely via Cloudflare and uses PHP on the backend to handle file uploads and API requests.<br><br>
      All uploaded chat files are processed locally by a Python engine running in a secure environment. Since the analysis runs on our local server and is not connected to any external third-party service, the risk of data leakage is extremely low.<br><br>
      Your data is used solely for analysis and is not stored permanently.
    </div>
  </div>
  </div>

  <div class="accordion-item bg-dark text-white rounded-4 mb-3 shadow" data-aos="fade-up" data-aos-delay="800">
  <h2 class="accordion-header">
    <button class="accordion-button bg-dark text-white collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faqEight">
      🧪 Can I test the service without using my real WhatsApp data?
    </button>
  </h2>
  <div id="faqEight" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
    <div class="accordion-body">
      Yes! We provide a sample chat file so you can try the system without uploading your personal data. This lets you explore the features risk-free.
        <br><br>
👉 <a href="Sample/sample_whatsapp_chat.txt" download class="text-decoration-underline text-secondary">Click here to download the sample chat file</a> and upload it to explore the features risk-free.
    </div>
  </div>
  </div>

  <div class="accordion-item bg-dark text-white rounded-4 mb-3 shadow" data-aos="fade-up" data-aos-delay="1200">
  <h2 class="accordion-header">
    <button class="accordion-button bg-dark text-white collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwelve">
      🎯 How accurate is the result?
    </button>
  </h2>
  <div id="faqTwelve" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
    <div class="accordion-body">
      MBTI prediction is based on linguistic patterns and may not fully reflect your complete personality. Results are informative but not absolute.
    </div>
  </div>
</div>






  </div>
</section>




<?php

include "Required/footer.php"
?>
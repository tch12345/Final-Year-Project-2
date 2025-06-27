

</main>

<footer class="text-white py-4 mt-auto bg-black border-top border-secondary">
  <div class="container text-center text-md-start">
    <div class="row align-items-center justify-content-between gy-3">
      
      <!-- 左侧：学校 Logo -->
      <div class="col-md-3 text-center text-md-start">
        <img src="Image/MMU logo.png" alt="Logo" style="max-height: 50px;">
      </div>

      <!-- 中间：信息 -->
      <div class="col-md-6 text-center">
        <div class="small">
          Made by <span class="fw-semibold">Tan Chee Han</span><br>
          &copy; <span id="currentYear"></span> Belial AI. All rights reserved.
        </div>
      </div>

      <!-- 右侧：联系 -->
      <div class="col-md-3 text-center text-md-end">
        <div class="small">
          <a href="https://outlook.live.com/mail/0/deeplink/compose?to=1211201053@student.mmu.edu.my" target="_blank">Contact Us</a>
        </div>
      </div>

    </div>
  </div>
</footer>




</body>
</html>
<script src="Plugin/jquery/dist/jquery.js"></script>
<script src="Css/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="Plugin/swal/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="Js/all.js"></script>
<script>
$(document).ready(function(){
    $(window).scroll(function(){
        if($(this).scrollTop()>50){
            $(".navigation").addClass("scrolled-navbar");
        }else{
            $(".navigation").removeClass("scrolled-navbar");
        }
    });
});
    
AOS.init();    
</script>
<script>
    <?php echo $script?>
</script>
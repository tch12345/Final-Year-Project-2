<?php
include "Config/config.php";
include "Config/session.php";
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit;
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])){
    $newpassword=$_POST['new_password'];
    if ($newpassword==='') {
        $script.="swal.loginFailed('New Password cannot be empty');";
    }else{
        $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
        $userId = $_SESSION['user_id'];
        try {
        $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE id = :id");
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            $script.="swal.Successful();";
        } else {
            $script.="swal.loginFailed('New Password Update Unsuccessful');";
        }
    } catch (PDOException $e) {
         $script.="swal.loginFailed('New Password Update Unsuccessful ".$e->getMessage()."');";
    }
    }
}



include "Required/header.php";
?>
<section id="account" class="container py-5 px-4 position-relative overflow-hidden">
  <!-- 背景渐变浮动球 -->
  <div class="position-absolute top-0 start-50 translate-middle-x opacity-10" style="z-index: 0;">
    <div class="rounded-circle bg-gradient" style="width: 300px; height: 300px; filter: blur(100px);"></div>
  </div>

  <!-- 标题 -->
  <div class="text-center mb-5 position-relative" data-aos="fade-up" style="z-index: 1;">
    <h2 class="fw-bold display-5 text-gradient">
      <span class="me-2" style="-webkit-text-fill-color: white !important;">👤</span> My Account
    </h2>
    <p class="text-secondary">Manage your personal information and credentials securely.</p>
  </div>

  <!-- 内容区域 -->
  <div class="row justify-content-center position-relative" style="z-index: 1;">
    <div class="col-md-8">
      <div class="p-5 bg-dark text-light border border-secondary rounded-4 shadow-sm backdrop-blur" data-aos="fade-up" data-aos-delay="100" style="background: rgba(33,37,41,0.85); border: 1px solid rgba(108,117,125,0.4);">

        <!-- 用户信息 -->
         
        <div class="d-flex align-items-center mb-4">
            
          <div class="rounded-circle overflow-hidden me-3 shadow" style="width: 64px; height: 64px; border: 2px solid transparent; background-image: linear-gradient(#212529, #212529),  background-origin: border-box; background-clip: content-box, border-box;">
            <img src="<?php echo $_SESSION['user_icon'];?>" 
                alt="User Avatar" 
                class="w-100 h-100" 
                style="object-fit: cover;">
            </div>

          <div>
            <h5 class="mb-0 text-white fw-semibold">
              <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'John Doe'); ?>
            </h5>
            <small class="text-secondary">
              <i class="bi bi-envelope me-1"></i>
              <?php echo htmlspecialchars($_SESSION['user_email'] ?? 'your@email.com'); ?>
            </small>
          </div>
        </div>

        <!-- 更改密码 -->
        <form  method="POST">
          <div class="mb-3">
            <label for="newPassword" class="form-label text-transform: none; text-white fw-semibold">🔐 New Password</label>
            <div class="input-group ">
              <input type="password" name="new_password" id="newPassword" style="text-transform: none;" class=" login-btn form-control border border-secondary text-white bg-transparent" placeholder="Enter new password" required>
              <input type="hidden" name="update" value="1">
              <button type="button" class="login-btn btn-outline-light d-flex align-items-center" id="togglePassword">
                <i class="bi bi-eye transition-icon"></i>
                </button>
            </div>
            <small class="form-text text-muted">Use a strong, unique password.</small>
          </div>

          <button class="login-btn  w-100 mt-3 shadow-sm">
            Update Password
            </button>
        </form>
      </div>
    </div>
  </div>
</section>




<?php
$script .= <<<EOF

  $(document).ready(function() {
    $('#togglePassword').on('click', function () {
      const input = $('#newPassword');
      const icon = $(this).find('i');
      const type = input.attr('type') === 'password' ? 'text' : 'password';
      input.attr('type', type);
      icon.toggleClass('bi-eye bi-eye-slash');
    });
  });

EOF;
include "Required/footer.php";
?>
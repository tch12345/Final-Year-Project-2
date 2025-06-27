<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, proxy-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <!---boostrap--->
   <link href="Css/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
   <link href="Css/Main/style.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
   <link href="Plugin/swal/node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <link rel="icon" href="Image/logo.png" type="image/x-icon">
    <title>Belial</title>


</head>
<body class="d-flex min-vh-100 flex-column bg-black overflow-auto">
    <nav class="z-navbar position-fixed w-100 top-4 lg-top-6 ">
       <div class="container">
            <div class="navigation bg-black position-relative d-flex w-100 align-items-center justify-content-between rounded border border-0 px-2 py-2 transition-box">
                <a class="homepage position-relative d-flex  w-auto align-items-center overflow-hidden gap-1 px-lg-3" href="#">
                    <div class="logo pe-none position-relative me-lg-1 ">
                        <img alt="" width="40" decoding="async" class=" logo-img" src="Image/logo.png">
                    </div>
                    <div class="logo-img-belial"><img src="Image/Belial.svg" width="90" alt=""></div>
                </a>
                <ul class="navigation-list ms-2 gap-5 offset-lg-1 px-2 d-flex">
                    <li>
                        <a target="_self" class="transition-colors duration-300 hover:text-brand-foreground motion-reduce:transition-none <?php echo ($active=="introduction"?"active":"")?>" href="index.php">Introduction</a>
                    </li>
                    <li>
                        <a target="_self" class="transition-colors duration-300 hover:text-brand-foreground motion-reduce:transition-none <?php echo ($active=="privacy"?"active":"")?>" href="privacy.php">Privacy Policy</a>
                    </li>
                    <li>
                        <a target="_self" class="transition-colors duration-300 hover:text-brand-foreground motion-reduce:transition-none <?php echo ($active=="faq"?"active":"")?>" href="faq.php">FAQ</a>
                    </li>
                    <li>
                        <a target="_self" class="transition-colors duration-300 hover:text-brand-foreground motion-reduce:transition-none <?php echo ($active=="about"?"active":"")?>" href="about.php">ABOUT US</a>
                    </li>
                    <li>
                        <a target="_self" class="transition-colors duration-300 hover:text-brand-foreground motion-reduce:transition-none <?php echo ($active=="build"?"active":"")?>" href="build.php">API BUILD</a>
                    </li>
                    <?php 
                       if(isset($_SESSION['user_id'])){
                    ?>
                    <li>
                        <a target="_self" class="transition-colors duration-300 hover:text-brand-foreground motion-reduce:transition-none <?php echo ($active=="mbti"?"active":"")?>" href="mbti.php">MBTI</a>
                    </li>
                    <?php 
                    }?>
                </ul>
                <?php 
                if(isset($_SESSION['user_id'])){
                   
                    echo '
                    <div class="ms-lg-3 w-auto justify-content-end gap-2 d-flex">
                        <div id="profileButton" class="login-btn position-relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="white"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-user size-6">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                    </div>';
                }else{
                    echo '<div class="ms-lg-3 w-auto justify-content-end gap-2 d-flex">
                    <a href="login.php" class="login-btn position-relative">Login</a>
                </div>';
                }
                ?>
            </div>
                <?php 
                 if(isset($_SESSION['user_id'])){
                    ?>
                    <div id="profileMenu" class="shadow end-0 rounded bg-black text-white position-absolute" style="display:none; z-index: 1050;">
    
                    <!-- 用户信息 -->
                    <div class="px-3 py-3 border-bottom border-secondary d-flex align-items-center gap-2">
                    <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center overflow-hidden"
                        style="width: 36px; height: 36px;">
                        <img src="<?php echo $_SESSION['user_icon']; ?>" 
                            alt="User Avatar" 
                            style="width: 100%; height: 100%; object-fit: cover; display: block;">
                    </div>

                    <div>
                        <strong class="d-block text-uppercase small"><?php echo htmlspecialchars($_SESSION['user_name'] ?? 'User'); ?></strong>
                        <span class="small text-secondary"><?php echo htmlspecialchars($_SESSION['user_email'] ?? 'user@example.com'); ?></span>
                    </div>
                    </div>

                    <div class="dropdown-divider bg-secondary my-0"></div>

                   
                    <a href="account.php" class="dropdown-item text-white d-flex  justify-content-between align-items-center px-3 py-2">
                        <span>Account Settings</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="pt-1" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="ms-2">
                            <path d="M12 19c-2 0-4-1-4-4h8c0 3-2 4-4 4z"/>
                            <circle cx="12" cy="8" r="4"/>
                        </svg>
                    </a>

                    <a href="logout.php" class="dropdown-item text-white d-flex justify-content-between align-items-center px-3 py-2">
                        <span>Log Out</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="pt-1" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="ms-2">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                            <polyline points="16 17 21 12 16 7"/>
                            <line x1="21" y1="12" x2="9" y2="12"/>
                        </svg>
                    </a>

                </div>
                    <?php
                 }
                ?>
            
       </div>
    </nav>
<main class="flex-grow-1 d-flex flex-column pt-5 mt-5 text-white">
    <!-- 🔹 Introduction Section -->
<?php
require "Config/config.php";
require "Config/session.php";
require "Function/login_function.php";


$script="";
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['code'])){
    
    $result=processLogin($_GET['code']);
    if ($result['success']) {
        $script.="swal.loginSuccessful();";
    } else {
        $script.="swal.loginFailed(".$result['message'].");";
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){
    
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    if ($email === '' || $password === '') {
        $script.="swal.loginFailed('Email or Password cannot be empty');";
    }else{
        if(login($email,$password)){
            $script.="swal.loginSuccessful();";
        }else {
            $script.="swal.loginFailed('Invalid email or password');";
        }
    }

}
?>

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
   <link href="Plugin/swal/node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="icon" href="Image/logo.png" type="image/x-icon">

    <title>Belial</title>
</head>
<body class="bg-black">
    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="mb-3">
                    <img alt="logo" width="48" decoding="async" src="Image/logo.png">
            </div>
            <div class="mb-3">
                <h1 class="heading fs-5">Sign in</h1>
            </div>
        </div>
        <div class="card rounded-4">
            <form class="form" method="post">
            <div class="card-body m-3">
                <div class="form-group mb-2">
                    <label class="mb-2 email" for="email">Email</label>
                    <input type="text" name="email" required class="form-control mb-3 rounded-1 text-start" id="email" placeholder="Your Email">
                </div>
                <div class="form-group mb-2">
                    <label class="mb-2 email" for="email">Password</label>
                    <input type="password" name="password" required class="form-control mb-3 rounded-1 text-start" id="email" placeholder="Your password">
                </div>
                <input type="hidden" name="login" value="1">
                <div class="form-group">
                    <button class="btn border form-control mb-2 rounded-1">Login</button>
                </div>
                <div class="d-flex align-items-center justify-content-center my-2">
                    <span class="flex-grow-1" style="box-shadow: 0 0 0 0.1px #d3d3d3;"></span>
                    <span class="mx-3 my-2 text-secondary" style="font-size: 14px;">OR</span>
                    <span class="flex-grow-1" style="box-shadow: 0 0 0 0.1px #d3d3d3;"></span>
                </div>
                
                <div class="form-group">
                    
                    <a href="<?= htmlspecialchars( string: getGoogleLogin()) ?>" class="btn-google border form-control mt-3 mb-2 rounded-1" style="cursor: pointer !important;">
                        <img src="Image/google.svg" alt="Google Icon" width="15" style="margin-right: 8px; transform: translateY(-2px);">
                        Continue with Google
                    </a>
                </div>

                
                
            </div>
        </form>
              
        </div>
        
    </div>
    
</body>
</html>
<script src="Plugin/jquery/dist/jquery.js"></script>
<script src="Plugin/swal/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="Js/all.js"></script>
<script>
<?php 

echo $script;
?>

</script>
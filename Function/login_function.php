<?php 
require __DIR__."/../Config/config.php";
require_once __DIR__ . "/../Plugin/google/vendor/autoload.php";

function hashPassword($password) {
    $options = [
        'cost' => 12, // 推荐12，安全又合理的性能
    ];
    return password_hash($password, PASSWORD_DEFAULT, $options);
}
function login($email, $password) {
    global $pdo;

    // 查询用户资料
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // 验证密码
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_icon']=$user['avatar'];
        return true;
    } else {
        return false;
    }
}


function getGoogleLogin(){
    $client = new Google\Client;
    $client->setClientId(clientId);
    $client->setClientSecret(clientSecret);
    $client->setRedirectUri(PATH."/webpage/login.php");
    $client->addScope("email");
    $client->addScope("profile");
    $url=$client->createAuthUrl();
    return $url;
}
function insertGoogleUserIfNotExists($userinfo) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
    $stmt->execute(['email' => $userinfo->email]);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        return $existingUser['id'];
    }

    $stmt = $pdo->prepare("
        INSERT INTO users (email, name, google_id)
        VALUES (:email, :name, :google_id)
    ");
    $stmt->execute([
        'email' => $userinfo->email,
        'name' => $userinfo->name,
        'google_id' => $userinfo->id
    ]);
    return $pdo->lastInsertId();
}
function downloadUserAvatar($url, $path) {
    // 创建文件夹如果不存在
    $dir = dirname($path);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }

    // 下载头像
    $imgData = @file_get_contents($url);
    if ($imgData !== false) {
        return file_put_contents($path, $imgData) !== false;
    }
    return false;
}
function processLogin($code){
    global $pdo;
    try {
    $client = new Google\Client;
    $client->setClientId(clientId);
    $client->setClientSecret(clientSecret);
    $client->setRedirectUri(PATH."/webpage/login.php");
    
    $token = $client->fetchAccessTokenWithAuthCode($code);
    if (isset($token['error'])) {
        return [
            'success' => false,
            'error' => true,
            'message' => 'Google Auth Error: ' . $token['error'],
            'details' => $token
        ];
    }
    $client->setAccessToken($token["access_token"]);

    $oauth = new Google\Service\Oauth2($client);
    $userinfo = $oauth->userinfo->get();
    $user_id = insertGoogleUserIfNotExists($userinfo);
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $userinfo->name;
    $_SESSION['user_email'] = $userinfo->email;
    

    $avatar_url = $userinfo->picture;
    $local_avatar_path = "Image/icon/user_" . $user_id . ".jpg";
    if (!file_exists($local_avatar_path)) {
        if (downloadUserAvatar($avatar_url, $local_avatar_path)) {

            $update = $pdo->prepare("UPDATE users SET avatar = :avatar WHERE id = :id");
            $update->execute([
            'avatar' => $local_avatar_path,
            'id' => $user_id
            ]);
                $_SESSION['user_icon'] = $local_avatar_path;
            } else {
                $_SESSION['user_icon'] = "Image/icon/default.jpg"; 
        }
    }else{
        $_SESSION['user_icon'] = $local_avatar_path;
    }
    return [
            'success' => true,
            'error' => false,
            'message' => 'Login Successful',
            'details' => "none"
        ];
    } catch (Exception $e) {
        return [
            'success' => false,
            'error' => true,
            'message' => 'Exception: ' . $e->getMessage(),
            'details' => null
        ];
    }
}
?>

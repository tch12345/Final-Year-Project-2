<?php
$host = 'localhost';
$dbname = 'fyp2';
$user = 'root';
$pass = '';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // 你可以 echo "Connected"; 测试用
} catch (PDOException $e) {
    die("❌ Database connection failed: " . $e->getMessage());
}
$script ="";

$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
$current_url .= "://$_SERVER[HTTP_HOST]";


if (!defined('PATH')) {
    DEFINE('PATH',$current_url);
}

if (!defined('clientId')) {
    DEFINE('clientId',"354988835686-f0v38h00nlm2ljqfah2vblo32jb1vjdg.apps.googleusercontent.com");
}

if (!defined('clientSecret')) {
    DEFINE('clientSecret',"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");
}

?>
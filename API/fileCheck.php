<?php
include '../Config/config.php';
include '../Config/session.php';
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
    exit;
}

if (!isset($_FILES['file'])) {
    echo json_encode(["success" => false, "message" => "No file uploaded"]);
    exit;
}

if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        "success" => false,
        "message" => "Not logged in. Upload not allowed."
    ]);
    exit;
}

if (is_array($_FILES['file']['name'])) {
    echo json_encode(["success" => false, "message" => "Only one file is allowed"]);
    exit;
}


$file = $_FILES['file'];

// ✅ 文件扩展名检查
$extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
if ($extension !== 'txt') {
    echo json_encode(["success" => false, "message" => "Only .txt files are allowed"]);
    exit;
}


$userID = $_SESSION['user_id'];
$timestamp = time();
$rawFileName = "chat_{$userID}_{$timestamp}.txt";
$md5FileName = md5($rawFileName);

$tmpFilePath = $_FILES['file']['tmp_name'];
$originalFileName = $_FILES['file']['name'];

$apiURL = "http://localhost:8000/checkFile";
$cfile = new CURLFile($tmpFilePath, 'text/plain', $md5FileName);
$postData = [
    "file" => $cfile,
    "filename" => $md5FileName
];

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => $apiURL,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData,
    CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
    CURLOPT_CONNECTTIMEOUT => 3,    
    CURLOPT_TIMEOUT => 10,          
]);
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
    echo json_encode(["success" => false, "message" => "cURL error: $err"]);
    exit;
}

$data = json_decode($response, true);  // 转换为 PHP 关联数组
if (!$data || !isset($data['success'])) {
    echo json_encode(["success" => false, "message" => "Invalid response from API"]);
    exit;
}

if ($data['success']) {
    $stmt = $pdo->prepare("
        INSERT INTO file (user_id, filename, file_name_ori, file_size, file_type,file_status)
        VALUES (:user_id, :filename, :file_name_ori, :file_size, :file_type,:file_status)
    ");
    $stmt->execute([
        'user_id' => $_SESSION['user_id'],
        'filename' => $md5FileName,
        'file_name_ori' => $file['name'],
        'file_size' => $file['size'],
        'file_type' => $file['type'],
        'file_status'=> 'Processing'
    ]);   
    echo json_encode(["success" => true,"file"=>$md5FileName.".txt", "message" => "✅ File validated successfully"]);
} else {
    echo json_encode(["success" => false, "message" => $data['message'] ?? "API returned failure"]);
}

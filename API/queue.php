<?php
header('Content-Type: application/json');

// 1. 获取参数
if (!isset($_POST['filename'])) {
    echo json_encode(["status" => "error", "message" => "Filename is missing"]);
    exit;
}


$filename = $_POST['filename'];



$apiURL = "http://localhost:8000/queue";
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $apiURL,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query([
        "filename" => $filename.".txt"
    ]),
    CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
    CURLOPT_CONNECTTIMEOUT => 3,    
    CURLOPT_TIMEOUT => 10,
]);



$response = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);

print_r($err);

// 3. 返回 FastAPI 的结果或错误
if ($err) {
    echo json_encode(["status" => "error", "message" => "cURL error: $err"]);
} else {
    echo $response; // 直接回传 FastAPI 的响应（必须是 JSON）
}

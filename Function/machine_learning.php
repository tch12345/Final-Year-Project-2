<?php
function getModelData($filename){
    $filename = trim($filename) . ".txt";
    $ch = curl_init('http://localhost:8000/model');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'filename' => $filename
    ]);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); // 最多等 5 秒建立连接
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // 最多等 10 秒整体等待
    $response = curl_exec($ch);
    $error = curl_error($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($response === false || $http_code < 200 || $http_code >= 300) {
        return false;
    }
    $data = json_decode($response, true);
    if (!$data || $data['status'] !== '200' || !isset($data['data'])) {
        return false;
    }
    foreach ($data['data'] as &$entry) {
        if (preg_match('/user(\d+)/', $entry['user'], $matches)) {
            $entry['user'] = 'user' . $matches[1];
        }
    }
    return $data['data'];
}

function getFeatures($filename) {
    $url = 'http://localhost:8000/features';

    // 初始化 cURL
    $ch = curl_init($url);

    // 设置 cURL 选项
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true); // 使用 POST 方法
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'filename' => $filename
    ]);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); // 连接超时（秒）
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);       // 响应超时（秒）

    // 执行请求
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // 检查是否请求失败
    if ($response === false || $http_code < 200 || $http_code >= 300) {
        return false;
    }

    // 尝试解析 JSON
    $data = json_decode($response, true);

    if (!$data || $data['status'] !== '200' || !isset($data['features'])) {
        return false;
    }

    foreach ($data['features'] as &$entry) {
        if (preg_match('/user\d+$/', $entry['user_id'], $matches)) {
            $entry['user_id'] = $matches[0]; // 现在 user_id 就是 "user11"
        }
    }
    return $data['features']; // 返回 features 数组
}

function getTfidf($filename) {
    $url = 'http://localhost:8000/tfidf';

    // 初始化 cURL
    $ch = curl_init($url);

    // 设置 cURL 选项
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true); // 使用 POST 方法
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'filename' => $filename
    ]);

    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); // 连接超时（秒）
    curl_setopt($ch, CURLOPT_TIMEOUT, 120);       // 响应超时（秒）

    // 执行请求
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // 检查是否请求失败
    if ($response === false || $http_code < 200 || $http_code >= 300) {
        return false;
    }
    $data = json_decode($response, true);

    // 判断返回结构
    if (!$data || $data['status'] !== '200' || !isset($data['tfidf'])) {
        return false;
    }
    return $data['tfidf'];
}

function storeDB($filename, $data, $features, $tfidf) {
    global $pdo;

    // 这里假设 $data, $features, $tfidf 已经是 JSON 字符串，直接用
    $model_result_txt = is_array($data) ? json_encode($data, JSON_UNESCAPED_UNICODE) : $data;
    $features_txt = is_array($features) ? json_encode($features, JSON_UNESCAPED_UNICODE) : $features;
    $tfidf_result_txt = is_array($tfidf) ? json_encode($tfidf, JSON_UNESCAPED_UNICODE) : $tfidf;

    // 你可以从 filename 或其他参数拿 user_id，这里示例写死，改成你实际用法
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO dataset (user_id, filename, model_result_txt, tfidf_result_txt, features)
            VALUES (:user_id, :filename, :model_result_txt, :tfidf_result_txt, :features)
            ON DUPLICATE KEY UPDATE
                model_result_txt = VALUES(model_result_txt),
                tfidf_result_txt = VALUES(tfidf_result_txt),
                features = VALUES(features)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':user_id' => $user_id,
        ':filename' => $filename,
        ':model_result_txt' => $model_result_txt,
        ':tfidf_result_txt' => $tfidf_result_txt,
        ':features' => $features_txt,
    ]);
}
function randomRGBA($opacity = 0.6) {
    $r = rand(0, 255);
    $g = rand(0, 255);
    $b = rand(0, 255);
    return "rgba($r, $g, $b, $opacity)";
}
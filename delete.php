<?php
include "Config/config.php";    // 假设这里定义了 $pdo (PDO连接对象)
include "Config/session.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filename = $_POST['filename'] ?? '';

    if (empty($filename)) {
        header('Location: mbti.php?error=missing_filename');
        exit;
    }

    $stmt = $pdo->prepare("DELETE FROM file WHERE filename = :filename");
    $stmt->bindParam(':filename', $filename, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        header('Location: mbti.php?msg=deleted');
    } else {
        header('Location: mbti.php?error=not_found');
    }
    exit;
} else {
    header('Location: mbti.php');
    exit;
}

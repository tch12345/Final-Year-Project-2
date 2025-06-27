<?php
require_once '../Config/config.php';
include '../Config/session.php';

if (isset($_POST['filename']) && isset($_POST['status'])) {
    $filename = $_POST['filename'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("UPDATE file SET file_status = ? WHERE filename = ?");
    $success = $stmt->execute([$status, $filename]);

    if ($success) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
}
<?php
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT); // 使用 bcrypt 算法
}


function updateUserPassword($newPassword) {
    global $pdo;
    $hashedPassword = hashPassword($newPassword);
    $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
    return $stmt->execute([$hashedPassword, $_SESSION['id']]);
}
<?php

session_start();
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/helpers/tools.php';
require_once __DIR__ . '/../../models/User.php';

try {
    $input = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
    ];

    $pdo = getDatabaseConnection(); 
    
    $stmt = $pdo->prepare("SELECT * FROM User WHERE username = ?");
    $stmt->execute([$input['username']]);

    $res = $stmt->fetch();
    
    if (!$res || !password_verify($input['password'], $res['password'])) {
        error(401, 'login-error', 'Invalid credentials', '/../../views/login.php');
        exit();
    }
    logLoginActivity($pdo, $res['id'], true);
    $user = new User($res['id'], $res['name'], $res['email'], $res['username'], $res['password']);
    $_SESSION['user'] = $user; 
    header("Location: /../../views/index.php");
    exit();
    
} catch (PDOException $e) {
    error(500, 'login-error', 'Something went wrong. Please try again.', '/../../views/login.php');
} 
?>
<?php
session_start();
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/helpers/tools.php';

try {
    $input = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'confirmPassword' => $_POST['confirmPassword'],
    ];

    validateRegistrationData($input);

    $pdo = getDatabaseConnection(); 
    
    $stmt = $pdo->prepare("SELECT id FROM User WHERE username = ?");
    $stmt->execute([$input['username']]);

    if ($stmt->fetch()) {
        error(409, "Username already registered");
    }

    $hashedPassword = password_hash($input['password'], PASSWORD_BCRYPT);
 
    $stmt = $pdo->prepare("
        INSERT INTO User (
            name,
            email,
            username,
            password
        ) VALUES (?, ?, ?, ?)
    ");

    $stmt->execute([
        $input['name'],
        $input['email'],
        $input['username'],
        $hashedPassword
    ]);
    
    header("Location: /../../views/login.php");
    exit();
    
} catch (PDOException $e) {
    echo $e;
    error(500, "Something went wrong. Please try again.");
} 
?>
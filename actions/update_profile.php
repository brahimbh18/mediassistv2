<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /../views/profile.php');
    exit();
}

if (!isset($_SESSION['user']) || !($_SESSION['user'] instanceof User)) {
    header('Location: /../views/login.php');
    exit();
}


try {
    $currentUser = $_SESSION['user'];
    
    $query = "UPDATE users SET ";
    $params = [];
    $updates = [];
    
    $fields = [
        'name', 'email', 'age', 'gender', 
        'bloodType', 'weight', 'height', 'phone', 'address'
    ];
    
    foreach ($fields as $field) {
        if (isset($_POST[$field]) && $_POST[$field] !== $currentUser->{'get'.ucfirst($field)}()) {
            $updates[] = "$field = ?";
            $params[] = $_POST[$field];
        }
    }
    
    if (!empty($updates)) {
        $pdo = getDatabaseConnection();
        $query .= implode(', ', $updates);
        $query .= " WHERE id = ?";
        $params[] = $currentUser->getId();
        
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                $setter = 'set'.ucfirst($field);
                $currentUser->$setter($_POST[$field]);
            }
        }
        
        $_SESSION['message'] = "Profile updated successfully!";
    } else {
        $_SESSION['message'] = "No changes detected.";
    }
    
    header("Location: /views/profile.php");
    exit();

} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    $_SESSION['error'] = "Update failed. Please try again.";
    header("Location: /views/profile.php");
    exit();
}
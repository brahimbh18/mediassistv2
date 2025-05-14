<?php
$dbPath = __DIR__ . '/mediassist.db';

function logError(string $message): void {
    error_log($message, 3, __DIR__ . '/../logs/errors.log');
}

function getDatabaseConnection() {
    global $dbPath;
    try {
        $pdo = new PDO("sqlite:$dbPath");

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    } catch (PDOException $e) {
        logError("Database connection failed: " . $e->getMessage());
        
        throw new Exception("Database connection failed. Please try again later.");
    }
}


?>
<?php

function error(string $errorCode, string $errorType, string $errormMessage, string $dest): void {
    http_response_code($errorCode);
    $_SESSION[$errorType] = $errormMessage;
    header("Location: " . $dest);
    exit();
} 

function isRateLimited(string $ip): bool {
    $limit = 5; // per minute
    $cacheDir = __DIR__ . '/../cache';
    if (!is_dir($cacheDir)) {
        mkdir($cacheDir, 0755, true);
    }
    $cacheFile = $cacheDir . '/' . md5($ip) . '.ratelimit';

    if (file_exists($cacheFile)) {
        $data = json_decode(file_get_contents($cacheFile), true);
        if (time() - $data['time'] < 60 && $data['count'] >= $limit) {
            return true;
        }
    }

    file_put_contents($cacheFile, json_encode([
        'time' => time(),
        'count' => ($data['count'] ?? 0) + 1
    ]));

    return false;
}

function validateRegistrationData(array $data): void {
    $errors = [];
    $errorType = 'register-error';
    $dest = '/../../views/register.php';

    $required = ['name', 'email', 'username', 'password'];
    foreach ($required as $feild) {
        if (empty($data[$feild])) {
            error(422, $errorType, 'This field is required', $dest);
        }
    }

    if (!filter_var($data['email'] ?? '', FILTER_VALIDATE_EMAIL)) {
        error(422, $errorType, 'Invalid email format', $dest);
    }

    if (preg_match('/\s/', $data['username'] ?? '')) {
        error(422, $errorType, 'Username cannot contain spaces', $dest);
    }

    if ($data['password'] !== $data['confirmPassword']) {
        error(422, $errorType, 'Passwords do not match', $dest);
    }

    if (strlen($data['password'] ?? '') < 8) {
        error(422, $errorType, 'Password must be at least 8 characters', $dest);
    }

    if (!preg_match('/[A-Z]/', $data['password'] ?? '') || 
        !preg_match('/[0-9]/', $data['password'] ?? '')) {
        error(422, $errorType, 'Must contain at least 1 uppercase letter and 1 number', $dest);
    }
}

function validateLoginData(array $data): array {
    $errors = [];
    if (empty($data['username'])) $errors['username'] = 'Username required';
    if (empty($data['password'])) $errors['password'] = 'Password required';

    return $errors; 
}

function logLoginActivity(PDO $pdo, ?int $userId, bool $isSuccess): void {
    try {
        $stmt = $pdo->prepare("
            INSERT INTO Login_activity (
                user_id,
                ip_address,
                user_agent
            ) VALUES (?, ?, ?)
        ");

        $stmt->execute([
            $userId,
            $_SERVER['REMOTE_ADDR'],
            $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown'
        ]);
    } catch (PDOException $e) {
        // error_log("Failed to log login activity: " . $e->getMessage());
    }
}

?>
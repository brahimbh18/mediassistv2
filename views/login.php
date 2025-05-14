<?php
    session_start();
    $error = $_SESSION['login_error'] ?? null;
    unset($_SESSION['login_error']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediAssist - Login</title>
    <link rel="stylesheet" href="/../public/css/index.css">
    <link rel="stylesheet" href="/../public/css/form.css">
    
</head>
<body>
    <div class="container">
        <h2 class="form-title">Login</h2>
        <?php if ($error): ?>
            <div id="errorMessage" class="error-message"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form id="loginForm" action="/../actions/auth/handle_login.php" method="POST">
            <div class="input-group">
                <img src="/../public/images/username.png" alt="username icon">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required autocomplete="username">
            </div>
            <div class="input-group">
                <img src="/../public/images/password.png" alt="password icon">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autocomplete="current-password">
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        <div class="link">
            Don't have an account? <a href="register.php">Register here</a>
        </div>
    </div>

</body>
</html>
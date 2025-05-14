<?php
session_start();
$error = $_SESSION['register_error'] ?? null;
unset($_SESSION['register_error']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediAssist - Register</title>
    <link rel="stylesheet" href="/../public/css/index.css">
    <link rel="stylesheet" href="/../public/css/form.css">
</head>
<body>
        <div class="container">
            <h2 class="form-title">Sign Up</h2>
            <?php if ($error): ?>
                <div id="errorMessage" class="error-message"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            
            <form id="registerForm" action="/../actions/auth/handle_register.php" method="POST">
                <div class="input-group">
                    <img src="/../public/images/user.png" alt="user icon">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                </div>
                <div class="input-group">
                    <img src="/../public/images/email.png" alt="email icon">
                    <input type="email" class="form-control" id="email" name="email"  placeholder="Email" required>
                </div>
                <div class="input-group">
                    <img src="/../public/images/username.png" alt="username icon">
                    <input type="text" class="form-control" id="username" name="username"  placeholder="Username" required>
                </div>
                <div class="input-group">
                    <img src="/../public/images/password.png" alt="">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <img src="/../public/images/password.png" alt="">
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                </div>
                <button type="submit" class="btn">Sign Up</button>
            </form>
            <div class="link">
                Already have an account? <a href="login.php">Login here</a>
            </div>
        </div>


    <script src="/../public/js/auth.js"></script>
</body>
</html>
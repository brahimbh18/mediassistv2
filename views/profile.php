<?php
require_once __DIR__ . '/../models/User.php';
session_start();
if (!isset($_SESSION['user']) || !($_SESSION['user'] instanceof User)) {
    header('Location: /../views/login.php');
    exit();
}
$user = $_SESSION['user'];
$message = $_SESSION['message'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="/../public/css/profile.css">
</head>
<body>
    <div class="navbar">
        <button class="back-button" onclick="goBack()">&#11013;</button>
        <h2>App Name</h2>
    </div>

    <div class="profile-container">
        <img src="/../public/images/userPic.png" alt="User Profile">
        <h3>@<?= htmlspecialchars($user->getUsername()) ?></h3>
    </div>
    <?php if (!empty($message)) echo "<p style='color: green;'>$message</p>"; ?>

    <form class="profile-details" method="POST" action="/../actions/update_profile.php">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($user->getName()) ?>">
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($user->getEmail()) ?>">
        
        <label for="age">Age</label>
        <input type="number" id="age" name="age" value="<?= htmlspecialchars($user->getAge()) ?>">
        
        <label for="gender">Gender</label>
        <input type="text" id="gender" name="gender" value="<?= htmlspecialchars($user->getGender()) ?>">
        
        <label for="bloodType">Blood Type</label>
        <input type="text" id="bloodType" name="bloodType" value="<?= htmlspecialchars($user->getBloodType()) ?>">
        
        <label for="weight">Weight (kg)</label>
        <input type="number" id="weight" name="weight" value="<?= htmlspecialchars($user->getWeight()) ?>">
        
        <label for="height">Height (cm)</label>
        <input type="number" id="height" name="height" value="<?= htmlspecialchars($user->getHeight()) ?>">
        
        <label for="phone">Phone</label>
        <input type="tel" id="phone" name="phone" value="<?= htmlspecialchars($user->getPhone()) ?>">
        
        <label for="address">Address</label>
        <input type="text" id="address" name="address" value="<?= htmlspecialchars($user->getAddress()) ?>">
        
        <button type="submit" class="update-btn">Update Profile</button>
    </form>
    
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>

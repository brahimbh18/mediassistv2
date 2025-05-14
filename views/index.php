<?php
require_once __DIR__ . '/../models/User.php';
session_start();
if (!isset($_SESSION['user']) || !($_SESSION['user'] instanceof User)) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sliding Navigation Menu</title>
    <link rel="stylesheet" href="../public/css/home.css">
</head>
<body>
    <div class="navbar">
        <span class="menu-icon" onclick="openNav()">&#9776;</span>
        <h2>App Name</h2>
    </div>

    <div id="sidebar" class="sidebar">
        <span class="close-btn" onclick="closeNav()">&times;</span>
        <img src="../public/images/medspeak-icon.png" alt="MedSpeak Logo">
        <div class="email">contact@MEDSPEAK.com</div>
        <a href="profile.php">Profile</a>
        <a href="#">Settings</a>
        <a href="#">Share</a>
        <a href="#">About Us</a>
        <hr style="border: 1px solid black;">
        </br>
        </br>
        <a href="#" onclick="handleLogout()">Logout</a>
    </div>


    <div class="grid-container">
        <a href="medicaments.php" class="grid-item">
            <img src="../public/images/medications.png" alt="Medications">
            <p>Medications</p>
        </a>
        <a href="emergency.php" class="grid-item">
            <img src="../public/images/emergency.png" alt="Emergency">
            <p>Emergency</p>
        </a>
        <div class="grid-item">
            <img src="../public/images/appointments.png" alt="Appointments">
            <p>Appointments</p>
        </div>
        <div class="grid-item">
            <img src="../public/images/prescriptions.png" alt="Prescriptions">
            <p>Prescriptions</p>
        </div>
    </div>

    <script src="../public/js/authCheck.js"></script>
    <script>
        function openNav() {
            document.getElementById("sidebar").style.left = "0";
        }
        function closeNav() {
            document.getElementById("sidebar").style.left = "-250px";
        }
        function handleLogout() {
            window.location.href = '/../actions/auth/handle_logout.php';
        }
    </script>
</body>
</html>

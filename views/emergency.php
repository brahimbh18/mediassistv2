<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sliding Navigation Menu</title>
    <link rel="stylesheet" href="../public/css/list.css">
</head>
<body>
    <div class="navbar">
        <button class="back-button" onclick="goBack()">&#11013;</button>
        <h2>Emergency contacts</h2>
    </div>

    <div id="sidebar" class="sidebar">
        <span class="close-btn" onclick="closeNav()">&times;</span>
        <img src="medspeak-icon.png" alt="MedSpeak Logo">
        <div class="email">contact@MEDSPEAK.com</div>
        <a href="#">Settings</a>
        <a href="#">Share</a>
        <a href="#">About Us</a>
        <hr style="border: 1px solid black;">
        <a href="#">Logout</a>
    </div>

    <div class="grid-container">
        <div class="grid-item">
            <img src="/../public/images/userPic.png" alt="Profile">
            <p><strong>Name:</strong> John Doe</p>
            <p><strong>Phone:</strong> +216 20 123 456</p>
        </div>
        <div class="grid-item">
            <img src="/../public/images/userPic.png" alt="Profile">
            <p><strong>Name:</strong> Sarah Ben Ali</p>
            <p><strong>Phone:</strong> +216 98 765 432</p>
        </div>
        <div class="grid-item">
            <img src="/../public/images/userPic.png" alt="Profile">
            <p><strong>Name:</strong> Ahmed Trabelsi</p>
            <p><strong>Phone:</strong> +216 52 321 987</p>
        </div>
    </div>


    <button class="fab" onclick="openModal()">+</button>

    <div id="modal" class="modal">
        <h3>Add Contact</h3>
        <input type="text" placeholder="Name">
        <input type="text" placeholder="Phone Number">
        <button onclick="closeModal()">Done</button>
    </div>

    <script>
        function goBack() {
            window.location.href = 'index.php';
        }
        function openNav() {
            document.getElementById("sidebar").style.left = "0";
        }
        function closeNav() {
            document.getElementById("sidebar").style.left = "-250px";
        }
        function openModal() {
            document.getElementById("modal").style.display = "block";
        }
        function closeModal() {
            document.getElementById("modal").style.display = "none";
        }
    </script>
</body>
</html>

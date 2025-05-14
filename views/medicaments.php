<!-- medications.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Medications</title>
  <link rel="stylesheet" href="/../public/css/medicaments.css"/>
</head>
<body>
    <div class="navbar">
        <button class="back-button" onclick="goBack()">&#11013;</button>
        <h2>Add Medication</h2>
    </div>
    <div class="app">
    <div class="search-bar">
      <input type="text" placeholder="Search medications here..." />
    </div>

    <h2 class="section-title">Active Medicine</h2>

    <div class="medicine-card">
      <img src="/../public/images/prescriptions.png" alt="OBH Combi" />
      <div class="medicine-info">
        <h3>OBH Combi</h3>
        <p>1 pill</p>
        <p>once daily</p>
      </div>
      <button class="details-btn">Details</button>
    </div>

    <div class="medicine-card">
      <img src="panadol.png" alt="Panadol" />
      <div class="medicine-info">
        <h3>Panadol</h3>
        <p>3 pills</p>
        <p>daily</p>
      </div>
      <button class="details-btn">Details</button>
    </div>

    <button class="floating-btn">+</button>
  </div>
  </div>
</body>
</html>

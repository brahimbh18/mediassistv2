<!-- add.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Medication</title>
  <link rel="stylesheet" href="/../public/css/medicaments.css"/>
</head>
<body>
    <div class="navbar">
        <button class="back-button" onclick="goBack()">&#11013;</button>
        <h2>Add Medication</h2>
    </div>


  <div class="app">

    <form class="form">
      <input type="text" placeholder="Name" required />

      <div class="row">
        <select>
          <option>Tablets</option>
          <option>Syrup</option>
        </select>
        <select>
          <option>once daily</option>
          <option>twice daily</option>
        </select>
      </div>

      <input type="text" placeholder="Dosage (e.g. 1 pill)" required />
      <input type="time" />

      <div class="upload-box">
        <label for="photo">Import photo +</label>
        <input type="file" id="photo" hidden />
      </div>

      <button type="submit" class="add-btn">Add</button>
    </form>
  </div>
</body>
</html>

<?php
session_start();
include "../includes/db-inc.php";
$sql = "SELECT * FROM animals";
$fs = $pdo->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/main.css">
  <title>Document</title>
</head>

<body>
  <div class="navbaranimals">
    <a class="active" href="dashboard.php"><img src="../assets/nav_logo.png"></a>
    <a href="animals.php">Animals</a>
    <div class="navbaranimals-right">
      <a href="../login.php">logout</a>
    </div>
  </div>
  <button class="animal-button" style="margin-left:90px;">
    <a href="animals.php" style="color:white;">Add new animal</a></button>
  <button class="animal-button" id="update" style="margin-left:1100px;">Update Details</button>
  </section>
  <!-- Update  Animals Details -->
  <section class="modal-container" id="update-modal">
    <div class="modal">
      <h3 class="m-title">Animal Details</h3>
      <hr>
      <form action="" method="POST">
        <label>animal_id :</label><br>
        <input type="number" name="id"><br>
        <label>category :</label><br>
        <input type="text" name="category"><br>
        <label>breed :</label><br>
        <input type="text" name="breed"><br>
        <label>weight :</label><br>
        <input type="number" name="weight"><br>
        <label>height :</label><br>
        <input type="number" name="height"><br>
        <label>age :</label><br>
        <input type="number" name="age"><br>
        <label>fur :</label><br>
        <input type="text" name="fur"><br>
        <label>cost :</label><br>
        <input type="number" name="cost"><br>
        <input type="submit" name="update" value="Update" class="add"></input>
        <button id="close" class="button">Cancel</button>
      </form>
    </div>
  </section>
  <table class="animalstable" border size=10>
    <tr>
      <th>animal_id</th>
      <th>category</th>
      <th>breed</th>
      <th>weight</th>
      <th>height</th>
      <th>age</th>
      <th>fur</th>
      <th>cost</th>
    </tr>
    <?php
    foreach ($fs as  $value) {
      echo ' <td>' . $value["animal_id"] . '</td>';
      echo ' <td>' . $value["category"] . '</td>';
      echo ' <td>' . $value["breed"] . '</td>';
      echo ' <td>' . $value["weight"] . '</td>';
      echo ' <td>' . $value["height"] . '</td>';
      echo ' <td>' . $value["age"] . '</td>';
      echo ' <td>' . $value["fur"] . '</td>';
      echo '<td>' . $value["cost"] . '</td></tr>';
    }
    ?>
  </table>

  <div class="search" style="margin-top:25px;">
    <form action="" method="POST">
      <input id="animalbutton" type="text" name="t1" placeholder="Enter the id to delete" required>
      <input style="width:75px;height:44px;cursor:pointer;border-radius:15px;
border: 3px solid green;background-color: #4CAF50;color:#f2f2f2;font-size:17px;" type="submit" name="Delete" value="Delete">
    </form>
  </div>
</body>
<script>
  var update = document.getElementById('update');
  var updatemodal = document.getElementById('update-modal');

  update.addEventListener("click", function() {
    updatemodal.classList.add('show');
  });
</script>

</html>

<style>
  td,
  th {
    text-align: left;
    padding: 8px;
  }

  th {
    background-color: #4CAF50;
  }
</style>

<?php
if (isset($_POST['update'])) {
  $animal_id = $_POST['id'];
  $category = $_POST['category'];
  $breed = $_POST['breed'];
  $weight = $_POST['weight'];
  $height = $_POST['height'];
  $age = $_POST['age'];
  $fur = $_POST['fur'];
  $cost = $_POST['cost'];

  $sql = "UPDATE animals SET category = ?, breed = ?, weight = ?, height = ?, age = ?, fur = ?, cost = ? WHERE animal_id = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    $category,
    $breed,
    $weight,
    $height,
    $age,
    $fur,
    $cost,
    $animal_id,
  ]);
  if ($stmt) {
    echo "<Script>
  alert('Update done'); 
  </Script>";
  }
}

if (isset($_POST['Delete'])) {

  $animal_id = $_POST['t1'];

  $sql = "DELETE FROM animals WHERE animal_id = $animal_id";

  $stmt = $pdo->prepare($sql);

  $stmt->execute();

  return $stmt->rowCount();
}

?>
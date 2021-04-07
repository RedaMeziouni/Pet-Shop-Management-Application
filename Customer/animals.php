<?php
//  session_start();
//  if(isset($_SESSION['customer']))
//  {

//  }
//  else{
//   echo"<script>location.href='../login.php'</script>";
//  }
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
  <form>
    <button type="submit" formaction="animals.php" style="margin:15px;height: 30px;width: 100px;cursor:pointer;border-radius:15px;
border: 3px solid green;background-color: #4CAF50;color:#f2f2f2;font-size:17px;">
      <a href="animalsform.php">Back</a></button>
  </form>
  <form class="formanimals" method="POST" action="">
    <fieldset>
      <input type="text" name="category" placeholder="Enter animal_category" required>
      <br><br>

      <input type="text" name="breed" placeholder="Enter breed" required>
      <br><br>
      <input type="number" step=any name="weight" placeholder="Enter weight" min="1" required>

      <input type="number" step=any name="height" placeholder="Enter height" required>
      <br><br>
      <input type="number" name="age" placeholder="Enter age" min="1" required>

      <input type="text" name="fur" placeholder="Enter fur" required>
      <br><br>
      <input type="number" name="cost" placeholder="Enter cost" min="0" required>
      <br><br>
      <input type="submit" name="submit" value="save" style="width:100%;height:30px;
   border: 2px solid  #4CAF50; border-radius:3px; cursor:pointer;background-color: #4CAF50">&ensp;
    </fieldset>
  </form>

</body>

</html>
<?php
include "../includes/db-inc.php";
// $sql = "SELECT * FROM animals";
// $fs = $pdo->query($sql);
// foreach ($fs as  $value) {
//     echo $value['animal_id'] . '<br>';
//     echo $value['category'] . '<br>';
// }
if (isset($_POST["submit"])) {
  $category = $_POST['category'];
  $breed = $_POST['breed'];
  $weight = $_POST['weight'];
  $height = $_POST['height'];
  $age = $_POST['age'];
  $fur = $_POST['fur'];
  $cost = $_POST['cost'];
  $query = "INSERT INTO animals ( category, breed, weight, height, age, fur, cost ) 
    VALUES( ?,?,  ?, ?, ?,  ?, ?)";
  $r = $pdo->prepare($query);
  $r->execute([
    $category,
    $breed,
    $weight,
    $height,
    $age,
    $fur,
    $cost,
  ]);
  if ($r) {
    echo "<Script>
        alert('Bien reçu !'); 
        </Script>";
  }
}
?>
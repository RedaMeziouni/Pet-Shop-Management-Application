<?php
include "../includes/db-inc.php";
if (isset($_POST["submit"])) {
  $cs_fname = $_POST['cs_fname'];
  $cs_minit = $_POST['cs_minit'];
  $cs_lname = $_POST['cs_lname'];
  $cs_address = $_POST['cs_address'];
  $sql = "INSERT INTO customer (cs_fname, cs_minit, cs_lname, cs_address) VALUES (?, ?, ?, ?)";
  $submit = $pdo->prepare($sql);
  $submit->execute([
    $cs_fname,
    $cs_minit,
    $cs_lname,
    $cs_address,
  ]);
  header('location: customers.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/main.css">
  <title>products</title>
</head>

<body>
  <div class="petproducts" style=" background-color:#8d2663;">
    <img src="../assets/nav_logo.png">
    <a href="customers.php">Customers</a>
    <div>
      <a href="dashboard.php">logout</a>
    </div>
  </div>

  <button type="submit" href="customers.php" style="margin:15px;height: 30px;width: 100px;
       border-radius:15px;border: 3px solid  #b40a70;background-color: #8d2663;color:#f2f2f2;font-size:15px;cursor:pointer;">
    <a href="customers.php">back</a></button>

  <form method="post" action="customeradd.php">
    <fieldset>

      <input type="text" name="cs_fname" placeholder="Enter customer first_name" style="width:80%;height:30px;border: 2px solid #b40a70; border-radius:5px; background:transparent;" required>
      <br><br>
      <input type="text" name="cs_minit" placeholder="Enter customer middle_name" style="width:80%;height:30px;border: 2px solid  #b40a70; border-radius:5px; background:transparent;" required>
      <br><br>
      <input type="text" name="cs_lname" placeholder="Enter customer last_name" style="width:80%;height:30px;border: 2px solid  #b40a70; border-radius:5px; background:transparent;" required>
      <br><br>
      <input type="text" name="cs_address" placeholder="Enter customer address" style="width:80%;height:30px;border: 2px solid  #b40a70; border-radius:5px; background:transparent;" required>
      <br><br>
      <input type="submit" name="submit" value="ADD" style="width:83%;height:30px; border: 2px solid  #b40a70; border-radius:5px; cursor:pointer;background-color: #8d2663">
    </fieldset>
  </form>

</body>

</html>
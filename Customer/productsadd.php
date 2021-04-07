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
    <nav class="petproducts">
        <div class="F-logo">
            <img src="../assets/ic_add_pet.png" alt="">
            <a href="petproducts.php">Products</a>
        </div>
        <a href="dashboard.php">logout</a>
    </nav>
    <button type="submit" href="pets_products.php" style="margin:15px;height: 30px;width: 100px;cursor:pointer;border-radius:15px;border: 3px solid #ff0000;background-color:#f44336;color:#f2f2f2;font-size:17px;">
        <a href="pets_products.php">back</a></button>

    <form method="post" action="productsadd.php">
        <fieldset>

            <input type="text" name="p_name" placeholder=" Enter product name" style="width:80%;height:30px;
   border: 2px solid  #f44336; border-radius:3px;  background:transparent;" required>
            <br><br>
            <input type="text" name="p_type" placeholder=" Enter product type" style="width:80%;height:30px;
   border: 2px solid  #f44336; border-radius:3px;  background:transparent;" required>
            <br><br>
            <input type="number" name="cost" placeholder=" Enter cost" style="width:80%;height:30px;
   border: 2px solid  #f44336; border-radius:3px;  background:transparent;" min="0" required>
            <br><br>
            <input type="text" name="belongs_to" placeholder=" which pet category it belongs to" style="width:80%;height:30px;border: 2px solid  #f44336; border-radius:3px;  background:transparent;" required>
            <br><br>
            <input type="submit" name="submit" value="save" placeholder=" which pet category it belongs to" style="width:83%;height:30px;border: 2px solid  #f44336; border-radius:3px; cursor:pointer;background-color:#f44336">&ensp;
        </fieldset>
    </form>




</body>

</html>
<?php
include "../includes/db-inc.php";
if (isset($_POST["submit"])) {
    $p_name = $_POST['p_name'];
    $p_type = $_POST['p_type'];
    $cost = $_POST['cost'];
    $belongs_to = $_POST['belongs_to'];
    $sql = "INSERT INTO products (p_name, p_type, cost, belongs_to) VALUES (?, ?, ?, ?)";
    $submit = $pdo->prepare($sql);
    $submit->execute([
        $p_name,
        $p_type,
        $cost,
        $belongs_to,
    ]);
}











?>
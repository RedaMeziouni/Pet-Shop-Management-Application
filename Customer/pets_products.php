<?php
session_start();
include "../includes/db-inc.php";
$sql = "SELECT * FROM products";
$fs = $pdo->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/main.css">
    <title>petproducts</title>
</head>

<body>
    <nav class="petproducts">
        <div class="F-logo">
            <a class="active" href="dashboard.php"><img src="../assets/nav_logo.png"></a> <a href="pets_products.php">Products</a>
        </div>
        <a href="dashboard.php">logout</a>
    </nav>
    <div class="custombutton">
        <form>
            <button class="F-button" style="height: 50px;width: 150px;cursor:pointer;border-radius:15px;
border: 3px solid #ff0000;background-color:#f44336;color:#f2f2f2;font-size:17px;" formaction="productsadd.php">Add new product</button>
            <button style="margin-left:900px; height: 50px;width: 150px;cursor:pointer;border-radius:15px;
border: 3px solid #ff0000;background-color:#f44336;color:#f2f2f2;font-size:17px;" formaction="productsadd.php">update product</button>
        </form>
    </div>
    </section>
    <!-- Update  products -->
    <section class="modal-container" id="update-modal">
        <div class="modal">
            <h3 class="m-title">Sales Details</h3>
            <hr>
            <form action="" method="POST">
                <label>product_ID :</label><br>
                <input type="number" name="id"><br>
                <label>p_name :</label><br>
                <input type="text" name="c_id"><br>
                <label>p_type :</label><br>
                <input type="text" name="a_id"><br>
                <label>cost :</label><br>
                <input type="number" name="date"><br>
                <label>belongs_to :</label><br>
                <input type="text" name="total"><br>
                <input type="submit" name="update" value="Update" class="add"></input>
                <button id="close" class="button">Cancel</button>
            </form>
        </div>
    </section>
    <table>
        <thead>
            <th>product_ID</th>
            <th>p_name</th>
            <th>p_type</th>
            <th>cost</th>
            <th>belongs_to</th>

        </thead>
        <tr>
            <?php
            foreach ($fs as  $value) {
                echo ' <td>' . $value["products_id"] . '</td>';
                echo ' <td>' . $value["p_name"] . '</td>';
                echo ' <td>' . $value["p_type"] . '</td>';
                echo ' <td>' . $value["cost"] . '</td>';
                echo ' <td>' . $value["belongs_to"] . '</td></tr>';
            }
            ?>


    </table>
    <form>
        <input type="text" name="t1" placeholder="Enter the id to delete" required>
        <input style="width:75px;height:44px;cursor:pointer;border-radius:15px;
border: 3px solid #ff0000;background-color:#f44336;color:#f2f2f2;font-size:17px;" type="submit" value="delete">
    </form>



</body>

</html>

<style>
    th {
        background-color: red;
        color: white;
        width: 313px;
        height: 55px;
    }

    td {
        padding: 10px;
        border-bottom: 1px red;
    }

    input {
        width: 15%;
        padding: 12px 20px;
        margin: 8px;
        border: 2px solid red;
        background: transparent;
    }
</style>
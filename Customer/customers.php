<?php
session_start();
include "../includes/db-inc.php";
$sql = "SELECT * FROM customer";
$fs = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/main.css">
    <title>customer</title>
</head>

<body>
    <nav class="petproducts" style=" background-color:#8d2663;">
        <div class="F-logo">
            <a class="active" href="dashboard.php"><img src="../assets/nav_logo.png"></a> <a href="pets_products.php">Customers</a>
        </div>
        <a href="dashboard.php">logout</a>
    </nav>
    <div class="custombutton">
        <form>
            <button class="F-button" style="height: 50px;width: 200px;cursor:pointer;border-radius:15px;
border: 3px solid #8d2663;color:#f2f2f2;font-size:17px;background-color:#8d2663;" formaction="customeradd.php">Add new customer</button>
            <button id="update" style="margin-left:900px; height: 50px;width: 150px;cursor:pointer;border-radius:15px;
border: 3px solid #8d2663;background-color:#8d2663;color:#f2f2f2;font-size:17px;">update customer</button>
        </form>
    </div>
    </section>
    <!-- Update  products -->
    <section class="modal-container" id="update-modal">
        <div class="modal">
            <h3 class="m-title">Customers Details</h3>
            <hr>
            <form action="" method="POST">
                <label>customer_id :</label><br>
                <input type="number" name="id"><br>
                <label>cs_fname :</label><br>
                <input type="text" name="cs_fname"><br>
                <label>cs_minit :</label><br>
                <input type="text" name="cs_minit"><br>
                <label>cs_lname :</label><br>
                <input type="text" name="cs_lname"><br>
                <label>cs_address :</label><br>
                <input type="email" name="cs_address"><br>
                <button id="close" class="add" type="submit" name="update">Update</button>
                <button id="close" class="button">Cancel</button>
            </form>
        </div>
    </section>
    <table>
        <thead>
            <th style=" background-color:#8d2663;">cs_ID</th>
            <th style=" background-color:#8d2663;">cs_fname</th>
            <th style=" background-color:#8d2663;">cs_minit</th>
            <th style=" background-color:#8d2663;">cs_lname</th>
            <th style=" background-color:#8d2663;">cs_address</th>

        </thead>
        <tr>
            <?php
            foreach ($fs as  $value) {
                echo ' <td>' . $value["customer_id"] . '</td>';
                echo ' <td>' . $value["cs_fname"] . '</td>';
                echo ' <td>' . $value["cs_minit"] . '</td>';
                echo ' <td>' . $value["cs_lname"] . '</td>';
                echo ' <td>' . $value["cs_address"] . '</td></tr>';
            }
            ?>


    </table>
    <form action="" method="POST">
        <input type="text" name="t1" placeholder="Enter the id to delete" required>
        <input style="width:75px;height:44px;cursor:pointer;border-radius:15px;
border: 3px solid #8d2663;background-color:#8d2663;color:#f2f2f2;font-size:17px;" type="submit" name="delete" value="delete">
    </form>



</body>
<script src="../JS/script.js"></script>

</html>

<style>
    table {
        margin-top: 2%;
        font-family: arial, sans-serif;
        border-collapse: collapse;
        outline: #8d2663 solid 3px;
        background: #FAFAFA;
        width: 100%;
    }
</style>
<?php
include "../includes/db-inc.php";

if (isset($_POST['delete'])) {

    $customer_id = $_POST['t1'];

    $sql = "DELETE FROM customer WHERE customer_id = $customer_id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    $stmt->rowCount();
    $page = $_SERVER['PHP_SELF'];
    $sec = "0.001";
    header("Refresh: $sec; url=$page");
}
?>
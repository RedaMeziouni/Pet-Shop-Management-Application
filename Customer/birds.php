<?php
session_start();
include '../includes/db-inc.php';
if (isset($_POST['add'])) {
    $category = $_POST['category'];
    $type = $_POST['type'];
    $noise = $_POST['noise'];
    $cost = $_POST['cost'];

    $sql = "INSERT INTO birds (category, type, noise, cost) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $category,
        $type,
        $noise,
        $cost,
    ]);
}
if (isset($_POST['update'])) {
    $category = $_POST['category'];
    $type = $_POST['type'];
    $noise = $_POST['noise'];
    $cost = $_POST['cost'];

    $sql = "UPDATE birds SET category = ?, type = ?, noise = ?, cost = ?, WHERE birds_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $category,
        $type,
        $noise,
        $cost,
        $id,
    ]);
}
if (isset($_POST['Delete'])) {

    $birds_id = $_POST['t1'];

    $sql = "DELETE FROM birds WHERE birds_id = $birds_id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/main.css">
    <title>Birds</title>
</head>

<body>
    <!-- strat navbar -->
    <nav class="products birds-nav">
        <div class="z-logo">
            <img src="../assets/ic_add_pet.png" alt="">
            <h2>Sales Details</h2>
        </div>
        <h2>logout</h2>
    </nav>
    <!-- end navbar -->
    <!-- <a>Add New Details</a> -->
    <button class="add bird-btn" id="add">Add New Bird</button>
    <button class="add bird-btn" id="update">Update Bird </button>
    <!-- <button class="add">Update Details</button> -->
    <!-- ADD Nex Sales Details -->
    <section class="modal-container" id="add-modal">
        <div class="modal">
            <h3 class="m-title">Sales Details</h3>
            <hr>
            <form action="" method="POST">
                <label>Category :</label><br>
                <input type="text" name="category"><br>
                <label>type :</label><br>
                <input type="text" name="type"><br>
                <label>noise :</label><br>
                <input type="text" name="noise"><br>
                <label>cost :</label><br>
                <input type="number" name="cost"><br>
                <input type="submit" name="add" value="Add" class="add bird-btn"></input>
                <button id="close" class="add bird-btn">Cancel</button>
            </form>
        </div>
    </section>
    <!-- Update  Sales Details -->
    <section class="modal-container" id="update-modal">
        <div class="modal">
            <h3 class="m-title">Sales Details</h3>
            <hr>
            <form action="" method="POST">
                <label>Bird_id :</label><br>
                <input type="number" name="id"><br>
                <label>Category :</label><br>
                <input type="text" name="category"><br>
                <label>type :</label><br>
                <input type="text" name="type"><br>
                <label>noise :</label><br>
                <input type="text" name="noise"><br>
                <label>cost :</label><br>
                <input type="number" name="cost"><br>
                <input type="submit" name="update" value="Update" class="add bird-btn"></input>
                <button id="close" class="add bird-btn">Cancel</button>
            </form>
        </div>
    </section>

    <!-- start table -->
    <table class="z-table">
        <thead>
            <th class="z-th bird-th">Bird_id</th>
            <th class="z-th bird-th">Category</th>
            <th class="z-th bird-th">Type</th>
            <th class="z-th bird-th">Cost</th>
            <th class="z-th bird-th">total</th>
        </thead>
        <?php
        $sql = "SELECT * FROM birds";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $details = $stmt->fetchAll(2);
        foreach ($details as $row) { ?>
            <tr>
                <td class="z-td"><?php echo $row['birds_id'] ?></td>
                <td class="z-td"><?php echo $row['category'] ?></td>
                <td class="z-td"><?php echo $row['type'] ?></td>
                <td class="z-td"><?php echo $row['noise'] ?></td>
                <td class="z-td"><?php echo $row['cost'] ?></td>
            </tr>

        <?php } ?>


    </table>
    <!-- end table -->
    <div class="search">
        <form action="" method="POST">
            <input type="text" name="t1" placeholder="Enter the id to delete" required class="delete-i">
            <input type="submit" name="Delete" value="Delete" class="add bird-btn">
        </form>
    </div>

    <footer class="footer">
        <h4>WeDev &copy; 2021</h4>
    </footer>
</body>
<script src="../JS/script.js"></script>

</html>
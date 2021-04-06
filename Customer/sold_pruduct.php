<?php
session_start();
include '../includes/db-inc.php';
if (isset($_POST['add'])) {
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/main.css">
    <title>salesdetail</title>
</head>

<body>
    <!-- strat navbar -->
    <nav class="s-products">
        <div class="z-logo">
            <img src="../assets/ic_add_pet.png" alt="">
            <h2>sold products</h2>
        </div>
        <h2>logout</h2>
    </nav>
    <!-- end navbar -->
    <a>Add New Details</a>
    <button class="add" id="open">Add Formation</button>
    <section class="modal-container" id="modal">
        <div class="modal">
            <h3 class="m-title">Add Formation</h3>
            <hr>
            <form action="" method="POST">
                <label for="techno">SD_ID :</label><br>
                <input type="text" name="SD_ID"><br>
                <label for="techno">PP_ID :</label><br>
                <input type="text" name="PP_ID"><br>
                <label for="techno">QUANTITY :</label><br>
                <input type="number" name="QUANTITY"><br>
                <input type="submit" name="submit" value="Edit" class="edit"></input>
                <button id="close" class="button">Cancel</button>
            </form>
        </div>
    </section>
    <!-- start table -->
    <table class="z-table">
        <thead>
            <th class="z-th">sd_id</th>
            <th class="z-th">pet_id</th>
            <th class="z-th">qantity</th>
        </thead>
        <tr>
            <td class="z-td">zaz</td>
            <td class="z-td">qds</td>
            <td class="z-td">sqds</td>
        </tr>
        <tr>
            <td class="z-td">zaz</td>
            <td class="z-td">qds</td>
            <td class="z-td">sqds</td>
        </tr>
        <tr>
            <td class="z-td">zaz</td>
            <td class="z-td">qds</td>
            <td class="z-td">sqds</td>
        </tr>
    </table>
    <!-- start table -->
    <form action="">
        <input type="search" name="" id="">
        <input type="search" name="" id="">
        <input type="submit" value="Delete">
    </form>
    <footer class="footer">
        <h4>WeDev &copy; 2021</h4>
    </footer>
    <script>
        var open = document.getElementById('open');
        var modal = document.getElementById('modal');

        open.addEventListener("click", function() {
            modal.classList.add('show');
        });
    </script>
</body>
<script src="../JS/script.js"></script>

</html>
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
            <img src="../assets/ic_add_pet.png" alt="">
            <a href="pets_products.php">Products</a>  
              </div>
        <a href="dashboard.php">logout</a>    
        </nav>
    <div class="custombutton">          
<form>
<button class="F-button" style="height: 50px;width: 150px;cursor:pointer;border-radius:15px;
border: 3px solid #ff0000;background-color:#f44336;color:#f2f2f2;font-size:17px;" formaction="productsadd.php">Add new product</button>
<a  id="update"  style="margin-left:900px; height: 50px;width: 150px;cursor:pointer;border-radius:15px;
border: 3px solid #ff0000;background-color:#f44336;color:#f2f2f2; padding:10px; font-size:17px;">update product</a>
</form>
</div>
</section>
    <!-- Update  products -->
    <section class="modal-container" id="update-modal">
        <div class="modal">
            <h3 class="m-title">Product Details</h3>
            <hr>
            <form action="" method="POST">
                <label>product_ID :</label><br>
                <input type="number" name="product_ID"><br>
                <label>p_name :</label><br>
                <input type="text" name="p_name"><br>
                <label>p_type :</label><br>
                <input type="text" name="p_type"><br>
                <label>cost :</label><br>
                <input type="number" name="cost"><br>
                <label>belongs_to :</label><br>
                <input type="text" name="belongs_to"><br>
                <button class="add" type="submit" name="update">Update</button>
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
      echo ' <td>'.$value["products_id"].'</td>'; 
      echo ' <td>'.$value["p_name"].'</td>'; 
      echo ' <td>'.$value["p_type"].'</td>';
      echo ' <td>'.$value["cost"].'</td>';
      echo ' <td>'.$value["belongs_to"].'</td></tr>';
 

}
?>
            
        
    </table>
    <form action="" method="POST">
    <input type="text" name="t1" placeholder="Enter the id to delete" required >
    <input  style="width:75px;height:44px;cursor:pointer;border-radius:15px;
border: 3px solid #ff0000;background-color:#f44336;color:#f2f2f2;font-size:17px; " type="submit" name="delete" value="delete">
</form> 
   
    
         
</body>
<script src="../JS/script.js"></script>
</html>

<style>
    table {
        margin-top: 2%;
    font-family: arial, sans-serif;
    border-collapse: collapse;
    outline: #ff0000 solid 3px;
    background: #FAFAFA;
    width:100%;
    }
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
  input{
  width: 15%;
  padding: 12px 20px;
  margin: 8px ;
  border: 2px solid red;
  background:transparent;
} 
</style>

<?php
include "../includes/db-inc.php";

if (isset($_POST['delete'])) {

    $products_id = $_POST['t1'];
    
    $sql = "DELETE FROM products WHERE products_id = $products_id";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute();
    
    return $stmt->rowCount();
    
}
?>
<?php
if (isset($_POST['update'])){
    $product_id = $_POST['product_ID'];
    $p_name = $_POST['p_name'];
    $p_type = $_POST['p_type'];
    $cost = $_POST['cost'];
    $belongs_to = $_POST['belongs_to'];
    $sql = "UPDATE products SET  p_name = ? , p_type = ?, cost = ?, belongs_to = ? WHERE  products_id = ?" ;
    $submit = $pdo->prepare( $sql);
    $submit->execute([
    $p_name,
    $p_type,
    $cost,
    $belongs_to,
    $product_id,

    ]);
    $page = $_SERVER['PHP_SELF'];
    $sec = "0.001";
    header("Refresh: $sec; url=$page");
    }
?>
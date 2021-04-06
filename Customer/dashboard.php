<?php  
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('127.0.0.1:3306','root','','admin') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM login_user WHERE user_name='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        } else {
         $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["id"])) {
    header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pet Shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../CSS/main.css">
    </head>
    <body>
  <div class="container_dash">
        <div class="navbar_1">
            <a class="active" href="#"><img src="../assets/nav_logo.png" alt="logo"></a>
            <a href="#">Pets Shop</a>
            <div class="navbar_1-right">
              <a href="logout.php">LOGOUT</a>
            </div>
          </div>
      

       
     <div class="pages">      
     <form>
          
            <button class="button style1"  type="submit" formaction="animals.php">animals</button>
            <button class="button style2"  type="submit" formaction="birds.php">Birds</button>
            <button class="button style3"  type="submit" formaction="pets_products.php">Products</button>
            <button class="button style4"  type="submit" formaction="sales_detailes.php">Sales Details</button>
            <button class="button style5"  type="submit" formaction="customers.php">Customer</button>  
        
     </form> 
    </div>
    </div>

    </body>
   
</html>
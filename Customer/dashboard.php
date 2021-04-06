<?php  

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pet shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/CSS/main.css">
    </head>
    <body>

        <div class="topnav">
            <a class="active" href="home.html"><img src="ic_add_pet.png"></a>
            <a href="home.html">Pets Shop</a>
            <div class="topnav-right">
              <a href="logout.php">LOGOUT</a>
            </div>
          </div>
      

       
     <div class="screen">      
     <form>
          
            <button class="button button1"  type="submit" formaction="animals.php">animals</button>
            <button class="button button2"  type="submit" formaction="birds.php">Birds</button>
            <button class="button button3"  type="submit" formaction="pets_products.php">Products</button>
            <button class="button button4"  type="submit" formaction="sales_detailes.php">Sales Details</button>
            <button class="button button5"  type="submit" formaction="customers.php">Customer</button>  
        
     </form> 
    </div>

    </body>
   
</html>
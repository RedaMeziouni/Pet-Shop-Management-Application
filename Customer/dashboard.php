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
                <a href="../logout.php">LOGOUT</a>
            </div>
        </div>



        <div class="pages">
            <form>

                <button class="buttonD style1" type="submit" formaction="animalsform.php">animals</button>
                <button class="buttonD style2" type="submit" formaction="birds.php">Birds</button>
                <button class="buttonD style3" type="submit" formaction="pets_products.php">Products</button>
                <button class="buttonD style4" type="submit" formaction="choise.php">Sales Details</button>
                <button class="buttonD style5" type="submit" formaction="customers.php">Customer</button>

            </form>
        </div>
    </div>

</body>


</html>
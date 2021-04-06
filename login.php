<?php  
// After you get connected you should be redirected to the home page
  include_once('includes/db-inc.php'); 
  if(isset($_POST['submit'])){

    $uname = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if ($uname != "" && $password != ""){

        $sql_query = "SELECT count(*) as cntUser from users where username='".$uname."' and password='".$password."'";
        // echo "<pre>";
        // echo $uname;
        // echo "</pre>";
        // $sql_query = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
        // $sql_query = "SELECT * FROM user WHERE username='pets' AND password='123456'";
        $result = mysqli_query($con, $sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: ./Customer/dashboard.php');
        }else{
            echo "Invalid username or password";
        }

    }
  }
    ?>

<!DOCTYPE html>
<html class="fix1">
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="./CSS/main.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title>PETS | Login</title>
</head>
<body>
<div class="container_login">
    <form method="post" action="./Customer/dashboard.php">
        <div id="div_login">
            <h1>Login</h1>
            <div>
                <input type="text" class="textbox" name="username" placeholder="Username" required autocomplete="off">
            </div>
            <div>
                <input type="password" class="textbox" name="password" placeholder="Password" required autocomplete="off">
            </div>
            <div>
                <input type="submit" value="Submit" name="submit">
            </div>
        </div>
    </form>
</div>
</body>

</html>
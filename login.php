<?php
include 'includes/db-inc.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $username,
        $password,
    ]);
    if ($stmt->rowCount()) {
        header('location: Customer/dashboard.php');
    } else {
        echo "<script>
        alert('username or password wrong');
    </script>";
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
<script>
    alert('username or password wrong');
</script>

<body>
    <div class="container_login">
        <form method="post" action="login.php">
            <div id="div_login">
                <h1>Login</h1>
                <div>
                    <input type="text" class="textbox" name="username" placeholder="Username" required autocomplete="off">
                </div>
                <div>
                    <input type="password" class="textbox" name="password" placeholder="Password" required autocomplete="off">
                </div>
                <div>
                    <input type="submit" value="Submit" name="login">
                </div>
            </div>
        </form>
    </div>
</body>

</html>
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
        echo 'username or password wrong';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="username">
        <input type="password" name="password">
        <input type="submit" value="lmdsj" name="login">
    </form>
</body>

</html>
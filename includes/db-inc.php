<?php
// PDO Connect
$host = 'localhost';
$db = 'pets_shop';
$dsn = "mysql:host=$host;dbname=$db";
$user = 'root';
$sqlpass = '';

try {
  $pdo = new PDO($dsn, $user, $sqlpass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // Echo "Successfully connected with database";
} catch (PDOException $e) {
  echo "connexion Failld : " . $e->getMessage();
}

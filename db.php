<?php

//Connection a la base methode PDO

$servername = "localhost";
$username = "root";
$password = "";

try {
  $pdo = new PDO("mysql:host=$servername;dbname=projetweb", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>


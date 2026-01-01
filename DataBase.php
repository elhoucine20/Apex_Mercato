
<?php

$servername = "localhost";
$username = "root";
$password = "";
$conn=null;
try {
  $conn = new PDO("mysql:host=$servername;dbname=mercato;charset=utf8", $username, $password);
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}


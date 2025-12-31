
<?php

$servername = "localhost";
$username = "root";
$password = "";
$conn=null;
try {
  $conn = new PDO("mysql:host=$servername;dbname=mercato;charset=utf8", $username, $password);

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

///////////////
// class Database
// {

//     private static ?Database $instance = null;

//     private ?PDO $pdo;

// //----change this to fit your database----
//  private string $host = "db";
//  private string $username = "apex";
//  private string $password = "apex";
//  private string $dbname = "apex_manager";
// //----change this to fit your database----

//     private function __construct()
//     {
//         $dataSourceName = "mysql:host={$this->host};dbname={$this->dbname};setcar=utf8mb4";
//         $this->pdo = new PDO($dataSourceName, $this->username, $this->password);
//         $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//     }

//     public static function getInstance(): Database
//     {
//         if (!self::$instance) {
//             self::$instance = new Database;
//         }
//         return self::$instance;
//     }
//     public function getConnection(): PDO
//     {
//         return $this->pdo;
//     }
// }








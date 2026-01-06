<?php
namespace Apex\DataBase;

use PDO;  //  
use PDOException;  //  

class DataBase {
    public static string $servername = "localhost";
    public static string $username   = "root";
    public static string $dbName     = "mercato";
    public static string $password   = "";
    public static ?PDO $pdo = null;

    public static function ConnexionDataBase() {
        if (!self::$pdo) {
            try {
                self::$pdo = new PDO(
                    "mysql:host=" . self::$servername . ";dbname=" . self::$dbName . ";charset=utf8mb4",
                    self::$username,
                    self::$password
                );

                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
   }

   $conn = DataBase::ConnexionDataBase();

?>

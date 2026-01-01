<?php
include "DataBase.php";
 
trait Crud {

    public function Affichage($Name_Equipe, $conn) {
        $operation =$conn->prepare ("SELECT * FROM $Name_Equipe");
        // $stmt = $conn->prepare($sql);
        $operation->execute();

        return $operation->fetchAll(PDO::FETCH_ASSOC);
    }

}

// trait crud {
//     public function read($name,$connection){
//         $operation = $connection -> prepare("SELECT * FROM $name");
//         $operation -> execute();
//          return $operation -> fetchAll(PDO::FETCH_ASSOC);
//     }
   
// }







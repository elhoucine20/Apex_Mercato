<?php
include "DataBase.php";
 
trait Crud {

    public function Affichage($Name_Equipe, $conn) {
        $sql = "SELECT * FROM $Name_Equipe";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}


// trait Crud {

// public function Affichage($Name_Equipe,$conn){
//    $sql = $conn->prepare("SELECT * FROM $Name_Equipe");
//    $result = $conn->execute($sql);
//    return $result->fetch_all(MYSQLI_ASSOC);

//    }
// }






<?php
namespace Apex;
// include "DataBase.php";
 use PDO;
trait Crud {

    public function Affichage($Name, $conn) {
        $operation =$conn->prepare ("SELECT * FROM $Name");
        $operation->execute();

        return $operation->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Delete($conn,$id,$name){
        // try{
              $stmt =$conn->prepare("DELETE FROM $name WHERE id= :id");
             return $stmt->execute([':id' => $id]);
        // }catch(PDOException $e){
        //     error_log("error ekn delete: " .$e->getMessage());
        //     return false;
        // }

    }



}

   
        






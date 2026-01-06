<?php
namespace Apex\Equipe;

// include_once "DataBase.php";
// include_once "Trait.php";
use Apex\DataBase;
use Apex\Crud;

class Equipe {
    use Crud;

    
  private  $name;
  private  $manager;
  private  $budget;
 
 public function SetName($nom){
   $this->name=$nom;
    }
    public function SetManager($manager){
       $this->manager=$manager;
    }
    public function SetBudget($budget){
       $this->budget=$budget;
    }
    public function GetName(){
       return $this->name;
    }
    public function GetManager(){
       return $this->manager;
    }
    public function GetBudget(){
       return $this->budget;
    }

   //  creation de l'equipe
    public function Create($conn){
    $stmt = $conn->prepare(
        "INSERT INTO equipe (`Name`, `Manager`, `Budget`)
         VALUES (:name, :manager, :budget)"
    );

    return $stmt->execute([
        ':name'    => $this->name,
        ':manager' => $this->manager,
        ':budget'  => $this->budget
    ]);
    }

//  modiification du budget 
    public function EditBudget($conn, $newBudget, $equipeId){
         $stmt = $conn->prepare(
             "UPDATE equipe SET Budget = :budget WHERE id = :id"
         );
     
         return $stmt->execute([
             ':budget' => $newBudget,
             ':id'     => $equipeId
         ]);
     }
 
   //   method de modification l'equipe
  public function EditEquipe($conn, $newBudget,$newManager,$newName, $id){
         $stmt = $conn->prepare(
             "UPDATE equipe SET 
             Name = :name,
             Manager = :manager,
             Budget = :budget 
             WHERE id = :id"
         );
     
         return $stmt->execute([
             ':name' => $newName,
             ':manager' => $newManager,
             ':budget' => $newBudget,
             ':id'     => $id
         ]);
     }

}


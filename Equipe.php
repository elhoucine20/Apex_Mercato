<?php
namespace Apex\Equipe;

// include_once "DataBase.php";
// include_once "Trait.php";
use Apex\DataBase;
//    $conn = DataBase::ConnexionDataBase();


use Apex\Crud;

class Equipe {
    use Crud;

    //   private  $name;
    //   private  $manager;
    //   private  $budget;
     
    //  public function SetName($nom){
    //    $this->name=$nom;
    //     }
    //     public function SetManager($manager){
    //        $this->manager=$manager;
    //     }
    //     public function SetBudget($budget){
    //        $this->budget=$budget;
    //     }
    //     public function GetName(){
    //        return $this->name;
    //     }
    //     public function GetManager(){
    //        return $this->manager;
    //     }
    //     public function GetBudget(){
    //        return $this->budget;
    //     }

   //  creation de l'equipe
    public static function Create($conn,$name, $manager,$budget){
    $stmt = $conn->prepare(
        "INSERT INTO equipe (Name, Manager, Budget)
         VALUES (:name, :manager, :budget)"
    );

    return $stmt->execute([
        ':name'    => $name,
        ':manager' => $manager,
        ':budget'  => $budget
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




    //  select budget
      public static function SelectBudgetEquipe($conn,$equipe_B):float{
                $stmt=$conn->prepare("SELECT Budget FROM equipe WHERE id=:id ");
                $stmt->execute([':id'=>$equipe_B]);
                $budget=$stmt->fetchColumn();
                return $budget;
               }


    // checking if equipe  disponible 
    public static function CheckEquipe($conn,$idEquipeB){
               $stmt = $conn->prepare("SELECT id FROM equipe WHERE id=:id");
               $IdEquipe = $stmt->execute([':id'=>$idEquipeB]);
               if($IdEquipe){
                 return $IdEquipe;
               }
               else{
                 return false ;
               }
    }

    // changemente de budget 
    public static function ChangeBudgetEquipe($conn,$id1,$id2,$AddBudget){
        
        $stmt1=$conn->prepare("UPDATE Equipe SET Budget = Budget - :budget WHERE id=:id1");
        $stmt1->execute([':budget'=>intval($AddBudget),':id1'=>intval($id1)]);


       $stmt2=$conn->prepare("UPDATE Equipe SET Budget = Budget + :budget WHERE id=:id1");
        $stmt2->execute([':budget'=>intval($AddBudget),':id1'=>intval($id2)]);

    }
}


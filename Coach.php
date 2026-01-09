<?php
namespace Apex\Coach;
// include_once "Personne.php";
// include_once "Trait.php";

use Apex\Crud;
use Apex\Contract\Contract;

class Coach {

    use Crud;
    
    public static $Frais_Deplacement=1700;
    public int $coute;
    private int $equipe_id;
    private string $style_coach;
    private string $annee_experience;

    // public function __construct (string $name, string $email,string $nationalité,private int $equipe_id,private string $style_coach,private string $annee_experience,protected int $id_contra){
    //        parent:: construct($name,$email,$nationalité);
    // }

    public function getAnnualCost(){
      $this->coute=($montante * 12) + self:: $Frais_Deplacement;
      
    }

 //  creation de coach
    public function Create($conn,$name,$email,$nationalite,$equipe_id,$style_coach,$annee_experience,$montant_contrat){
    $stmt = $conn->prepare(
        "INSERT INTO coach(Name, Email, Nationalite, style_coach,annee_experience, Equipe_id)
         VALUES (:name, :email,  :nationalite,:style_coach , :annee_experience, :equipe_id)"
    );

     $stmt->execute([
        ':name'   => $name,
        ':email' => $email,
        ':style_coach'  => $style_coach,
        ':nationalite'  => $nationalite,
        ':annee_experience'  => intval($annee_experience),
        ':equipe_id'  => intval($equipe_id)
    ]);

        // recuperer id de coach 
    $stmt = $conn->prepare("SELECT id FROM coach WHERE Email = :email");
    $stmt->execute([':email' => $email]);
    $coach_id = $stmt->fetchColumn();
        
        //  creation de contrat 
        Contract::CreateForCoach($conn, $montant_contrat, $equipe_id, $coach_id);
        
        return $coach_id;


    }
    

  // public function EditCoach($conn, $newName,$newEmail,$New_style_coach,$newNationalite,$New_annee_experience,$newEquipeId, $id){
  //        $stmt = $conn->prepare(
  //            "UPDATE coach SET 
  //            Name = :name,
  //            Email = :email,
  //            style_coach = :style,
  //            Nationalité = :nationalite ,
  //            annee_experience = :annee_experience ,
  //            Equipe_id = :equipe_id 
  //            WHERE id = :id"
  //        );
     
  //        return $stmt->execute([
  //            ':name' => $newName,
  //            ':manager' => $newEmail,
  //            ':budget' => $New_style_coach,
  //            ':budget' => $newNationalite,
  //            ':budget' => $New_annee_experience,
  //            ':budget' => $newEquipeId,
  //            ':id'     => $id
  //        ]);
  // }


// checking if coach disponible 
public static function CheckCoach($conn,$id,$equipe_A){
    $stmt = $conn->prepare("SELECT id FROM coach WHERE id=:id AND Equipe_id=:equipe_id");
    $stmt->execute([':id'=>$id,':equipe_id'=>$equipe_A]);
    $IdCoach = $stmt->fetchColumn();
    if($IdCoach){
      return $IdCoach;
    }
    else{
      return false ;
    }
}
// salaire de coach
 public static function SalaireCoach($conn,$coach_id):float{
           $stmt=$conn->prepare("SELECT montant FROM contrat WHERE coach_id=:id ");
           $stmt->execute([':id'=>$coach_id]);
           $Salaire_Coach = $stmt->fetchColumn();
          
           return $Salaire_Coach;
        }

                                  // modifie equipe de Coach
            public static function NewEquipeCoach($conn,$equipe_B,$coach_id){
                $stmt=$conn->prepare("UPDATE coach SET Equipe_id=:equipe_id WHERE id=:id");
                $stmt->execute([':equipe_id'=>$equipe_B,':id'=>$coach_id]);
            } 

}









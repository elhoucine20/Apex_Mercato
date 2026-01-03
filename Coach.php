
<?php
include "Personne.php";
include "contract.php";

// echo "helloooo journalist";

class Coach extends Personne {
    public static $Frais_Deplacement=1700;
    public int $coute;

    public function __construct (string $name, string $email,string $nationalité,private int $equipe_id,private string $style_coach,private string $annee_experience,protected int $id_contra){
           parent:: construct($name,$email,$nationalité);
    }

    public function getAnnualCost(){
      $this->coute=($montante * 12) + self:: $Frais_Deplacement;
      
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



}









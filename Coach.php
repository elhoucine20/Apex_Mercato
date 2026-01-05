
<?php
include_once "Personne.php";
include_once "Trait.php";

// echo "helloooo journalist";

class Coach extends Personne {

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
    public function Create($conn,$name,$email,$nationalite,$equipe_id,$style_coach,$annee_experience){
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









<?php
namespace Apex\Joueur;
// include_once "Personne.php";
// include_once "DataBase.php";
// include_once "Trait.php";
use Apex\Crud;


class joueur {
    use Crud;

    private static $Prime_Signature = 1500;
    private int $coute;
    // private int $equipe_id;
    // private string $role;
    // private string $valeur_marcher;

    // public function __construct(string $name, string $email,  string $nationalité,private int $equipe_id,private string $role,private string $valeur_marcher){
    //     parent:: construct($name,$email,$nationalité);
    // }
    
    public function getAnnualCost(){
      $this->coute =($montante * 12) + self:: $Prime_Signature;
    }

   //  creation de joueur
    public function Create($conn,$name,$email,$nationalite,$equipe_id,$role,$valeur_marcher){
    $stmt = $conn->prepare(
        "INSERT INTO joueur(Name, Email,Role, Nationalite, Valeur_Marcher, Equipe_id)
         VALUES (:name, :email, :role , :nationalite, :valeur_marche, :equipe_id)"
    );

     $stmt->execute([
        ':name'    => $name,
        ':email' => $email,
        ':role'  => $role,
        ':nationalite'  => $nationalite,
        ':valeur_marche'  => intval($valeur_marcher),
        ':equipe_id'  => intval($equipe_id)
    ]);
    
    }

     //   method de modification joueur
//   public function EditJoueur($conn, $newName,$newEmail,$newRole,$newNationalite,$newValeurMarche,$newEquipeId, $id){
//          $stmt = $conn->prepare(
//              "UPDATE joueur SET 
//              Name = :name,
//              Email = :email,
//              Role = :role ,
//              Nationalité = :nationalite ,
//              Valeur_Marcher = :valeur_marche ,
//              Equipe_id = :equipe_id 
//              WHERE id = :id"
//          );
     
//          return $stmt->execute([
//              ':name' => $newName,
//              ':manager' => $newEmail,
//              ':budget' => $newRole,
//              ':budget' => $newNationalite,
//              ':budget' => $newValeurMarche,
//              ':budget' => $newEquipeId,
//              ':id'     => $id
//          ]);
//   }


  

}







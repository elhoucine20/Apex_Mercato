<?php
namespace Apex\Joueur;
// include_once "Personne.php";
// include_once "DataBase.php";
// include_once "Trait.php";
use Apex\Crud;
use Apex\Contract\Contract;
use Apex\DataBase\DataBase;
$conn = DataBase::ConnexionDataBase();
// use PDO;

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
    public function Create($conn,$name,$email,$nationalite,$equipe_id,$role,$valeur_marcher,$montant_contrat){
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


         // recuperer id de joueur 
    $stmt = $conn->prepare("SELECT id FROM joueur WHERE Email = :email");
    $stmt->execute([':email' => $email]);
    $joueur_id = $stmt->fetchColumn();
        
        //  creation de contrat 
        Contract::CreateForJoueur($conn, $montant_contrat, $equipe_id, $joueur_id);
        
        // return $joueur_id;

    
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

// checking if joueur disponible 
public static function CheckJoueur($conn,$id,$equipe_A){
    $stmt = $conn->prepare("SELECT id FROM joueur WHERE id=:id AND Equipe_id=:equipe_id");
    $stmt->execute([':id'=>$id,':equipe_id'=>$equipe_A]);
    $IdJoueur = $stmt->fetchColumn();
    if($IdJoueur){
      return $IdJoueur;
    }
    else{
      return false ;
    }
}

// valeur marcher de joueur 
        public static function ValeurMarcher($conn,$joueur_id):float{
                           $stmt=$conn->prepare("SELECT Valeur_Marcher FROM joueur WHERE id=:id ");
                           $stmt->execute([':id'=>$joueur_id]);
                           $Valedur_Marcher = $stmt->fetchColumn();
                           return $Valedur_Marcher;
                        }


                              // modifie equipe de joueur 
            public static function NewEquipeJOueur($conn,$equipe_B,$joueur_id){
                $stmt=$conn->prepare("UPDATE joueur SET Equipe_id=:equipe_id WHERE id=:id");
                $stmt->execute([':equipe_id'=>$equipe_B,':id'=>$joueur_id]);
            } 
}







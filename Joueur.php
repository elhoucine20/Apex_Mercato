
<?php
include "Personne.php";
include "contract.php";


class joueur extends Personne{
    public static $Prime_Signature = 1500;
    public int $coute;

    public function __construct(string $name, string $email,  string $nationalité,private int $equipe_id,private string $role,private string $valeur_marcher){
        parent:: construct($name,$email,$nationalité);
    }
    
    public function getAnnualCost(){
      $this->coute =($montante * 12) + self:: $Prime_Signature;
    }

   //  creation de joueur
    public function Create($conn){
    $stmt = $conn->prepare(
        "INSERT INTO joueur (Name, Email, Role,Nationalité,Valeur_Marcher,Equipe_id)
         VALUES (:name, :email, :role , :nationalite, :valeur_marche, :equipe_id)"
    );

    return $stmt->execute([
        ':name'    => $this->name,
        ':email' => $this->email,
        ':role'  => $this->role,
        ':nationalite'  => $this->nationalité,
        ':valeur_marche'  => $this->valeur_marcher,
        ':equipe_id'  => $this->equipe_id
    ]);
    }

     //   method de modification joueur
  public function EditJoueur($conn, $newName,$newEmail,$newRole,$newNationalite,$newValeurMarche,$newEquipeId, $id){
         $stmt = $conn->prepare(
             "UPDATE joueur SET 
             Name = :name,
             Email = :email,
             Role = :role ,
             Nationalité = :nationalite ,
             Valeur_Marcher = :valeur_marche ,
             Equipe_id = :equipe_id 
             WHERE id = :id"
         );
     
         return $stmt->execute([
             ':name' => $newName,
             ':manager' => $newEmail,
             ':budget' => $newRole,
             ':budget' => $newNationalite,
             ':budget' => $newValeurMarche,
             ':budget' => $newEquipeId,
             ':id'     => $id
         ]);
  }


  

}







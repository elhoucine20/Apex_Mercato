
<?php
include "Personne.php";

class joueur extends Personne{
    public function __construct (int $id, string $name, string $email,  string $nationalité,private string $role,private string $valeur_marcher){
        parent:: construct($id,$name,$email,$nationalité);
    }
    
}









<?php
include "Personne.php";

class Coach extends Personne {
 public function __construct (int $id, string $name, string $email,  string $nationalité,private string $style_coach,private string $annee_experience){
        parent:: construct($id,$name,$email,$nationalité);
    }
}









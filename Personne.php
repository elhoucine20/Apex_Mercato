<?php

// if($_SERVER['REQUEST_METHOD']=="POST"){
    if($_POST['role']=="admin"){
       header("location: Joueur.php");
    }
    else if($_POST['role']=="journaliste"){
       header("location: Coach.php");
    }
// }
// abstract  class  Personne {


//     public function __construct(protected string $name,protected string $email, protected string $nationalité,protected Contract $contra){
     
//     }

//     abstract public function getAnnualCost();


// }
<?php

// include "Joueur.php";
use Apex\Joueur\Joueur;

// include "DataBase.php";
include "dashbordAdmin.php";

if (isset($_GET['id'])) {
   $id = intval($_GET['id']);
   $joueur=new Joueur();
   if($joueur->Delete($conn,$id,"joueur")){
    $joueur->Affichage("joueur",$conn);
    // header("location: dashbordAdmin.php");
   }else{
    echo "error dans delete id!!!!";
   } 
   
}
else{
    echo "id !!!!!!";
}
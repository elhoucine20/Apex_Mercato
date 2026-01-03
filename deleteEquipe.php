<?php

include "Equipe.php";
// include "DataBase.php";
include "dashbordAdmin.php";

if (isset($_GET['id'])) {
   $id = intval($_GET['id']);
   $equipe=new Equipe();
   if($equipe->Delete($conn,$id,"equipe")){
    $equipe->Affichage("equipe",$conn);
    // header("location: dashbordAdmin.php");
   }else{
    echo "error dans delete id!!!!";
   } 
   

}
else{
    echo "id !!!!!!";
}
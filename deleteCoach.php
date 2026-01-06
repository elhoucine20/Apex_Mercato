<?php

// include "Coach.php";
use Apex\Coach\Coach;

// include "DataBase.php";
include "dashbordAdmin.php";




if (isset($_GET['id'])) {
   $id = intval($_GET['id']);
   $coach=new Coach();
   if($coach->Delete($conn,$id,"coach")){
    $coach->Affichage("coach",$conn);
    // header("location: dashbordAdmin.php");
   }else{
    echo "error dans delete id!!!!";
   } 
   

}
else{
    echo "id !!!!!!";
}
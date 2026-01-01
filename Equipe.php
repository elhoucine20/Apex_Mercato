
<?php
include "DataBase.php";
include "AddEquipe.php";
include "Trait.php";

class Equipe {
    use Crud;

    
  private  $name;
  private  $manager;
  private  $budget;
 
 public function SetName($nom){
   $this->name=$nom;
    }
    public function SetManager($manager){
       $this->manager=$manager;
    }
    public function SetBudget($budget){
       $this->budget=$budget;
    }
    public function GetName(){
       return $this->name;
    }
    public function GetManager(){
       return $this->manager;
    }
    public function GetBudget(){
       return $this->budget;
    }

public function Create($conn){
     $stmt = $conn->prepare("INSERT INTO equipe (Name,Manager,Budget) VALUES (:name, :Manager, :Budget)");
     $stmt->execute(array(':name'=>$this->name,':Manager'=>$this->manager,':Budget'=>$this->budget));

  }

//    Affichage($equipe,$conn);

}
$nom='';
$Manager='';
$Budget='';
$equipe="equipe";

if($_SERVER['REQUEST_METHOD']=="POST"){
   //  if(isset($_POST['submit'])){
        $nom=$_POST['name'];
        $Manager=$_POST['manager'];
        $Budget=$_POST['budget'];
    }else{
        echo "pas de post";
    }
// }else{
//     echo "pas de post";
// }
           $NewEquipe = new Equipe();
    $NewEquipe->SetName($nom);
    $NewEquipe->SetManager($Manager);
    $NewEquipe->SetBudget($Budget);
    $NewEquipe->Create($conn);
    $data=$NewEquipe->Affichage($equipe,$conn);
       
    // var_dump($NewEquipe->Affichage($equipe,$conn));









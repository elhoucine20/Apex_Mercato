
<?php
include "DataBase.php";
include "AddEquipe.php";

class Equipe {
  private string $name;
  private string $manager;
  private string $budget;
 
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
}


if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['submit'])){
        $nom=$_POST['name'];
        $Manager=$_POST['manager'];
        $Budget=$_POST['budget'];

        $NewEquipe = new Equipe();
$NewEquipe->SetName($nom);
$NewEquipe->SetManager($Manager);
$NewEquipe->SetBudget($Budget);
$NewEquipe->Create($conn);


    }else{
        echo "pas de submit";
    }
}else{
    echo "pas de post";
}










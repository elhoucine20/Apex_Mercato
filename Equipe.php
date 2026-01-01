
<?php
include "DataBase.php";
// include "AddEquipe.php";
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
    $stmt = $conn->prepare(
        "INSERT INTO equipe (`Name`, `Manager`, `Budget`)
         VALUES (:name, :manager, :budget)"
    );

    return $stmt->execute([
        ':name'    => $this->name,
        ':manager' => $this->manager,
        ':budget'  => $this->budget
    ]);
}

   // public function Read(){
      //   return $this -> Affichage("equipe",$conn);
    }


   // public function Affichage($equipe,$conn);

// }

      //   var_dump($_POST);
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])){

    if(!empty($_POST['name'])){

        $nom = htmlspecialchars(trim($_POST['name']));
        $manager = htmlspecialchars(trim($_POST['manager']));
        $budget = isset($_POST['budget']) ? $_POST['budget'] : 0;

        $NewEquipe = new Equipe();
        $NewEquipe->SetName($nom);
        $NewEquipe->SetManager($manager);
        $NewEquipe->SetBudget($budget);
        if($NewEquipe->Create($conn)){
            header("Location: dashbordAdmin.php?valide=1");
            exit();
        } else {
            $error = "Erreur lors de l'ajout de l'equipe.";
        }

    } else {
        $error = "Erreur lors du nom de l'equipe.";
    }
}

  
       
    // var_dump();









<?php
namespace Apex\Transfert;
// require_once 'autoload.php';

use Apex\DataBase\DataBase;

use Apex\ClassFinal\ClassFinal;
use Apex\Equipe\Equipe;
use Apex\Joueur\Joueur;
use Apex\Contract\Contract;

// use Apex\Coach\Coach;

$conn = DataBase::ConnexionDataBase();

final class Transfert{
//  private float $Engine;
 private int $joueur_id;
 private int $equipeA_id;
 private int $equipeB_id;



public  function TransfertJoueur($conn,$joueur_id,$equip_A,$equipe_B){
       try{
            $conn->beginTransaction();
            // checking de joueurr and les equipes 
            $checkJoueur = Joueur:: CheckJoueur($conn,$joueur_id,$equip_A);
            $checkEquipeB = Equipe:: CheckEquipe($conn,$equipe_B);
            if($checkJoueur && $checkEquipeB){
                // budget de equipe
                $budget = Equipe:: SelectBudgetEquipe($conn,$equipe_B);
                
                //   valeur marcher de joueur
                $Valedur_Marcher =  Joueur::ValeurMarcher($conn,$joueur_id);
                
                
                $newBudget= ClassFinal::CheckSolvabilite($budget,$Valedur_Marcher);
                if($newBudget){
                    $stmt=$conn->prepare("INSERT INTO transfert (equipe_A,equipe_B,joueur_id,coatch_id)VALUES(:equipeA,:equipeB,:joueurID,:coachID)");
                    $stmt->execute([':equipeA'=>$equip_A,':equipeB'=>$equipe_B,':joueurID'=>$joueur_id,':coachID'=>NULL]);

                    // changemente du budget de chaque equipe
                    $changeBudget = Equipe::ChangeBudgetEquipe($conn,$equipe_B,$equip_A,$newBudget);
                    // modifie equipe de joueur 
                    $modifierEquipeJoueur = Joueur::NewEquipeJOueur($conn,$equipe_B,$joueur_id);
                }  
             $contract= Contract::CreateForJoueur($conn, $Valedur_Marcher ,$equipe_B,$joueur_id);
                 
            }else{
              echo "error dans les valeur du formulaire ";
            }
            $conn->commit();
        }catch(PDOException $e){
            $conn->rolback();
            echo "error : ".$e;
        }
}

    
  
}







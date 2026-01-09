<?php
namespace Apex\Transfert;
// require_once 'autoload.php';

use Apex\DataBase\DataBase;

use Apex\ClassFinal\ClassFinal;
use Apex\Equipe\Equipe;
use Apex\Coach\Coach;
use Apex\Joueur\Joueur;
use Apex\Contract\Contract;

// use Apex\Coach\Coach;

$conn = DataBase::ConnexionDataBase();
use PDO;
final class Transfert{
//  private float $Engine;
 private int $joueur_id;
 private int $equipeA_id;
 private int $equipeB_id;

// transfer d'une joueur
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
                $date=new \DateTime();
               $DateFin = $date->format('Y-m-d');
             $contract= Contract::CreateForJoueur($conn, $Valedur_Marcher ,$equipe_B,$joueur_id,$DateFin);
                 
            }else{
              echo "error dans les valeur du formulaire ";
            }
            $conn->commit();
        }catch(PDOException $e){
            $conn->rolback();
            echo "error : ".$e;
        }
}

// transfer d'une joueur
    public  function TransfertCoach($conn,$coach_id,$equip_A,$equipe_B){
       try{
            $conn->beginTransaction();
            // checking de coaches and les equipes 
            $checkCoach = Coach:: CheckCoach($conn,$coach_id,$equip_A);
            $checkEquipeB = Equipe:: CheckEquipe($conn,$equipe_B);
            if($checkCoach && $checkEquipeB){
                // budget de equipe
                $budget = Equipe:: SelectBudgetEquipe($conn,$equipe_B);
                
                //   valeur marcher de coach
                $Salaire_Coach =  Coach::SalaireCoach($conn,$coach_id);
                
                $newBudget= ClassFinal::CheckSolvabilite($budget,$Salaire_Coach);
                if($newBudget){
                    $stmt=$conn->prepare("INSERT INTO transfert (equipe_A,equipe_B,joueur_id,coatch_id)VALUES(:equipeA,:equipeB,:joueurID,:coachID)");
                    $stmt->execute([':equipeA'=>$equip_A,':equipeB'=>$equipe_B,':joueurID'=>NULL,':coachID'=>$coach_id]);

                    // changement du budget de chaque equipe
                    $changeBudget = Equipe::ChangeBudgetEquipe($conn,$equipe_B,$equip_A,$newBudget);
                    // modifie equipe de coach 
                    $modifierEquipeCoach = Coach::NewEquipeCoach($conn,$equipe_B,$coach_id);
                }  
                $date=new \DateTime();
               $DateFin = $date->format('Y-m-d');
             $contract= Contract::CreateForCoach($conn, $Salaire_Coach ,$equipe_B,$coach_id,$DateFin );
                             
            }else{
              echo "error dans les valeur du formulaire ";
            }
            $conn->commit();
        }catch(PDOException $e){
            $conn->rolback();
            echo "error : ".$e;
        }
}

    // affichage des contracts
    public static function AffichageDesTransferts($conn){
        $stmt=$conn->prepare("SELECT transfert.id,
             equipe_a.Name AS dernier_equipe,
           equipe_b.Name AS nouvelle_equipe,
        joueur.Name AS joueur_name,
        coach.Name AS coach_name
       FROM transfert
        LEFT JOIN equipe AS equipe_a ON transfert.equipe_A = equipe_a.id
        LEFT JOIN equipe AS equipe_b ON transfert.equipe_B = equipe_b.id
        LEFT JOIN joueur ON transfert.joueur_id = joueur.id
        LEFT JOIN coach ON transfert.coatch_id = coach.id"
        );

       $stmt->execute();
       $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       if($result)
       return $result;
    else
        return false;
    }
}

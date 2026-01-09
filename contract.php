<?php
namespace Apex\Contract;

use PDO;

class Contract {
    
    public function __construct(
        protected int $montant,
        protected int $equipe_id,
        protected int $joueur_id = 0,
        protected int $coach_id = 0
    ) {}
    
    //  contrac de joueur
    public static function CreateForJoueur($conn, $montant, $equipe_id, $joueur_id,$DateFin) {
    try {
        $transactionStarted = false;
        if (!$conn->inTransaction()) {
            $conn->beginTransaction();
            $transactionStarted = true;
        }

            //        $date= new \DateTime();
            //    $DateFin = $date->format('Y-m-d H:i:s');

        $stmt1=$conn->prepare("UPDATE Contrat SET date_fin=:dateFin WHERE joueur_id=:joueur_id AND date_fin IS NULL");
        $res=$stmt1->execute([
            ':dateFin'=>$DateFin,
            ':joueur_id'=>$joueur_id
               ]);

     if($res){
         $stmt = $conn->prepare(
            "INSERT INTO Contrat (montant, equipe_id, joueur_id, coach_id)
             VALUES (:montant, :equipe_id, :joueur_id, NULL)"
        );
    
         $result = $stmt->execute([
            ':montant'   => $montant,
            ':equipe_id' => $equipe_id,
            ':joueur_id' => $joueur_id
        ]);
       }
  if ($transactionStarted) {
            $conn->commit();
        }                return $result ;
        } catch (PDOException $e) {
        // delete les traitment pour un error
        $conn->rollBack();
        error_log("Erreur : " . $e->getMessage());
        return false;
    }

    }
    
    //  Pour coach
    public static function CreateForCoach($conn, $montant, $equipe_id, $coach_id,$DateFin) {
      
        $stmt=$conn->prepare("UPDATE Contrat SET date_fin=:dateFin WHERE coach_id=:coachId");
        $stmt->execute([':dateFin'=>$DateFin,':coachId'=>$coach_id]);

        $stmt = $conn->prepare(
            "INSERT INTO Contrat (montant, equipe_id, joueur_id, coach_id)
             VALUES (:montant, :equipe_id, NULL, :coach_id)"
        );
        
        return $stmt->execute([
            ':montant'   => $montant,
            ':equipe_id' => $equipe_id,
            ':coach_id'  => $coach_id
        ]);
    }

    // affichage ds contracts
    public static function AffichageDesContract($conn){
        $stmt=$conn->prepare("SELECT Contrat.id,Contrat.Date,Contrat.montant,
        equipe.Name AS  equipe_name,
        joueur.Name AS joueur_name,
        coach.Name AS  coach_name,
        Contrat.date_fin FROM Contrat
        -- LEFT JOIN equipe ON Contrat.equipe_id = equipe.id
        LEFT JOIN equipe ON Contrat.equipe_id = equipe.id
        LEFT JOIN joueur ON Contrat.joueur_id = joueur.id
        LEFT JOIN coach ON Contrat.coach_id = coach.id");
       $stmt->execute();
       $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       if($result)
       return $result;
    else
        return false;
    }
}
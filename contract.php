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
    public static function CreateForJoueur($conn, $montant, $equipe_id, $joueur_id) {
        $stmt = $conn->prepare(
            "INSERT INTO Contrat (montant, equipe_id, joueur_id, coach_id)
             VALUES (:montant, :equipe_id, :joueur_id, NULL)"
        );
    
        return $stmt->execute([
            ':montant'   => $montant,
            ':equipe_id' => $equipe_id,
            ':joueur_id' => $joueur_id
        ]);
    }
    
    //  Pour coach
    public static function CreateForCoach($conn, $montant, $equipe_id, $coach_id) {
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
}
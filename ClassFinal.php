<?php
namespace Apex\ClassFinal;

final class ClassFinal {

    private static $commision ; 
    private static $solvabilite ;
    private static $Taxe = 5/100;   // 5% dariba
    private static $total ;


    public static function  CheckSolvabilite($budget,$prixTransfer){

        self:: $commision = $prixTransfer / 2 ;   // commissin le server
       $Budget= self:: $total = (($prixTransfer + self::$commision) * (self::$Taxe));   // total de transfer sur l'equipe
        self:: $solvabilite = $budget - (self::$total);   // if possible le transfert ou non 
        if(self::$solvabilite > 0){
            return $Budget;
        }
        else {
            return false ;
        }
    }
}

// $financialEngine = new FinancialEngine();





<?php


final class FinancialEngine {

    private  $commision ; 
    private  $solvabilite ;
    private static  $Taxe = 5/100;   // 5% dariba
    private  $total ;


    public function  CheckSolvabilite($budget,$prixTransfer){

         $this -> commision = $prixTransfer / 2 ;   // commissin le server
        $this -> total = (($prixTransfer + $this->commision) * (self::$Taxe));   // total de transfer sur l'equipe
        $this -> solvabilite = $budget - ($this->total);   // if impossible le transfert ou non 
        if($this -> solvabilite > 0){
            return $this->total ;
        }
        else {
            return false ;
        }
    }
}

$financialEngine = new FinancialEngine();
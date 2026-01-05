<?php


final class FinancialEngine {

    private  $commision ; 
    private  $solvabilité ;
    private static  $TransferTaxe = 5/100;
    private  $total ;


    public function  CheckSolvabilité($budget,$transfertMontant){

         $this -> commision = $transfertMontant / 2 ;
        $this -> total = (($transfertMontant + $this->commision) * (self::$transfertTaxe));
        $this -> Solvabilite = $budget - ($this->total);
        if($this -> Solvabilite > 0){
            return $this->total ;
        }
        else {
            return false ;
        }
    }
}

$finalClass = new FinancialEngine();
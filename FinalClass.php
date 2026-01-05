<?php

final class FinancialEngine{

    private  $Coute;
    private $Commesion;
    // private $Montante;
    private $Taxe;

    public function getAnnualCost($prix,$Montante){
      $this->Coute =($Montante * 12) + self:: $Prime_Signature;
    }

}
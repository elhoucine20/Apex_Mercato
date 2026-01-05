<?php

abstract  class  Personne {
    // protected int $id;
    protected string $name;
    protected string $email;
    protected string $nationalité;

    // public function __construct(protected string $name,protected string $email, protected string $nationalité,protected Contract $contra){
     
    // }

    abstract public function getAnnualCost();


}
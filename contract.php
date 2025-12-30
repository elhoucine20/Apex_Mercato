<?php

class Contract {
    // protected date $Date;
    // protected int $montante;
    public function __construct(protected date $Date,protected int $montante,protected int $equipe_id,protected int $joueur_id,protected int $coach_id){}
    
    
}


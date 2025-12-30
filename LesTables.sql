

CREATE TABLE equipe(
    id INT  PRIMARY KEY AUTO_INCREMENT,
    Name varchar(300) NOT null,
    Manager varchar(300),
    Budget int 
);

CREATE TABLE joueur(
     id INT  PRIMARY KEY AUTO_INCREMENT,
     Name varchar(300) NOT null,
     Role varchar(300) NOT null,
     Email varchar(300) NOT null UNIQUE,
     Nationalité varchar(300),
     Valeur_Marcher int ,
     Equipe_id int,
     FOREIGN KEY (Equipe_id) REFERENCES equipe(id)
   );
  --  alter table joueur add index email_index (Email)
  -- alter table joueur add index email_index (Email)
  -- alter table equipe add index name_index (Name)

CREATE TABLE Coach(
    id INT  PRIMARY KEY AUTO_INCREMENT,
    Name varchar(300) NOT null ,
    Email varchar(300) NOT null UNIQUE,
    Nationalité varchar(300) NOT null ,
    style_coach varchar(300),
    annee_experience int,
    Equipe_id int,
    FOREIGN KEY (Equipe_id) REFERENCES equipe(id)
   );
   
CREATE TABLE Contrat(
    id INT  PRIMARY KEY AUTO_INCREMENT,
    Date DATETIME DEFAULT CURRENT_TIMESTAMP ,
    montant int NOT null ,
    equipe_id int,
    joueur_id int,
    coach_id int,
    FOREIGN KEY (equipe_id) REFERENCES equipe(id),
    FOREIGN KEY (joueur_id) REFERENCES Joueur(id),
    FOREIGN KEY (coach_id)  REFERENCES Coach(id)
);
   
   
CREATE TABLE Transfert(
    id INT  PRIMARY KEY AUTO_INCREMENT,
    equipe_A int,
    equipe_B int,
    joueur_id int,
    coatch_id int,
  
    FOREIGN KEY (equipe_A) REFERENCES equipe(id),
    FOREIGN KEY (equipe_B) REFERENCES equipe(id),
    FOREIGN KEY (joueur_id) REFERENCES Joueur(id),
    FOREIGN KEY (coatch_id) REFERENCES Coach(id)
 );



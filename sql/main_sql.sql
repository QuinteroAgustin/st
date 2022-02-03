#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id        Int  Auto_increment  NOT NULL ,
        nom       Varchar (50) NOT NULL ,
        prenom    Varchar (50) NOT NULL ,
        pseudo    Varchar (50) NOT NULL ,
        mail      Varchar (60) NOT NULL UNIQUE,
        password  Varchar (255) NOT NULL ,
        telephone Varchar (13) ,
        portable  Varchar (13) ,
        adresse   Varchar (50) NOT NULL ,
        cp        Varchar (6) NOT NULL ,
        ville     Varchar (15) NOT NULL ,
        role      Int NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: slidershow
#------------------------------------------------------------

CREATE TABLE slidershow(
        id      Int  Auto_increment  NOT NULL ,
        img     Varchar (60) NOT NULL ,
        active  Int NOT NULL ,
        display Varchar (15) ,
        text    Varchar (15) ,
        id_user Int NOT NULL
	,CONSTRAINT slidershow_PK PRIMARY KEY (id)

	,CONSTRAINT slidershow_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: post
#------------------------------------------------------------

CREATE TABLE post(
        id           Int  Auto_increment  NOT NULL ,
        title        Varchar (60) ,
        sub_title    Varchar (60) ,
        message      Mediumtext ,
        sub_message  Mediumtext ,
        img          Varchar (60) NOT NULL ,
        position_img Int NOT NULL ,
        active       Int NOT NULL ,
        date         Datetime NOT NULL ,
        id_user      Int NOT NULL
	,CONSTRAINT post_PK PRIMARY KEY (id)

	,CONSTRAINT post_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: type_entretien
#------------------------------------------------------------

CREATE TABLE type_entretien(
        id  Int  Auto_increment  NOT NULL ,
        nom Varchar (60) NOT NULL
	,CONSTRAINT type_entretien_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: message
#------------------------------------------------------------

CREATE TABLE message(
        id      Int  Auto_increment  NOT NULL ,
        nom     Varchar (60) NOT NULL ,
        prenom  Varchar (60) NOT NULL ,
        email   Varchar (60) NOT NULL ,
        tel     Varchar (15) NOT NULL ,
        adresse Varchar (255) NOT NULL ,
        ville   Varchar (50) NOT NULL ,
        cp      Varchar (10) NOT NULL ,
        subject Varchar (60) NOT NULL ,
        message Longtext NOT NULL ,
        imgs    Varchar (255) ,
        date    Datetime NOT NULL ,
        active  Int NOT NULL ,
        id_user Int NOT NULL
	,CONSTRAINT message_PK PRIMARY KEY (id)

	,CONSTRAINT message_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: entretien
#------------------------------------------------------------

CREATE TABLE entretien(
        id_type_entretien Int NOT NULL ,
        id                Int NOT NULL ,
        nom               Varchar (60) NOT NULL ,
        prix              Float NOT NULL
	,CONSTRAINT entretien_PK PRIMARY KEY (id_type_entretien,id)

	,CONSTRAINT entretien_type_entretien_FK FOREIGN KEY (id_type_entretien) REFERENCES type_entretien(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: abonnement
#------------------------------------------------------------

CREATE TABLE abonnement(
        id                Int  Auto_increment  NOT NULL ,
        date_debut        Date NOT NULL ,
        date_fin          Date NOT NULL ,
        id_user           Int NOT NULL ,
        id_type_entretien Int NOT NULL ,
        id_entretien      Int NOT NULL
	,CONSTRAINT abonnement_PK PRIMARY KEY (id)

	,CONSTRAINT abonnement_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
	,CONSTRAINT abonnement_entretien0_FK FOREIGN KEY (id_type_entretien,id_entretien) REFERENCES entretien(id_type_entretien,id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: card_employee
#------------------------------------------------------------

CREATE TABLE card_employee(
        id          Int  Auto_increment  NOT NULL ,
        nom_prenom  Varchar (60) NOT NULL ,
        role        Varchar (60) NOT NULL ,
        description Text NOT NULL ,
        img         Varchar (60) NOT NULL ,
        active      Int NOT NULL ,
        id_user     Int NOT NULL
	,CONSTRAINT card_employee_PK PRIMARY KEY (id)

	,CONSTRAINT card_employee_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;


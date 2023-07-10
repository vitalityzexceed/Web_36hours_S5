-- create database gasy_si;
-- use gasy_si;

create table IF NOT EXISTS utilisateur
(
	id_utilisateur int NOT NULL AUTO_INCREMENT,
	nom varchar(15) NOT NULL,
	mail varchar(80) NOT NULL,
	motdepasse varchar(80) NOT NULL,
	isadmin int,
    dateinscription date,
	PRIMARY KEY (id_utilisateur)
) ENGINE=InnoDB DEFAULT CHARSET="utf8";

insert into utilisateur (nom, mail, motdepasse, isadmin, dateinscription) values ('admin', 'admin@gmail.com', (select sha1('admin')), 1, '2002-11-23');
insert into utilisateur values (NULL, 'jean', 'jean@gmail.com', (select sha1('jean')), 0, now());
insert into utilisateur (nom, mail, motdepasse, isadmin, dateinscription) values ('jacques', 'jacques@gmail.com', (select sha1('jacques')), 0, '2002-11-23');
insert into utilisateur (nom, mail, motdepasse, isadmin, dateinscription) values ('jeanne', 'jeanne@gmail.com', (select sha1('jeanne')), 0, '2002-11-23');
insert into utilisateur (nom, mail, motdepasse, isadmin, dateinscription) values ('soa', 'soa@gmail.com', (select sha1('soa')), 0, '2002-11-23');

CREATE table genre(
	id_genre int PRIMARY KEY,
	genre varchar(10)
)ENGINE=InnoDB DEFAULT CHARSET="utf8";

insert into genre (id_genre, genre) values
	(1, 'Homme'),
	(2, 'Femme');

CREATE table Objectif(
	id_objectif int PRIMARY KEY,
	nom_objectif varchar(30) 
)ENGINE=InnoDB DEFAULT CHARSET="utf8";

insert into objectif (id_objectif, nom_objectif) values
	(1, 'Augmenter son poids'),
	(2, 'Reduire son poids');

CREATE table parametre_utilisateur(
	id_utilisateur int,
	id_genre int,
	taille DOUBLE precision,
	poids double precision,
	FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id_utilisateur),
	FOREIGN key(id_genre) REFERENCES genre(id_genre)
)ENGINE=InnoDB DEFAULT CHARSET="utf8";

insert into parametre_utilisateur (id_utilisateur,id_genre ,taille, poids) values
	(2, 1, 170, 80),
	(3, 1, 160, 80),
	(4, 2, 150, 70),
	(5, 2, 160, 50);

CREATE table code(
	id_code int NOT NULL AUTO_INCREMENT,
	code varchar(10),
	prix double precision,
	PRIMARY key (id_code)
)ENGINE=InnoDB DEFAULT CHARSET="utf8";

insert into code (id_code, code, prix) values 
	( NULL , '0001', 200000 ),
	( NULL , '0002', 200000 ),
	( NULL , '0003', 200000 ),
	( NULL , '0004', 200000 ),
	( NULL , '0005', 200000 ),
	( NULL , '0006', 200000 ),
	( NULL , '0007', 200000 ),
	( NULL , '0008', 200000 ),
	( NULL , '0009', 100000 ),
	( NULL , '0010', 100000 ),
	( NULL , '0011', 100000 ),
	( NULL , '0012', 100000 ),
	( NULL , '0013', 100000 ),
	( NULL , '0014', 100000 ),
	( NULL , '0015', 100000 );

CREATE table code_status(
	id_code int,
	id_utilisateur int,
	status int,
	FOREIGN key (id_code) REFERENCES code (id_code),
	FOREIGN key (id_utilisateur) REFERENCES utilisateur(id_utilisateur)
)ENGINE=InnoDB DEFAULT CHARSET="utf8";


CREATE table Element(
	id_element int NOT NULL AUTO_INCREMENT,
	nom_element varchar(30),
	prix_element double precision,
	PRIMARY key(id_element)
)ENGINE=InnoDB DEFAULT CHARSET="utf8";

insert into element (id_element, nom_element, prix_element) values
	(NULL, 'Viande Blanche', 10000),
	(NULL, 'Viande Rouge', 15000),
	(NULL, 'Banane', 2000 ),
	(NULL, 'Pomme de terre', 7500),
	(NULL, 'Legume Varie', 8500);


CREATE table regime (
	id_regime int NOT NULL AUTO_INCREMENT,
	nom_regime varchar(30),
	PRIMARY key(id_regime)
)ENGINE=InnoDB DEFAULT CHARSET="utf8";

insert into regime (id_regime, nom_regime) values
	(NULL, 'Regime Vegetarien'),
	(NULL, 'Regime Weight Watchers'),
	(NULL, 'Regime Mediterraneen'),
	(NULL, 'Regime Sans Gluten'),
	(NULL, 'Regime Flexitarien');

CREATE table regime_element(
	id_regime int,
	id_element int,
	FOREIGN KEY(id_regime) REFERENCES regime(id_regime),
	FOREIGN KEY(id_element) REFERENCES element(id_element)
)ENGINE=InnoDB DEFAULT CHARSET="utf8";

INSERT into regime_element (id_regime, id_element) values
	(1, 5),
	(1, 4),
	(2, 2),
	(2, 3),
	(3, 3),
	(3, 1),
	(4, 1),
	(4, 2),
	(5, 1),
	(5, 2),
	(5, 3),
	(5, 5);

CREATE table activite_sportif(
	id_activite_sportif int NOT NULL AUTO_INCREMENT,
	nom_activite varchar(30),
	PRIMARY KEY(id_activite_sportif)
)ENGINE=InnoDB DEFAULT CHARSET="utf8";

insert into activite_sportif (id_activite_sportif, nom_activite) values
	(NULL, 'Pompes'),
	(NULL, 'Paralleles'),
	(NULL, 'Tractions avant'),
	(NULL, 'Squat'),
	(NULL, 'Abdos');

CREATE TABLE Type_Entrainement(
	id_type_entrainement int NOT NULL AUTO_INCREMENT,
	type_entrainement varchar(30),
	PRIMARY key(id_type_entrainement)
)ENGINE=InnoDB DEFAULT CHARSET="utf8";

insert INTO type_entrainement VALUES(NULL, 'Facile');
insert INTO type_entrainement VALUES(NULL, 'Modere');
insert INTO type_entrainement VALUES(NULL, 'Extreme');
insert INTO type_entrainement VALUES(NULL, 'Special Surpoids');
insert INTO type_entrainement VALUES(NULL, 'Special Maigre');


CREATE TABLE Entrainement_activite (
	id_type_entrainement int,
	id_activite_sportif int,
	nb_repetition int,
	nb_seances int,
	FOREIGN key(id_type_entrainement) REFERENCES type_entrainement(id_type_entrainement),
	FOREIGN key(id_activite_sportif) REFERENCES activite_sportif(id_activite_sportif)
)ENGINE=InnoDB DEFAULT CHARSET="utf8";

insert into Entrainement_activite (id_type_entrainement, id_activite_sportif, nb_repetition, nb_seances) VALUES
	-- facile 2 seances de 8 reps
	(1, 1, 8, 2),
	(1, 2, 8, 2),
	(1, 3, 8, 2),
	(1, 4, 8, 2),
	(1, 5, 8, 2),
	-- moyen 3 seances de 10 reps
	(2, 1, 10, 3),
	(2, 2, 10, 3),
	(2, 3, 10, 3),
	(2, 4, 10, 3),
	(2, 5, 10, 3),
	-- extreme 4 seances de 12 reps
	(3, 1, 12, 4),
	(3, 2, 12, 4),
	(3, 3, 12, 4),
	(3, 4, 12, 4),
	(3, 5, 12, 4),
	-- special surpoids 3 seances de 20 reps
	(4, 1, 20, 3),
	(4, 2, 20, 3),
	(4, 3, 20, 3),
	(4, 4, 20, 3),
	(4, 5, 20, 3),
	-- special mince 3 seances de 12 reps
	(4, 1, 12, 3),
	(4, 2, 12, 3),
	(4, 3, 12, 3),
	(4, 4, 12, 3),
	(4, 5, 12, 3);


CREATE table parametre_entrainement(
	id_parametre_entrainement int NOT NULL AUTO_INCREMENT,
	poids1 double precision,
	poids2 double precision,
	taille1 double precision,
	taille2 double precision,
	id_objectif int,
	id_type_entrainement int,
	id_regime int,
	estimation double precision,
	FOREIGN key (id_objectif) REFERENCES objectif(id_objectif),
	FOREIGN key (id_type_entrainement) REFERENCES type_entrainement(id_type_entrainement),
	FOREIGN key (id_regime) REFERENCES Regime(id_regime),
	PRIMARY key(id_parametre_entrainement)	
)ENGINE=InnoDB DEFAULT CHARSET="utf8";

insert into parametre_entrainement (id_parametre_entrainement, poids1, poids2, taille1, taille2, id_objectif, id_type_entrainement, id_regime, estimation) values
	(NULL, 30, 50, 150, 170, 1, 1, 1, 0.8),
	(NULL, 30, 50, 150, 170, 2, 3, 2, 0.7),
	(NULL, 30, 50, 171, 280, 1, 1, 5, 0.5),
	(NULL, 30, 50, 171, 280, 2, 2, 4, 0.7),
	(NULL, 51, 100, 150, 170, 1, 4, 3, 0.8),
	(NULL, 51, 100, 150, 170, 1, 3, 4, 1.2),
	(NULL, 51, 100, 171, 280, 1, 5, 5, 1.2),
	(NULL, 51, 100, 170, 280, 2, 2, 4, 2.2),
	(NULL, 100, 400, 150, 170, 2, 4, 1, 4),
	(NULL, 100, 400, 171, 280, 2, 4, 1, 4);



use gasy_si;

create table IF NOT EXISTS utilisateur
(
	idutilisateur int NOT NULL AUTO_INCREMENT,
	nom varchar(15) NOT NULL,
	mail varchar(80) NOT NULL,
	motdepasse varchar(80) NOT NULL,
	isadmin int,
    dateinscription date,
	PRIMARY KEY (idutilisateur)
) ENGINE=InnoDB DEFAULT CHARSET="utf8";

insert into utilisateur (nom, mail, motdepasse, isadmin, dateinscription) values ('boss', 'boss@gmail.com', (select sha1('boss123')), 1, '2023-11-23');
insert into utilisateur values (NULL, 'jean', 'jean@gmail.com', (select sha1('jean123')), 0, now());
insert into utilisateur (nom, mail, motdepasse, isadmin, dateinscription) values ('jacques', 'jacques@gmail.com', (select sha1('jacques123')), 0, now());
insert into utilisateur (nom, mail, motdepasse, isadmin, dateinscription) values ('jeanne', 'jeanne@gmail.com', (select sha1('jeanne123')), 0, now());
insert into utilisateur (nom, mail, motdepasse, isadmin, dateinscription) values ('soa', 'soa@gmail.com', (select sha1('soa123')), 0, now());



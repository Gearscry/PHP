--Table etudiant
CREATE TABLE etudiant(
	id INTEGER,
	user_id INTEGER,
	nom VARCHAR(50) NOT NULL,
	prenom VARCHAR(50) NOT NULL,
	note INTEGER,
	PRIMARY KEY(id)
);

INSERT INTO etudiant(id,user_id,nom,prenom,note) VALUES
(1,1,'Ayoub','Karine',15),
(2,1,'Carlier','Corentin',20),
(3,2,'Jean','Inutile',0),
(4,2,'Jesai','Pasquoimettre',17),
(5,1,'Fin','Rentré',13);

--Table utilisateur
CREATE TABLE utilisateur(
	id INTEGER,
	login VARCHAR(50),
	password VARCHAR(150),
	mail VARCHAR(50),
	nom VARCHAR(50),
	prenom VARCHAR(50),
	PRIMARY KEY(id)
);

INSERT INTO utilisateur(id,login,password,mail,nom,prenom) VALUES
(1,'Sebastien','Dem','sebast.mouss@gmail.com','Demousselle','Sébastien'),
(2,'Toto','momo','toto.momo@gmail.com','Demousselle','Thomas');
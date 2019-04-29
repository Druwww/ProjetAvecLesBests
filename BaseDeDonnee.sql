CREATE TABLE Compte(
email varchar(255) NOT NULL PRIMARY KEY,
pseudo varchar(255) NOT NULL ,
mdp varchar(255) NOT NULL ,
nom varchar(255) NOT NULL,
prenom varchar(255) NOT NULL,
statut varchar(255) NOT NULL,
adLine1 varchar(255),
adLine2 varchar(255),
pays varchar(255),
codePostal int(11),
numTel varchar(255),
photoProfil varchar(255),
imageFond varchar(255)
);

CREATE TABLE StatVendeur(
email varchar(255) NOT NULL,
gain int(11) NOT NULL,
FOREIGN KEY (email) REFERENCES Compte(email),
PRIMARY KEY (email)
);

CREATE TABLE Produit(
idP int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
emailVendeur varchar(255) NOT NULL,
categorie varchar(255) NOT NULL,
description varchar(255) NOT NULL,
prix int(11) NOT NULL,
nbVendu int(11) NOT NULL,
nbDispo int(11) NOT NULL,
FOREIGN KEY (emailVendeur) REFERENCES compte(email)
);

CREATE TABLE InfoLivre(
idP int(11) NOT NULL,
auteur varchar(255) NOT NULL,
editeur varchar(255) NOT NULL,
genre varchar(255) NOT NULL,
anneeParution int(11) NOT NULL,
FOREIGN KEY (idP) REFERENCES Produit(idP),
PRIMARY KEY (idP)
);

CREATE TABLE InfoVetement(
idP int(11) NOT NULL,
marque varchar(255) NOT NULL,
genre varchar(255) NOT NULL,
FOREIGN KEY (idP) REFERENCES Produit(idP),
PRIMARY KEY (idP)
);

CREATE TABLE ObjetVetement(
idVetement int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
idP int(11) NOT NULL,
couleur varchar(255) NOT NULL,
taille int(11) NOT NULL,
nbDispo int(11) NOT NULL,
FOREIGN KEY (idP) REFERENCES Produit(idP)
);

CREATE TABLE InfoMusique(
idP int(11) NOT NULL,
artiste varchar(255) NOT NULL,
anneeParution int(11) NOT NULL,
genre varchar(255) NOT NULL,
FOREIGN KEY (idP) REFERENCES Produit(idP),
PRIMARY KEY (idP)
);

CREATE TABLE InfoSL(
idP int(11) NOT NULL,
marque varchar(255) NOT NULL,
genre varchar(255) NOT NULL,
FOREIGN KEY (idP) REFERENCES Produit(idP),
PRIMARY KEY (idP)
);

CREATE TABLE Photo(
idVetement int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
idP int(11) NOT NULL,
lienPhoto varchar(255) NOT NULL,
FOREIGN KEY (idP) REFERENCES Produit(idP)
);

CREATE TABLE Panier(
email varchar(255) NOT NULL,
prixTotal int(11) NOT NULL,
nbArticles int(11) NOT NULL,
FOREIGN KEY (email) REFERENCES Compte(email),
PRIMARY KEY (email)
);

CREATE TABLE ObjetPanier(
email varchar(255) NOT NULL,
idP int(11) NOT NULL,
nbArticles int(11) NOT NULL,
FOREIGN KEY (email) REFERENCES Compte(email),
FOREIGN KEY (idP) REFERENCES Produit(idP),
PRIMARY KEY (email,idP)
);



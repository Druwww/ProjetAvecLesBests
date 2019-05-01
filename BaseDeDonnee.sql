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
nom varchar(255) NOT NULL,
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
taille varchar(255) NOT NULL,
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
idPhoto int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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

--
-- Contenu de la table `Compte`
--

INSERT INTO `Compte` (`email`, `pseudo`, `mdp`, `statut`, `nom`, `prenom`, `adLine1`, `adLine2`, `numTel`, `photoProfil`, `ImageFond`, `pays`, `codePostal`) VALUES
('helene@gmail.com', 'LogNep', 'helenecoeur', 'admin', 'Carlier', 'Helene', '1 route de la cascade', 'Le vesinet', '0601020304', 'imagedefault.jpg', 'imagedefaut.jpg', 'Australie', 92500),
('ines@gmail.com', 'Nessi', 'manger', 'admin', 'Estay', 'Ines', '2 route de la cascade', 'Le vesinet', '0604030201', 'imagedefault.jpg', 'imagedefaut.jpg', 'Mexique', 78001),
('quentin@gmail.com', 'Ququ', 'bleu', 'admin', 'Mulliez', 'Quentin', '29 rue des Gabillons', 'Croissy', '0601190989', 'imagedefault.jpg', 'imagedefaut.jpg', 'France', 78290),
('vendeur@gmail.com', 'Picsous', 'argent', 'vendeur', 'Donald', 'Duck', '1 rue de la Paix', 'Paris', '0199999999', 'imagedefault.jpg', 'imagedefaut.jpg', 'Disney', 78291),
('client@gmail.com', 'Pigeon', 'deficite', 'client', '', 'Quentin', '29 rue des Gabillons', 'Croissy', '0601190989', 'imagedefault.jpg', 'imagedefaut.jpg', 'France', 78290)
;

--
-- Contenu de la table `StatVendeur`
--

INSERT INTO `statvendeur` (`email`, `gain`) VALUES
('vendeur@gmail.com', 0)
;


--
-- Contenu de la table `Produit`
--

INSERT INTO `Produit` (`idP`, `emailVendeur`, `nom` ,`categorie`, `description`, `prix`, `nbVendu`, `nbDispo`) VALUES
(1, 'vendeur@gmail.com', '50 nuances de Grey',  'Livre', 'un livre sur une histoire d amour', 15, 0, 100),
(5, 'vendeur@gmail.com', 'Cherub',  'Livre', 'un livre sur des espions', 10, 1, 100),
(2, 'vendeur@gmail.com', 'Echarpe Tendance',  'Vetement', 'Une echarpe a la mode', 10, 0, 100),
(3, 'vendeur@gmail.com', 'Chelsy roader',  'Musique', 'un des plus beau morceaux de Prince', 2 ,0, 100),
(4, 'vendeur@gmail.com', 'Raquette Tennis',  'SL', 'Une raquette pour les champions', 50, 0, 100)
;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`idPhoto`, `idP`, `lienPhoto`) VALUES
(1, 1, 'img/livre1.jpg'),
(4, 3, 'img/prince.jpg'),
(5, 1, 'img/echarpe.jpg'),
(6, 1, 'img/raquette.jpg'),

(2, 5, 'img/cherub.jpg'),
(3, 5, 'img/cherub2.jpg')
;


--
-- Contenu de la table `infolivre`
--

INSERT INTO `infolivre` (`idP`, `auteur`, `editeur`, `genre`, `anneeParution`) VALUES
(1, 'E.L James', 'fnac', 'roman', 2011),
(5, 'Robert Muchamor', 'casterman', 'roman', 2000)
;

--
-- Contenu de la table `infovetement`
--

INSERT INTO `infovetement` (`idP`, `marque`, `genre`) VALUES
(2, 'Decathlon', 'Running')
;

--
-- Contenu de la table `infomusique`
--

INSERT INTO `infomusique` (`idP`, `artiste`, `anneeParution` , `genre`) VALUES
(3, 'Prince', 2006, 'Rock')
;

--
-- Contenu de la table `infosl`
--

INSERT INTO `infosl` (`idP`, `marque`, `genre`) VALUES
(4, 'Decathlon', 'Confirme')
;
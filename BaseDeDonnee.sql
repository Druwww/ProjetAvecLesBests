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
idVetement int(11),
nbArticles int(11) NOT NULL,
FOREIGN KEY (email) REFERENCES Compte(email),
FOREIGN KEY (idP) REFERENCES Produit(idP),
PRIMARY KEY (email,idP,idVetement)
);

--
-- Contenu de la table `Compte`
--

INSERT INTO `Compte` (`email`, `pseudo`, `mdp`, `statut`, `nom`, `prenom`, `adLine1`, `adLine2`, `numTel`, `photoProfil`, `ImageFond`, `pays`, `codePostal`) VALUES
('helene@gmail.com', 'LogNep', 'helenecoeur', 'admin', 'Carlier', 'Helene', '1 route de la cascade', 'Le vesinet', '0601020304', 'img/random.jpg', 'img/pdcRandom.jpg', 'Australie', 92500),
('ines@gmail.com', 'Nessi', 'manger', 'admin', 'Estay', 'Ines', '2 route de la cascade', 'Le vesinet', '0604030201', 'img/random.jpg', 'img/pdcRandom.jpg', 'Mexique', 78001),
('quentin@gmail.com', 'Ququ', 'bleu', 'admin', 'Mulliez', 'Quentin', '29 rue des Gabillons', 'Croissy', '0601190989', 'img/random.jpg', 'img/pdcRandom.jpg', 'France', 78290),
('vendeur@gmail.com', 'Picsous', 'argent', 'vendeur', 'Donald', 'Duck', '1 rue de la Paix', 'Paris', '0199999999', 'img/random.jpg', 'img/pdcRandom.jpg', 'Disney', 78291),
('client@gmail.com', 'Pigeon', 'deficite', 'client', '', 'Quentin', '29 rue des Gabillons', 'Croissy', '0601190989', 'img/random.jpg', 'img/pdcRandom.jpg', 'France', 78290)
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
(2, 'vendeur@gmail.com', 'Echarpe Tendance',  'Vetement', 'Une echarpe a la mode', 10, 0, 100),
(3, 'vendeur@gmail.com', 'Chelsy roader',  'Musique', 'un des plus beau morceaux de Prince', 2 ,0, 100),
(4, 'vendeur@gmail.com', 'Raquette Tennis',  'SL', 'Une raquette pour les champions', 50, 0, 100),
(5, 'vendeur@gmail.com', 'Cherub',  'Livre', 'un livre sur des espions', 10, 1, 100),
(6, 'vendeur@gmail.com', 'Harry Potter 1',  'Livre', 'un livre sur un jeune aprentit magicien', 15, 50, 100),
(7, 'vendeur@gmail.com', 'Un appartement à Paris',  'Livre', 'un livre sur une histoire d amour entre deux artiste', 5, 80, 90),
(8, 'vendeur@gmail.com', 'Le web pour les nul',  'Livre', 'un livre sur comment avoir une bonne note à la piscine', 30, 0, 10),
(9, 'vendeur@gmail.com', 'Titeuf : La loi du preau',  'Livre', 'un livre sur les aventures de Titeuf', 15, 6, 50),
(10, 'vendeur@gmail.com', 'Naruto Tome 1',  'Livre', 'un manga sur un jeune ninja un peu rebelle', 9, 450, 1000),
(11, 'vendeur@gmail.com', 'Nos etoiles contraire',  'Livre', 'un livre sur une romance entre deux personnes malade', 18, 100, 200),
(12, 'vendeur@gmail.com', 'Purple rain', 'Musique', 'LE tube de prince', 12, 1, 10),
(13, 'vendeur@gmail.com', 'Billie Jean', 'Musique', 'LE tube de Michael', 14, 3, 30),
(14, 'vendeur@gmail.com', 'Beat it', 'Musique', 'Un tube rock de la légende Michael', 5, 8, 80),
(15, 'vendeur@gmail.com', 'La flûte enchantée', 'Musique', 'Un morceau de génie', 22, 15, 50),
(16, 'vendeur@gmail.com', 'Requiem', 'Musique', 'Un morceau leger et incroyablement bien construit', 2, 23, 59),
(17, 'vendeur@gmail.com', 'Dies Arae', 'Musique', 'Un morceau gravé dans l histoire', 19, 5, 20),
(18, 'vendeur@gmail.com', 'Californication', 'Musique', 'Un tube de la musique rock', 21, 35, 120),
(19, 'vendeur@gmail.com', 'Snow', 'Musique', 'Un classique pour les fans du groupe', 10, 5, 200),
(20, 'vendeur@gmail.com', 'Sweet Child O Mine', 'Musique', 'Le morceau le plus connu interprété par un groupe de légendes', 14, 45, 130),
(21, 'vendeur@gmail.com', 'November rain', 'Musique', 'La base du rock', 13, 67, 78),
(22, 'vendeur@gmail.com', 'Heroes', 'Musique', 'Un morceau qui donne le sourire', 19, 34, 69),
(23, 'vendeur@gmail.com', 'Let s dance', 'Musique', 'DANSEZ au rythme de cette chanson ultra famous', 6, 25, 47),
(24, 'vendeur@gmail.com', 'La lettre à elise', 'Musique', 'Prenez le temps d ecouter au morceau du grand genie Beethov', 17, 6, 67),
(25, 'vendeur@gmail.com', 'Menuet', 'Musique', 'Ma préférée du génie', 9, 51, 223),
(26, 'vendeur@gmail.com', '20 mille lieues sous les mers',  'Livre', 'un livre qui vous fera voyager', 1, 20, 108),
(27, 'vendeur@gmail.com', 'Le tout du monde en 80 jours',  'Livre', 'A l aventure!', 15, 60, 78),
(28, 'vendeur@gmail.com', 'Notre dame de paris',  'Livre', 'Un livre plein de surprises', 12, 30, 160),
(29, 'vendeur@gmail.com', 'L homme qui rit',  'Livre', 'Une aventure incroybale', 23, 10, 76),
(30, 'vendeur@gmail.com', 'Les misérables',  'Livre', 'Un classique à avoir lu!', 8, 2, 45),
(31, 'vendeur@gmail.com', 'Germinal',  'Livre', 'Un classique à avoir lu!', 15, 7, 18),
(32, 'vendeur@gmail.com', 'Nana',  'Livre', 'Un GRAND classsique de votre bibliothèque!', 19, 9, 10)
;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`idPhoto`, `idP`, `lienPhoto`) VALUES
(1, 1, 'img/livre1.jpg'),
(2, 5, 'img/cherub.jpg'),
(3, 5, 'img/cherub2.jpg'),
(4, 3, 'img/prince.jpg'),
(5, 2, 'img/echarpe.jpg'),
(6, 4, 'img/raquette.jpg'),
(7, 6, 'img/harry1.jpg'),
(8, 7, 'img/appartementparis.jpg'),
(9, 8, 'img/webnul.jpg'),
(10, 9, 'img/titeuf.jpg'),
(11, 10, 'img/naruto.jpg'),
(12, 11, 'img/etoiles.jpg'),
(13, 12, 'img/purpleRain.jpg'),
(14, 12, 'img/purpleRain2.jpg'),
(15, 13, 'img/billieJean.jpg'),
(16, 13, 'img/billieJean2.jpg'),
(17, 14, 'img/beatIt.jpg'),
(18, 15, 'img/fE.jpg'),
(19, 16, 'img/requiem.jpg'),
(20, 16, 'img/requiem2.jpg'),
(21, 17, 'img/dies.jpg'),
(22, 18, 'img/cali.jpg'),
(23, 19, 'img/snow.jpg'),
(24, 20, 'img/sw.jpg'),
(25, 21, 'img/nr.jpg'),
(26, 21, 'img/nr1.jpg'),
(27, 21, 'img/nr2.jpg'),
(28, 22, 'img/heroes.jpg'),
(29, 23, 'img/ld.jpg'),
(30, 23, 'img/ld2.jpg'),
(31, 24, 'img/le.jpg'),
(32, 24, 'img/le2.jpg'),
(33, 25, 'img/menuet.jpg'),
(34, 26, 'img/20.jpg'),
(35, 26, 'img/20b.jpg'),
(36, 27, 'img/tdm.jpg'),
(37, 27, 'img/tdm2.jpg'),
(38, 27, 'img/tdm3.jpg'),
(39, 28, 'img/ndp.jpg'),
(40, 29, 'img/lqr.jpg'),
(41, 30, 'img/m.jpg'),
(42, 30, 'img/m1.jpg'),
(43, 30, 'img/m2.jpg'),
(44, 31, 'img/g.jpg'),
(45, 31, 'img/g1.jpg'),
(46, 32, 'img/nana1.jpg'),
(47, 32, 'img/nana2.jpg')

;


--
-- Contenu de la table `infolivre`
--

INSERT INTO `infolivre` (`idP`, `auteur`, `editeur`, `genre`, `anneeParution`) VALUES
(1, 'E.L James', 'fnac', 'Historique', 2011),
(5, 'Robert Muchamor', 'casterman', 'Science Fiction', 2000),
(6, 'JK Rowlings', 'Bloomsbuty', 'Science Fiction', 1997),
(7, 'Guillaume Musso', 'XO edition', 'Romance', 2017),
(8, 'John R. Levine', 'Pour les nul', 'Science Fiction', 2005),
(9, 'Zep', 'Glenat', 'Romance', 2008),
(10, 'Masashi Kishimoto', 'Kana', 'Science Fiction', 2002),
(11, 'John Green', 'Nathan', 'Romance', 2012),
(26, 'Jules Verne', 'Pierre-Jules Hetzel', 'Science Fiction', 1872),
(27, 'Jules Verne', 'Pierre-Jules Hetzel', 'Science Fiction', 1869),
(28, 'Victor Hugo', 'Hachette', 'Romance', 1831),
(29, 'Victor Hugo', 'Hachette', 'Romance', 1862),
(30, 'Victor Hugo', 'Hachette', 'Romance', 1869),
(31, 'Emile Zola', 'Enriche', 'Romance', 1885),
(32, 'Emile Zola', 'Enriche', 'Romance', 1880)
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
(3, 'Prince', 2006, 'Rock'),
(12, 'Prince', 1984, 'Pop'),
(13, 'Michael Jackson', 1982, 'Pop'),
(14, 'Michael Jackson', 1982, 'Pop'),
(15, 'Mozart', 1793, 'Classique'),
(16, 'Mozart', 1791, 'Classique'),
(17, 'Mozart', 1789, 'Classique'),
(18, 'Red Hot', 1999, 'Rock'),
(19, 'Red Hot', 2004, 'Rock'),
(20, 'Guns n Roses', 2003, 'Rock'),
(21, 'Guns n Roses', 1996, 'Rock'),
(22, 'David Bowie', 2000, 'Pop'),
(23, 'David Bowie ', 2005, 'Pop'),
(24, 'Beethoven', 1810, 'Classique'),
(25, 'Beethoven', 1800, 'Classique')
;

--
-- Contenu de la table `infosl`
--

INSERT INTO `infosl` (`idP`, `marque`, `genre`) VALUES
(4, 'Decathlon', 'Sport')
;


--
-- Contenu de la table `objetVetement`
--

INSERT INTO `objetvetement` (`idVetement`, `idP`, `couleur`, `taille`, `nbDispo`) VALUES
(1, 2, 'Rouge', 'S', 100),
(2, 2, 'Rouge', 'M', 100),
(3, 2, 'Rouge', 'L', 100)
;
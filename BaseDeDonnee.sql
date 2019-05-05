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
(3, 'vendeur@gmail.com', 'Chelsea rodger',  'Musique', 'un des plus beau morceaux de Prince', 2 ,0, 100),
(4, 'vendeur@gmail.com', 'Raquette Tennis',  'SL', 'Une raquette pour les champions', 50, 0, 100),
(5, 'vendeur@gmail.com', 'Cherub',  'Livre', 'un livre sur des espions', 10, 1, 100),
(6, 'vendeur@gmail.com', 'Harry Potter 1',  'Livre', 'un livre sur un jeune aprentit magicien', 15, 50, 100),
(7, 'vendeur@gmail.com', 'Un appartement a Paris',  'Livre', 'un livre sur une histoire d amour entre deux artiste', 5, 80, 90),
(8, 'vendeur@gmail.com', 'Le web pour les nul',  'Livre', 'un livre sur comment avoir une bonne note à la piscine', 30, 0, 10),
(9, 'vendeur@gmail.com', 'Titeuf : La loi du preau',  'Livre', 'un livre sur les aventures de Titeuf', 15, 6, 50),
(10, 'vendeur@gmail.com', 'Naruto Tome 1',  'Livre', 'un manga sur un jeune ninja un peu rebelle', 9, 450, 1000),
(11, 'vendeur@gmail.com', 'Nos etoiles contraires',  'Livre', 'un livre sur une romance entre deux personnes malade', 18, 100, 200),
(12, 'vendeur@gmail.com', 'Purple rain', 'Musique', 'LE tube de prince', 12, 1, 10),
(13, 'vendeur@gmail.com', 'Billie Jean', 'Musique', 'LE tube de Michael', 14, 3, 30),
(14, 'vendeur@gmail.com', 'Beat it', 'Musique', 'Un tube rock de la légende Michael', 5, 8, 80),
(15, 'vendeur@gmail.com', 'La flute enchantee', 'Musique', 'Un morceau de génie', 22, 15, 50),
(16, 'vendeur@gmail.com', 'Requiem', 'Musique', 'Un morceau leger et incroyablement bien construit', 2, 23, 59),
(17, 'vendeur@gmail.com', 'Dies Arae', 'Musique', 'Un morceau gravé dans l histoire', 19, 5, 20),
(18, 'vendeur@gmail.com', 'Californication', 'Musique', 'Un tube de la musique rock', 21, 35, 120),
(19, 'vendeur@gmail.com', 'Snow', 'Musique', 'Un classique pour les fans du groupe', 10, 5, 200),
(20, 'vendeur@gmail.com', 'Sweet Child O Mine', 'Musique', 'Le morceau le plus connu interprété par un groupe de légendes', 14, 45, 130),
(21, 'vendeur@gmail.com', 'November rain', 'Musique', 'La base du rock', 13, 67, 78),
(22, 'vendeur@gmail.com', 'Heroes', 'Musique', 'Un morceau qui donne le sourire', 19, 34, 69),
(23, 'vendeur@gmail.com', 'Let s dance', 'Musique', 'DANSEZ au rythme de cette chanson ultra famous', 6, 25, 47),
(24, 'vendeur@gmail.com', 'La lettre a elise', 'Musique', 'Prenez le temps d ecouter au morceau du grand genie Beethov', 17, 6, 67),
(25, 'vendeur@gmail.com', 'Menuet', 'Musique', 'Ma préférée du génie', 9, 51, 223),
(26, 'vendeur@gmail.com', '20 mille lieues sous les mers',  'Livre', 'un livre qui vous fera voyager', 1, 20, 108),
(27, 'vendeur@gmail.com', 'Le tours du monde en 80 jours',  'Livre', 'A l aventure!', 15, 60, 78),
(28, 'vendeur@gmail.com', 'Notre dame de paris',  'Livre', 'Un livre plein de surprises', 12, 30, 160),
(29, 'vendeur@gmail.com', 'L homme qui rit',  'Livre', 'Une aventure incroybale', 23, 10, 76),
(30, 'vendeur@gmail.com', 'Les miserables',  'Livre', 'Un classique à avoir lu!', 8, 2, 45),
(31, 'vendeur@gmail.com', 'Germinal',  'Livre', 'Un classique à avoir lu!', 15, 7, 18),
(32, 'vendeur@gmail.com', 'Nana',  'Livre', 'Un GRAND classsique de votre bibliothèque!', 19, 9, 10),
(33, 'vendeur@gmail.com', 'Chaussettes style',  'Vetement', 'Impressionez tout le monde avec vos chausette', 4, 0, 100),
(34, 'vendeur@gmail.com', 'Tee shirt simple',  'Vetement', 'Le tee shirt le plus simple du monde', 5, 103, 1000),
(35, 'vendeur@gmail.com', 'Pull a col roule',  'Vetement', 'Le pull qui va vous gratter le cou', 20, 0, 30),
(36, 'vendeur@gmail.com', 'Manteau hiver',  'Vetement', 'Un manteau pour etre sur de ne pas avoir froid en hiver', 80, 92, 500),
(37, 'vendeur@gmail.com', 'Manteau ete',  'Vetement', 'Un manteau pour ne pas avoir trop chaud en ete', 60, 0, 100),
(38, 'vendeur@gmail.com', 'Chemise swag',  'Vetement', 'Pour etre sur que vos professeur vous dise que votre chemise est trop swag', 25, 734, 1000),
(39, 'vendeur@gmail.com', 'Short tendance',  'Vetement', 'Parfait pour vos sortie barbecue', 12, 33, 333),
(40, 'vendeur@gmail.com', 'Raquette ping pong',  'SL', 'La raquette des champions', 40, 10, 300),
(41, 'vendeur@gmail.com', 'Ballon de basket',  'SL', 'Avec ce ballon vous serez le nouveau Tony Paker', 10, 10, 100),
(42, 'vendeur@gmail.com', 'Kayak',  'SL', 'Pour faire des randonnes sur l eau avec vos amis', 560, 1, 100),
(43, 'vendeur@gmail.com', 'Balles Ping Pong',  'SL', 'Des balles approuve pour les competitions', 1, 68, 1000),
(44, 'vendeur@gmail.com', 'Frisbee',  'SL', 'Parfait pour vos journees dans un park ou a la plage entre ami', 3, 33, 500),
(45, 'vendeur@gmail.com', 'Jeu d echec',  'SL', 'Apprenez un des jeux prefere du monde', 30, 0, 100),
(46, 'vendeur@gmail.com', 'XBOX one',  'SL', 'Un outil pour devenir le meilleure GAMEUR sur la terre', 300, 12, 600),
(47, 'vendeur@gmail.com', 'PS4',  'SL', 'Un outil pour devenir le meilleure GAMEUR sur la terre', 300, 12, 600),
(48, 'vendeur@gmail.com', 'Nintendo Switch',  'SL', 'Un outil pour devenir le meilleure GAMEUR sur la terre', 300, 12, 600),
(49, 'vendeur@gmail.com', 'Mario Kart',  'SL', 'Le Jeu de l annee', 50, 780, 1000)
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
(36, 27, 'img/tdm.jpeg'),
(37, 27, 'img/tdm2.jpg'),
(38, 27, 'img/tdm3.jpg'),
(39, 28, 'img/ndp.jpg'),
(40, 29, 'img/lqr.jpg'),
(41, 30, 'img/m.jpg'),
(42, 30, 'img/m1.jpg'),
(43, 30, 'img/m2.jpg'),
(44, 31, 'img/g.jpeg'),
(45, 31, 'img/g1.jpg'),
(46, 32, 'img/nana1.jpg'),
(47, 32, 'img/nana2.jpg'),
(48, 33, 'img/chausette1.jpg'),
(49, 33, 'img/chausette2.jpg'),
(50, 33, 'img/chausette3.jpeg'),
(51, 34, 'img/tee1.jpg'),
(52, 34, 'img/tee2.jpg'),
(53, 34, 'img/tee3.jpg'),
(54, 35, 'img/pullcol.jpg'),
(55, 36, 'img/nikem.jpg'),
(56, 37, 'img/nikemm.jpg'),
(57, 37, 'img/nikemmm.jpg'),
(58, 38, 'img/chemise.jpg'),
(59, 39, 'img/short.jpg'),
(60, 40, 'img/ping1.jpg'),
(61, 40, 'img/ping2.jpg'),
(62, 41, 'img/ballon.jpg'),
(63, 41, 'img/ballon1.jpg'),
(64, 41, 'img/ballon2.jpg'),
(65, 42, 'img/kayak.jpeg'),
(66, 43, 'img/balles.jpg'),
(67, 43, 'img/balles1.jpg'),
(68, 44, 'img/frees.jpg'),
(69, 45, 'img/echec.jpg'),
(70, 45, 'img/echec1.jpg'),
(71, 45, 'img/echec2.jpg'),
(72, 46, 'img/xbox.jpg'),
(73, 46, 'img/xbox1.jpg'),
(74, 47, 'img/ps4.jpg'),
(75, 47, 'img/ps41.jpg'),
(76, 48, 'img/nin.jpg'),
(77, 48, 'img/nin1.jpg'),
(78, 48, 'img/nin2.jpg'),
(79, 49, 'img/nin3.jpg')
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
(2, 'Decathlon', 'Homme'),
(33, 'Decathlon', 'Femme'),
(34, 'Decathlon', 'Enfant'),
(35, 'Nike', 'Homme'),
(36, 'Nike', 'Homme'),
(37, 'Nike', 'Homme'),
(38, 'Uniqlo', 'Femme'),
(39, 'Decathlon', 'Homme')
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
(4, 'Decathlon', 'Sport'),
(40, 'Decathlon', 'Sport'),
(41, 'Decathlon', 'Sport'),
(42, 'Decathlon', 'Sport'),
(43, 'Decathlon', 'Sport'),
(44, 'Decathlon', 'Sport'),
(45, 'Hasbrot', 'Loisir'),
(46, 'Microsoft', 'Loisir'),
(47, 'Sony', 'Loisir'),
(48, 'Nintendo', 'Loisir'),
(49, 'Nintendo', 'Loisir')
;


--
-- Contenu de la table `objetVetement`
--

INSERT INTO `objetvetement` (`idVetement`, `idP`, `couleur`, `taille`, `nbDispo`) VALUES
(1, 2, 'Rouge', 'S', 100),
(2, 2, 'Rouge', 'M', 100),
(3, 2, 'Rouge', 'L', 100),
(4, 33, 'Rouge', 'S', 100),
(5, 33, 'Vert', 'S', 100),
(6, 33, 'Marron', 'S', 100),
(7, 33, 'Rouge', 'M', 100),
(8, 33, 'Rouge', 'L', 100),
(9, 33, 'Vert', 'L', 100),
(10, 33, 'Bleu', 'L', 100),
(11, 34, 'Rouge', 'L', 100),
(12, 34, 'Rouge', 'M', 100),
(13, 34, 'Bleu', 'M', 100),
(14, 35, 'Vert', 'S', 100),
(15, 35, 'Bleu', 'S', 100),
(16, 35, 'Bleu', 'L', 100),
(17, 36, 'Jaune', 'L', 100),
(18, 36, 'Jaune', 'M', 100),
(19, 36, 'Blanc', 'S', 100),
(20, 37, 'Blanc', 'S', 100),
(21, 37, 'Blanc', 'M', 100),
(22, 37, 'Blanc', 'L', 100),
(23, 38, 'Vert', 'S', 100),
(24, 38, 'Vert', 'M', 100),
(25, 38, 'Blanc', 'M', 100),
(26, 39, 'Rose', 'S', 100),
(27, 39, 'Blanc', 'S', 100),
(28, 39, 'Jaune', 'S', 100)
;
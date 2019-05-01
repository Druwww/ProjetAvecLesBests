<?php


// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mon Compte</title>
	<link rel="icon" href="img/favicon.png" />
	<link rel="stylesheet" type="text/css" href="styles3.css">
</head>
<body>

	<ul class="navigation1">
		<li class = "detail1">
			<form action="AccueilClientOuvertureFichePerso.php" method="post">
			<tr>
				<button class="button button1">Mon Compte</button>
			</tr>
			<tr>
				<img src="img/monCompte.png" style="width:45px;height:40px;" class = "detailImg">
			</tr>
			</form>
		</li>
		<li class = "detail1">
			<form action="AccueilClientOuvertureFichePerso.php" method="post">
			<tr>
				<button class="button button1">Mon Panier</button>
			</tr>
			<tr>
				<img src="img/panier.png" style="width:42px;height:40px;" class = "detailImg">
			</tr>
			</form>
		</li>
		
	</ul>

		<nav class="navbarCouleur"> 
			<a href="AccueilClient.html"><img src="img/LogoSite.png" alt="Logo" style="width:400px;height:160px;"></a> 
			<form action="deconnection.php" method="post">
				<tr>
					<button class="button button2" >Déconnexion</button>
				</tr>
			</form>
		</nav>


<p class="slogan"> Là où tout achat est possible</p>

<div class = "centerPDC"><img class = "pdpDesign" src="img/random.jpg" alt="PDP" style="width:150px;height:150px;"></div>
<img class = "pdcDesign" src="img/pdcRandom.jpg" alt="PDC" style="width: 100 ;height:300px;">



<div class ="monCompte">
	<h1>Pseudo: 
	<?php
		echo $_SESSION["pseudo"];
	?></h1>
	<h1>Nom: 
	<?php
		echo $_SESSION["nom"];
	?></h1>
	<h1>Prenom: 
	<?php
		echo $_SESSION["prenom"];
	?></h1>
	<h1>Adresse: 
	<?php
		echo $_SESSION["adresse1"]."<br>".$_SESSION["adresse2"]."<br>".$_SESSION["codePostal"]."<br>".$_SESSION["pays"];
	?></h1>
	<h1>Telephone: 
	<?php
		echo $_SESSION["numTel"];
	?></h1>
</div>


<div class="footer">
 <p><img src="img/coeur.png" style="width:50px;height:40px;" class = "detailImg"> &copy; 2019 Copyright | Amazon ECE<img src="img/coeur.png" style="width:50px;height:40px;" class = "detailImg"><p>
</div>

<div class="message">
  <div class="message-header">Bienvenue<img src="img/star.png" style="width:50px;height:40px;" class = "detailImg"></div>
  <span class="fermeture" onclick="this.parentElement.style.display='none';">×</span>
  <div class="message-container">
    <p>Toujours un plaisir de vous retrouvez chez Amazon ECE. Achetez et vendez en toute sécurité sur notre site!</p>
  </div>
</div>

<form action="EnvoieTomodificationCompte.php" method="post">
	<tr>
		<center><button class="button button1">Paramètres à modifier</button></center>
	</tr>
</form>


<?php
	if($_SESSION["statut"] == "vendeur")
		echo"<form action='accesProduitVendeur.php' method='post'>
				<tr>
					<center><button class='button button1'>Mes produits</button></center>
				</tr>
			</form>";
	
	if($_SESSION["statut"] == "admin")
		echo"<form action='accesProduitAdmin.php' method='post'>
				<tr>
					<center><button class='button button1'>Mes vendeurs</button></center>
				</tr>
			</form>";
?>
<br>
<br>
<br>
<br>



</body>
</html>
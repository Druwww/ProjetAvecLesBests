<?php


	$status = session_status();
	if($status == PHP_SESSION_NONE){
		//There is no active session
		session_start();
	}
	

	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');


	//identifier le nom de la BDD
	$database = "Amazon";

	//se connecter à la BDD
	//$db_handle = mysql_connect(localhost,root,'');
	$db_handle = mysqli_connect(DB_SERVER, DB_USER ,DB_PASS);
	$db_found = mysqli_select_db($db_handle, $database);
	
	$email = $_SESSION["email"];
	
	$addsql = "SELECT * FROM compte WHERE email = '$email'";
	$result1 = mysqli_query($db_handle, $addsql);
	
	while ($dataVendeur = mysqli_fetch_assoc($result1)) {
		$myPhotoP = $dataVendeur["photoProfil"];
		$myPhotoC = $dataVendeur["imageFond"];
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Mon Compte</title>
	<link rel="icon" href="img/favicon.png" />
	<link rel="stylesheet" type="text/css" href="styles3.css">
	<link rel="stylesheet" type="text/css" href="stylesBase2.css">
	
</head>
<body>


		<ul class="navigation1">
				  <div class = "detail1">
				  	<tr><br>
						<a href="AccueilClientOuvertureFichePerso.php"><button class="button button1">Mon Compte</button></a>
					</tr>
					<tr>
						<img src="img/monCompte.png" style="width:50px;height:40px;" class = "detailImg">
					</tr>

					<tr>
						<a href="index.html"><button class="button button1">Deconnexion</button></a>
					</tr>
					<tr>
						<img src="img/deco.png" style="width:55px;height:45px;" class = "detailImg">
					</tr>
				  	 <tr>
						<a href="panier.php"><button class="button button1">Mon Panier</button></a>
					</tr>
					<tr>
						<img src="img/panier.png" style="width:45px;height:40px;" class = "detailImg">
					</tr>
				  </div>
				  
		</ul>

		<nav class="navbarCouleur"> 
					<a href="AccueilClient.php"><img src="img/LogoSite.png" alt="Logo" class ="logo"></a> 
				</nav>


				<p class="slogan"> <img src="img/slogan.png" alt="Logo" style="width:400px;height:50px;"></p>






<div class = "contient"> 
<?php
	echo "<img class = 'pdcDesign' src=" . $myPhotoC . " alt='PDC' style='width: 100 ;height:300px;'>";
?>
	<a href="ChangementPDC.html"><button class="bouton1" >Modifier ma photo de couverture</button></a>

</div>

<div class = "contient"> 
<?php
	echo "<img class = 'pdpDesign' src=" . $myPhotoP . " alt='PDP' style='width:150px;height:150px;'>";
?>
	<a href="ChangementPDP.html"><button class="bouton2">Modifier ma photo de profil</button></a>
</div>



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
 <p><a href="equipe"><p class = "style1">Mieux nous connaitre</p></a><img src="img/coeur.png" style="width:50px;height:40px;" class = "detailImg"> &copy; 2019 Copyright | Amazon ECE<img src="img/coeur.png" style="width:50px;height:40px;" class = "detailImg"><p>
 	
</div>

<div class="message">
  <div class="message-header">Bienvenue<img src="img/star.png" style="width:50px;height:40px;" class = "detailImg"></div>
  <span class="fermeture" onclick="this.parentElement.style.display='none';">×</span>
  <div class="message-container">
    <p>Toujours un plaisir de vous retrouvez chez Amazon ECE. Achetez et vendez en toute sécurité sur notre site!</p>
  </div>
</div >



<form action="EnvoieTomodificationCompte.php" method="post">
	<tr>
		<center><button class="button button1">Paramètres à modifier</button></center><br>
	</tr>
</form>

<?php
	if($_SESSION["statut"] == "vendeur")
		echo"<form action='AccesProduitVendeur.php' method='post'>
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
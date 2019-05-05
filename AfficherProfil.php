<?php
	$emailVendeur = $_GET["emailVendeur"];
	

	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');


	//identifier le nom de la BDD
	$database = "Amazon";

	//se connecter à la BDD
	//$db_handle = mysql_connect(localhost,root,'');
	$db_handle = mysqli_connect(DB_SERVER, DB_USER ,DB_PASS);
	$db_found = mysqli_select_db($db_handle, $database);
	
	$addsql = "SELECT * FROM compte WHERE email = '$emailVendeur'";
	$result1 = mysqli_query($db_handle, $addsql);
	
	while ($dataVendeur = mysqli_fetch_assoc($result1)) {
		$myPseudo = $dataVendeur["pseudo"];
		$myNom = $dataVendeur["nom"];
		$myPrenom = $dataVendeur["prenom"];
		$myAdLine1 = $dataVendeur["adLine1"];
		$myAdLine2 = $dataVendeur["adLine2"];
		$myPays = $dataVendeur["pays"];
		$myCP = $dataVendeur["codePostal"];
		$myTel = $dataVendeur["numTel"];
		$myPhotoP = $dataVendeur["photoProfil"];
		$myPhotoC = $dataVendeur["imageFond"];
	}
	
	$addsq2 = "SELECT * FROM statvendeur WHERE email = '$emailVendeur'";
	$result2 = mysqli_query($db_handle, $addsq2);
	
	while ($dataGain = mysqli_fetch_assoc($result2)) {
		$myGain = $dataGain["gain"];
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


<?php
	//echo "<div class = 'centerPDC'><img class = 'pdpDesign' src=" . $myPhotoP . " alt='PDP' style='width:150px;height:150px;'></div>";
?>
<?php
	//echo "<img class = 'pdcDesign' src=" . $myPhotoC . " alt='PDC' style='width: 100 ;height:300px;'>";
?>


<div class = "contient"> 
<?php
	echo "<img class = 'pdcDesign' src=" . $myPhotoC . " alt='PDC' style='width: 100 ;height:300px;'>";
?>
</div>

<div class = "contient"> 
<?php
	echo "<img class = 'pdpDesign' src=" . $myPhotoP . " alt='PDP' style='width:150px;height:150px;'>";
?>
</div>



<div class ="monCompte">
	<h1>Pseudo: 
	<?php
		echo $myPseudo;
	?></h1>
	<h1>Nom: 
	<?php
		echo $myNom;
	?></h1>
	<h1>Prenom: 
	<?php
		echo $myPrenom;
	?></h1>
	<h1>Gain: 
	<?php
		echo $myGain;
	?></h1>
	<h1>Adresse: 
	<?php
		echo $myAdLine1."<br>".$myAdLine2."<br>".$myCP."<br>".$myPays;
	?></h1>
	<h1>Telephone: 
	<?php
		echo $myTel;
	?></h1>
</div>


<div class="footer">
 <p><img src="img/coeur.png" style="width:50px;height:40px;" class = "detailImg"> &copy; 2019 Copyright | Amazon ECE<img src="img/coeur.png" style="width:50px;height:40px;" class = "detailImg"><p>
</div>

<div class="message">
  <div class="message-header">Bienvenue<img src="img/star.png" style="width:50px;height:40px;" class = "detailImg"></div>
  <span class="fermeture" onclick="this.parentElement.style.display='none';">×</span>
  <div class="message-container">
    <p>Espèce de petit espion va !!!</p>
  </div>
</div>


<br>
<br>
<br>
<br>

<?php
	//fermer la connection
	mysqli_close($db_handle);
?>



</body>
</html>
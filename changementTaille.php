<?php
	echo 'coucou';

	session_start();

	if(!isset($_SESSION["email"])){
		header('Location: index.html');
	}

	$database = "Amazon";

	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if(! $db_found){
		echo "<script>alert('Echec connexion BDD !');</script>";
	}

	$email = $_SESSION["email"];

	$idVetement = isset($_GET["vetement"]) ? $_GET["vetement"] : "";
	$idP = isset($_GET["produit"]) ? $_GET["produit"] : "";
	$newSize = isset($_POST["taille"]) ? $_POST["taille"] : "";


	$requetteNouvelleidVetement = "SELECT * FROM `objetvetement` WHERE `idP` LIKE '$idP' AND `taille` LIKE '$newSize'";
	$resultatNouvelleidVetement = mysqli_query($db_handle, $requetteNouvelleidVetement);

	while ($dataNouvelleId = mysqli_fetch_assoc($resultatNouvelleidVetement)) {
		$newidVetement = $dataNouvelleId["idVetement"];
	}


	$requetModificationPanier = "UPDATE `objetpanier` SET `idVetement` = '$newidVetement' WHERE objetpanier.email = '$email' AND objetpanier.idVetement = '$idVetement'";

	//echo $requetModificationPanier;
	$resultUpdate = mysqli_query($db_handle, $requetModificationPanier);

	header('Location: panier.php');
?>
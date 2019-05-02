<?php
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

	$idP = isset($_GET["produit"]) ? $_GET["produit"] : "";
	$idVetement = isset($_GET["vetement"]) ? $_GET["vetement"] : "";

	$requetSuppressionProduit = "DELETE FROM `objetpanier` WHERE `idP` LIKE '$idP' AND `email` LIKE '$email'";

	if($idVetement != ""){
		$requetSuppressionProduit .= " AND `idVetement` LIKE '$idVetement'";
	}

	$resultUpdate = mysqli_query($db_handle, $requetSuppressionProduit);

	header('Location: panier.php');
?>
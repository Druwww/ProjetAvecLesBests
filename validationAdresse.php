<?php
	// Start the session
	session_start();

	if(!isset($_SESSION["email"])){
		header('Location: index.html');
	}

	$_SESSION["adresseLivraison"] = "OUI";

	$nom = isset($_POST["user_nom"]) ? $_POST["user_nom"] : "";
	$prenom = isset($_POST["user_prenom"]) ? $_POST["user_prenom"] : "";
	$ad1 = isset($_POST["user_ad1"]) ? $_POST["user_ad1"] : "";
	$pays = isset($_POST["user_pays"]) ? $_POST["user_pays"] : "";
	$CP = isset($_POST["user_CP"]) ? $_POST["user_CP"] : "";
	$tel = isset($_POST["user_tel"]) ? $_POST["user_tel"] : "";

	if($nom == ""){
		$_SESSION["adresseLivraison"] = "";
	}else if($prenom == ""){
		$_SESSION["adresseLivraison"] = "";
	}else if($ad1 == ""){
		$_SESSION["adresseLivraison"] = "";
	}else if($pays == ""){
		$_SESSION["adresseLivraison"] = "";
	}else if($CP == ""){
		$_SESSION["adresseLivraison"] = "";
	}else if($tel == ""){
		$_SESSION["adresseLivraison"] = "";
	}else{
		$_SESSION["adresseLivraison"] = "OUI";
	}

	header('Location: paiement.php');
?>
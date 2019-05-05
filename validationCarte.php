<?php
	// Start the session
	session_start();

	if(!isset($_SESSION["email"])){
		header('Location: index.html');
	}

	$_SESSION["validationPayement"] = "OUI";

	$carte = isset($_POST["carte"]) ? $_POST["carte"] : "";
	$date = isset($_POST["date"]) ? $_POST["date"] : "";
	$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
	$cvv = isset($_POST["cvv"]) ? $_POST["cvv"] : "";

	if($carte == ""){
		$_SESSION["validationPayement"] = "";
	}else if($date == ""){
		$_SESSION["validationPayement"] = "";
	}else if($nom == ""){
		$_SESSION["validationPayement"] = "";
	}else if($cvv == ""){
		$_SESSION["validationPayement"] = "";
	}

	header('Location: paiement.php');
?>
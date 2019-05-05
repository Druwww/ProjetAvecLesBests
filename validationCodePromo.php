<?php
	// Start the session
	session_start();

	if(!isset($_SESSION["email"])){
		header('Location: index.html');
	}

	$promo = isset($_POST["promo"]) ? $_POST["promo"] : "";

	if($promo == "BOUFFE"){
		$_SESSION["Promo"] = 10;
	}else if($promo == "LN"){
		$_SESSION["Promo"] = 50;
	}

	header('Location: paiement.php');
?>
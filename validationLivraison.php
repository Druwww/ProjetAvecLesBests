<?php
	// Start the session
	session_start();

	if(!isset($_SESSION["email"])){
		header('Location: index.html');
	}

	$_SESSION["validationLivraison"] = "OUI";

	$modeLivraison = isset($_POST["modeLivraison"]) ? $_POST["modeLivraison"] : "";

	if($modeLivraison == ""){
		$_SESSION["validationLivraison"] = "";
	}else{
		if($modeLivraison == "payant"){
			$_SESSION["Livraison"] = 10;
		}
	}

	header('Location: paiement.php');
?>
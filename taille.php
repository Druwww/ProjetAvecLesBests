<?php
	// Start the session
	session_start();

	if(!isset($_SESSION["email"])){
		//header('Location: index.html');
	}
	
	//$idP = $_GET['produit'];
	$taille = isset($_POST["taile"]) ? $_POST["taille"] : "";
	
	//echo "idP = " . $idP ; 
	echo "<br>Taille = " . $taille;
	
	//header('Location: taille.php?produit=' . $idP . '&taille=' . $taille);
	
?>
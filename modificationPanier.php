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

	$idP = isset($_GET["produit"]) ? $_GET["produit"] : "";
	$idVetement = isset($_GET["vetement"]) ? $_GET["vetement"] : "";
	$newQuantity = isset($_POST["quantite"]) ? $_POST["quantite"] : "";

	$requetModificationPanier = "UPDATE `objetpanier` SET `nbArticles` = '$newQuantity' WHERE objetpanier.email = '$email' AND objetpanier.idP = '$idP'";

	if($idVetement != ""){
		$requetModificationPanier .= " AND objetpanier.idVetement = '$idVetement'";
	}

/*	echo $requetModificationPanier;*/
	$resultUpdate = mysqli_query($db_handle, $requetModificationPanier);

	header('Location: panier.php');
?>
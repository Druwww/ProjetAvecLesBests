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

	$categorie = isset($_SESSION["categorie"]) ? $_SESSION["categorie"] : "";
    $souscategorie = isset($_SESSION["souscategorie"]) ? $_SESSION["souscategorie"] : "";
    $recherche = isset($_GET["recherche"]) ? $_GET["recherche"] : "";

    //echo 'resultats : '. $categorie . ' ' . $souscategorie . ' ' . $recherche . '<br>';


    $param = "?";

    if($categorie != ""){
    	$param .= "categorie=" . $categorie;
    }
    if($souscategorie != ""){
    	$param .= "souscategorie=" . $souscategorie;
    }
    if($recherche != ""){
    	$param .= "recherche=" . $recherche;
    }
    $newLink = 'Location: categorie.php' . $param;
/*    echo $newLink;*/

    header($newLink);

?>
<?php  
	//identifier votre BDD 
	$database = "Amazon";

	$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
	$prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
	$pseudo = isset($_POST["pseudo"]) ? $_POST["pseudo"] : "";
	$mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
	$ad1 = isset($_POST["ad1"]) ? $_POST["ad1"] : "";
	$ad2 = isset($_POST["ad2"]) ? $_POST["ad2"] : "";
	$pays = isset($_POST["pays"]) ? $_POST["pays"] : "";
	$CP = isset($_POST["CP"]) ? $_POST["CP"] : "";
	$tel = isset($_POST["tel"]) ? $_POST["tel"] : "";

	if($nom == ""){
		echo("alert('Le champ Nom n'est pas remplis !')");
	}else if($prenom == ""){
		echo("alert('Le champ Prenom n'est pas remplis !')");
	}else if($pseudo == ""){
		echo("alert('Le champ Pseudo n'est pas remplis !')");
	}else if($mail == ""){
		echo("alert('Le champ E-mail n'est pas remplis !')");
	}else if($ad1 == ""){
		echo("alert('Le champ Adresse 1 n'est pas remplis !')");
	}else if($pays == ""){
		echo("alert('Le champ Pays n'est pas remplis !')");
	}else if($CP == ""){
		echo("alert('Le champ Code Postal n'est pas remplis !')");
	}else if($tel == ""){
		echo("alert('Le champ Telephone n'est pas remplis !')");
	}

	//connectez-vous dans la BDD
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);


	if($db_found){
		echo 'BD found'
	}
	else{
		echo 'BD not found';
	}
?>
<?php  
	//identifier votre BDD 
	$database = "Amazon";

	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);


	if($db_found){
		$statut = isset($_POST["type"]) ? $_POST["type"] : "client";
		$nom = isset($_POST["user_nom"]) ? $_POST["user_nom"] : "";
		$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";
		$prenom = isset($_POST["user_prenom"]) ? $_POST["user_prenom"] : "";
		$pseudo = isset($_POST["user_pseudo"]) ? $_POST["user_pseudo"] : "";
		$mail = isset($_POST["user_mail"]) ? $_POST["user_mail"] : "";
		$ad1 = isset($_POST["user_ad1"]) ? $_POST["user_ad1"] : "";
		$ad2 = isset($_POST["user_ad2"]) ? $_POST["user_ad2"] : "";
		$pays = isset($_POST["user_pays"]) ? $_POST["user_pays"] : "";
		$CP = isset($_POST["user_CP"]) ? $_POST["user_CP"] : "";
		$tel = isset($_POST["user_tel"]) ? $_POST["user_tel"] : "";

		$checkslq = "SELECT `email` FROM `Compte` WHERE `email` LIKE '$mail'";

		$result = mysqli_query($db_handle, $checkslq);

		if(mysqli_num_rows($result) != 0){
			echo "<script>alert('Un compte avec cette adresse est deja utilise !');</script>";
			echo "<script>window.close();</script>";
		}
		else{
			$addsql = "INSERT INTO `compte` (`email`, `pseudo`, `mdp`, `statut`, `nom`, `prenom`, `adLine1`, `adLine2`, `numTel`, `photoProfil`, `imageFond`, `pays`, `codePostal`) VALUES ('$mail', '$pseudo', '$mdp', '$statut', '$nom', '$prenom', '$ad1', '$ad2', '$tel', 'img/random.jpg', 'img/pdcRandom.jpg', '$pays', '$CP')";
			$result2 = mysqli_query($db_handle, $addsql);
			echo "<script>alert('Compte Creer, veillez vous conneter');</script>";
			echo "<script>window.close();</script>";
		}

	}
	else{
		echo 'BD not found';
	}

	mysqli_close($db_handle);	
?>
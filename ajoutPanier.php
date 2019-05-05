<?php  

	session_start();

	$quantity = isset($_POST["quantite"]) ? $_POST["quantite"] : "";
	$taille = isset($_POST["taille"]) ? $_POST["taille"] : "";
	$couleur = isset($_POST["couleur"]) ? $_POST["couleur"] : "";


	if($taille != "" && $couleur != ""){
		$categorie = "Vetement";
	}else{
		$categorie = "";
	}

	//identifier votre BDD
	$database = "Amazon";

	//connectez-vous dans la BDD
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if(!$db_found){
		echo "<script>alert('FAIL : Not connected to bdd');</script>";
	}
	if(!isset($_SESSION["produitView"])){
		echo "<script>alert('FAIL : idP Not reconnize');</script>";
	}

	$idP = $_SESSION["produitView"];
	$email = $_SESSION["email"];

	if($quantity <= 0){
		echo "<script>alert('Attention, vous avez rentre un mauvais nombre de produit');</script>";
		
	}else{

		if($categorie == "Vetement"){
			$requetteTrouverVetement = "SELECT * FROM `objetvetement` WHERE `idP` LIKE '$idP' AND `taille` LIKE '$taille' AND `couleur` LIKE '$couleur'";
			$resultatTrouverVetement = mysqli_query($db_handle, $requetteTrouverVetement);
			while($dataVetement = mysqli_fetch_assoc($resultatTrouverVetement)){
				$idVetement = $dataVetement["idVetement"];
			}
		}else{
			$idVetement = 0;
		}

		$requetteVerificationAchat = "SELECT * FROM `objetpanier` WHERE `email` LIKE '$email' AND `idP` LIKE '$idP' AND `idVetement` LIKE '$idVetement'";
		$resultVerificationAchat = mysqli_query($db_handle, $requetteVerificationAchat);

		if(mysqli_num_rows($resultVerificationAchat) == 0){

			//vetement
			$requetteAjout = "INSERT INTO `objetpanier` (`email`, `idP`, `idVetement`, `nbArticles`) VALUES ('$email', '$idP', '$idVetement', '$quantity')";

			$resultAjout = mysqli_query($db_handle, $requetteAjout);
			echo "<script>alert('Normalement c'est bon !);</script>";
		}else{	//sinon il avait déja acheté 
			while ($dataPrecedentAchat = mysqli_fetch_assoc($resultVerificationAchat)) {
				$oldValueAchat = $dataPrecedentAchat["nbArticles"];
				$newValueAchat = $oldValueAchat + $quantity;

				$requetteUpdateAchat = "UPDATE `objetpanier` SET `nbArticles` = '$newValueAchat' WHERE objetpanier.email = '$email' AND objetpanier.idP = '$idP' AND objetpanier.idVetement = '$idVetement'";
				$resultUpdate = mysqli_query($db_handle, $requetteUpdateAchat);
			}
		}
	}
	header('Location: FicheProduit.php?produit=' . $idP);
?>
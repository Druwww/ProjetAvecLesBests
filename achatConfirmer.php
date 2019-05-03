<?php
	// Start the session
	session_start();

	if(!isset($_SESSION["email"])){
		header('Location: index.html');
	}

	$email = $_SESSION["email"];

	$database = "Amazon";

	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if(! $db_found){
		echo "<script>alert('Echec connexion BDD !');</script>";
	}else{
		$requetteAllProduitPanier = "SELECT * FROM `objetpanier` WHERE `email` LIKE '$email'";
		$resultatAllProduitPanier = mysqli_query($db_handle, $requetteAllProduitPanier);

		while($dataProduit = mysqli_fetch_assoc($resultatAllProduitPanier)){
			$idP = $dataProduit["idP"];
			$idVetement = $dataProduit["idVetement"];
			$quantite = $dataProduit["nbArticles"];

			//recuperation d'informations
			$requetteInformationProduit = "SELECT * FROM `produit` WHERE `idP` LIKE '$idP'";
			$resultatInformationProduit = mysqli_query($db_handle, $requetteInformationProduit);

			while($dataInformationProduit = mysqli_fetch_assoc($resultatInformationProduit)){
				$prix = $dataInformationProduit["prix"];
				$nbVenduAncien = $dataInformationProduit["nbVendu"];
				$emailVendeur = $dataInformationProduit["emailVendeur"];
			}

			$nbVenduNouveau = $nbVenduAncien + $quantite;

			//changement nbVente produit
			$requetteUpdateVente = "UPDATE `produit` SET `nbVendu` = '$nbVenduNouveau' WHERE `idP` = '$idP'";
			$resultatUpdateVente = mysqli_query($db_handle, $requetteUpdateVente);
			//si c'est un vetement
			if($idVetement != 0){
				$requetteUpdateVetement = "UPDATE `objetvetement` SET `nbDispo` = `nbDispo`  - '$quantite' WHERE `idVetement` LIKE '$idVetement'";
				$resutlatUpdateVetement = mysqli_query($db_handle, $requetteUpdateVetement);
			}

			//changement gain vendeur
			$gainSuppVendeur = $quantite * $prix;

			$requetteUpdateGain = "UPDATE `statvendeur` SET `gain` = `gain` + '$gainSuppVendeur' WHERE `email` = '$emailVendeur'";
			$resultatUpdateGain = mysqli_query($db_handle, $requetteUpdateGain);

			//retire les articles du pannier

			$requetteDeleteObjetPanier = "DELETE FROM `objetpanier` WHERE `email` LIKE '$email' AND `idP` LIKE '$idP' AND `idVetement` LIKE '$idVetement'";
			$resultatDeleteObjetPanier = mysqli_query($db_handle, $requetteDeleteObjetPanier);
		}
	}

	echo '<script>alert("Votre achat est confirme ! cliquez sur le bouton pour revenir a l accueil !")</script>';
	echo '<a href="AccueilClient.php"><button">Retour accueil</button></a>';

?>
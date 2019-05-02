<?php  

	session_start();

	$quantity = isset($_POST["quantite"]) ? $_POST["quantite"] : "";

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
		
	}else if($quantity > $_SESSION["nbProduitDispo"]){
		echo "<script>alert('Attention, vous avez demande trop de produit pas rapport à ses dispo');</script>";

	}else{

		$requetteVerificationAchat = "SELECT * FROM `objetpanier` WHERE `email` LIKE '$email' AND `idP` LIKE '$idP'";
		$resultVerificationAchat = mysqli_query($db_handle, $requetteVerificationAchat);

		if(mysqli_num_rows($resultVerificationAchat) == 0){
			$requetteAjout = "INSERT INTO `objetpanier` (`email`, `idP`, `nbArticles`) VALUES ('$email', '$idP', '$quantity')";
			$resultAjout = mysqli_query($db_handle, $requetteAjout);
			echo "<script>alert('Normalement c'est bon !);</script>";
		}else{	//sinon il avait déja acheté 
			while ($dataPrecedentAchat = mysqli_fetch_assoc($resultVerificationAchat)) {
				$oldValueAchat = $dataPrecedentAchat["nbArticles"];
				$newValueAchat = $oldValueAchat + $quantity;

				$requetteUpdateAchat = "UPDATE `objetpanier` SET `nbArticles` = '$newValueAchat' WHERE objetpanier.email = '$email' AND objetpanier.idP = '$idP'";
				echo "<br>Requette : ";
				$resultUpdate = mysqli_query($db_handle, $requetteUpdateAchat);
			}
		}


		
	}


	header('Location: FicheProduit.php?produit=' . $idP);

?>
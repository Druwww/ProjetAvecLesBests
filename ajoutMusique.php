<?php
// Start the session
session_start();

	$style = isset($_POST["Style"]) ? $_POST["Style"] : "client";
	$titre = isset($_POST["Titre"]) ? $_POST["Titre"] : "";
	$artiste = isset($_POST["Artiste"]) ? $_POST["Artiste"] : "";
	$dateParution = isset($_POST["Date"]) ? $_POST["Date"] : 0;
	$description = isset($_POST["Description"]) ? $_POST["Description"] : "";
	$prix = isset($_POST["Prix"]) ? $_POST["Prix"] : 0;
	$quantite = isset($_POST["Quantité"]) ? $_POST["Quantité"] : 0;
	$image1 = isset($_SESSION["photoProduit1"]) ? $_SESSION["photoProduit1"] : "";
	$image2 = isset($_SESSION["photoProduit2"]) ? $_SESSION["photoProduit2"] : "";
	$image3 = isset($_SESSION["photoProduit3"]) ? $_SESSION["photoProduit3"] : "";

	
	
	$erreur = "";
	$emailVendeur = $_SESSION["email"];
	
	//Si les champs ne sont pas remplis, on ajoute les erreurs
	if($titre=="")
	{
		$erreur .= "Le champ titre est vide. <br>";
	}
	if($artiste=="")
	{
		$erreur .= "Le champ artiste est vide. <br>";
	}
	if($dateParution==0)
	{
		$erreur .= "Le champ date de parution est vide. <br>";
	}
	if($description=="")
	{
		$erreur .= "Le champ description est vide. <br>";
	}
	if($prix==0)
	{
		$erreur .= "Le champ prix est vide. <br>";
	}
	if($quantite==0)
	{
		$erreur .= "Le champ quantite est vide. <br>";
	}
	if($image1=="")
	{
		$erreur .= "Le champ image1 est vide. <br>";
	}


	
//s'il n'y a pas d'erreur
if($erreur == ""){
	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');

	
	//identifier le nom de la BDD
	$database = "Amazon";

	//se connecter à la BDD
	//$db_handle = mysql_connect(localhost,root,'');
	$db_handle = mysqli_connect(DB_SERVER, DB_USER ,DB_PASS);
	$db_found = mysqli_select_db($db_handle, $database);

	//si la BDD existe, faire le traitement
	if($db_found)
	{
		$nbVendu = 0;
		$categorie = "Musique";
		//On créer dans produit
		$sqlAjout = "INSERT INTO `produit` (`emailVendeur`, `nom`, `categorie`, `description`, `prix`, `nbVendu`, `nbDispo`)
		VALUES ('$emailVendeur', '$titre', '$categorie' , '$description' , '$prix', '$nbVendu', '$quantite')";
		echo $sqlAjout;
		$ajout = mysqli_query($db_handle, $sqlAjout);
		
		if($ajout)
			echo "J'ai reussi à l'ajouter !!!";
		else
			echo "J'ai pas reussi à l'ajouter";
		
		//on retrouve le produit pour avoir son ID Produit
		$sqlRecherche = "SELECT * FROM `produit` WHERE `emailVendeur` = '$emailVendeur' AND `nom` = '$titre' AND `categorie` = 'Musique' AND `description` = '$description' AND `prix` = '$prix' AND `nbVendu` = '0' AND `nbDispo`= '$quantite'";
		$resultRecherche = mysqli_query($db_handle, $sqlRecherche);
		
		if($resultRecherche)
			echo "J'ai reussi à le trouver !!!";
		else
			echo "J'ai pas reussi à le trouver";
		
		
		while ($dataMusique = mysqli_fetch_assoc($resultRecherche)) {
		    $myID = $dataMusique["idP"];
		 }
		
		$sqlAjout2 = "INSERT INTO `infomusique` (`idP`, `artiste`, `anneeParution`, `genre`) 
			VALUES ('$myID', '$artiste', '$dateParution' , '$style')";
		$ajout2 = mysqli_query($db_handle, $sqlAjout2);
		
		///Ajouter la photo
		$sqlAjout3 = "INSERT INTO `photo` (`idP`, `lienPhoto`) 
			VALUES ('$myID','$image1')";
		$ajout3 = mysqli_query($db_handle, $sqlAjout3);
		
		if($image2 != "")
		{
			$sqlAjout4 = "INSERT INTO `photo` (`idP`, `lienPhoto`) 
			VALUES ('$myID','$image2')";
			$ajout4 = mysqli_query($db_handle, $sqlAjout4);
		}
		if($image3 != "")
		{
			$sqlAjout5 = "INSERT INTO `photo` (`idP`, `lienPhoto`) 
			VALUES ('$myID','$image3')";
			$ajout5 = mysqli_query($db_handle, $sqlAjout5);
		}
		
	} //end if
	else //si la BDD n'existe passthru
	{
		echo "Database not found";
	} //end else
		
	header('Location: MesProduitsVendeur.php');

	//fermer la connection
	mysqli_close($db_handle);
}
else
	echo $erreur;

?>

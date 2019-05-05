<?php
	$identificationProduit = $_GET["produit"];
	

	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');


	//identifier le nom de la BDD
	$database = "Amazon";

	//se connecter à la BDD
	//$db_handle = mysql_connect(localhost,root,'');
	$db_handle = mysqli_connect(DB_SERVER, DB_USER ,DB_PASS);
	$db_found = mysqli_select_db($db_handle, $database);
	
	//Tout d'abord on regarde la catégorie du produit
	$sql = "SELECT * FROM produit WHERE idP = '$identificationProduit'";
	$result = mysqli_query($db_handle, $sql);
	
	if (mysqli_num_rows($result) == 0) {
		//le produit recherché n'existe pas
		echo "Il n'y a pas de produit";
	} 
	else {
		//on trouve le prduit recherché
		while ($dataProduit = mysqli_fetch_assoc($result)) {
			$categorie = $dataProduit["categorie"];
		}
	}
	
	
	//on le détruit dans la BDD produit
	$addsql = "DELETE FROM produit WHERE idP = '$identificationProduit'";
	$result1 = mysqli_query($db_handle, $addsql);
	
	//on détruit ses photos
	$addsq2 = "DELETE FROM photo WHERE idP = '$identificationProduit'";
	$result2 = mysqli_query($db_handle, $addsq2);
	
	//on détruit des paniers des clients
	$addsq3 = "DELETE FROM objetpanier WHERE idP = '$identificationProduit'";
	$result3 = mysqli_query($db_handle, $addsq3);
	
	//en fonction de la categorie :
	if($categorie == "Livre")
	{//si c'est un livre
		$addsq4 = "DELETE FROM infolivre WHERE idP = '$identificationProduit'";
		$result4 = mysqli_query($db_handle, $addsq4);
	}
	else if($categorie == "Vetement")
	{//si c'est un vetement
		//on supprime le vetement
		$addsq4 = "DELETE FROM infovetement WHERE idP = '$identificationProduit'";
		$result4 = mysqli_query($db_handle, $addsq4);
		
		//on supprime ses photos
		$addsq5 = "DELETE FROM objetvetement WHERE idP = '$identificationProduit'";
		$result5 = mysqli_query($db_handle, $addsq5);
	}
	else if($categorie == "Musique")
	{//si c'est une musique
		$addsq4 = "DELETE FROM infomusique WHERE idP = '$identificationProduit'";
		$result4 = mysqli_query($db_handle, $addsq4);
	}
	else if($categorie == "SL")
	{//si c'est un SL
		$addsq4 = "DELETE FROM infosl WHERE idP = '$identificationProduit'";
		$result4 = mysqli_query($db_handle, $addsq4);
	}
	
	header("Location: MesProduitsVendeur.php");
	
	//fermer la connection
	mysqli_close($db_handle);

	
?>
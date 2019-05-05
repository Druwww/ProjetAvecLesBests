<?php
// Start the session
session_start();

$IDProduit = $_GET["produit"];

//recuperer les données venant de la page HTML
//le parametre de $_POST = "name" de <input> de votre page HTML
$couleur = isset($_POST["couleur"])? $_POST["couleur"] : "";
$taille = isset($_POST["taille"])? $_POST["taille"] : "";
$nombre = isset($_POST["stock"])? $_POST["stock"] : 0;

	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');

	///$sqlModif = "UPDATE produit SET post = post + 1 WHERE idp = '$IDProduit'";
	
	//identifier le nom de la BDD
	$database = "Amazon";

	//se connecter à la BDD
	//$db_handle = mysql_connect(localhost,root,'');
	$db_handle = mysqli_connect(DB_SERVER, DB_USER ,DB_PASS);
	$db_found = mysqli_select_db($db_handle, $database);

	//si la BDD existe, faire le traitement
	if($db_found)
	{
		$sqlModifProduit = "UPDATE produit SET nbDispo = nbDispo + '$nombre' WHERE idP = '$IDProduit'";
		$modifProduit = mysqli_query($db_handle, $sqlModifProduit);
		
		
		$sqlRecherche = "SELECT * FROM objetvetement WHERE idP = '$IDProduit' AND couleur = '$couleur' AND taille = '$taille'";
		$RechercheObjet = mysqli_query($db_handle, $sqlRecherche);
		if (mysqli_num_rows($RechercheObjet) == 0) {
			//le compte recherché n'existe pas
			$addsql = "INSERT INTO `objetvetement` (`idP`, `couleur`, `taille`, `nbDispo`) 
			VALUES ('$IDProduit', '$couleur', '$taille', '$nombre')";
			$addToTable = mysqli_query($db_handle, $addsql);
		} 
		else
		{
			$sqlModifObjet = "UPDATE objetvetement SET nbDispo = nbDispo + '$nombre' WHERE idP = '$IDProduit' AND couleur = '$couleur' AND taille = '$taille'";
			$modifObjet = mysqli_query($db_handle, $sqlModifObjet);
		}
	} //end if
	else //si la BDD n'existe passthru
	{
		echo "Database not found";
	} //end else
		
	header('Location: MesProduitsVendeur.php');

	//fermer la connection
	mysqli_close($db_handle);


?>
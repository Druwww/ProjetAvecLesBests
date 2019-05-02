<?php
// Start the session
session_start();

$IDProduit = $_GET["produit"];
$nombre = isset($_POST["stock"])? $_POST["stock"] : 0;

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
		$sqlModifProduit = "UPDATE produit SET nbDispo = nbDispo + '$nombre' WHERE idP = '$IDProduit'";
		$modifProduit = mysqli_query($db_handle, $sqlModifProduit);
	} //end if
	else //si la BDD n'existe passthru
	{
		echo "Database not found";
	} //end else
		
	header('Location: MesProduitsVendeur.php');

	//fermer la connection
	mysqli_close($db_handle);

?>
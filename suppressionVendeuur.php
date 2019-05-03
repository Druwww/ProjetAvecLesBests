<?php

///ICI ON DEVRAIT FAIRE UN BLINDAGE POUR SAVOIR SI LE COMPTE ACTUELLE EST BIEN ADMIN
$emailVendeur = $_GET["emailVendeur"];

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
		$sqlSupp = "DELETE FROM compte WHERE email = '$emailVendeur'";
		$result = mysqli_query($db_handle, $sqlSupp);
		
		$sqlSuppBIS = "DELETE FROM statvendeur WHERE email = '$emailVendeur'";
		$resultBIS = mysqli_query($db_handle, $sqlSuppBIS);
		
		header("Location: MesVendeursAdmin.php");
	} //end if
	else //si la BDD n'existe passthru
	{
		echo "Database not found";
	} //end else

	//fermer la connection
	mysqli_close($db_handle);

?>
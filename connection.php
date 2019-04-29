<?php
// Start the session
session_start();

//recuperer les données venant de la page HTML
//le parametre de $_POST = "name" de <input> de votre page HTML
$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";

$erreur = "";


//Si les champs ne sont pas remplis, on ajoute les erreurs
if($pseudo=="")
{
   $erreur .= "Le champ pseudo est vide. <br>";
}
if($email=="")
{
   $erreur .= "Le champ email est vide. <br>";
}

//s'il n'y a pas d'erreur
if($erreur == "")
{
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
		$sql = "SELECT * FROM Compte";
		if ($email != "") {
			//on cherche le compte avec les paramètres email et le pseudo
			$sql .= " WHERE email LIKE '$email'";
			if ($pseudo != "") {
				$sql .= " AND pseudo LIKE '$pseudo'";
			}
		}
		$result = mysqli_query($db_handle, $sql);
		//regarder s'il y a de résultat
		if (mysqli_num_rows($result) == 0) {
			//le compte recherché n'existe pas
			echo "email not found";
		} 
		else {
			//on trouve le compte recherché
			$_SESSION["email"] = $email;
			// lien pour renvoyer vers la page d'accueil de l'espace client
			include('PageMDP.html');
		}
	} //end if
	else //si la BDD n'existe passthru
	{
		echo "Database not found";
	} //end else

	//fermer la connection
	mysqli_close($db_handle);

}
else //s'il y a une erreur dans les champs
{
   echo $erreur;
}

?>
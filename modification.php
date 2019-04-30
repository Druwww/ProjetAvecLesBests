<?php  

	// Start the session
	if(!isset($_SESSION)){ session_start(); }
	$email = $_SESSION["email"];

	echo "email : ". $email;
	
	
	//identifier votre BDD 
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, "amazon");


	if($db_found){
		
		$nom = isset($_POST["user_nom"]) ? $_POST["user_nom"] : "";
		$prenom = isset($_POST["user_prenom"]) ? $_POST["user_prenom"] : "";
		$pseudo = isset($_POST["user_pseudo"]) ? $_POST["user_pseudo"] : "";
		$ad1 = isset($_POST["user_ad1"]) ? $_POST["user_ad1"] : "";
		$ad2 = isset($_POST["user_ad2"]) ? $_POST["user_ad2"] : "";
		$pays = isset($_POST["user_pays"]) ? $_POST["user_pays"] : "";
		$CP = isset($_POST["user_CP"]) ? $_POST["user_CP"] : "";
		$tel = isset($_POST["user_tel"]) ? $_POST["user_tel"] : "";

		//$checkslq = "SELECT `email` FROM `Compte` WHERE `email` LIKE '$email'";

		//$result = mysqli_query($db_handle, $checkslq);
		
		if($nom != "")
		{
			$addsql = "UPDATE compte
						SET nom= '$nom'
						WHERE email= '$email'" ;
			$result1 = mysqli_query($db_handle, $addsql);
			$_SESSION["nom"] = $nom;
		}
		if($prenom != "")
		{
			$addsq4 = "UPDATE compte
					SET prenom = '$prenom'
					WHERE compte.email = '$email'";
			$result4 = mysqli_query($db_handle, $addsq4);
			$_SESSION["prenom"] = $prenom;
		}
		if($pseudo != "")
		{
			$addsq4bis = "UPDATE `compte`
					SET pseudo = '$pseudo'
					WHERE compte.email = '$email'";
			$result4bis = mysqli_query($db_handle, $addsq4bis);
			$_SESSION["pseudo"] = $pseudo;
		}
		if($ad1 != "")
		{
			$addsq5 = "UPDATE `compte`
					SET adLine1 = '$ad1'
					WHERE compte.email = '$email'";
			$result5 = mysqli_query($db_handle, $addsq5);
			$_SESSION["adresse1"] = $ad1;
		}
		if($ad2 != "")
		{
			$addsq6 = "UPDATE `compte`
					SET adLine2 = '$ad2'
					WHERE compte.email = '$email'";
			$result6 = mysqli_query($db_handle, $addsq6);
			$_SESSION["adresse2"] = $ad2;
		}
		if($pays != "")
		{
			$addsq7 = "UPDATE `compte`
					SET pays = '$pays'
					WHERE compte.email = '$email'";
			$result7 = mysqli_query($db_handle, $addsq7);
			$_SESSION["pays"] = $pays;
		}
		if($CP != "")
		{
			$addsq8 = "UPDATE `compte`
					SET codePostal = '$CP'
					WHERE compte.email = '$email'";
			$result8 = mysqli_query($db_handle, $addsq8);
			$_SESSION["codePostal"] = $CP;
		}
		if($tel != "")
		{
			$addsq9 = "UPDATE `compte`
					SET numTel = '$tel'
					WHERE compte.email = '$email'";
			$result9 = mysqli_query($db_handle, $addsq9);
			$_SESSION["numTel"] = $tel;
		}
		
		
		
		
		include('FichePerso.php');
		///ATTENTION IL FAUT AUSSI MODIFIER DANS LA SESSION !!!!!

	}
	else{
		echo 'BD not found';
	}

	mysqli_close($db_handle);	
?>
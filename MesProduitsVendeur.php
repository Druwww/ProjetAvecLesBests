<?php
	// Start the session
	if(!isset($_SESSION)){ session_start(); }

	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	
	if(!isset($_SESSION["photoProduit1"]))
		$_SESSION["photoProduit1"]= NULL;
	if(!isset($_SESSION["photoProduit2"]))
		$_SESSION["photoProduit2"] = NULL;
	if(!isset($_SESSION["photoProduit3"]))
		$_SESSION["photoProduit3"] = NULL;

	//identifier le nom de la BDD
	$database = "Amazon";

	//se connecter à la BDD
	//$db_handle = mysql_connect(localhost,root,'');
	$db_handle = mysqli_connect(DB_SERVER, DB_USER ,DB_PASS);
	$db_found = mysqli_select_db($db_handle, $database);

	//si la BDD existe, faire le traitement
	if($db_found)
	{
		$email = $_SESSION["email"];
		$sql = "SELECT * FROM statvendeur WHERE email = '$email'";
		$result = mysqli_query($db_handle, $sql);
			

		//regarder s'il y a de résultat
		if (mysqli_num_rows($result) == 0) {
			//le compte recherché n'existe pas
			echo "Il n'y a pas de produit";
		} 
		else {
			//on trouve le compte recherché
			while ($dataRecherche = mysqli_fetch_assoc($result)) {
				$gain = $dataRecherche["gain"];
			}
		}
	} //end if
	else //si la BDD n'existe passthru
	{
		echo "Database not found";
	} //end else

	//fermer la connection
	mysqli_close($db_handle);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mes Produits</title>
	<link rel="icon" href="img/favicon.png" />
	<link rel="stylesheet" type="text/css" href="styles5.css">
	<link rel="stylesheet" type="text/css" href="stylesBase2.css">
</head>
<body>
		<ul class="navigation1">
				  <div class = "detail1">
				  	<tr><br>
						<a href="AccueilClientOuvertureFichePerso.php"><button class="button button1">Mon Compte</button></a>
					</tr>
					<tr>
						<img src="img/monCompte.png" style="width:50px;height:40px;" class = "detailImg">
					</tr>
				  	 <tr>
						<a href="panier.php"><button class="button button1">Mon Panier</button></a>
					</tr>
					<tr>
						<img src="img/panier.png" style="width:45px;height:40px;" class = "detailImg">
					</tr>
				  </div>
				  
		</ul>

		<nav class="navbarCouleur"> 
					<a href="AccueilClient.php"><img src="img/LogoSite.png" alt="Logo" class ="logo"></a> 
				</nav>


				<p class="slogan"> <img src="img/slogan.png" alt="Logo" style="width:500px;height:80;"></p>


	<div class="row">
  		<div class="column">
			<section class ="miseenforme">
			    <ul>
			    	<br>
			    	<br>
			    	<br>
					<?php
						echo "<p><img src='img/money.png' style='width:50px;height:40px;' class = 'detailImg'>Mes gains : " . $gain . " €</p><br><br>"; 
					?>
			      <p><img src="img/product.png" style="width:50px;height:40px;" class = "detailImg">Ajouter un produit<a href=creationProduit.html><img src="img/ajout.png" style="width:50px;height:40px;" class = "detailImg"></a></p>
			    
			    </ul>
			  </section>
			</div>
<div class="column">

<?php
	//identifier le nom de la BDD
	$database = "Amazon";

	//se connecter à la BDD
	//$db_handle = mysql_connect(localhost,root,'');
	$db_handle = mysqli_connect(DB_SERVER, DB_USER ,DB_PASS);
	$db_found = mysqli_select_db($db_handle, $database);

	//si la BDD existe, faire le traitement
	if($db_found)
	{
		$email = $_SESSION["email"];
		$sql = "SELECT * FROM produit WHERE emailVendeur = '$email'";
		$result = mysqli_query($db_handle, $sql);
			

		//regarder s'il y a de résultat
		if (mysqli_num_rows($result) == 0) {
			//le compte recherché n'existe pas
			echo "<p><i>Il n'y a pas de produit</i><p>";
		} 
		else {
			//on trouve le compte recherché
			while ($dataVente = mysqli_fetch_assoc($result)) {
				$nom = $dataVente["nom"];
				$categorie = $dataVente["categorie"];
				$idP = $dataVente["idP"];
				$photoProduitsql = "SELECT * FROM `photo` WHERE `idP` LIKE '$idP'";
				$resultPhotoProduit = mysqli_query($db_handle, $photoProduitsql);
				while ($dataPhoto = mysqli_fetch_assoc($resultPhotoProduit)) {
					$myPhoto = $dataPhoto["lienPhoto"];
				}
				if($categorie != "Vetement") //SI CE N EST PAS UN VETEMENT C EST PLUS SIMPLE
					echo ("<div class='mesProduits'>
					<a href=FicheProduit.php?produit=" . $idP ." >
					<img src=  " . $myPhoto .  " alt='produit1' width='200' height='300'>
					</a>
					<div class='desc'>" . $nom . "<br>" . $categorie . "<br> Supprimer le produit <a href=deleteProduit.php?produit=" . $idP ."><img src='img/supprimer.png' style='width:25px;height:20px;' class = 'detailImg'></a>
					<br> Ajouter du stock <form action='AjoutStock.php?produit=" . $idP ."' method='post'><input type='number' id='stock' name='stock'
						min='0' style='width:25px;' ><tr>
						<button class='button button1'>Ajouter</button>
					</tr>
					</form>
					</div>
					</div>");
				else // SI C EST UN VETEMENT C EST PLUS COMPLIQUE
				{
					$sqlVetement = "SELECT * FROM objetvetement WHERE idP = '$idP'";
					$resultVetement = mysqli_query($db_handle, $sqlVetement);
		
					$ensembleCouleur = array();
					
					while ($dataVetement = mysqli_fetch_assoc($resultVetement)) {
						$myColor = $dataVetement["couleur"];
						if(count($ensembleCouleur) == 0)
						{
							$ensembleCouleur[0] = $myColor;
						}
						else
						{
							$trouve = false;
							for($i=0; $i< count($ensembleCouleur); $i++ )
							{
								if($myColor == $ensembleCouleur[$i])
									$trouve = true;
							}
							
							if($trouve == false)
							{
								$ensembleCouleur[count($ensembleCouleur)] = $myColor;
							}
						}
					
					}
		
					echo ("<div class='mesProduits'>
					<a href=FicheProduit.php?produit=" . $idP ." >
					<img src=  " . $myPhoto .  " alt='Forest' width='200' height='300'>
					</a>
					<div class='desc'>" . $nom . "<br>" . $categorie . "<br> Supprimer le produit <a href=deleteProduit.php?produit=" . $idP ."><img src='img/supprimer.png' style='width:25px;height:20px;' class = 'detailImg'></a>
					<br>Ajouter du stock <form action='AjoutStockVetement.php?produit=" . $idP ."' method='post'><br><input type='number' id='stock' name='stock' min='0' style='width:25px;' ></a> <select name ='couleur'>"); 
					
					for($i = 0; $i < count($ensembleCouleur) ; $i++)
					{
						echo "<option value=" . $ensembleCouleur[$i] ." >" . $ensembleCouleur[$i] . "</option>";
					}
					echo "</select></td>
					<select name ='taille'>
			  		<option value='S'>S</option>
			  		<option value='M'>M</option>
			  		<option value='L'>L</option>
					</select><br></td>
					<tr>
						<button class='button button1'>Ajouter</button>
					</tr>
					</form>
					</div>
					</div>";
				}
			}
		}
	} //end if
	else //si la BDD n'existe passthru
	{
		echo "Database not found";
	} //end else

	//fermer la connection
	mysqli_close($db_handle);
?>
</div>

</div>
</div>


<div class="footer">
 <p><a href="equipe"><p class = "style1">Mieux nous connaitre</p></a><img src="img/coeur.png" style="width:50px;height:40px;" class = "detailImg"> &copy; 2019 Copyright | Amazon ECE<img src="img/coeur.png" style="width:50px;height:40px;" class = "detailImg"><p>
 	
</div>
<div class="message">
  <div class="message-header">Mes produits<img src="img/star.png" style="width:50px;height:40px;" class = "detailImg"></div>
  <span class="fermeture" onclick="this.parentElement.style.display='none';">×</span>
  <div class="message-container">
    <p>Bienvenue sur la page qui récapitule tous les produits que vous mettez en vente. Vous pouvez en ajouter et en supprimer. </p>
    <p>Consulter aussi le gain en euro de tous les produits vendus.</p>
  </div>
</div>
</body>
</html>
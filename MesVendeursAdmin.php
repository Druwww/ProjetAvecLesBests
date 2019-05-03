<?php
	// Start the session
	if(!isset($_SESSION)){ session_start(); }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mes Vendeurs</title>
<title>Mes Produits</title>
	<link rel="icon" href="img/favicon.png" />
	<link rel="stylesheet" type="text/css" href="styles6.css">
</head>
<body>
		<ul class="navigation1">
				  <li class = "detail1"><a href="#monCompte" class = "detail2">Mon Compte<img src="img/monCompte.png" style="width:45px;height:40px;" class = "detailImg"></a></li>
				  <li class = "detail1"><a href="#panier" class = "detail2">Mon Panier<img src="img/panier.png" style="width:42px;height:40px;" class = "detailImg"></a></li>
		</ul>

		<nav class="navbarCouleur"> 
			<a href="AccueilClient.php"><img src="img/LogoSite.png" alt="Logo" style="width:400px;height:160px;"></a> 
		</nav>
		<p class="slogan"> Là où tout achat est possible</p>

		<section class ="miseenforme">
   			 <ul>
    	<br>
    	<br>
    	<br>
      <p>
      	<img src="img/vendeur.png" style="width:50px;height:40px;" class = "detailImg">Ajouter un vendeur : 
      	<form action="envoyerMail.php" method="post">
			<table>
				<tr>
		        <td><label for="mail">E-mail :</label></td>
		        <td><input type="text" id="mail" name="user_mail"></td>
		    </tr>
		    </table>
		    
		    <br>
		    <tr>
				<button class="button button1">Ajout Vendeur</button>
			</tr>
	</form>
      </p>
    </ul>
  </section>

  
<?php
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
		$sql = "SELECT * FROM Compte WHERE statut = 'vendeur'";
		
		$result = mysqli_query($db_handle, $sql);
		//regarder s'il y a de résultat
		if (mysqli_num_rows($result) == 0) {
			//le compte recherché n'existe pas
			echo "Il n'y a pas de vendeur";
		} 
		else {
			//on trouve le compte recherché
			while ($dataVente = mysqli_fetch_assoc($result)) {
				echo ("<div class='mesVendeurs'>
				<a target='_blank' href=AfficherProfil.php?emailVendeur=" . $dataVente['email'] . ">
					<img src=" . $dataVente['photoProfil'] . " alt='vendeur' width='200' height='300'>
				</a>
				<div class='desc'> " . $dataVente['prenom'] . " " . $dataVente['nom'] . "<br> Supprimer le vendeur <a href=suppressionVendeuur.php?emailVendeur=" . $dataVente['email'] . "><img src='img/supprimer.png' style='width:25px;height:20px;' class = 'detailImg'></a></div>
				</div>");
				
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


<!--
  <div class="mesVendeurs">
  <a target="_blank" href="">
    <img src="img/random.jpg" alt="vendeur" width="200" height="300">
  </a>
  <div class="desc">Description <br> Supprimer le vendeur <a href=""><img src="img/supprimer.png" style="width:25px;height:20px;" class = "detailImg"></a></div>
</div>

<div class="mesVendeurs">
  <a target="_blank" href="">
    <img src="img/random.jpg" alt="vendeur" width="200" height="300">
  </a>
  <div class="desc">Description <br> Supprimer le vendeur <a href=""><img src="img/supprimer.png" style="width:25px;height:20px;" class = "detailImg"></a></div>
</div>

<div class="mesVendeurs">
  <a target="_blank" href="">
    <img src="img/random.jpg" alt="vendeur" width="200" height="300">
  </a>
  <div class="desc">Description <br> Supprimer le vendeur <a href=""><img src="img/supprimer.png" style="width:25px;height:20px;" class = "detailImg"></a></div>
</div>

<div class="mesVendeurs">
  <a target="_blank" href="">
    <img src="img/random.jpg" alt="vendeur" width="200" height="300">
  </a>
  <div class="desc">Description <br> Supprimer le vendeur <a href=""><img src="img/supprimer.png" style="width:25px;height:20px;" class = "detailImg"></a></div>
</div>

<div class="mesVendeurs">
  <a target="_blank" href="">
    <img src="img/random.jpg" alt="vendeur" width="200" height="300">
  </a>
  <div class="desc">Description <br> Supprimer le vendeur <a href=""><img src="img/supprimer.png" style="width:25px;height:20px;" class = "detailImg"></a></div>
</div>

<div class="mesVendeurs">
  <a target="_blank" href="">
    <img src="img/random.jpg" alt="vendeur" width="200" height="300">
  </a>
  <div class="desc">Description <br> Supprimer le vendeur <a href=""><img src="img/supprimer.png" style="width:25px;height:20px;" class = "detailImg"></a></div>
</div>

<div class="mesVendeurs">
  <a target="_blank" href="">
    <img src="img/random.jpg" alt="vendeur" width="200" height="300">
  </a>
  <div class="desc">Description <br> Supprimer le vendeur <a href=""><img src="img/supprimer.png" style="width:25px;height:20px;" class = "detailImg"></a></div>
</div>

<div class="mesVendeurs">
  <a target="_blank" href="">
    <img src="img/random.jpg" alt="vendeur" width="200" height="300">
  </a>
  <div class="desc">Description <br> Supprimer le vendeur <a href=""><img src="img/supprimer.png" style="width:25px;height:20px;" class = "detailImg"></a></div>
</div>

<div class="mesVendeurs">
  <a target="_blank" href="">
    <img src="img/random.jpg" alt="vendeur" width="200" height="300">
  </a>
  <div class="desc">Description <br> Supprimer le vendeur <a href=""><img src="img/supprimer.png" style="width:25px;height:20px;" class = "detailImg"></a></div>
</div>


-->








<div class="message">
  <div class="message-header">Mes vendeurs<img src="img/star.png" style="width:50px;height:40px;" class = "detailImg"></div>
  <span class="fermeture" onclick="this.parentElement.style.display='none';">×</span>
  <div class="message-container">
    <p>Bienvenue sur la page qui récapitule tous les vendeurs que vous avez créé. Vous pouvez en ajouter, en rechercher et en supprimer. </p>
  </div>
</div>


<div class="footer">
 <p><img src="img/coeur.png" style="width:50px;height:40px;" class = "detailImg"> &copy; 2019 Copyright | Amazon ECE<img src="img/coeur.png" style="width:50px;height:40px;" class = "detailImg"><p>
</div>  

</body>
</html>
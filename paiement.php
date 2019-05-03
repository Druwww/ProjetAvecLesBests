<!DOCTYPE html>
<html>
<head>
	<title>Paiement | Amazon ECE</title>
<link rel="icon" href="img/favicon.png" />
	<link rel="stylesheet" type="text/css" href="styles11.css">
	
</head>
<body>

	<?php
			// Start the session
			session_start();

			if(!isset($_SESSION["email"])){
				header('Location: index.html');
			}

			$database = "Amazon";

			$db_handle = mysqli_connect('localhost', 'root', '');
			$db_found = mysqli_select_db($db_handle, $database);

			if(! $db_found){
				echo "<script>alert('Echec connexion BDD !');</script>"; 
			}

		
	?>

		<ul class="navigation1">
				  <div class = "detail1">
				  	<tr>
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

		

<p class = "paiement">PAIEMENT</p>


<div class="row">
	<center> 
		<div class="column">
			<div class = "adresse">
					<p class = "titres">Adresse de livraison</p>

					<?php

						if($_SESSION["adresseLivraison"] == "OUI"){
							echo '<br><p>Votre adresse a bien ete enregistree<p><br>';
						}else{
							echo '<form action="validationAdresse.php" method="post">
								<center>
									<table>
							    
							    <tr>
							        <td><label for="nom">Nom :</label></td>
							        <td><input type="text" id="nom" name="user_nom"></td>
							    </tr>
							    <tr>
							        <td><label for="prenom">Prenom :</label></td>
							        <td><input type="text" id="prenom" name="user_prenom"></td>
							    </tr>
							    
							    <tr>
							        <td><label for="ad1">Adresse 1 : </label></td>
							        <td><input type="text" id="ad1" name="user_ad1"</td>
							    </tr>
							    <tr>
							        <td><label for="ad2">Adresse 2 :</label></td>
							        <td><input type="text" id="ad2" name="user_ad2"></td>
							    </tr>
							      <tr>
							        <td><label for="pays">Pays :</label></td>
							        <td><input type="text" id="pays" name="user_pays"></td>
							    </tr>
							    <tr>
							        <td><label for="CP">Code Postal :</label></td>
							        <td><input type="number" id="CP" name="user_CP"></td>
							    </tr>
							    <tr>
							        <td><label for="tel">Numéro de telephone :</label></td>
							        <td><input type="tel" id="tel" name="user_tel" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" required></td>
							        <td><span class="note">Format: 0X-XX-XX-XX-XX</span></td>
							    </tr>  
							</table><br>
							<button class="button button1">Enregistrer adresse</button>
						</center>
					</form>';
						}

					?>		
			</div>
		</div>



 		<div class="column">
			<div class = "total">

				<?php
					echo '<p class = "titres">'. $_SESSION["nbProduit"] .' Articles</p>';
					echo '<p class = "couleur">Sous-total: '. $_SESSION["total"] .' €</p>';
					echo '<p class = "couleur">Livraison: '. $_SESSION["Livraison"] .' €</p>';
					echo '<p class = "couleur">Code promo: '. $_SESSION["Promo"] .' %</p>';
					$totalapayer = $_SESSION["total"] + $_SESSION["Livraison"];

					if($_SESSION["Promo"] != 0){
						$reduction = $totalapayer * ($_SESSION["Promo"] / 100);
						$totalapayer -= $reduction;
					}

					echo '<p class = "donnezArgent">TOTAL A REGLER : ' . $totalapayer .' €</p>';


					if($_SESSION["adresseLivraison"] != "" && $_SESSION["validationLivraison"] != "" && $_SESSION["validationPayement"] != ""){
						echo '<a href="achatConfirmer.php"><button class="button button1">COMMANDER</button></a>';
					}else{
						echo '<button class="button button1">COMMANDER</button>';
					}

				?>
			</div>

		</div>
	</center>



</div>

		<div class="column">
			<div class = "livraison">
					<form action="validationLivraison.php" method="post">
					<center><p class = "titres">Option de livraison</p></center>

					<h3><i><input type="radio" id="modeLivraison" name="modeLivraison" value="gratuit" >Gratuit</i><p class="style1">Livraison standart</p></h3>
					<p class="style2">Livraison d'ici 5 jours.</p>
					<p class="style3">Aucune livraison les jours fériés.</p>
					
						<br>

					<hr><h3><i><input type="radio" id="modeLivraison" name="modeLivraison" value="payant" >10€</i><p class="style1">Livraison 24H</p></h3>
					<p class="style2">Livraison entre 7h et 22h.</p>
					<p class="style3">Aucune livraison les jours fériés.</p>
						<br>
						<center><button class="button button1">Option de livraison</button></center>
				</form>	
			</div>
		</div>

		
			<div class = "paiement2">
					<center><p class = "titres">Paiement</p></center>
					
					<p ><i>Adresse de facturation</i></p>
					<p class = "style4">Adresse dans Adresse de livraison</p>
						<hr>
						<p><i>Type de paiement</i></p>


						<?php
							if($_SESSION["validationPayement"] == "OUI"){
								echo '<br><p class = "style4">Votre moyen de paiement a bien ete enregistree<p><br>';
							}else{
								echo '<p class ="ecriture">Nous acceptons : </p>
							<center><img src="img/cdc.png" ></center>

							<form action="validationCarte.php" method="post">
								<center>
									<table>
							    
							    <tr>
							        <td><label for="nom">NUMERO DE CARTE :</label></td>
							        <td><input type="text" id="carte" name="carte" pattern="[0-9]{16}" required></td>
							    </tr>
							    <tr>
							        <td><label for="prenom">DATE D EXPIRATION :</label></td>
							        <td><input type="text" id="date" name="date"></td>
							    </tr>
							    
							    <tr>
							        <td><label for="ad1">NOM APPARAISSANT SUR LA CARTE :</label></td>
							        <td><input type="text" id="nom" name="nom"></td>
							    </tr>
							    <tr>
							        <td><label for="ad2">CVV :</label></td>
							        <td><input type="text" id="cvv" name="cvv" pattern="[0-9]{3}" required></td>
							    </tr>
							    
							</table><br>
							<button class="button button1">Enregistrer</button>
						</center>
					</form>';
							}
						?>


						
			</div>

			<div class="column">
			<div class = "livraison">
					<form action="validationCodePromo.php" method="post">
						<center>
							<table>
								<p class = "titres">Code promo</p>
								 	<tr>
									    <td><label for="promo"class="style5">CODE PROMO:</label></td>
									    <td><input type="text" id="promo" name="promo"></td>
									</tr>
							</table><br>
						  <button class="button button1">APPLIQUER CODE PROMO</button>
						</center>
					</form>
			</div>
		</div>


		
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br><br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br><br>

<div class="footer">
 <p><img src="img/coeur.png" style="width:50px;height:40px;" class = "detailImg"> &copy; 2019 Copyright | Amazon ECE<img src="img/coeur.png" style="width:50px;height:40px;" class = "detailImg"><p>
</div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Panier | Amazon ECE</title>
<link rel="icon" href="img/favicon.png" />
	<link rel="stylesheet" type="text/css" href="styles9.css">
	
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

			$email = $_SESSION["email"];
			$_SESSION["adresseLivraison"] = "";
			$_SESSION["validationLivraison"] = "";
			$_SESSION["validationPayement"] = "";
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
						<button class="button button1">Mon Panier</button>
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


		<ul class="navigation2" id="menu-deroulant">
		  <li class = "detail3"><a href="#livres" class = "detail4">Livres<img src="img/livre.png" style="width:40px;height:40px;" class = "detailImg"></a>
		  	<ul>

				

				<ul id="menu-horizontale">
					<li><a href="#">Genre</a>
						<ul>
							<li><a href="#">Science Fiction</a></li>
							<li><a href="#">Romance</a></li>
							<li><a href="#">Policier</a></li>
							<li><a href="#">Historique</a></li>
						</ul>
					</li>
				</ul>


				<ul id="menu-horizontale">
					<li><a href="#">Auteur</a></li>
				</ul>

				<ul id="menu-horizontale">
					<li><a href="#">Langue</a>
						<ul>
							<li><a href="#">Science Fiction</a></li>
							<li><a href="#">Romance</a></li>
							<li><a href="#">Policier</a></li>
							<li><a href="#">Historique</a></li>
						</ul>
					</li>
				</ul>

				<ul id="menu-horizontale">
					<li><a href="#">Prix croissants</a></li>
				</ul>
			</ul>

		  </li>
		  <li class = "detail3"><a href="#musique" class = "detail4">Musique<img src="img/musique.png" style="width:40px;height:40px;" class = "detailImg"></a>
		  	<ul>
				<ul id="menu-horizontale">
					<li><a href="#">Genre</a>
						<ul>
							<li><a href="#">POP</a></li>
							<li><a href="#">Rock</a></li>
							<li><a href="#">Classique</a></li>
						</ul>
					</li>
				</ul>
				<ul id="menu-horizontale">
					<li><a href="#">Artiste</a></li>
				</ul>
				<ul id="menu-horizontale">
					<li><a href="#">Alphabétique</a></li>
				</ul>
				<ul id="menu-horizontale">
					<li><a href="#">Prix croissants</a></li>
				</ul>
			</ul>
		  </li>
		  <li class = "detail3"><a href="#vetement" class = "detail4">Vetements<img src="img/vetement.png" style="width:40px;height:40px;" class = "detailImg"></a>
		  		<ul>
					<ul id="menu-horizontale">
					<li><a href="#">Homme</a>
						<ul>
							<li><a href="#">T Shirt</a></li>
							<li><a href="#">Short</a></li>
							<li><a href="#">Chaussures</a></li>
						</ul>
					</li>
				</ul>
					<ul id="menu-horizontale">
					<li><a href="#">Femme</a>
						<ul>
							<li><a href="#">T Shirt</a></li>
							<li><a href="#">Jupe</a></li>
							<li><a href="#">Chaussures</a></li>
						</ul>
					</li>
				</ul>
					<ul id="menu-horizontale">
					<li><a href="#">Enfant</a>
						<ul>
							<li><a href="#">T Shirt</a></li>
							<li><a href="#">Pantalon</a></li>
							<li><a href="#">Chaussures</a></li>
						</ul>
					</li>
				</ul>
				</ul>
		  </li>
		  <li class = "detail3"><a href="#sportloisirs" class = "detail4">Sport et Loisirs<img src="img/sport.png" style="width:40px;height:40px;" class = "detailImg"></a>
		  		<ul>
					<ul id="menu-horizontale">
					<li><a href="#">Tous les sports</a>
						<ul>
							<li><a href="#">Tennis</a></li>
							<li><a href="#">HandBall</a></li>
							<li><a href="#">Natation</a></li>
						</ul>
					</li>
				</ul>
					<ul id="menu-horizontale">
					<li><a href="#">Mode et loisir</a>
						<ul>
							<li><a href="#">T Shirt</a></li>
							<li><a href="#">Pantalon</a></li>
							<li><a href="#">Chaussures</a></li>
						</ul>
					</li>
				</ul>
					<ul id="menu-horizontale">
					<li><a href="#">Prix croissants</a></li>
				</ul>
				</ul>
		  </li>
		</ul>


<div class="row">
	<center> 
		<div class="column">
			<div class = "panier">
					<p >Mon panier</p>

					<?php

					$requetAllProductPannier = "SELECT * FROM `objetpanier` WHERE `email` LIKE '$email'";
					$resultatrequetAllProductPannier = mysqli_query($db_handle, $requetAllProductPannier);

					if(mysqli_num_rows($resultatrequetAllProductPannier) != 0){
						while ($dataProduit = mysqli_fetch_assoc($resultatrequetAllProductPannier)) {
							
							echo '<hr><div class="row2"><div class="column2">';
							

							$idP = $dataProduit["idP"];
							$nbArticles = $dataProduit["nbArticles"];
							

							//Affichage de la photo
							$photoProduitsql = "SELECT `lienPhoto` FROM `photo` WHERE `idP` LIKE '$idP'";
							$resultPhotoProduit = mysqli_query($db_handle, $photoProduitsql);

							if(mysqli_num_rows($resultPhotoProduit) == 0){
								echo '<a href="FicheProduit.php?produit='. $idP .'" ><img src="img/random.jpg" class="detailImg2"></a>';
							}else{
								while ($dataPhoto = mysqli_fetch_assoc($resultPhotoProduit)) {
				        			$myPhoto = $dataPhoto["lienPhoto"];
				        				
				    			}	
				    			echo '<a href="FicheProduit.php?produit='. $idP .'" ><img src="'. $myPhoto .'" class="detailImg2"></a>';
							}

							//Affichage du prix + recuperation de si c'est un vetement
							$requetPrixProduit = "SELECT * FROM `produit` WHERE `idP` LIKE '$idP'";
							$resultatrequetPrixProduit = mysqli_query($db_handle, $requetPrixProduit);
							if(mysqli_num_rows($resultatrequetPrixProduit) == 1){
								while ($dataProduitPrix = mysqli_fetch_assoc($resultatrequetPrixProduit)) {
									$prix = $dataProduitPrix["prix"];
									$categorie = $dataProduitPrix["categorie"];
									if($categorie == "Vetement"){
										$idVetement = $dataProduit["idVetement"];
									}
								}
							}
							$prixtotal = $prix * $nbArticles;

							echo '</div><div class="column2"><table width="100%" border ="1" cellspacing="0" ><tr><td><div>';

							echo ' Prix : ' . $prixtotal . ' €<br>Quantite : ' . $nbArticles;

							if($categorie == "Vetement"){
								echo '<form action="modificationPanier.php?produit=' . $idP . '&vetement=' . $idVetement .'" method="post">';
							}else{
								echo '<form action="modificationPanier.php?produit=' . $idP . '" method="post">';
							}

							echo '<p class ="ecriture2">Modifier la quantite : </p>
									<input type="number" id = "quantite" name="quantite">
									<button class="button button3">Valider</button>
								</form>';

							if($categorie == "Vetement"){
								$requetteRecuperationVetement = "SELECT * FROM `objetvetement` WHERE `idVetement` LIKE '$idVetement'";
								$resultatRecuperationVetement = mysqli_query($db_handle, $requetteRecuperationVetement);

								while ($dataVetement = mysqli_fetch_assoc($resultatRecuperationVetement)) {
									$size = $dataVetement["taille"];
									$couleur = $dataVetement["couleur"];
									echo '<br>Couleur : ' . $couleur .  '<br>Taille : ' . $size . '<br>';


									echo '<p class ="ecriture2">Modifier la taille : </p>
													   <form action="changementTaille.php?vetement='. $idVetement .'&produit='. $idP .'" method="post">
															<center>
																<table>
														    		<tr>
																        <td>
															    			<select name ="taille">';
									$requetteAllSizeVetement = "SELECT `taille` FROM `objetvetement` WHERE `idP` LIKE '$idP'";
									$resultatAllSizeVetement = mysqli_query($db_handle, $requetteAllSizeVetement);

									while ($dataSize = mysqli_fetch_assoc($resultatAllSizeVetement)) {
										$taillePossible = $dataSize["taille"];
										echo '<option value="' . $taillePossible .'">' . $taillePossible .'</option>';
									}
									echo'</select>
																			<br>
																		</td>
																    </tr>
																</table>
															</center>
															<button class="button button3">Valider</button>
														</form>';

								}

							}

							echo '</div></td><tr></table>';


							if($categorie == "Vetement"){
								echo '<form action="suppresionProduit.php?produit=' . $idP . '&vetement=' . $idVetement .'" method="post">';
							}else{
								echo '<form action="suppresionProduit.php?produit=' . $idP . '" method="post">';
							}
							


							echo '<button class="button button2">Supprimer mon produit</button></form></div></div>';

						
						}


					}
					else{
						echo '<br><br><p>Vous n\'avez pas d\'articles dans votre panier</p><br><br>';
					}
					?>
					<hr>
			</div>
		</div>



<!-- 					 <div class="row2">
								<div class="column2">
									<img src="img/random.jpg" class = "detailImg2">
								</div>
								<div class="column2">
									<table width="100%" border ="1" cellspacing="0" >
										<tr>
											<td>
												<div> Prix : <br>
													  Quantite : 1
													  <p class ="ecriture2">Modifier la quantite : </p><input type="number" id = "quantité" name="quantité"><button class="button button3">Valider</button><br>
													  Taille : M
													  <p class ="ecriture2">Modifier la taille : </p>
													   <form action="changementTaille.php" method="post">
															<center>
																<table>
														    		<tr>
																        <td>
															    			<select name ="taille">
																				<option value="S">S</option>
																				<option value="M">M</option>
																				<option value="L">L</option>
																			</select>
																			<br>
																		</td>
																    </tr>
																</table>
															</center>
															<button class="button button3">Valider</button>
														</form>
												</div>
											</td>
										<tr>
											 
									</table>
									<button class="button button2">Supprimer mon produit</button>
								</div>
						</div> -->

 		<div class="column">
			<div class = "total">
				<p >Total</p>
				
				<hr>

				<?php

					$requetAllProductPannier = "SELECT * FROM `objetpanier` WHERE `email` LIKE '$email'";
					$resultatrequetAllProductPannier = mysqli_query($db_handle, $requetAllProductPannier);

					$total = 0;
					$nb_produit = 0;

					if(mysqli_num_rows($resultatrequetAllProductPannier) != 0){
						while ($dataProduit = mysqli_fetch_assoc($resultatrequetAllProductPannier)) {
							$idProduct = $dataProduit["idP"];
							$idQuantity = $dataProduit["nbArticles"];

							$requetPrixProduit = "SELECT `prix` FROM `produit` WHERE `idP` LIKE '$idProduct'";
							$resultatrequetPrixProduit = mysqli_query($db_handle, $requetPrixProduit);
							if(mysqli_num_rows($resultatrequetPrixProduit) == 1){
								while ($dataProduitPrix = mysqli_fetch_assoc($resultatrequetPrixProduit)) {
									$prix = $dataProduitPrix["prix"];
								}
							}
							$total += $idQuantity * $prix;
							$nb_produit += $idQuantity;

						}
						$_SESSION["total"] = $total;
						$_SESSION["nbProduit"] = $nb_produit;
						$_SESSION["Livraison"] = 0;
						$_SESSION["Promo"] = 0;
					}
					echo '<p class = "donnezArgent">' . $total . ' €</p>';

				?>

				<a href="paiement.php"><button class="button button1">Paiement</button></a>

				<p class ="ecriture">Nous acceptons : </p>
				<img src="img/cdc.png" >
				<p class ="ecriture2">Vous avez un code promotionnel ? Ajoutez-le à la prochaine étape. </p>
			</div>

		</div>
	</center>

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

<div class="footer">
 <p><img src="img/coeur.png" style="width:50px;height:40px;" class = "detailImg"> &copy; 2019 Copyright | Amazon ECE<img src="img/coeur.png" style="width:50px;height:40px;" class = "detailImg"><p>
</div>


</body>
</html>
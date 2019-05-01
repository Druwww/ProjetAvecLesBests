<!DOCTYPE html>
<html>
<head>
	<title>Panier | Amazon ECE</title>
<link rel="icon" href="img/favicon.png" />
	<link rel="stylesheet" type="text/css" href="styles9.css">
	
</head>
<body>

		<ul class="navigation1">
				  <div class = "detail1">
				  	<tr>
						<button class="button button1">Mon Compte</button>
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
					<hr>
						<div class="row2">
								<div class="column2">
									<img src="img/random.jpg" class = "detailImg2">
								</div>
								<div class="column2">
									<table width="100%" border ="1" cellspacing="0" >
										<tr>
											<td>
												<div> Prix : <br>
													  Quantite : 1
													  <p class ="ecriture2">Modifier la quantite : </p><input type="number" id = "quantité" name="quantité"><button class="button button3">Valider</button>
												</div>
											</td>
										<tr>
											 
									</table>
									<button class="button button2">Supprimer mon produit</button>
								</div>
						</div>
					<hr>
					<div class="row2">
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
						</div>
					<hr>
			</div>
		</div>


 		<div class="column">
			<div class = "total">
				<p >Total</p>
				
				<hr>
				<p class = "donnezArgent">72 euros</p>
				
				<button class="button button1">Paiement</button>

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
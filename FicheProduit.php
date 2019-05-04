<!DOCTYPE html>
<html>
<head>
	<title>Amazon ECE</title>
<link rel="icon" href="img/favicon.png" />
	<link rel="stylesheet" type="text/css" href="styles7.css">
	<link rel="stylesheet" type="text/css" href="stylesBase.css">
	
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
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

			$idP = isset($_GET['produit']) ? $_GET['produit'] : $_SESSION["produitView"];
			$taille = isset($_POST['size']) ? $_POST['size'] : "";
			$email = $_SESSION["email"];
			$_SESSION["produitView"] = $idP;


		
		?>

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

		<ul class="navigation2" id="menu-deroulant">
		  <li class = "detail3"><a href="categorie.php?categorie=Livre" class = "detail4">Livre<img src="img/livre.png" style="width:40px;height:40px;" class = "detailImg"></a>
		  	<ul>

				

				<ul id="menu-horizontale">
					<li><a href="categorie.php?categorie=Livre&souscategorie=genre">Genre</a>
						<ul>
							<li><a href="categorie.php?categorie=Livre&souscategorie=genre&value=Science Fiction">Science Fiction</a></li>
							<li><a href="categorie.php?categorie=Livre&souscategorie=genre&value=Romance">Romance</a></li>
							<li><a href="categorie.php?categorie=Livre&souscategorie=genre&value=Policier">Policier</a></li>
							<li><a href="categorie.php?categorie=Livre&souscategorie=genre&value=Historique">Historique</a></li>
						</ul>
					</li>
				</ul>


				<ul id="menu-horizontale">
					<li><a href="categorie.php?categorie=Livre&souscategorie=Auteur">Auteur</a></li>
				</ul>

				<ul id="menu-horizontale">
					<li><a href="categorie.php?categorie=Livre&souscategorie=annee">Annee parution</a></li>
				</ul>

				<ul id="menu-horizontale">
					<li><a href="categorie.php?categorie=Livre&order=prix">Prix croissants</a></li>
				</ul>
			</ul>

		  </li>
		  <li class = "detail3"><a href="categorie.php?categorie=Musique" class = "detail4">Musique<img src="img/musique.png" style="width:40px;height:40px;" class = "detailImg"></a>
		  	<ul>
				<ul id="menu-horizontale">
					<li><a href="categorie.php?categorie=Musique&souscategorie=genre">Genre</a>
						<ul>
							<li><a href="categorie.php?categorie=Musique&souscategorie=genre&value=POP">POP</a></li>
							<li><a href="categorie.php?categorie=Musique&souscategorie=genre&value=Rock">Rock</a></li>
							<li><a href="categorie.php?categorie=Musique&souscategorie=genre&value=Classique">Classique</a></li>
						</ul>
					</li>
				</ul>
				<ul id="menu-horizontale">
					<li><a href="categorie.php?categorie=Musique&souscategorie=Artiste">Artiste</a></li>
				</ul>
				<ul id="menu-horizontale">
					<li><a href="categorie.php?categorie=Musique&order=nom">Alphabétique</a></li>
				</ul>
				<ul id="menu-horizontale">
					<li><a href="categorie.php?categorie=Musique&order=prix">Prix croissants</a></li>
				</ul>
			</ul>
		  </li>
		  <li class = "detail3"><a href="categorie.php?categorie=Vetement" class = "detail4">Vetement<img src="img/vetement.png" style="width:40px;height:40px;" class = "detailImg"></a>
		  		<ul>
					<ul id="menu-horizontale">
					<li><a href="categorie.php?categorie=Vetement&value=Homme">Homme</a>
					</li>
				</ul>
					<ul id="menu-horizontale">
					<li><a href="categorie.php?categorie=Vetement&value=Femme">Femme</a>
					</li>
				</ul>
					<ul id="menu-horizontale">
					<li><a href="categorie.php?categorie=Vetement&value=Enfant">Enfant</a>
					</li>
				</ul>
				</ul>
		  </li>
		  <li class = "detail3"><a href="categorie.php?categorie=SL" class = "detail4">Sport et Loisirs<img src="img/sport.png" style="width:40px;height:40px;" class = "detailImg"></a>
		  		<ul>
					<ul id="menu-horizontale">
					<li><a href="categorie.php?categorie=SL&value=S">Tous les sports</a>
					</li>
				</ul>
					<ul id="menu-horizontale">
					<li><a href="categorie.php?categorie=SL&value=L">Mode et loisir</a>
					</li>
				</ul>
					<ul id="menu-horizontale">
					<li><a href="categorie.php?categorie=SL&order=prix">Prix croissants</a></li>
				</ul>
				</ul>
		  </li>
		</ul>

<br>
<br>

<div class="row">
  <div class="column">



					<div class="w3-content w3-display-container" style="max-width:400px">


						<?php
						$photoProduitsql = "SELECT `lienPhoto` FROM `photo` WHERE `idP` LIKE '$idP'";
						$resultPhotoProduit = mysqli_query($db_handle, $photoProduitsql);

						if(mysqli_num_rows($resultPhotoProduit) == 0){

							echo '<img src="img/random.jpg" style="width:100px;height:150px;" class="hover-shadow">';
						}else{
								while ($dataPhoto = mysqli_fetch_assoc($resultPhotoProduit)) {
			        				$myPhoto = $dataPhoto["lienPhoto"];
			        				echo '<img class="mySlides" src="'. $myPhoto .'" style="width:100%">';
			    				}	
						}

						?>

					  <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
					    <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
					    <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>

					    <?php
						    if(mysqli_num_rows($resultPhotoProduit) > 1){
						    	for($i = 0; $i < mysqli_num_rows($resultPhotoProduit); $i++){
						    		$nb = $i + 1;
						    		echo '<span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv('. $nb .')"></span>';
						    	}
						    }
					    ?>
					  </div>
					</div>

					<script>
					var slideIndex = 1;
					showDivs(slideIndex);

					function plusDivs(n) {
					  showDivs(slideIndex += n);
					}

					function currentDiv(n) {
					  showDivs(slideIndex = n);
					}

					function showDivs(n) {
					  var i;
					  var x = document.getElementsByClassName("mySlides");
					  var dots = document.getElementsByClassName("demo");
					  if (n > x.length) {slideIndex = 1}
					  if (n < 1) {slideIndex = x.length}
					  for (i = 0; i < x.length; i++) {
					    x[i].style.display = "none";  
					  }
					  for (i = 0; i < dots.length; i++) {
					    dots[i].className = dots[i].className.replace(" w3-white", "");
					  }
					  x[slideIndex-1].style.display = "block";  
					  dots[slideIndex-1].className += " w3-white";
					}
					</script>

					<br>
					<br>
					<br>
		
  </div>
			
  <div class="column">

  <article>

  	<?php
  		$_SESSION["produitView"] = $idP;
  		$produit = "SELECT * FROM `Produit` WHERE `idP` LIKE '$idP'";
		$monProduit = mysqli_query($db_handle, $produit);

		while ($dataProduit = mysqli_fetch_assoc($monProduit)) {
			$nomInfo = array();

			if($dataProduit["categorie"] == "Livre"){
				$nomInfo = array('Titre', 'Auteur', 'Genre');
			}else if ($dataProduit["categorie"] == "Vetement"){
				$nomInfo = array('Nom', 'Marque', 'Genre');
			}else if ($dataProduit["categorie"] == "Musique"){
				$nomInfo = array('Titre', 'Artiste', 'Genre');
			}else if($dataProduit["categorie"] == "SL"){
				$nomInfo = array('Nom', 'Marque', 'Genre');
			}

			echo '<h1>' . $nomInfo[0] . ' : ' . $dataProduit["nom"] . '</h1>';

			if($nomInfo[0] == 'Titre'){
				$requetteInfoLivre = "SELECT * FROM `infolivre` WHERE `idP` LIKE '$idP'";
				$monLivre = mysqli_query($db_handle, $requetteInfoLivre);

				while($dataLivre = mysqli_fetch_assoc($monLivre)){
					echo '<p>' . $nomInfo[1] . ' : ' . $dataLivre["auteur"] .'</p>'; 
					echo '<p>' . $nomInfo[2] . ' : ' . $dataLivre["genre"] .'</p>'; 
				}
			}

			if($dataProduit["categorie"] == "Vetement"){
				$requetteInfoLivre = "SELECT * FROM `infovetement` WHERE `idP` LIKE '$idP'";
				$monLivre = mysqli_query($db_handle, $requetteInfoLivre);

				while($dataLivre = mysqli_fetch_assoc($monLivre)){
					echo '<p>' . $nomInfo[1] . ' : ' . $dataLivre["marque"] .'</p>'; 
					echo '<p>' . $nomInfo[2] . ' : ' . $dataLivre["genre"] .'</p>'; 
				}
			}

			if($dataProduit["categorie"] == "Musique"){
				$requetteInfoLivre = "SELECT * FROM `infomusique` WHERE `idP` LIKE '$idP'";
				$monLivre = mysqli_query($db_handle, $requetteInfoLivre);

				while($dataLivre = mysqli_fetch_assoc($monLivre)){
					echo '<p>' . $nomInfo[1] . ' : ' . $dataLivre["artiste"] .'</p>'; 
					echo '<p>' . $nomInfo[2] . ' : ' . $dataLivre["genre"] .'</p>'; 
				}
			}

			if($dataProduit["categorie"] == "SL"){
				$requetteInfoLivre = "SELECT * FROM `infosl` WHERE `idP` LIKE '$idP'";
				$monLivre = mysqli_query($db_handle, $requetteInfoLivre);

				while($dataLivre = mysqli_fetch_assoc($monLivre)){
					echo '<p>' . $nomInfo[1] . ' : ' . $dataLivre["marque"] .'</p>'; 
					echo '<p>' . $nomInfo[2] . ' : ' . $dataLivre["genre"] .'</p>'; 
				}
			}

			echo '<p>Description : ' . $dataProduit["description"] . '</p>'; 
			echo '<p>Prix : ' . $dataProduit["prix"] . '</p>';
			$dispo =  $dataProduit["nbDispo"] - $dataProduit["nbVendu"];
			$_SESSION["nbProduitDispo"] = $dispo;
			echo '<p>En stock : ' . $dispo . '</p>';
		}

  	?>
  </article>

    <form action="ajoutPanier.php" method="post">
			<center>
				<table>

					<?php
						$produit = "SELECT * FROM `Produit` WHERE `idP` LIKE '$idP'";
						$monProduit = mysqli_query($db_handle, $produit);

						while ($dataProduit = mysqli_fetch_assoc($monProduit)) {
							$categorie = $dataProduit["categorie"];

							if($categorie == "Vetement"){
								//on recherche la première taille disponible dans ce vetement								
								
								echo '<tr>
										<td>
												<label class ="ecriture"> Taille : </label>
												<select id="taille" name ="taille">';
								
								
								$requetteAllSizeVetement = "SELECT  DISTINCT `taille` FROM `objetvetement` WHERE `idP` LIKE '$idP'";
								$resultatAllSizeVetement = mysqli_query($db_handle, $requetteAllSizeVetement);
								while ($dataSize = mysqli_fetch_assoc($resultatAllSizeVetement)) {
									$taillePossible = $dataSize["taille"];
												echo '<option value="' . $taillePossible .'">' . $taillePossible .'</option>';
								}
								echo "</select>";
								echo "</td></tr>";

								//formulaire pour avoir la couleur
								echo '<tr><td><label class ="ecriture"> Couleur en  ' . $taille .' :</label><select name ="couleur">';

								if($taille == ""){
									$taille = $myFirstTaille;
								}

								$requetteAllSizeVetement = "SELECT * FROM `objetvetement` WHERE `idP` LIKE '$idP'";
								$resultatAllSizeVetement = mysqli_query($db_handle, $requetteAllSizeVetement);



								while ($dataSize = mysqli_fetch_assoc($resultatAllSizeVetement)) {
									$couleurPossible = $dataSize["couleur"];
									$sizeencouleur = $dataSize["taille"];
									echo '<option value="' . $couleurPossible .'">' . $couleurPossible . ' en ' . $sizeencouleur .'</option>';
								}
								echo '</select><br></td></tr>';
							}
						}
					?>

					 <tr>
				        <td><label for="CP">J'en veux :</label></td>
				        <td><input type="number" id="quantite" name="quantite"></td>
			    	</tr>
			    
					
		    	</table>
		    	<button class="button button1">Acheter</button><br>
		    	<?php

					$requetteVerificationAchat = "SELECT * FROM `objetpanier` WHERE `email` LIKE '$email' AND `idP` LIKE '$idP'";
					

					$resultVerificationAchat = mysqli_query($db_handle, $requetteVerificationAchat);

					if(mysqli_num_rows($resultVerificationAchat) != 0){
						while ($dataPrecedentAchat = mysqli_fetch_assoc($resultVerificationAchat)) {
							echo '<label for="CP">Actuellement dans votre panier : ' . $dataPrecedentAchat["nbArticles"];

							if($categorie == "Vetement"){
								$idVetementPrecedent = $dataPrecedentAchat["idVetement"];

								if($idVetementPrecedent != 0){
									$requetDataVetementPrecedentAchat = "SELECT * FROM `objetvetement` WHERE `idVetement` LIKE '$idVetementPrecedent'";
									$resultatDataVetementPrecedentAchat = mysqli_query($db_handle, $requetDataVetementPrecedentAchat);

									while ($dataVetementPrecedentAchat = mysqli_fetch_assoc($resultatDataVetementPrecedentAchat)) {
										$size = $dataVetementPrecedentAchat["taille"];
										$couleur = $dataVetementPrecedentAchat["couleur"];

										echo ' en taille : ' . $size . " en couleur : " . $couleur . '<br>';
									}
								}
							}
							echo '</label>';
						}
					}
				?>
		    </center>
	</form>
	<br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  </div>
 
<div class="footer">
 <p><a href="equipe"><p class = "style1">Mieux nous connaitre</p></a><img src="img/coeur.png" style="width:50px;height:40px;" class = "detailImg"> &copy; 2019 Copyright | Amazon ECE<img src="img/coeur.png" style="width:50px;height:40px;" class = "detailImg"><p>
 	
</div>


</body>
</html>
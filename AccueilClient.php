<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<link rel="icon" href="img/favicon.png" />
	<link rel="stylesheet" type="text/css" href="styles2.css">
	<script> 
	</script>
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
				<li class = "detail1">
					<a href="AccueilClientOuvertureFichePerso.php" class = "detail2">Mon Compte<img src="img/monCompte.png" style="width:42px;height:40px;" class = "detailImg"></a>
				</li>
				
				<li class = "detail1">
					<a href="panier.php" class = "detail2">Mon Panier<img src="img/panier.png" style="width:42px;height:40px;" class = "detailImg"></a>
				</li>
		</ul>

		<nav class="navbarCouleur"> 
			<a href="AccueilClient.php"><img src="img/LogoSite.png" alt="Logo" style="width:400px;height:160px;"></a> 

		</nav>


<p class="slogan"> Là où tout achat est possible</p>


		<ul class="navigation2" id="menu-deroulant">
		  <li class = "detail3"><a href="categorie.php?categorie=Livre" class = "detail4">Livre<img src="img/livre.png" style="width:40px;height:40px;" class = "detailImg"></a>
		  	<ul>

				

				<ul id="menu-horizontale">
					<li><a href="categorie.php?categorie=Livre&souscategorie=genre">Genre</a>
						<ul>
							<li><a href="categorie.php?categorie=Livre&souscategorie=genre&value=SF">Science Fiction</a></li>
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



		<?php
			$categorie = array('Livre', 'Musique', 'Vetement', 'SL');

			for($i = 0; $i < 4; $i++){
				echo '<p class ="myFont">Meilleures ventes ' . $categorie[$i] . '</p>';

				echo '<div class="row">';


				$bestVentesql = "SELECT * FROM `Produit` WHERE `categorie` LIKE '$categorie[$i]' ORDER BY `nbVendu` DESC";
				$resultBestVente = mysqli_query($db_handle, $bestVentesql);

				$nbProduitAffiche = 0;

				while ($dataVente = mysqli_fetch_assoc($resultBestVente)) {
					$nbProduitAffiche ++;
					if($nbProduitAffiche > 4){
						break;
					}

					echo '<div class="column">';

					$idP = $dataVente["idP"];

					$photoProduitsql = "SELECT `lienPhoto` FROM `photo` WHERE `idP` LIKE '$idP'";
					$resultPhotoProduit = mysqli_query($db_handle, $photoProduitsql);

					if(mysqli_num_rows($resultPhotoProduit) == 0){
						echo '<a href="FicheProduit.php?produit=' . $idP .'"><img src="img/random.jpg" style="width:100px;height:150px;" class="hover-shadow"></a>';
					}else{
							while ($dataPhoto = mysqli_fetch_assoc($resultPhotoProduit)) {
		        				$myPhoto = $dataPhoto["lienPhoto"];
		    				}	
							echo '<a href="FicheProduit.php?produit=' . $idP .'"><img src="' . $myPhoto . '" style="width:100px;height:150px;" class="hover-shadow"></a>'; 
					}
					echo "<br>Nom : " . $dataVente["nom"] . "<br>";
					echo "prix : " . $dataVente["prix"] . "<br>";
					echo "Nombre Vendu : " . $dataVente["nbVendu"] . "<br>";
					echo "</div>";
				}
				echo "</div>";
			}

		?>


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
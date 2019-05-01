<!DOCTYPE html>
<html>
<head>
	<title>Amazon ECE</title>
<link rel="icon" href="img/favicon.png" />
	<link rel="stylesheet" type="text/css" href="styles7.css">
	
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
</head>
<body>

		<?php
			// Start the session
			session_start();

			if(!isset($_SESSION["email"])){
				//header('Location: index.html');
			}

			$database = "Amazon";

			$db_handle = mysqli_connect('localhost', 'root', '');
			$db_found = mysqli_select_db($db_handle, $database);

			if(! $db_found){
				echo "<script>alert('Echec connexion BDD !');</script>";
			}	

			$idP = $_GET['produit'];
		
		?>

		<ul class="navigation1">
				  <li class = "detail1"><a href="FichePerso.html" class = "detail2">Mon Compte<img src="img/monCompte.png" style="width:45px;height:40px;" class = "detailImg"></a></li>
				  <li class = "detail1"><a href="#panier" class = "detail2">Mon Panier<img src="img/panier.png" style="width:42px;height:40px;" class = "detailImg"></a></li>
		</ul>

		<nav class="navbarCouleur"> 
			<a href="AccueilClient.php"><img src="img/LogoSite.png" alt="Logo" style="width:400px;height:160px;"></a> 

		</nav>
	<p class="slogan"> Là où tout achat est possible</p>

<br>
<br>

<div class="row">
  <div class="column">



					<div class="w3-content w3-display-container" style="max-width:400px">

						<?php
						$photoProduitsql = "SELECT `lienPhoto` FROM `photo` WHERE `idP` LIKE '$idP'";
						$resultPhotoProduit = mysqli_query($db_handle, $photoProduitsql);

						if(mysqli_num_rows($resultPhotoProduit) == 0){
							echo '<img class="mySlides" src="img/random.jpg" style="width:100%">';
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

  		$produit = "SELECT * FROM `Produit` WHERE `idP` LIKE '$idP'";
		$monProduit = mysqli_query($db_handle, $produit);

		$nbProduitAffiche = 0;

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
			echo '<p>' . $nomInfo[1] . ' : ' . '</p>'; //à ajouter quand on aura des exemple dans la table
			echo '<p>' . $nomInfo[2] . ' : ' .  '</p>'; //à ajouter quand on aura des exemple dans la table

			echo '<p>Description : ' . $dataProduit["description"] . '</p>'; 
			echo '<p>Prix : ' . $dataProduit["prix"] . '</p>';
			$dispo =  $dataProduit["nbDispo"] - $dataProduit["nbVendu"];
			echo '<p>En stock : ' . $dispo . '</p>';
		}

  	?>
  </article>

    <form action="achat.php" method="post">
			<center>
				<table>

				 <tr>
			        <td><label for="CP">J'en veux :</label></td>
			        <td><input type="number" id="quantite" name="quantite"></td>
		    	</tr>
			    
					
		    	</table>
		    	<button class="button button1">Acheter</button>
				
		    </center>
	</form>

  </div>
</div>

	<div class="footer">
	 <p><img src="img/coeur.png" style="width:50px;height:40px;" class = "detailImg"> &copy; 2019 Copyright | Amazon ECE<img src="img/coeur.png" style="width:50px;height:40px;" class = "detailImg"><p>
	</div>

</body>
</html>
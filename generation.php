<?php
		$bestBookslq = "SELECT * FROM `Produit` WHERE `categorie` LIKE 'Livre' ORDER BY `nbVendu` DESC";
		$resultBestBook = mysqli_query($db_handle, $bestBookslq);

		$nbLivreAffiche = 0;

		while ($data = mysqli_fetch_assoc($resultBestBook)) {
			$nbLivreAffiche ++;
			if($nbLivreAffiche > 4){
				break;
			}

			echo '<div class="column">';

			$idP = $data["idP"];

			$photoProduitslq = "SELECT `lienPhoto` FROM `photo` WHERE `idP` LIKE '$idP'";
			$resultPhotoProduit = mysqli_query($db_handle, $photoProduitslq);

			if(mysqli_num_rows($resultPhotoProduit) == 0){
				echo '<img src="img/random.jpg" style="width:100px;height:150px;" class="hover-shadow" onclick="goFicheProduit('. $idP .')">';
			}else{
					while ($dataPhoto = mysqli_fetch_assoc($resultPhotoProduit)) {
        				$myPhoto = $dataPhoto["lienPhoto"];
    				}	
					echo '<img src="' . $myPhoto . '" style="width:100px;height:150px;" class="hover-shadow" onclick="goFicheProduit('. $idP .')">';	
			}
			echo "<br>Nom : " . $data["nom"] . "<br>";
			echo "prix : " . $data["prix"] . "<br>";
			echo "Nombre Vendu : " . $data["nbVendu"] . "<br>";
			echo "</div>";
		}
		
?>	
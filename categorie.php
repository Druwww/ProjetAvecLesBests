<!DOCTYPE html>
<html>
<head>
	<title>Amazon ECE</title>
<link rel="icon" href="img/favicon.png" />
	<link rel="stylesheet" type="text/css" href="styles8.css">
	
	
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
				  <li class = "detail1"><a href="AccueilClientOuvertureFichePerso.php" class = "detail2">Mon Compte<img src="img/monCompte.png" style="width:45px;height:40px;" class = "detailImg"></a></li>
				  <li class = "detail1"><a href="panier.php" class = "detail2">Mon Panier<img src="img/panier.png" style="width:42px;height:40px;" class = "detailImg"></a></li>
		</ul>

		<nav class="navbarCouleur"> 
			<a href="AccueilClient.php"><img src="img/LogoSite.png" alt="Logo" style="width:400px;height:160px;"></a> 

		</nav>


	<p class="slogan"> Là où tout achat est possible</p>

	<div class ="miseenpage" class = "recherche">

    <?php 
      $categorie = isset($_GET["categorie"]) ? $_GET["categorie"] : "";
      $souscategorie = isset($_GET["souscategorie"]) ? $_GET["sousquantite"] : "";

      if($categorie != ""){
        $_SESSION["categorie"] = $categorie;
        echo '<p>Catégorie : ' . $categorie . '</p>';
      }
      if($souscategorie != ""){
        $_SESSION["souscategorie"] = $souscategorie;
        echo '<p>Sous-catégorie : ' . $souscategorie . '</p>';
      }

    ?>
		<form action="recherche.php">
		 <img src="img/recherche.png" alt="recherche" style="width:42px;height:40px;" class = "detailImg">

     <?php
        $recherche = isset($_GET["recherche"]) ? $_GET["recherche"] : "";
        if($recherche != ""){
          echo '<input id="recherche" name="recherche" type="text" placeholder="'. $recherche .'">';
        }else{
          echo '<input id="recherche" name="recherche" type="text" placeholder="...">';
        }
     ?>
		   <button type="submit">Rechercher</button>
		</form>
	</div>

	
<br>
<br>


  <?php



    $requetteRecherche = "SELECT * FROM `produit` WHERE `nom` LIKE '%$recherche%' AND `categorie` LIKE '%$categorie%'";

    $sort = isset($_GET["order"]) ? $_GET["order"] : "";

    if($sort != ""){
      $requetteRecherche .= " ORDER BY `$sort`";
    }

    $resultatRecherche = mysqli_query($db_handle, $requetteRecherche);

    if(mysqli_num_rows($resultatRecherche) == 0){
      echo '<h1>Oups ... Aucun produit sur notre site correspond à votre recherche</h1>';
    }else{
        while ($dataProduit = mysqli_fetch_assoc($resultatRecherche)) {
            $idProduit = $dataProduit["idP"];
            $photoProduitsql = "SELECT * FROM `photo` WHERE `idP` LIKE '$idProduit'";
            $resultPhotoProduit = mysqli_query($db_handle, $photoProduitsql);

            echo '<div class="produit"><a target="_blank" href="FicheProduit?produit=' . $idProduit .'">';

            if(mysqli_num_rows($resultPhotoProduit) == 0){
              echo '<img src="img/random.jpg" alt="produit">';
            }else{
              while ($dataPhotoProduit = mysqli_fetch_assoc($resultPhotoProduit)) {
                $myPhoto = $dataPhotoProduit["lienPhoto"];
              } 
              echo '<img src="' . $myPhoto . '" alt="produit" style="width:180px;height:300px;">'; 
            }

            echo '</a><div class="desc">'. $dataProduit["nom"] . '<br>Prix : ' . $dataProduit["prix"] . '€ </div>';

            echo '</div>';

           
        }


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
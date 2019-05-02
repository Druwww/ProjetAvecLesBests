<!DOCTYPE html>
<html>
<head>
	<title>Amazon ECE</title>
<link rel="icon" href="img/favicon.png" />
	<link rel="stylesheet" type="text/css" href="styles7.css">
	
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
</head>
<body>

		<ul class="navigation1">
				  <li class = "detail1"><a href="#monCompte" class = "detail2">Mon Compte<img src="img/monCompte.png" style="width:45px;height:40px;" class = "detailImg"></a></li>
				  <li class = "detail1"><a href="#panier" class = "detail2">Mon Panier<img src="img/panier.png" style="width:42px;height:40px;" class = "detailImg"></a></li>
		</ul>

		<nav class="navbarCouleur"> 
			<a href="AccueilClient.html"><img src="img/LogoSite.png" alt="Logo" style="width:400px;height:160px;"></a> 

		</nav>
	<p class="slogan"> Là où tout achat est possible</p>

<br>
<br>

<div class="row">
  <div class="column">



					<div class="w3-content w3-display-container" style="max-width:400px">
					  <img class="mySlides" src="img/random.jpg" style="width:100%">
					  <img class="mySlides" src="img/random2.jpg" style="width:100%">
					  <img class="mySlides" src="img/random.jpg" style="width:100%">
					  <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
					    <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
					    <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
					    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
					    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
					    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
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
    <h1>Titre du livre</h1>
    <p>Auteur : </p>
    <p>Genre : </p>
   
    <p>Description : </p>
    <p>Prix : </p>
    <p>En stock :</p>
    

  </article>

    <form action="achat.php" method="post">
			<center>
				<table>
					<tr>
			        	<td><label class ="ecriture"> Taille : </label>
					    		<select name ="taille">
							  		<option value="s">S</option>
							  		<option value="m">M</option>
							  		<option value="l">L</option>
								</select>
							<br>
						</td>
		    		</tr>
		    	<tr>
			        <td><label class ="ecriture" > Couleur : </label>
			    		<select name ="couleur">
					  		<option value="bleu">bleu</option>
					  		<option value="rouge">rouge</option>
					  		<option value="blanc">blanc</option>
						</select>
						<br>
					</td>
		   		 </tr>

				 <tr>
			        <td><label for="quantite">J'en veux :</label></td>
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
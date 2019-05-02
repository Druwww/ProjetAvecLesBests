<!DOCTYPE html>
<html>
<head>
	<title>Amazon ECE</title>
	<link rel="icon" href="img/favicon.png" />
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<?php
		session_start()
	?>
		<center><img src="img/logo.png" alt="Logo" style="width:300px;height:300px;"></center>
		<p> Entrez le mot de passe du compte de 
		<?php
			
			// on affiche les variables de la session de connection.php
			echo $_SESSION["email"];
		?>
		</p>
	
		<form action="verificationConnexion.php" method="post">
			<center><table class="mdp">
				<tr>
					<td>Mot de passe : </td>
					<td><input type="password" name="mdp"></td>
				</tr>
			</table></center>

			<tr>
				<button class="button button1">Connexion</button>
			</tr>
		</form>
	
</body>
</html>
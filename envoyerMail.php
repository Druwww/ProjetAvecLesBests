<?php


$mail = isset($_POST["user_mail"]) ? $_POST["user_mail"] : "";

if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}

$boundary = "-----=".md5(rand());
$message = "";

//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "<b>Bonjour</b>, voici un e-mail pout te convier a t'inscrire en tant que vendeur sur le site <i>AmazonECE</i>.<br>Pour t'inscrire, va sur le lien suivant : http://localhost/ProjetAvecLesBests/inscription.html ! <br><br>A bientot !<br>Helene Carlier<br>Administratrice d'AmazonECE.";
$message_txt .= $mail;
$message_html = "<html><head></head><body><b>Bonjour</b>, voici un e-mail pout te convier a t'inscrire en tant que vendeur sur le site <i>AmazonECE</i>.<br>Pour t'inscrire, va sur le lien suivant : http://localhost/ProjetAvecLesBests/inscription.html ! <br><br>A bientot !<br>Helene Carlier<br>Administratrice d'AmazonECE.</body></html>";
//==========

//=====Définition du sujet.
$sujet = "AMAZON : inscription vendeur";
//=========

//Creation de l'header de l'email
$header = "From: \"Helene Carlier\"<helene.carlier.gubler@gmail.com>".$passage_ligne;
$header.= "Reply-to: \"Helene Carlier\"<helene.carlier.gubler@gmail.com>".$passage_ligne; 
$header.= "MIME-Version: 1.0".$passage_ligne; 
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;


//Creation du message
$message .= $passage_ligne."--".$boundary.$passage_ligne;
$message .= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message .= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
 
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
//==========

header('Location: MesVendeursAdmin.php');

?>

<?php

$status = session_status();
if($status == PHP_SESSION_NONE){
	//There is no active session
	session_start();
}

$email = $_SESSION["email"];


$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);//le nom de l'image A RETENIR

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}



// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if($uploadOk == 1)
{
//identifier votre BDD 
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, "amazon");


	if($db_found){
		
		$changesql = "UPDATE `compte`
					SET photoProfil = '$target_file'
					WHERE compte.email = '$email'";
		$result = mysqli_query($db_handle, $changesql);
		header('Location: FichePerso.php');
	}
	else{
		echo 'BD not found';
	}

	mysqli_close($db_handle);
}
?>
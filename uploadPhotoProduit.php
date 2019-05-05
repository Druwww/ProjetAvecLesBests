<?php

$status = session_status();
if($status == PHP_SESSION_NONE){
	//There is no active session
	session_start();
}



$target_dir = "img/";
$target_file1 = $target_dir . basename($_FILES["fileToUpload"]["name"]);//le nom de l'image A RETENIR


//$target_file3 = $target_dir . basename($_FILES["fileToUpload3"]["name"]);//le nom de l'image A RETENIR

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
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
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file1)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if($_FILES["fileToUpload2"]["name"] != NULL)
{
	$target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"]);//le nom de l'image A RETENIR
	$uploadOkBis = 1;
	$imageFileType = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOkBis = 1;
		} else {
			echo "File is not an image.";
			$uploadOkBis = 0;
		}
	}

	// Check file size
	if ($_FILES["fileToUpload2"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOkBis = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOkBis = 0;
	}
	// Check if $uploadOkBis is set to 0 by an error
	if ($uploadOkBis == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2)) {
			echo "The file ". basename( $_FILES["fileToUpload2"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}

if($_FILES["fileToUpload3"]["name"] != NULL)
{
	$target_file3 = $target_dir . basename($_FILES["fileToUpload3"]["name"]);//le nom de l'image A RETENIR
	$uploadOkTer = 1;
	$imageFileType = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload3"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOkTer = 1;
		} else {
			echo "File is not an image.";
			$uploadOkTer = 0;
		}
	}

	// Check file size
	if ($_FILES["fileToUpload3"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOkTer = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOkTer = 0;
	}
	// Check if $uploadOkTer is set to 0 by an error
	if ($uploadOkTer == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file3)) {
			echo "The file ". basename( $_FILES["fileToUpload3"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}


if(!isset($uploadOkBis))
{
	if($uploadOkBis == 1)
	{
		//On le sauvegarde dans la session
		$_SESSION["photoProduit2"] = $target_file2;
	}

}
if(!isset($uploadOkTer))
{
	if($uploadOkTer == 1)
	{
		//On le sauvegarde dans la session
		$_SESSION["photoProduit3"] = $target_file3;
	}

}
if($uploadOk == 1)
{
	//On le sauvegarde dans la session
	$_SESSION["photoProduit1"] = $target_file1;
	header('Location: creationProduit.html');

}

?>
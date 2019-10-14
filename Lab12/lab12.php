<?php
	session_start();

	$_SESSION["user"] = "";
	$_SESSION["mail"] = "";
	$nameErr = "";
	$mailErr = "";
	$empty = 2;

	$target_dir = "D:\A01365099\htdocs\Lab12/";
    $target_file = $target_dir.basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	    function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
    }




	if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}	
	 if ($_SERVER["REQUEST_METHOD"] == "POST"){
	 	 if (empty($_POST["user"])) {
             $nameErr = "Se requiere llenar el campo";
        }  else{
            $_SESSION["user"] = test_input($_POST["user"]);
            $empty--;
           
        }  

        if (empty($_POST["mail"])) {
             $mailErr = "Se requiere llenar el campo";
        }  else{
            $_SESSION["mail"] = test_input($_POST["mail"]);
            $empty--;
           
        } 
        if ($empty == 0) {
            echo "Hola " . $_SESSION["user"] . " Tu correo: " . $_SESSION["mail"] . ", tu imagen ha sido subida.";
        	include("preguntas.html");


        echo "<img src='D:\A01365099\htdocs\Lab12/".basename( $_FILES["file"]["name"])."'>";
        }else{
        	include("_footer.html");
        }
   		
	 }
    else{
    	 include("_footer.html");
    }
	
?>
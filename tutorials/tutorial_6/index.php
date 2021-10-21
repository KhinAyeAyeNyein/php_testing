<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title> Img Upload</title>
</head>
<body>
    <h1 class="header">Turorial - Upload image into selected folder.</h1>
	<form class="form" method="post" enctype="multipart/form-data"> <!--Creating a form to upload image-->
		<label>Targeted Dir</label>
		<input class="input" type="text" name="dir_name">
		<br>
		<label>Upload Image</label>
		<input class="input" type="file" name='img'>
		<br/>
		<input class="input" type="submit" value="upload" name="submit">
	</form>
</body>
</html>
<?php

$image=$_FILES["img"];
$uploadOk = 1;
if (isset($_POST['submit'])) {  //file is upload or not
    if($_POST['dir_name'] != "") {
        $tar_dir = $_POST['dir_name'];  
        if(!is_dir($tar_dir)){
            mkdir($tar_dir);    //creating dir if dir does not exit yet.
        }
        $target_file = $tar_dir . basename($_FILES["img"]["name"]);
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
            if(file_exists($target_file)){
                echo "File already exists.";
                $uploadOk = 0;
            }else {
                echo "<p class=upload>Image file ".$check["mime"] ." is uploaded into below folder.<br>";
                echo $tar_dir."</p>";
                move_uploaded_file($image['tmp_name'],$tar_dir."/".$image['name']);
            }

        } else {
            echo "<p class=upload>File is not an image.</p>";
            $uploadOk = 0;
        }
    }   
}

//here the "photos" folder is in same folder as the upload.php, 
//otherwise complete url has to be mentioned
?>
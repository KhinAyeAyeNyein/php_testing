<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<?php
	session_start();
	if(isset($_SESSION['username'])){
		header("location:login.php");
		exit;
	}
?>
    <h1 class="header">Tutorial - Login/Logout</h1>
    <div class="form" >
        <form action="login.php" method="post">
            Username : <input class="input" type="text" name = "usrname"> <br>
            Password : <input class="input" type="password" name = "pwd"> <br>
            <input class="input" type="submit" name="Login" value="Login">
        </form>
    </div>
</body>
</html>
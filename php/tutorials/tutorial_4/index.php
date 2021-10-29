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
    <h1 class="header">Tutorial - Login/Logout</h1>
    <!-- Login form -->
    <div class="form" >
        <form action="login.php" method="post">
            <label >Username : </label>
            <input class="input" type="text" name = "usrname"> <br>
            <label >Password : </label>
            <input class="input" type="password" name = "pwd"> <br>
            <input class="input" type="submit" name="Login" value="Login">
        </form>
    </div>
</body>
</html>
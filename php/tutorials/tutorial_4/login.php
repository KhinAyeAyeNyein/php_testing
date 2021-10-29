<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Welcome! You have logged in.</h1> <br>
    <p> Click button to logout</p><br>
    <a href='logout.php'><input type=button name=Logout value=Logout></a>
    <?php
        $usr_name = "User";
        $pwd = "usr";

        session_start();
        /* To check username and password is correct or not 
        * if correct, enter to login page
        * if not, stay in index page and show alert
        */
        if (session_id() == "" || isset($_POST["Login"])) {
            if (isset($_POST["usrname"]) && isset($_POST["pwd"])) {
                if ($_POST["usrname"] == $usr_name && $_POST["pwd"] == $pwd) { 
                    $_SESSION["usrname"] = $usr_name;
                    header("location:login.php");
                    echo "<script>location.herf='login.php'</script>"; 
                } else {
                    header("location:index.php");
                    echo "<script>alert('username or password is incorrect!)</script>";
                }
            } 
        }
    ?>
</body>
</html>

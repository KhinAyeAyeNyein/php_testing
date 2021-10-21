<?php
session_start();
if(isset($_SESSION["usrname"])){
    // unset($_SESSION["usrname"]);
    // unset($_SESSION["pwd"]);
    session_destroy();
    header("location:index.php");
} else {
    // unset($_SESSION["usrname"]);
    // unset($_SESSION["pwd"]);
    // session_destroy();
    header("location:index.php");
}
?>
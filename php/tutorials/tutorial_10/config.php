<?php
    $con = mysqli_connect("localhost", "root", "root", "reset_pw");

    if(mysqli_connect_errno()) {
        echo "failed to connect: " .mysqli_connect_errno();
    }
?>
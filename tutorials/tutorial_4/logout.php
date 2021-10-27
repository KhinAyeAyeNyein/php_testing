<?php
    /* Logout and return to index page 
    * when logout btn is clicked 
    */
    if (isset($_SESSION['usr_name'])) {
        session_destroy();
        echo "<script>locatin.herf='index.php'</script>";
    } else {
        echo "<script>location.herf='index.php'</script>";
    }
?>
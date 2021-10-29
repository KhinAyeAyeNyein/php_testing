<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><center>Tutorial_7 - Creating qrcode</center></h1>
    <?php
        // Include qrcode.php file.
        include "qrcode.php";
        // Create object
        $qc = new QRCODE();
        // Create Phone Code
        $qc->PHONE("+95-9123456789");
        // Save QR Code
        $qc->QRCODE(400,"qrcode.png");
        echo "<img src='qrcode.png'>";
    ?>
</body>
</html>
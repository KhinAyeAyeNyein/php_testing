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
    <div id="text">
        <?php
            $filename = '../Files2read/T5_txt.txt';
            $read_file = fopen($filename, 'r');

            if ($read_file) {
                $contents = fread($read_file, filesize($filename));
                fclose($read_file);
                echo nl2br($contents);
            }
        ?>
    </div>
    <a class="back" href="../index.php">Back</a>

</body>
</html>
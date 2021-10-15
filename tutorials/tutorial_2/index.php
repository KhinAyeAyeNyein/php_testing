<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Tutorial_2</title>
</head>
<body>
    <h1> Tutorial Diamond Pattern</h1>
    <div class='php-body'>
        <?php
            $n=6;
            for ($i=1; $i<=$n-1; $i++) {
                for ($j=1; $j<=$i; $j++) {
                    echo "*";
                }
                for ($j=2; $j<=$i; $j++) {
                    echo "*";
                }
                echo "<br>";
            }
            for ($i=1; $i<=$n; $i++) {
                for ($j=$i; $j<=$n; $j++) {
                    echo "*";
                }
                for ($j=$i+1; $j<=$n; $j++) {
                    echo "*";
                }
                echo "<br>";
            }
        ?>
    </div>
</body>
</html>
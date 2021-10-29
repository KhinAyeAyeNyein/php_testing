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
            for ($row=1; $row<=$n-1; $row++) { //for pramid style triangle
                for ($col=1; $col<=$row; $col++) {
                    echo "*"; //for all the front stars
                }
                for ($col=2; $col<=$row; $col++) {
                    echo "*"; //for the back stars to form a pramid style
                }
                echo "<br>";
            }
            for ($row=1; $row<=$n; $row++) { //for upback-down pramid style triangle
                for ($col=$row; $col<=$n; $col++) {
                    echo "*";  //for all the front stars 
                }
                for ($col=$row+1; $col<=$n; $col++) {
                    echo "*";  //for all the side stars 
                }
                echo "<br>";
            }
        ?>
    </div>
</body>
</html>
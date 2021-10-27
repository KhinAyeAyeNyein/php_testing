<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Tutorial_1</title>
</head>

<body>
    <h1 class='header'>Tutorial_1 Chess Board</h1>
    <table cellspacing="0px" cellpadding="0px"> <!-- to not have gaps between each cell -->
        <?php
        for ($row=0; $row<8; $row++) {
            echo "<tr>";
            for ($col=0; $col<8; $col++) {
                $total = $row+$col;
                if ($total % 2 == 0) {
                    echo "<td class='td1'> </td>"; //white color in chess board
                } else {
                    echo "<td class='td2'> </td>"; //black color in chess board
                }
            }
            echo "</tr>";
        }
       ?>
    </table>
</body>

</html>
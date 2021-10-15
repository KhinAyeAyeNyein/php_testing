<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tutorial_1</title>
</head>
<body>
    <table>
       <?php
        for ($i=0; $i<8; $i++) {
            echo "<tr>";
            for ($j=0; $j<8; $j++) {
                $total = $i+$j;
                if ($total%2 == 0) {
                    echo "<td class='td1'> </td>";
                } else {
                    echo "<td class='td2'> </td>";
                }
            }
            echo "</tr>";
        }
       ?>
    </table>
</body>
</html>
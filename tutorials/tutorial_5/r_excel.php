<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div id="excel">
        <?php
        use PhpOffice\PhpSpreadsheet\Spreadsheet;
        use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
        //include the file that loads the PhpSpreadsheet classes
        require '../../spreadsheet/vendor/autoload.php';

        //create directly an object instance of the IOFactory class, and load the xlsx file
        $fxls ='Files2read/T5_excel.xlsx';
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($fxls);

        //read excel data and store it into an array
        $xls_data = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        //now it is created a html table with the excel file data
        $html_tb ='<tr>'. implode('', $xls_data[1]) .'</tr>';
        $nr = count($xls_data); //number of rows
        for($i=2; $i<=$nr; $i++){
        $html_tb .='<table><tr><td id = "table">'. implode('</td><td id = "table">', $xls_data[$i]) .'</td></tr>';
        }
        $html_tb .='</table>';

        echo $html_tb;
        ?>
    </div>
    <a class="back" href="index.php">Back</a>
</body>
</html>

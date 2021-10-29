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
            //including the file that loads the PhpSpreadsheet classes
            use PhpOffice\PhpSpreadsheet\Spreadsheet;
            use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
            require '../../../spreadsheet/vendor/autoload.php';

            //create directly an object instance of the IOFactory class, and load the xlsx file
            $excel_file ='../Files2read/T5_excel.xlsx';
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($excel_file);

            //read excel data and store it into an array
            $excel_data = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            //now it is created a html table with the excel file data
            $html_tb ='<tr>'. implode('', $excel_data[1]) .'</tr>';
            $row = count($excel_data);
            for($i=2; $i<=$row; $i++){
                $html_tb .='<table><tr><td id="table">'.implode('</td><td id="table">',$excel_data[$i]).'</td></tr>';
            }
            $html_tb .='</table>';
            echo $html_tb;
        ?>
    </div>
    <a class="back" href="../index.php">Back</a>
</body>
</html>

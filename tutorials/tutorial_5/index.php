<?php

$filename = 'C:/Users/77/Desktop/Curriculum Vitae cv.docx';
$f = fopen($filename, 'r');

if ($f) {
    $contents = fread($f, filesize($filename));
    fclose($f);
    echo nl2br($contents);
}
?>
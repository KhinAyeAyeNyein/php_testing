<?php
$n=6;
$pattern=0;
for ($i=1; $i<=$n-1; $i++) {
    for ($j=$i; $j<=$n; $j++) {
        echo "&nbsp;&nbsp";
    }
    for ($j=1; $j<=$i; $j++) {
        echo "*";
    }
    for ($j=2; $j<=$i; $j++) {
        echo "*";
    }
    echo "<br>";
}
for ($i=1; $i<=$n; $i++) {
    for ($j=1; $j<=$i; $j++) {
        echo "&nbsp;&nbsp";
    }
    for ($j=$i; $j<=$n; $j++) {
        echo "*";
    }
    for ($j=$i+1; $j<=$n; $j++) {
        echo "*";
    }
    echo "<br>";
}
?>
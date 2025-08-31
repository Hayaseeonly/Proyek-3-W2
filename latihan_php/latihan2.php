<?php 
$a = 12;
// if else
echo "<b>If Else<br></b>";
if($a % 2 != 0){
    echo $a, " adalah bilangan ganjil";
}else{
    echo $a, " adalah bilangan genap";
}

echo "<br>";
echo "<br>";

// Switch Case
echo "<b>Switch Case<br></b>";
$b = $a;
$genap = $a % 2;
$ganjil = $a % 1;
$a = $genap;
$a = $ganjil;

switch($a){
    case $a == 1:
        echo $b, " adalah bilangan ganjil";
        break;
    case $a == 0:
        echo $b, " adalah bilangan genap";
        break; 
    default:
}
?>
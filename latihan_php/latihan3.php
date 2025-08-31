<?php
    $a = 1;
    $b = [1,2,3,4,5,6,7,8,9,10];

    //While
    echo "<b>While</b> <br>";
    while($a <= 10){
        echo $a," ";
        $a = $a + 1;
    }

    echo "<br><br>";

    // Foreach
    echo "<b>Foreach</b> <br>";
    foreach($b as $b ){
        echo $b, " ";
    }
?>
<?php
$finish = false;
$x = 1;
$counter = 0;

do {
    $x++;
    $rest = $x % 10;
    if ($rest == 0 ){
        echo $x . "<br>";
        $counter ++;
    }

    if ($counter == 11){
        $finish = true;
    }

} while (!$finish);
?>

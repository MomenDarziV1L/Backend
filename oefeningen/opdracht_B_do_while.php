<?php
$finish = false;
$x = 1;
$counterTen = 0;
$counterMore = 0;

do {
    $x++;
    $rest = $x % 10;
    $restTwo = $x % 25;
    if ($rest == 0 and $restTwo != 0 ){
        echo $x . "<br>";
        $counterTen ++;
    }

    if ($counterTen == 14){
        $finish = true;
    }

} while (!$finish);
?>

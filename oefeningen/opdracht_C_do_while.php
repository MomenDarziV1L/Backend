<?php
$x = 0;
$counter = 0;
$finish = false;
do {
    echo $x . "<br>" ;
    $x = $x + 3;
    do {
        echo $x . "<br>" ;
        $x = $x + 3;

        if ($x >= 50){
            $finish = true;
        }
    }while (!$finish);

    if ($x >= 50){
        $finish = true;
    }
} while (!$finish);
?>

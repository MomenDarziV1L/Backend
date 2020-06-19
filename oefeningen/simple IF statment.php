<?php
$first = 20;
$second = 6;
$therd = 1;

$total = $first + $second + $therd;

if ($total < 100) {
    if ($total > 10){
        echo "Veel";
    } else {
        echo " beetje";
    }
} else {
    echo "enorm";
}

?>

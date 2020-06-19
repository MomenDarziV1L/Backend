<?php

$first = 3;
$second = $first + 1;
$therd = 6;

$vermenigvuldigen = $first * $second;

$total = $vermenigvuldigen % $therd;

if ($total == 0){
    echo "Bingo";
} else {
    echo " Jammer";
}


?>

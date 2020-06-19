<?php
$firstWord = "BANANEN";
$letters = "";
$revers = "";
$temp = strlen($firstWord) -1;

for ($i=$temp ; $i >=0 ; $i--) {
    $revers .= $firstWord[$i];
}

for ($i = 0 ; $i < strlen($firstWord) ; $i++) {
    $letters = $firstWord[$i];
    if ($letters == $revers[$i]) {
        echo $letters ." ". $revers[$i] ." ". "*" . "<br>";
    } else {
        echo $letters ." ". $revers[$i] . "<br>";
    }
}
?>

<?php

$numbers = array();
for ($i=6;$i<=18;$i = $i+2) {
    $numbers[] = $i;
}
for ($i=0;$i<count($numbers);$i++) {
    echo $numbers[$i] . " ";
}
?>
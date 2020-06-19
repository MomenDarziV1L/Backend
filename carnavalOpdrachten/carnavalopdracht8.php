<?php
$furniture = array("stoel","bank", "tafel", "kast", "schilderij", "poef", "aquarium", "lamp");
$counter = count($furniture) -2;    // the index for the last two words 
$end = false;
for ($i=0;$i<count($furniture);$i++) {
    if (!$end) {
        if ($i == $counter) {
            echo $furniture[$i] . " en " . $furniture[$i+1];
            $end = true;
        } else {
            echo $furniture[$i] . ", ";
        }
    }
}
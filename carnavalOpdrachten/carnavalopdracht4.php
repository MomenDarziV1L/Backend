<?php
$furniture = array("stoel","bank", "tafel", "kast", "schilderij", "poef", "aquarium", "lamp");
for ($i=0;$i<count($furniture);$i++) {
    $found = false;
    for ($k=0;$k<strlen($furniture[$i]);$k++) {
        if (!$found) {
            if ($furniture[$i][$k] == "a") {
                $found = true;
                echo $furniture[$i] . "<br>";
            }
        }
    }
}




/* $furniture = array("stoel","bank", "tafel", "kast", "schilderij", "poef", "aquarium", "lamp");
for ($i=0;$i<count($furniture);$i++) {
    for ($k=0;$k<strlen($furniture[$i]);$k++) {
        if ($furniture[$i][$k] == "a") {
            echo $furniture[$i] . "<br>";
        }
    }
} */

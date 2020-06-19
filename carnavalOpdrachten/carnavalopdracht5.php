<?php

$furniture = array("stoel","bank", "tafel", "kast", "schilderij", "poef", "aquarium", "lamp");
for ($i=0;$i<count($furniture);$i++) {
    $found = false;
    for ($k=0;$k<strlen($furniture[$i]);$k++) {
        if (!$found) {
            if (($furniture[$i][$k] == "b") || ($furniture[$i][$k] == "q") || ($furniture[$i][$k] == "p")) {
                $found = true;
                echo $furniture[$i] . "<br>";
            }
        }
    }
}

?>
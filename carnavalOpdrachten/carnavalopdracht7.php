<?php
$furniture = array("stoel","bank", "tafel", "kast", "schilderij", "poef", "aquarium", "lamp");
$letters = 100000000;
for ($i=0;$i<count($furniture);$i++) {
    if (strlen($furniture[$i])<$letters) {
        $letters = strlen($furniture[$i]);
    }
}

for ($i=0;$i<count($furniture);$i++) {
    if (strlen($furniture[$i]) <= $letters) {
        echo $furniture[$i] . "<br>";
    }
}


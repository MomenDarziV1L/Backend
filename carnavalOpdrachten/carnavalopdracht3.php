<?php
$furniture = array("stoel","bank", "tafel", "kast", "schilderij", "poef", "aquarium", "lamp");
for ($i=0;$i<count($furniture);$i++) {
    $counter = 0;
    for ($k=0;$k<strlen($furniture[$i]);$k++) {
        $counter++;
    }
    if($counter==5) {
        echo $furniture[$i] . "<br>";
    }
}
?>
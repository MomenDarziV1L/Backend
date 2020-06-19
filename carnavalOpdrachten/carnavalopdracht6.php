<?php
$furniture = array("schilderit","stoel","bank", "tafel", "kast", "schilderij", "poef", "aquarium", "lamp");
$woord = "";
for ($i=0;$i<count($furniture);$i++) {
    if (strlen($woord) <= strlen($furniture[$i])) {
        $woord = $furniture[$i];
        echo $woord ."<br>";

    }
}

/* <?php
$furniture = array("stoel","bank", "tafel", "kast", "schilderij", "poef", "aquarium", "lamp");
$woord = "";
for ($i=0;$i<count($furniture);$i++) {
    $count = 0;
    for ($k=0;$k<strlen($furniture[$i]);$k++){
        $count++;
    }
    if (strlen($woord) < $count) {
        $woord = $furniture[$i];
    }
}
echo $woord; */
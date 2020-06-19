<?php
$parades = array(
    array("De Pomp", 2016 ,45 ,"De Reutels"),
    array("De Hooikar", 2018 ,47 ,"De Mannen"),
    array("De Heeren Jansen",2017,54,"De Reutels"),
    array("De Klokkenbar",2019,52,"De Reutels"),
    array("Henkies Hap",2014,47,"CV Spoorend"),
    array("Het Luikske",2013,50,"Stripke vur"),
    array("Den Oetel",2020,47,"CV Spoorend"));


$won = "De Reutels";
$year = 0;

for ($i=0;$i<count($parades);$i++) {
    if ($parades[$i][3] == $won) {
        $year = $parades[$i][1];
        echo "In " . $year . " wonnen " . $won. "<br>";
    }
}

?>
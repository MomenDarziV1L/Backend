<?php
$parades = array(
    array("De Pomp", 2016 ,45 ,"De Reutels"),
    array("De Hooikar", 2018 ,47 ,"De Mannen"),
    array("De Heeren Jansen",2017,54,"De Reutels"),
    array("De Klokkenbar",2019,52,"De Reutels"),
    array("Henkies Hap",2014,47,"CV Spoorend"),
    array("Het Luikske",2013,50,"Stripke vur"),
    array("Den Oetel",2020,47,"CV Spoorend"));

$standard = 5;
for ($i=0;$i<count($parades);$i++) {
    $year = $parades[$i][1];
    $participants = $parades[$i][2];
    $rest = $participants % $standard;
    if ($rest == 0) {
        $controller = $participants / $standard;
    } else {
        $controller = ($participants - $rest) / $standard;
        $controller++;
    }
    echo "In " . $year . " waren er " . $controller . " verkeersregelaars. <br><br>";
}
?>
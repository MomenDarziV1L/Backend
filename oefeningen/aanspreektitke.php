<?php
define("MAN",1);
define("VROUWE",2);

$first_name = "Nico" ;
$last_name = "Visser";
$age = 56;
$gender = MAN ;
$marred = false ;
$living_together = false ;
$job = 6 ;
$aanspreektitke = 0;

/* $job
1: rechter
2: jurist
3: kapper
4: chauffeur
5: machinist
6: politieagent
7: anders
default: NO WORK
*/

switch($job){
    case 1:
        $work = "rechter";
    break;
    case 2:
        $work = "jurist";
    break;
    case 3:
        $work = "kapper";
    break;
    case 4:
        $work = "chauffeur";
    break;
    case 5:
        $work = "machinist";
    break;
    case 6:
        $work = "politieagent";
    break;
    case 7:
        $work = "anders";
    break;
    default:
        $work= "NO WORK";
    break;
}

if ($gender == VROUWE) {
    if ($age >= 18){
        if ($marred == true or $living_together == true){
            $aanspreektitke = "Mevrouw " . $work . " " . $first_name;
        } else {
            $aanspreektitke = "Juffrouw " . $work . " " . $first_name;
        }
    } else {
        $aanspreektitke = "Meisje " . $work . " " . $first_name;
    }
}

if ($gender == MAN ) {
    if ($age >= 16) {
        if ($age <= 25) {
            $aanspreektitke = "Jongman " . $work . " " . $first_name;
        } else {
            $aanspreektitke = "Meneer " . $work . " " . $first_name;
        }
    } else {
        $aanspreektitke = "Jongens " . $work . " " . $first_name;
    }
}

if ($job == 1 or $job == 2){
    $aanspreektitke = "Edelachtbare " . $last_name;
}

if ($first_name == "Momen"){
    $aanspreektitke = "Superman " . $first_name;
}

echo $aanspreektitke;
?>

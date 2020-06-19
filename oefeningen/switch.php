<?php

$month = 7;
$weekdag = 3;


switch($month){
    case "1":
        $month_name =  "January" . "<br>";
    break;
    case "2" :
        $month_name = "februari" . "<br>";
    break;
    case "3" :
        $month_name = "march" . "<br>";
    break;
    case 4:
        $month_name = "April" . "<br>";
    break;
    case 5:
        $month_name = "May" . "<br>";
    break;
    case 6:
        $month_name = "Juny " . "<br>";
    break;
    case 7:
        $month_name = "July" . "<br>";
    break;
    case 8:
        $month_name = "August ";
    break;
    case 9:
        $month_name = "September ";
    break;
    case 10:
        $month_name = "October";
    break;
    case 11:
        $month_name = "November";
    break;
    case 12:
        $month_name = "December ";
    break;
    default:
    $month_name = "Your favorite month is not here!";
break;
}


switch($weekdag){
    case 1:
        $day = "De 1e dag van de week is woensdag";
    break;
    case 2:
        $day = "De 2e dag van de week is donderdag";
    break;
    case 3:
        $day = "De 3e dag van de week is vrijdag";
    break;
    case 4:
        $day = "De 4e dag van de week is zaterdag";
    break;
    case 5:
        $day = "De 5e dag van de week is zondag";
    break;
    case 6:
        $day = "De 6e dag van de week is mandag";
    break;
    case 7:
        $day = "De 7e dag van de week is dienesdag";
    break;
    case 8:
        $day = "De 8e dag van de week is woensdag";
    break;
    default:
        $day= "Your favorite month is not here!";
    break;

}

echo $month_name ."<br>".$day;

?>

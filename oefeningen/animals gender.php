<?php
$animal = 911;
$last_two_digits = substr( $animal, -2);


if ($animal < 10000) {
    if ($animal < 100){
        echo "Mannetjes ";
    } else {
        echo "Vrouwtjes ";
    }
} else {
    echo "Onbekend ";
}


if ($last_two_digits < 12) {
    if ($last_two_digits == 11) {
        echo "tijger";
    } else {
        echo "Leeuw";
    }
} else {
    echo "aap";
}
echo "<br>";
echo "$last_two_digits";

echo "<br>";
echo "<br>";

echo "...10 leeuw"."<br>"."...11 tijger"."<br>"."...12 aap";
?>

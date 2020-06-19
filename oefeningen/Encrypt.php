/*
*Encrypt
*Momen Darzi
*/

<?php

$letter = "K";
$source = "ABCDEFGHIJKLMNOPQRSTUVXTZA";
$pos = 0;

for ($i = 0;$i<strlen($source);$i++){
    if ($source[$i] == $letter){
        $pos = $i;
    }
}

$pos++;

echo $letter . " " . $pos . "<br>";
echo $letter . " " . $source[$pos];


// klaar 

?>

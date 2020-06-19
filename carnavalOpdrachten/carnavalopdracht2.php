<?php

$pureNumbers = array();
for ($i=1;$i<=250;$i++) {
    if ($i%5==0 && $i%7==0) {
        $pureNumbers[] = $i;
    }
}
for($i=0;$i<count($pureNumbers);$i++) {
    echo $pureNumbers[$i] . " ";
}
?>
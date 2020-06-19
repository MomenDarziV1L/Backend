<?php
/*
* file name: opendb.php
* author: Momen Darzi
* back-end programeren
* date: 29-03-2020
 */


$dbaselink = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
or die ("Niet moegelijk om verbinding te maken met de dbase server" . mysqli_connect_error());

set_time_limit(60);
?>
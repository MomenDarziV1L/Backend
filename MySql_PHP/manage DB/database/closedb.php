<?php
/*
* file name: closedb.php
* author: Momen Darzi
* back-end programeren
* date: 29-03-2020
 */

if (isset($result)){
    if (is_bool($result) === false) {
        mysqli_free_result($result);
    }
}

mysqli_close($dbaselink);

?>

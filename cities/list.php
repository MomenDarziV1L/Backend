<?php
/*
* file name:    list.php
* author:       Momen Darzi
* date:         23-04-2020
* back-end programeren
 */


//Connect database to my current file
include("database/config.php");
include("database/opendb.php");

echo "<link rel=\"stylesheet\" href=\"custom.css\">";

//Check if $_GET is declared
if (isset($_GET['start'])) {
    //Make a variable and gave it the value of $_GET
    $start = $_GET['start'];
}

//Check if the variable is empty
if ($start == "") {
    $start = 0;
}

/* Calculate how many IDs there are */
//Make SQL query
$query  = "SELECT COUNT(id) AS amount ";
$query .= "FROM cities ";

//Prepare and execute the query
$preparedquery = $dbaselink->prepare($query);
$preparedquery->execute();

//Check for errors
if ($preparedquery->errno) {
    echo "Laden van de gegevens mislukt.<br><br>";
} else {
    //Get the result
    $result = $preparedquery->get_result();

    //No places found
    if ($result->num_rows === 0) {
        $amount=0;
    } else {
        //Fetch a row and put it in an associative array
        while ($row = $result->fetch_assoc()) {
            $amount = $row['amount'];
        };
    }
}

//Check input for realistic values
if (($start < 0) || ($start>$amount)) {
    echo "Verkeerde startwaarde opgegeven, begin vooraan<br>";
    $start = 0;
}


//Make SQL query, select 10 rows, starting from flexible offset
$query = "SELECT id, place ";
$query .= "FROM cities ";
$query .= "LIMIT 10 OFFSET ? ";

//Prepare and bind the variables and execute the command
$preparedquery = $dbaselink->prepare($query);
$preparedquery->bind_param("i", $start);
$preparedquery->execute();

//Check for errors
if ($preparedquery->errno) {
    echo "Laden van de gegevens mislukt.";
} else {
    //Get the result
    $result = $preparedquery->get_result();

    //Check if there are rows
    if ($result->num_rows === 0) {
        echo "Er zijn geen plaatsen opgenomen";
    } else {
        echo "<table >";
        echo "<tr>";
        echo "<td><h3 class=\"headTit\">Id </h3></td>";
        echo "<td><h3 class=\"headTit\">Place</h3></td>";
        echo "</tr>";

        //Fetch a result row as an associative array
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>". $row['id'] . "</td>";
            echo "<td>". $row['place'] . "</td>";
            echo "</tr>";
        }
        //To count the rest if the last page is not set of 10 rows
        $rest = $amount % 10;

        //Shows the last page, whatever the content is (10 rows or less)
        $lastPage = $amount - $rest;

        //Fill empty rows to make the buttons fixed in their places
        if ($start==$lastPage) {
            $filler = 10 - $rest;
            for($i=0;$i< $filler;$i++) {
                echo "<tr><td>&nbsp;</td></tr>";
            }
        }
        echo "</table>";
        echo "<br><br>";
    }
}

echo "<br>";
echo "Er zijn (" . $amount . ") rijen gevonden.<br><br>";

//Close prepared query
$preparedquery->close();

if ($start != 0) {
    echo "<a href=\"list.php?start=0 \">Het begin</a>";
} else {
    echo "<a class=\"disabl\"><u>Het begin</u></a>";
}

echo "&nbsp;&nbsp";

//For previous page
$previous = $start-10;

if ($previous < 0 and $previous > -10) {
    $previous = 0;
}

if ($previous >= 0) {
    echo "<a href=\"list.php?start=" . $previous. "\">Vorige</a>";
} else {
    echo "<a class=\"disabl\"><u>Vorige</u></a>";
}

echo "&nbsp;&nbsp";

//For next page
$next = $start+10;

/* if ($next > $amount) {
    $next = $start;
} */

if ($next < $amount) {
    echo "<a href=\"list.php?start=" . $next. "\">Volgende</a>";
} else {
    echo "<a class=\"disabl\"><u>Volgende</u></a>";
}

echo "&nbsp;&nbsp";


if ($start< $lastPage) {
    echo "<a href=\"list.php?start=" . $lastPage. "\">Het eind</a>";
} else {
    echo "<a class=\"disabl\"><u>Het eind</u></a>";
}


//Close the database handler
include("database/closedb.php");

<?php
/*
* file name:    overview.php
* author:       Momen Darzi
* date:         29-03-2020
* back-end programeren
 */


//Connect database to my current file
include("database/config.php");
include("database/opendb.php");
include("functions.php");                       // for the function (fullname)

//Make SQL query
$query = "SELECT firstname, lastname, email, hobbies, id, pillows ";
$query .= "FROM persons ";

//Prepare and execute the command
$preparedquery = $dbaselink->prepare($query);
$preparedquery->execute();

//Check for errors
if ($preparedquery->errno) {
    echo "Fout bij uitvoeren commando, probeer het later nogmaals.";
} else {
    //Get the result
    $result = $preparedquery->get_result();

    //Check if there are rows
    if ($result->num_rows === 0) {
        echo "No rows found";
    } else {
        echo "<table >";
        echo "<tr>";
        echo "<td style='padding:10px'><h3>ID </h3></td>";
        echo "<td style='padding:10px'><h3>Fullname</h3></td>";
        echo "<td style='padding:10px'><h3>E-mail</h3></td>";
        echo "<td style='padding:10px'><h3>Hobbies</h3></td>";
        echo "<td style='padding:10px'><h3>Pillows</h3></td>";
        echo "<td style='padding:10px'><h3>Update</h3></td>";
        echo "<td style='padding:10px'><h3>Delete</h3></td>";
        echo "</tr>";

        //Fetch a result row as an associative array
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>". $row['id'] . "</td>";
            echo "<td><a href=\"details.php?id=" . $row['id'] . "\">" . fullname($row['firstname'], $row['lastname']). "</a></td>"; //make a link
            echo "<td>". $row['email'] . "</td>";
            if ($row['hobbies'] >= 3) {
                echo "<td> * </td>";
            } else {
                echo "<td>  </td>";
            }
            if ($row['pillows'] == 0) {
                echo "<td> * </td>";
            } else {
                echo "<td>  </td>";
            }
            //Make link to updateform
            echo "<td><a href=\"updateform.php?id=" . $row['id'] . "\">Wijzig</a></td>";
            //Make link to delete page
            echo "<td><a href=\"deleteconfirm.php?id=" . $row['id'] . "\">Verwijder</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
//Close prepared query
$preparedquery->close();

echo "<br><br><button style='width:160px;' onclick=\"location.href='addform.html'\">Voeg persoon toe</button><br><br>";  //Link to add person page
echo "<button style='width:160px;' onclick=\"location.href='searchform.php'\">Zoeken op personen</button><br><br>";  //Link to search page
echo "<button style='width:160px;' onclick=\"location.href='index.html'\">Home page</button><br><br>";     //link to home button

//Close the database handler
include("database/closedb.php");

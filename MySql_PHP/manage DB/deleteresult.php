<?php
/*
* file name:    deleteresult.php
* author:       Momen Darzi
* date:         06-04-2020
* back-end programeren
 */



//Connect database to my current file
include("database/config.php");
include("database/opendb.php");
include("functions.php");


//To avoid the error with closedb.php if id not found
//$result = true;

//Check if $_GET is declared
if (isset($_GET["id"])) {
    //Make a variable and gave it the value of $_GET
    $id = $_GET["id"];
} else {
    echo "Verplichte id ontbreekt, verwerking gestopt.";
    include("database/closedb.php");
    exit;
}

//Check if the variable is not empty
if ($id === "") {
    echo "Er is geen ID ingegeven";
    echo"<br><br><button onclick=\"location.href='overview.php'\">Overzicht personen</button><br>";    //Link to overview page
    echo"<br><button onclick=\"location.href='index.html'\">Home page</button><br>";               //Home button
    include("database/closedb.php");
    exit;
}

//Make SQL query
$query = "SELECT firstname,lastname ";
$query .= "FROM persons ";
$query .= "Where id = ?";

//Prepare and bind the parameter and execute the query
$preparedquery = $dbaselink->prepare($query);
$preparedquery->bind_param("i", $id);
$preparedquery->execute();

//Check for errors
if ($preparedquery->errno) {
    echo "Programma fout, gebruiker niet gevonden.";
    echo "Verwerking afgebroken";
    exit;
} else {
    //Get results
    $result = $preparedquery->get_result();
    //Fetch a result row as an associative array
    while ($row = $result->fetch_assoc()) {
        //Get the fullname
        $fullname = fullname($row['firstname'], $row['lastname']);
    }
}
//Close first SQL statement
$preparedquery->close();

//Make SQL query
$query  = "DELETE FROM persons ";
$query .= "WHERE id = ? ";
$query .= "LIMIT 1 ";


//Prepare and bind the variables and execute the command
$preparedquery = $dbaselink->prepare($query);
$preparedquery->bind_param("i", $id);
$preparedquery->execute();

//Check for errors
if ($preparedquery->errno) {
    echo "Er is een fout opgetreden. Verwerking afgebroken.";
} else {
    echo "Gebruiker ( " . $fullname . " ) met ID nummer " . $id . " is verwijderd. <br><br>";
}

//Close second SQL statement
$preparedquery->close();


//Close the database handler
include("database/closedb.php");

echo"<button onclick=\"location.href='overview.php'\">Overzicht personen</button><br>";       //Link to overview.php page
?>

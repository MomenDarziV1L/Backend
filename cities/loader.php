<?php
/*
* file name:    loader.php
* author:       Momen Darzi
* date:         23-04-2020
* back-end programeren
 */

//Connect database to my current file
include("database/config.php");
include("database/opendb.php");

//Connect to cities.php file
include("cities.php");

//Create the table cities when necessary
$query = "CREATE TABLE IF NOT EXISTS cities (";
$query .= "id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, ";
$query .= "place VARCHAR(40), ";
$query .= "township VARCHAR(40), ";
$query .= "nickname VARCHAR(80) ";
$query .= ") ";


//Prepare the query and execute it
$preparedquery = $dbaselink->prepare($query);
$preparedquery->execute();

//Check for errors
if ($preparedquery->errno) {
    echo "Aanmaken tabel mislukt<br>";
    $preparedquery->close();
    exit;
} else {
    echo "Table is al gemaakt<br>";
}

//Close prepared query
$preparedquery->close();

echo "Aantal plaatsen " . count($cities) . "<br>";

//One time specification of the SQL command
$query = "INSERT INTO cities ";
$query .= "VALUES(0, ?, ?, ?) ";

//Prepare the query for multiple usage
$preparedquery = $dbaselink->prepare($query);

//Loop through the array
for ($i=0;$i< count($cities);$i++) {
    
    //Get current city
    $city = $cities[$i];
    // [0]=> string(16) "'s-Hertogenbosch" 
    // [1]=> string(16) "'s-Hertogenbosch"
    // [2]=> string(9) "Oeteldonk"

    //Bind parameters and execute it
    $preparedquery->bind_param('sss', $city[0], $city[1], $city[2]);
    $preparedquery->execute();

    //Error checking
    if ($preparedquery->errno) {
        echo "Toevoegen rij in tabel mislukt<br>";
        $preparedquery->close();
        exit;
    }
}

//Release prepared statement when all INSERT statements are done
$preparedquery->close();


//Close the database handler
include("database/closedb.php");

echo "Plaatsen geladen in de database<br>";
?>
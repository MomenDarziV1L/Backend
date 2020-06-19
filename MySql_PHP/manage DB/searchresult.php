<?php
/*
* file name: searchresult.php
* author: Momen Darzi
* back-end programeren
* date: 29-03-2020
 */



//Connect database to my current file
include("database/config.php");
include("database/opendb.php");
include("functions.php");               //For the function (fullname)

//Check if $_POST has a value
if (isset($_POST["id"])) {
    //Make a variable and gave it value of $_POST
    $id = $_POST["id"];
}

//Check if $_POST has a value
if (isset($_POST["firstname"])) {
    //Make a variable and gave it value of $_POST
    $firstname = $_POST["firstname"];
}

//Check if $_POST has a value
if (isset($_POST["lastname"])) {
    //Make a variable and gave it value of $_POST
    $lastname = $_POST["lastname"];
}

//Check if $_POST has a value
if (isset($_POST["totalHobbies"])) {
    //Make a variable and gave it value of $_POST
    $totalHobbies = $_POST["totalHobbies"];
}

//Check if $_POST has a value
if (isset($_POST["weight"])) {
    //Make a variable and gave it value of $_POST
    $weight = $_POST["weight"];
}

//Make SQL query
$query = "SELECT firstname, lastname, hobbies, id, weight ";
$query .= "FROM persons ";
$query .= "WHERE id = ? ";
$query .= "OR firstname = ? ";
$query .= "OR lastname = ? ";
$query .= "OR hobbies = ? ";
$query .= "OR weight = ? ";


//Prepare and bind the variables and execute the command
$preparedquery = $dbaselink->prepare($query);
$preparedquery->bind_param("issii", $id, $firstname, $lastname, $totalHobbies, $weight);
$preparedquery->execute();

//Check for errors
if ($preparedquery->errno) {
    echo "Error executing command<br>";
    echo "please try again later.";
} else {
    //Get the result
    $result = $preparedquery->get_result();
    //Check if there are rows
    if ($result->num_rows === 0) {
        echo "No rows found" . "<br>" ;
    } else {
        //Fetch a result row as an associative array
        while ($row = $result->fetch_assoc()) {
            echo "<a href=\"details.php?id= " . $row['id'] . "&hobbies= " . $row['hobbies'] ."&weight= ". $row['weight'] . " \">" . fullname($row['firstname'], $row['lastname']). "</a>". "<br>"; //making a link
        };
    }
}
//Close prepared query
$preparedquery->close();
echo"<br><br><button style='width:160px;' onclick=\"location.href='searchform.php'\">Zoeken op personen</button><br><br>";    //Search page button
echo"<button style='width:160px;' onclick=\"location.href='overview.php'\">Overzicht personen</button><br><br>";    //overview.php button
echo"<button style='width:160px;' onclick=\"location.href='index.html'\">Home page</button>";              //Home page button

//Close the database handler
include("database/closedb.php");
?>



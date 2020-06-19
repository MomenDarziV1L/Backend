<?php
/*
* File name:    addresult.php
* Author:       Momen Darzi
* Date:         29-03-2020
* Back-end programeren
*/


//Connect database to my current file
include("database/config.php");
include("database/opendb.php");
include("functions.php");


$addform = "<button style='width:160px;' onclick=\"location.href='addform.html'\">Toevoegen personen</button><br><br>";    //variable for button refers to addform.html page
$overview = "<button style='width:160px;' onclick=\"location.href='overview.php'\">Overzicht personen</button><br><br>";       //variable for buttons refers to overview.php page
$home = "<button style='width:160px;' onclick=\"location.href='index.html'\">Home page</button><br><br>";                //variable for buttons refers to home page

//To avoid the error with closedb.php if a field is empty
//$result = true;

//Check if the POST declared
if ((isset($_POST['firstname'])) && (isset($_POST['lastname'])) &&
    (isset($_POST['email'])) && (isset($_POST['password'])) &&
    (isset($_POST['hobbies'])) && (isset($_POST['pillows'])) &&
    (isset($_POST['description']))) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hobbies = $_POST['hobbies'];
    $pillows = $_POST['pillows'];
    $description = $_POST['description'];
} else {
    echo "Verplichte velden ontbreken, verwerking gestopt.<br><br>";
    include("database/closedb.php");
    echo $addform . $overview . $home;
    exit;
}

//Check if the variables are not empty
if ($firstname === "") {
    echo "Er is geen voornaam ingegeven<br><br>";
    include("database/closedb.php");
    echo $addform . $overview . $home;
    exit;
}
if ($lastname === "") {
    echo "Er is geen achternaam ingegeven<br><br>";
    include("database/closedb.php");
    echo $addform . $overview . $home;
    exit;
}
if ($email === "") {
    echo "Er is geen email ingegeven<br><br>";
    include("database/closedb.php");
    echo $addform . $overview . $home;
    exit;
}
if ($password === "") {
    echo "Er is geen wachtwoord ingegeven<br><br>";
    include("database/closedb.php");
    echo $addform . $overview . $home;
    exit;
}
if ($hobbies === "") {
    echo "Er is geen aantal hobbies ingegeven<br><br>";
    include("database/closedb.php");
    echo $addform . $overview . $home;
    exit;
}
if ($pillows === "") {
    echo "Er is geen aantal pillows ingegeven<br><br>";
    include("database/closedb.php");
    echo $addform . $overview . $home;
    exit;
}
if ($description === "") {
    echo "Er is geen description ingegeven<br><br>";
    include("database/closedb.php");
    echo $addform . $overview . $home;
    exit;
}

//Make SQL query
$query  = "SELECT MAX(id) AS maxid ";
$query .= "FROM persons ";

//Prepare and execute the query
$preparedquery = $dbaselink->prepare($query);
$preparedquery->execute();

//Check for errors
if ($preparedquery->errno) {
    echo "Fout bij uitvoeren commando, probeer het later nogmaals.<br><br>";
    echo $addform . $overview . $home;
    exit;
} else {
    //Get the result
    $result = $preparedquery->get_result();

    //Set maxId
    $maxId = 0;

    //Fetch current maxid
    while ($row = mysqli_fetch_array($result)) {
        $maxId = $row["maxid"];
    }
    //Close first SQL statement
    $preparedquery->close();

    //The next person shall have one (1) number higher
    $currentId = $maxId + 1;

    //Make SQL query
    $query = "INSERT INTO persons ";
    $query .= "(id, firstname, lastname, email, password, hobbies, pillows, description) ";
    $query .= "VALUES(?, ?, ?, ?, ?, ?, ?, ?) ";

    //Prepare and bind the variables and execute the command
    $preparedquery = $dbaselink->prepare($query);
    $preparedquery->bind_param("isssssss", $currentId, $firstname, $lastname, $email, $password, $hobbies, $pillows, $description);
    $preparedquery->execute();

    //Check for errors
    if ($preparedquery->errno) {
        echo "Er is een fout opgetreden. Verwerking afgebroken.<br><br>";
    } else {
        echo "Gebruiker ( " . fullname($firstname,$lastname) . " ) is toegevoegd met ID nummer " . $currentId;
    }
}
//Close second SQL statement
$preparedquery->close();

//Close the database handler
include("database/closedb.php");

//Buttons refers to addform.html and home pages
echo "<br><br><br><button style='width:160px;' onclick=\"location.href='details.php?id=" . $currentId . "'\">Toon de gegevens</button><br><br>";
echo  $addform . $overview . $home;
?>

<?php
/*
* file name:    details.php
* author:       Momen Darzi
* back-end programeren
* date:         29-03-2020
 */



//Connect database to my current file
include("database/config.php");
include("database/opendb.php");
include("functions.php");

//Check if $_GET is declared
if (!isset($_GET['id'])) {      
    echo "ERROR<br>";
} else {
    //Make a variable and gave it the value of $_GET
    $id = $_GET['id'];    
}

//Check if the variable is not empty
if ($id === "") {
    echo "Er is geen ID ingegeven";
    include("database/closedb.php");
    exit;
}

//Make SQL query
$query = "SELECT id, firstname, lastname, email, password, hobbies, pillows, description, weight ";
$query .= "FROM persons ";
$query .= "WHERE id = ? ";

//Prepare and bind the variables and execute the command
$preparedquery = $dbaselink->prepare($query);
$preparedquery->bind_param("i", $id);
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
        echo "No rows found";
    } else {
        //Fetch a result row as an associative array
        while ($row = $result->fetch_assoc()) {     
            echo "<table>";                         
            echo "<tr>";                            
            echo "<td>ID:</td>";                    
            echo"<td>" . $row['id'] . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Firstname:</td>";
            echo"<td>" . $row['firstname'] . "</td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<td>Lastname:</td>";
            echo"<td>" . $row['lastname'] . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>E-mail:</td>";
            echo"<td>" . $row['email'] . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Password:</td>";
            echo"<td>" . $row['password'] . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Hobbies:</td>";
            echo"<td>" . $row['hobbies'] . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Pillows:</td>";
            echo"<td>" . $row['pillows'] . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Description:</td>";
            echo"<td>" . $row['description'] . "</td>";
            echo "</tr>";

            echo "</table>";
            echo "<br><br>";

            echo"<button style='width:160px;' onclick=\"location.href='updateform.php?id=" . $row['id'] . "'\">Update</button><br><br>";    //Link to update page

            echo"<button style='width:160px;' onclick=\"location.href='deleteconfirm.php?id=" . $row['id'] . "'\">Verwijderen</button><br>";    //Link to delete page

        };
    }
}
//Close prepared query
$preparedquery->close();


echo"<br><button style='width:160px;' onclick=\"location.href='overview.php'\">Overzicht personen</button><br>";    //Link to overview page
echo"<br><button style='width:160px;' onclick=\"location.href='searchform.php'\">Search page</button><br>";         //Link to Search form page
echo"<br><button style='width:160px;' onclick=\"location.href='index.html'\">Home page</button>";                   //Home button

//Close the database handler
include("database/closedb.php");
?>

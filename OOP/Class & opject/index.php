<?php
/*
* File name:    index.php
* Author:       Momen Darzi
* Date:         08-06-2020
* Back-end programeren
*/

//Use the class Person
include "Person.php";

//Object over (myPerson) from the class
$myPerson = new Person("abody", "Haak", "StreetsJoab", "JOAB@joab.nl", 1, "JoabPinCode", "Passw");


//To set the values in the sitter
$myPerson->firstName = "aisha";
$myPerson->lastName = "aaaksema";
$myPerson->street = "semasenstraat";
$myPerson->city = "Utrecht";
$myPerson->password = "0123456789";
$myPerson->authorizationLevel = 3;


//To get the values from the getter
echo $myPerson->firstName . "<br><br>";
echo $myPerson->lastName . "<br><br>";
echo $myPerson->street . "<br><br>";
echo $myPerson->city . "<br><br>";
echo $myPerson->email . "<br><br>";
echo $myPerson->password . "<br><br>";
echo $myPerson->pincode . "<br><br>";
echo $myPerson->authorizationLevel . "<br><br>";

//Get the full name of the Person using the method getFullName()
$fullName = $myPerson->getFullName();
echo "De volledige naam is : " . $fullName . "<br><br>";

//Get the authorization level of the Person using the method getAuthorizationLevel()
echo "De medewerker heeft Autorisatie als " .  $myPerson->getAuthorizationLevel() . "<br><br>";

//Check if this password is identical to the previous password we have already added it in the property, using method checkPassword($password)
$result = $myPerson->checkPassword("this_Is_Password");
if ($result) {
    echo "Ja, je wachtwoord is goed" . "<br><br>";
} else {
    echo "Nee, je wachtwoord is niet goed" . "<br><br>";
}

//Get the password using the method getPassword()
echo "De wachtwoord is : " . $myPerson->getPassword() . "<br><br>";

//Get the Pincode using the method getPincode()
echo "De pincode is : " . $myPerson->getPincode() . "<br><br>";


/* echo "<pre>";
print_r ($myPerson);
echo "</pre>";
 */

?>
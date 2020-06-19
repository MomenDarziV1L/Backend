<?php
/*
* File name:    Person.php
* Author:       Momen Darzi
* Date:         08-06-2020
* Back-end programeren
*/

class Person {
    //Make Properties
    private  $firstName;
    private  $lastName;
    private  $street;
    private  $city;
    private  $email;
    private  $authorizationLevel;  //1=User 3=Manager 5=Admin
    private  $pincode;
    private  $password;

    //To initialize an object's properties upon creation of the object
    function __construct($firstName, $lastName, $street, $email, $authorizationLevel, $pincode, $password) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->street = $street;
        $this->email = $email;

        //Check value is 1, 3 or 5
        if (($authorizationLevel == 1) || ($authorizationLevel == 3) ||($authorizationLevel == 5)) {
            $this->authorizationLevel = $authorizationLevel;
        } else {
            $this->authorizationLevel = 1;
        }

        //Check length larger/equal to 6
        if (strlen($password) >= 6) {
            $this->password = $password;
        } else {
            $this->password = "thisIsALongPassword";
        }
        $this->pincode = $pincode;
    }

    function __destruct() {     //Destructor to stop and exit the script.
        echo "Einde " . $this->firstName . "<br>";
    }

    //Run when writing data to inaccessible (protected or private) or non-existing properties
    function __set($key, $value) {
        if ($key === "firstName") {
            if ((strlen($value) < 2) || (strlen($value) > 40)) {
                echo "Foutieve invoer (firstname) <br>";
                exit;
            } else {
                $this->$key = $value;
            }

        } elseif ($key === "lastName") {
            if ((strlen($value) < 2) || (strlen($value) > 60)) {
                echo "Foutieve invoer (lastname) <br>";
                exit;
            } else {
                $this->$key = $value;
            }

        } elseif ($key === "street") {
            if ((strlen($value) < 2) || (strlen($value) > 60)) {
                echo "Foutieve invoer (street) <br>";
                exit;
            } else {
                $this->$key = $value;
            }

        } elseif ($key === "city") {
            if ((strlen($value) < 2) || (strlen($value) > 80)) {
                echo "Foutieve invoer (city) <br>";
                exit;
            } else {
                $this->$key = $value;
            }

        } elseif ($key === "password") {
            if ((strlen($value) == 10) || (strlen($value) == 0)) {
                $this->$key = $value;
            } else {
                echo "Foutieve invoer (password) <br>";
                exit;
            }

        } elseif ($key === "authorizationLevel") {
            if (($value == 1) || ($value == 3) || ($value == 5)) {
                $this->$key = $value;
            } else {
                echo "Foutieve invoer (authorizationLevel) <br>";
                exit;
            }

        } else {
            $this->$key = $value;
        }
    }

    //To read data from inaccessible (protected or private) or non-existing properties
    function __get($key) {
        if ($key === "firstName"){
            return ucfirst($this->firstName);

        } elseif ($key === "lastName"){
            return ucfirst($this->lastName);

        } elseif ($key === "street"){
            return ucfirst($this->street);

        } elseif ($key === "city"){
            return strtoupper($this->city);

        } elseif ($key === "email"){
            return strtolower($this->email);

        } elseif ($key === "password"){
            return "Het is niet moegelijk om password weer te geven";

        } elseif ($key === "pincode"){
            return "Het is niet moegelijk om pincode weer te geven";

        }  elseif ($key === "authorizationLevel"){
            return "Het is niet moegelijk om authorization level weer te geven";

        }
    }

    function getFullName() {             //Method to get full name
        return $this->firstName . " " . $this->lastName;
    }


    function getAuthorizationLevel() {      //Method to determine which authorization the Person has 
        switch ($this->authorizationLevel) {
        case 1: return "Gebruiker";
        case 3: return "Beheerder";
        case 5: return "Admin";
        default: return "Error, Exit";
        exit;
        }
    }

    function checkPassword($password) {     //Method to check if this password is identical to the previous password we have already added it in the property
        if ($this->password == $password) {
            return true;        
        } else {
            return false;
        }
    }

    function getPassword() {            //Method to get the password
        return  $this->password;
    }

    function getPincode() {             //Method to get the Pincode
        return $this->pincode;
    }

}

?>
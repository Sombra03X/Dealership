<?php
require "Users.php";
// take input variables from the table
$firstname =         $_POST["firstname"];
$lastname =          $_POST["lastname"];
$nohashpassword =    $_POST["password"];
$password =          password_hash($nohashpassword, PASSWORD_DEFAULT); // hashes the password (
$email =             $_POST["email"];
$phone =             $_POST["phone"];

// maken object ---------------------------------------------------
$user = new User($firstname, $lastname, $password, $email, $phone); // creates the object
$user->createUser();
?>
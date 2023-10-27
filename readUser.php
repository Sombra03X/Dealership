<?php
require 'header.php';
require "classes/Users.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "classes/dbh.php";	// connects to the database
    
    //  -------------------------
    $id =                $_POST["id"];
    $firstname =         $_POST["firstname"];
    $lastname =          $_POST["lastname"];
    $nohashpassword =    $_POST["password"];
    $password =          password_hash($nohashpassword, PASSWORD_DEFAULT); // hashes the password
    $email =             $_POST["email"];
    $phone =             $_POST["phone"];
    
    // maken object ---------------------------------------------------
    $user = new User($firstname, $lastname, $password, $email, $phone, $id); // creates the object
    $user->updateUser($id);		//
}

if (!isset($_SESSION['email'])) {
    echo '<h2>If you are a user, please login at <a href="Login.php">our login page</a>. If not, please return to the <a href="Home.php">main page</a></h2>.';
} else {
    echo '<h2>Profile Check/Update</h2>';
    
    $user = new User();
    $user->readUser();
}

require 'footer.php';
?>
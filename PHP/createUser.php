<?php
require '../header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../classes/Users.php";	    // connects to the OOP file
    require "../classes/dbh.php";	// connects to the database
    
    //  -------------------------
    $id = NULL;	         // auto incremented; not an input value
    $firstname =         $_POST["firstname"];
    $lastname =          $_POST["lastname"];
    $nohashpassword =    $_POST["password"];
    $password =          password_hash($nohashpassword, PASSWORD_DEFAULT); // hashes the password (
    $email =             $_POST["email"];
    $phone =             $_POST["phone"];
    
    // maken object ---------------------------------------------------
    $user = new User($firstname, $lastname, $password, $email, $phone); // creates the object
    $user->createUser();		//
}
?>

<form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
	<div>
		<label>Firstname *</label>
		<input placeholder="Enter your Firstname" type="text" name="firstname" required="">
	</div>
		<label>Lastname *</label>
		<input placeholder="Enter your Lastname" type="text" name="lastname" required="">
	</div>
	<div>
		<label>Password *</label>
		<input placeholder="Enter your Password" type="password" name="password" required="">
	</div>
		<label>Email *</label>
		<input placeholder="Enter your Username" type="text" name="email" required="">
	</div>
	<div>
		<label>Phone *</label>
		<input placeholder="Enter your Username" type="text" name="phone" required="">
	</div>
	<input type="submit" value="Register">
</form>

<a href="">Have an account? Login here!</a>
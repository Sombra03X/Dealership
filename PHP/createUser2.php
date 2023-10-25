<?php
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
			?>
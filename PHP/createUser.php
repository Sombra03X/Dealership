<?php
require '../header.php';
?>

<form action="createUser2.php" method="post">
	<div>
		<label>Firstname *</label>
		<input placeholder="Enter your Username" type="text" name="firstname" required="">
	</div>
		<label>Lastname *</label>
		<input placeholder="Enter your Username" type="text" name="lastname" required="">
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
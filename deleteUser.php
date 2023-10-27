<?php
require 'header.php';

if (!isset($_SESSION['email'])) {
    echo '<h1>If you are a user, please login at <a href="Login.php">our login page</a>. 
    If not, please return to the <a href="Home.php">main page</a></h1>.';
}else{
    require "classes/Users.php";
    echo '<h1>Profile Check/Update</h1>';
    
    $user1 = new User();
    $user1->readUser();
}

require 'footer.php';
?>
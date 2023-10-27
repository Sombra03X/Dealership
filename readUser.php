<?php
require 'header.php';
?>
<main>
<?php
if (!isset($_SESSION['email'])) {
    echo '<h2>If you are a user, please login at <a href="Login.php">our login page</a>. If not, please return to the <a href="Home.php">main page</a></h2>.';
}else{
    require "classes/Users.php";
    echo '<h2>Profile Check/Update</h2>';
    
    $user1 = new User();
    $user1->readUser();
}
?>
</main>
<?php 
require 'footer.php';
?>
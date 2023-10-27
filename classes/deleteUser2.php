<?php
require '../header.php';
require "Users.php";

$name = $_SESSION["email"];
$user =  new User();
$user->deleteUser($email);
?>
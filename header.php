<?php
SESSION_START();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="lamborghini.ico">
    <link href="CSS/styles.css" type="text/css" rel="stylesheet">
</head>
<body>

    <nav id="nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="createCar.php">Create Car</a></li>
            <li><a href="readCar.php">Read Car</a></li>
            <?php 
            if (!isset($_SESSION['email'])) {
                echo "<li><a href='createUser.php'>Register</a></li>";
                echo "<li><a href='login.php'>Login</a></li>";
            } else {
                echo "<li><a href='readUser.php'>User Email: " . $_SESSION["email"] . "</a></li>";
                echo "<li><a href='logout.php'>Logout</a></li>";
            }
            ?>
        </ul>
    </nav>
    
    <main>
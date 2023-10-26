<?php
include "../header.php";
require_once "../classes/dbh.php";
require_once "../classes/car.php";

// Check if the ID parameter is present in the URL
if (isset($_GET['id'])) {
    // Retrieve the car ID from the URL parameter
    $carId = $_GET['id'];

    // Create a new Car object and fetch the existing car record
    $car = new Car(null, null, null, null, null, null, null, $carId, $conn);
    $existingCar = $car->readById();

    // Check if the car record exists
    if ($existingCar) {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
            // Check if the delete button was clicked
            
            // Call the delete method to delete the car record
            $car->delete();

            // Redirect to a page after deletion
            ?>
            <main>
            <p>Car record deleted successfully.</p> <br>
            <a class="button" href='readCar.php'>Back to car list</a>
            </main>
            <?php
            exit();
        }
    } else {
        echo "Car record not found.";
    }
} else {
    echo "Car ID not provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Car Record</title>
</head>
<body>
    <main>
        <h1>Delete Car Record</h1>
        <form action="" method="post">
            <p>Are you sure you want to delete this car record?</p>
            <a href="readCar.php">Cancel</a>
            <button type="submit" name="delete">Delete Car</button>
        </form>
    </main>
</body>
</html>
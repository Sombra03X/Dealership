<?php
include 'header.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Require the car class definition and database connection
    require_once 'classes/dbh.php';
    require_once 'classes/car.php';

    // Retrieve form data
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $description = $_POST['description'];

    // Create a new car object
    $car = new Car($make, $model, $year, $color, $price, $image, $description, null, $conn);

    // Call the create method to insert the car record into the database
    $car->create();

    // redirect to readCar.php
    ?>
    <main>
        <p>Car record created successfully.</p>
        <br>
        <a class="button" href='readCar.php'>Back to car list</a>
    </main>
    <?php
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamborghini - Create</title>
</head>
    <body>
        <main>
        <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
            <label for="make">Make:</label>
            <input type="text" id="make" name="make" value="Lamborghini" readonly><br>

            <label for="model">Model:</label>
            <input type="text" id="model" name="model" required><br>

            <label for="year">Year:</label>
            <input type="number" id="year" name="year" required><br>

            <label for="color">Color:</label>
            <input type="text" id="color" name="color" required><br>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required><br>

            <label for="image">Image URL:</label>
            <input type="text" id="image" name="image" required><br>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea><br>

            <a href="../index.php" class="button">Cancel</a>
            <br>
            <button type="submit" name="Create Car">Create car</button>
        </form>
    </main>
    </body>
</html>
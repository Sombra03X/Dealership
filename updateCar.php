<?php
include "header.php";
require_once "classes/dbh.php";
require_once "classes/car.php";

// Check if the ID parameter is present in the URL
if (isset($_GET['id'])) {
    // Retrieve the car ID from the URL parameter
    $carId = $_GET['id'];

    // Create a new Car object and fetch the existing car record
    $car = new Car(null, null, null, null, null, null, null, $carId, $conn);
    $existingCar = $car->readById();

    // Check if the car record exists
    if ($existingCar) {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
            // Check if the "Update" button was clicked

            // Retrieve and validate form data
            $make = $_POST["make"];
            $model = $_POST["model"];
            $year = $_POST["year"];
            $color = $_POST["color"];
            $price = $_POST["price"];
            $image = $_POST["image"];
            $description = $_POST["description"];

            // Update the Car object with the new data
            $car->setMake($make);
            $car->setModel($model);
            $car->setYear($year);
            $car->setColor($color);
            $car->setPrice($price);
            $car->setImage($image);
            $car->setDescription($description);

            // Call the update method
            $car->update();

            // Redirect to readCar.php
            ?>
            <main>
                <p>Car record updated successfully.</p>
                <br>
                <a class="button" href='readCar.php'>Back to car list</a>
            </main>
            <?php
            exit();
        }
    } else {
        ?>
        <main>
        <p>Car record not found.</p>
        </main>
        <?php
    }
} else {
    ?>
    <p>Car ID not provided.</p>
    <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Car Record</title>
</head>
<body>
    <main>
    <h1>Update Car Record</h1>
    <form action="" method="post">
        <label for="make">Make:</label>
        <input type="text" id="make" name="make" value="<?php echo $existingCar['make']; ?>" required><br>

        <label for="model">Model:</label>
        <input type="text" id="model" name="model" value="<?php echo $existingCar['model']; ?>" required><br>

        <label for="year">Year:</label>
        <input type="text" id="year" name="year" value="<?php echo $existingCar['year']; ?>" required><br>

        <label for="color">Color:</label>
        <input type="text" id="color" name="color" value="<?php echo $existingCar['color']; ?>" required><br>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="<?php echo $existingCar['price']; ?>" required><br>

        <label for="image">Image:</label>
        <input type="text" id="image" name="image" value="<?php echo $existingCar['image']; ?>"><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"><?php echo $existingCar['description']; ?></textarea><br>

        <a class="button" href="readCar.php">Cancel</a>
        <br>
        <button type="submit" name="update">Update Car</button>
    </form>
</main>
</body>
</html>
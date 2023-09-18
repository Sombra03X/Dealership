<?php
    // Check if the car ID is provided in the URL
    if (isset($_GET['id'])) {
        // Retrieve the car details based on the ID
        $carId = $_GET['id'];
        
        // You should have a function to fetch car details by ID from your database
        // For this example, let's assume you have a function named getCarById
        // This function should return an instance of the Car class with car details
        $car = getCarById($carId);
    }
    
    // Check if the form is submitted
    if (isset($_POST['update'])) {
        // Get updated values from the form
        $make = $_POST['make'];
        $model = $_POST['model'];
        $year = $_POST['year'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $description = $_POST['description'];

        // Update the car object with the new values
        $car->setMake($make);
        $car->setModel($model);
        $car->setYear($year);
        $car->setColor($color);
        $car->setPrice($price);
        $car->setImage($image);
        $car->setDescription($description);

        // Call the update method to update the car in the database
        $car->update();
    }
    ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Car Information</title>
</head>
<body>
    <h1>Update Car Information</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $car->getId(); ?>">
        <label for="make">Make:</label>
        <input type="text" id="make" name="make" value="<?php echo $car->getMake(); ?>"><br>
        
        <label for="model">Model:</label>
        <input type="text" id="model" name="model" value="<?php echo $car->getModel(); ?>"><br>
        
        <label for="year">Year:</label>
        <input type="text" id="year" name="year" value="<?php echo $car->getYear(); ?>"><br>
        
        <label for="color">Color:</label>
        <input type="text" id="color" name="color" value="<?php echo $car->getColor(); ?>"><br>
        
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="<?php echo $car->getPrice(); ?>"><br>
        
        <label for="image">Image URL:</label>
        <input type="text" id="image" name="image" value="<?php echo $car->getImage(); ?>"><br>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description"><?php echo $car->getDescription(); ?></textarea><br>
        
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>

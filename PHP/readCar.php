<?php
include '../header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Listing</title>
</head>
<body>
    <main>
        <h1>Car Listing</h1>
        <table>
            <thead>
                <tr>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // database connection file
                include "../classes/dbh.php";

                // Include Car class file
                include "../classes/car.php";

                try {
                    // Create a new Car object
                    $car = new Car(null, null, null, null, null, null, null, null, $conn);

                    // Call the read function
                    $cars = $car->read();

                    // Loop through the car data and generate table rows
                    foreach ($cars as $car) {
                        echo "<tr>";
                        echo "<td>" . $car['make'] . "</td>";
                        echo "<td>" . $car['model'] . "</td>";
                        echo "<td>" . $car['year'] . "</td>";
                        echo "<td>" . $car['color'] . "</td>";
                        echo "<td>" . $car['price'] . "</td>";
                        echo "<td>" . $car['description'] . "</td>";
                        echo "<td> <img src='" . $car['image'] . "'></td>";
                        
                        // Add Update and Delete buttons with links to appropriate actions
                        echo '<td>';
                        echo '<a href="updateCar.php?id=' . $car['id'] . '">Update</a>';
                        echo ' | ';
                        echo '<a href="deleteCar.php?id=' . $car['id'] . '">Delete</a>';
                        echo '</td>';
                        
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>

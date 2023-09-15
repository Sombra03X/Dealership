<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Listing</title>
</head>
<body>
    <h1>Car Listing</h1>
    <table>
        <thead>
            <tr>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Color</th>
                <th>Price</th>
                <th>Image</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include the external database connection file
            include "../classes/dbh.php";

            // Include your Car class file
            include "../classes/car.php";

            try {
                // Create a new Car object with the database connection
                $car = new Car(null, null, null, null, null, null, null, null, $conn);

                // Call the read function to retrieve car data
                $cars = $car->read();

                // Loop through the car data and generate table rows
                foreach ($cars as $car) {
                    echo "<tr>";
                    echo "<td>" . $car['make'] . "</td>";
                    echo "<td>" . $car['model'] . "</td>";
                    echo "<td>" . $car['year'] . "</td>";
                    echo "<td>" . $car['color'] . "</td>";
                    echo "<td>" . $car['price'] . "</td>";
                    echo "<td>" . $car['image'] . "</td>";
                    echo "<td>" . $car['description'] . "</td>";
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Require the car class definition and database connection
    require_once '../classes/dbh.php';
    require_once '../classes/appointment.php';

    // Retrieve form data
    $user_name = $_POST['naam'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $car_model = $_POST['model'];
    $car_year = $_POST['year'];
    $appointment_date = $_POST['dateappo'];
    

    // Create a new car object
    $appointment = new Appointment($user_name, $user_email, $user_phone, $car_model, $car_year, $appointment_date, null, $conn);

    // Call the create method to insert the car record into the database
    $appointment->createAppo();

    // Redirect to a success page or display a success message
    header("../index.php");
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
        <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" required><br>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required><br>

            <label for="phone">mobil:</label>
            <input type="text" id="phone" name="phone" required><br>

            <label for="model">Model:</label>
            <input type="text" id="model" name="model" required><br>

            <label for="year">jaar:</label>
            <input type="number" id="year" name="year" required><br>

            <label for="dateappo"> datum:</label>
            <input type="date" id="dateappo" name="dateappo" required><br>

            
            <input type="submit" value="Create Appointment">
        </form>

    </body>
</html>
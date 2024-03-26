<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $carColor = $_POST["carColor"];
    $carLicense = $_POST["carLicense"];
    $carEngine = $_POST["carEngine"];
    $appointmentDate = $_POST["appointmentDate"];
    $mechanicId = $_POST["mechanic"];

    // Insert client
    $sql = "INSERT INTO clients (client_name, phone, car_color, car_license_number, car_engine_number) VALUES ('$name', '$phone', '$carColor', '$carLicense', '$carEngine')";
    if ($conn->query($sql) === TRUE) {
        $clientId = $conn->insert_id; // Get the ID of the newly inserted client

        // Insert appointment
        $sql = "INSERT INTO appointments (client_id, mechanic_id, appointment_date) VALUES ($clientId, $mechanicId, '$appointmentDate')";
        if ($conn->query($sql) === TRUE) {
            echo "Appointment booked successfully.";
        } else {
            echo "Error booking appointment: " . $conn->error;
        }
    } else {
        echo "Error adding client: " . $conn->error;
    }
}
?>

<?php
include 'config.php';

// Handle form submissions
if (isset($_POST['addMechanic'])) {
    $mechanicName = $_POST['mechanicName'];
    $maxCars = $_POST['maxCars'];
    $sql = "INSERT INTO mechanics (mechanic_name, max_cars) VALUES ('$mechanicName', $maxCars)";
    if ($conn->query($sql) === TRUE) {
        echo "Mechanic added successfully.";
    } else {
        echo "Error adding mechanic: " . $conn->error;
    }
} elseif (isset($_POST['removeMechanic'])) {
    $mechanicId = $_POST['mechanicId'];
    $sql = "DELETE FROM mechanics WHERE mechanic_id = $mechanicId";
    if ($conn->query($sql) === TRUE) {
        echo "Mechanic removed successfully.";
    } else {
        echo "Error removing mechanic: " . $conn->error;
    }
} elseif (isset($_POST['changeAppointment'])) {
    $clientId = $_POST['clientId'];
    $newAppointmentDate = $_POST['newAppointmentDate'];
    $newMechanicId = $_POST['newMechanicId'];
    $sql = "UPDATE appointments SET appointment_date = '$newAppointmentDate', mechanic_id = $newMechanicId WHERE client_id = $clientId";
    if ($conn->query($sql) === TRUE) {
        echo "Appointment updated successfully.";
    } else {
        echo "Error updating appointment: " . $conn->error;
    }
}

// Fetch all appointments
$appointmentsSql = "SELECT clients.client_name, clients.phone, clients.car_license_number, appointments.appointment_date, mechanics.mechanic_name FROM appointments JOIN clients ON appointments.client_id = clients.client_id JOIN mechanics ON appointments.mechanic_id = mechanics.mechanic_id";
$appointmentsResult = $conn->query($appointmentsSql);

// Fetch all mechanics
$mechanicsSql = "SELECT * FROM mechanics";
$mechanicsResult = $conn->query($mechanicsSql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="admin_style.css">
</head>

<body>
<nav>
        <ul>
            <li><a href="#appointments">Appointments</a></li>
            <li><a href="#mechanics">Mechanics</a></li>
            <li><a href="#changeAppointment">Change Appointment Details</a></li>
        </ul>
    </nav>
    
    <div id="all_items">
        <div id="appointments">
            <h2>Appointments</h2>
            <table>
                <tr>
                    <th>Client Name</th>
                    <th>Phone</th>
                    <th>Car Registration Number</th>
                    <th>Appointment Date</th>
                    <th>Mechanic Name</th>
                </tr>
                <?php while ($row = $appointmentsResult->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['client_name']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['car_license_number']; ?></td>
                        <td><?php echo $row['appointment_date']; ?></td>
                        <td><?php echo $row['mechanic_name']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>

        <div id="mechanics">
            <h2>Mechanics</h2>
            <form method="post">
                <label for="mechanicName">Mechanic Name:</label>
                <input type="text" id="mechanicName" name="mechanicName" required><br>
                <label for="maxCars">Max Cars:</label>
                <input type="number" id="maxCars" name="maxCars" required><br>
                <input type="submit" name="addMechanic" value="Add Mechanic">
            </form>
            <table>
                <tr>
                    <th>Mechanic Name</th>
                    <th>Max Cars</th>
                    <th>Actions</th>
                </tr>
                <?php while ($row = $mechanicsResult->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['mechanic_name']; ?></td>
                        <td><?php echo $row['max_cars']; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="mechanicId" value="<?php echo $row['mechanic_id']; ?>">
                                <input type="submit" name="removeMechanic" value="Remove">
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>

        <div id="changeAppointment">
            <h2>Change Appointment Details</h2>
            <form method="post">
                <label for="clientId">Select Client:</label>
                <select id="clientId" name="clientId">
                    <?php
                    $clientsSql = "SELECT client_id, client_name FROM clients";
                    $clientsResult = $conn->query($clientsSql);
                    while ($row = $clientsResult->fetch_assoc()) : ?>
                        <option value="<?php echo $row['client_id']; ?>"><?php echo $row['client_name']; ?></option>
                    <?php endwhile; ?>
                </select><br>
                <label for="newAppointmentDate">New Appointment Date:</label>
                <input type="date" id="newAppointmentDate" name="newAppointmentDate" required><br>
                <label for="newMechanicId">Select Mechanic:</label>
                <select id="newMechanicId" name="newMechanicId">
                    <?php
                    $mechanicsSql = "SELECT mechanic_id, mechanic_name FROM mechanics";
                    $mechanicsResult = $conn->query($mechanicsSql);
                    while ($row = $mechanicsResult->fetch_assoc()) : ?>
                        <option value="<?php echo $row['mechanic_id']; ?>"><?php echo $row['mechanic_name']; ?></option>
                    <?php endwhile; ?>
                </select><br>
                <input type="submit" name="changeAppointment" value="Change Appointment">
            </form>
        </div>
    </div>

</body>

</html>
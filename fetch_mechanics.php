<?php
include 'config.php';

$sql = "SELECT * FROM mechanics";
$result = $conn->query($sql);

$mechanics = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $mechanics[] = $row;
    }
}

echo json_encode($mechanics);
?>

<?php
include "connect.php";

$sql = "SELECT * FROM travel_logs ORDER BY created_at DESC";
$result = $conn->query($sql);

$logs = [];

while ($row = $result->fetch_assoc()) {
    $logs[] = $row;
}

header('Content-Type: application/json');
echo json_encode($logs);
?>
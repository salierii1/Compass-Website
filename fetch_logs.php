<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['stdID'])) {
    echo json_encode([]);
    exit;
}

$user_id = $_SESSION['stdID'];
$sql = "SELECT * FROM travel_logs WHERE stdID = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$logs = [];
while ($row = $result->fetch_assoc()) {
    $logs[] = $row;
}

header('Content-Type: application/json');
echo json_encode($logs);
?>
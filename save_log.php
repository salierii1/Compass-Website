<?php
session_start();
include "connect.php";

if (!isset($_SESSION['stdID'])) {
    die("Not logged in.");
}

$stdID = $_SESSION['stdID'];
$title = $_POST['title'];
$destination = $_POST['destination'];
$date = $_POST['date'];
$description = $_POST['description'];

$image = $_FILES['image'];
$uploadDir = "userassets/";
$imageName = $stdID . "_" . time() . "_" . basename($image['name']);
$targetPath = $uploadDir . $imageName;

// Move the uploaded file
if (move_uploaded_file($image['tmp_name'], $targetPath)) {
    $stmt = $conn->prepare("INSERT INTO logs (stdID, title, destination, travel_date, description, image_path) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $stdID, $title, $destination, $date, $description, $targetPath);
    $stmt->execute();
    echo "success";
} else {
    echo "Failed to upload image.";
}
?>

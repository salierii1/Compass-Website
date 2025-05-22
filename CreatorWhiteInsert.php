<?php
if (isset($_POST['submit'])) {
    $city = $_POST['city'];
    $country = $_POST['country'];
    $activity_id = $_POST['activity_id'];
    $info_type_id = $_POST['info_type_id'];
    $description = $_POST['description'];

    $conn = new mysqli("localhost", "root", "", "simple_page");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO travel_packages (city, country, activity_id, info_type_id, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiis", $city, $country, $activity_id, $info_type_id, $description);

    if ($stmt->execute()) {
        echo "<script>alert('Package registered successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: CreatorWhite.php");
    exit();
}
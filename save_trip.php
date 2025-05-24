<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['stdID'])) {
    die("You must be logged in to submit a trip plan.");
}

// Database connection
$servername = "localhost";
$username = "root"; // Use your database username
$password = "";     // Use your database password
$dbname = "simple_page";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data safely from $_POST with default fallbacks
$selectedCountry = $_POST['selectedCountry'] ?? '';
$departure_date = $_POST['departure_date'] ?? '';
$duration = $_POST['duration'] ?? 0;
$budget = $_POST['budget'] ?? 0.0;
$activities = isset($_POST['activities']) ? implode(", ", $_POST['activities']) : '';
$information = isset($_POST['information']) ? implode(", ", $_POST['information']) : '';
$notes = $_POST['notes'] ?? '';
$stdID = $_SESSION['stdID'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO trips (stdID, selectedCountry, departure_date, duration, budget, activities, information, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("ssssisss", $stdID, $selectedCountry, $departure_date, $duration, $budget, $activities, $information, $notes);

// Execute the statement
if ($stmt->execute()) {
    // Redirect to planner.php after successful insertion
    header("Location: travelplanner.php");
    exit(); // Ensure no further code is executed after the redirect
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
<?php
session_start();
include 'connect.php';  // your DB connection

if (!isset($_SESSION['stdID'])) {
    header("Location: login.php");
    exit();
}

$userID = $_SESSION['stdID'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $destination = mysqli_real_escape_string($conn, $_POST['destination']);
    $travel_date = $_POST['travel_date'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'userassets/';
        // Create folder if not exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Create unique filename with userID and timestamp or increment
        $newFileName = $userID . '_img_' . time() . '.' . $fileExt;
        $destPath = $uploadDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            // Insert into DB
            $sql = "INSERT INTO travel_logs (stdID, title, destination, travel_date, description, image_path) 
                    VALUES ('$userID', '$title', '$destination', '$travel_date', '$description', '$destPath')";
            if ($conn->query($sql) === TRUE) {
                header("Location: travel_logs.php?success=1"); // Redirect back or to logs page
                exit();
            } else {
                echo "Database error: " . $conn->error;
            }
        } else {
            echo "Error uploading the image.";
        }
    } else {
        echo "No image uploaded or upload error.";
    }
}
?>

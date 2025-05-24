<?php
include 'connect.php';

$sql = "SELECT * FROM travel_logs ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Travel Logs</title>
    <style>
        .travel-log {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 20px;
        }
        .travel-log img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Travel Logs</h1>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='travel-log'>";
            echo "<h2>" . htmlspecialchars($row["title"]) . "</h2>";
            echo "<p><strong>Destination:</strong> " . htmlspecialchars($row["destination"]) . "</p>";
            echo "<p><strong>Date:</strong> " . htmlspecialchars($row["travel_date"]) . "</p>";
            echo "<p>" . nl2br(htmlspecialchars($row["description"])) . "</p>";
            echo "<img src='" . htmlspecialchars($row["image_path"]) . "' alt='Travel Image'>";
            echo "<p><small>Posted on: " . $row["created_at"] . "</small></p>";
            echo "</div>";
        }
    } else {
        echo "<p>No travel logs found.</p>";
    }

    $conn->close();
    ?>
</body>
</html>

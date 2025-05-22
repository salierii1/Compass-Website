<?php
// Database connection reused
$conn = new mysqli("localhost", "root", "", "simple_page");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Travel Package</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Register a Travel Package</h2>
    <form action="CreatorWhite.php" method="POST">
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" name="country" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Activities</label>
            <div class="d-flex flex-wrap gap-2">
                <?php
                $activity = $conn->query("SELECT * FROM activities");
                while ($row = $activity->fetch_assoc()) {
                    echo "
                    <div class='form-check form-check-inline'>
                        <input class='btn-check' type='checkbox' name='activity_ids[]' id='activity{$row['id']}' value='{$row['id']}'>
                        <label class='btn btn-outline-success' for='activity{$row['id']}'>{$row['name']}</label>
                    </div>
                    ";
                }
                ?>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Information Types</label>
            <div class="d-flex flex-wrap gap-2">
                <?php
                $info = $conn->query("SELECT * FROM info_types");
                while ($row = $info->fetch_assoc()) {
                    echo "
                    <div class='form-check form-check-inline'>
                        <input class='btn-check' type='checkbox' name='info_type_ids[]' id='infoType{$row['id']}' value='{$row['id']}'>
                        <label class='btn btn-outline-primary' for='infoType{$row['id']}'>{$row['name']}</label>
                    </div>
                    ";
                }
                ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" rows="4" class="form-control" required></textarea>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Register Package</button>
    </form>
</div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $city = $_POST['city'];
    $country = $_POST['country'];
    $description = $_POST['description'];

    $activity_ids = $_POST['activity_ids'] ?? [];
    $info_type_ids = $_POST['info_type_ids'] ?? [];

    $activity_str = implode(',', $activity_ids);
    $info_type_str = implode(',', $info_type_ids);

    $conn = new mysqli("localhost", "root", "", "simple_page");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO travel_packages (city, country, activity_id, info_type_id, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $city, $country, $activity_str, $info_type_str, $description);

    if ($stmt->execute()) {
        echo "<script>alert('Package registered successfully!'); window.location.href='CreatorWhite.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Location: CreatorWhiteInsert.php");
    exit();
}
?>

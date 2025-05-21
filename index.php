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
    <form action="insert.php" method="POST">
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" name="country" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="activity_id" class="form-label">Activity</label>
            <select name="activity_id" class="form-select" required>
                <option value="">-- Select Activity --</option>
                <?php
                $conn = new mysqli("localhost", "root", "", "travel_filter");
                $activity = $conn->query("SELECT * FROM activities");
                while ($row = $activity->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="info_type_id" class="form-label">Information Type</label>
            <select name="info_type_id" class="form-select" required>
                <option value="">-- Select Info Type --</option>
                <?php
                $info = $conn->query("SELECT * FROM info_types");
                while ($row = $info->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
                ?>
            </select>
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

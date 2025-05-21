<?php
$con = mysqli_connect("localhost", "root", "", "travel_filter");

$activities = mysqli_query($con, "SELECT * FROM activities");
$infos = mysqli_query($con, "SELECT * FROM info_types");

$selected_activities = $_GET['activities'] ?? [];
$selected_infos = $_GET['info'] ?? [];
$city_input = $_GET['city'] ?? '';
$country_input = $_GET['country'] ?? '';

$where = [];

if ($city_input != '') {
    $where[] = "city LIKE '%" . mysqli_real_escape_string($con, $city_input) . "%'";
}

if ($country_input != '') {
    $where[] = "country LIKE '%" . mysqli_real_escape_string($con, $country_input) . "%'";
}

if (!empty($selected_activities)) {
    $ids = implode(",", array_map('intval', $selected_activities));
    $where[] = "activity_id IN ($ids)";
}

if (!empty($selected_infos)) {
    $ids = implode(",", array_map('intval', $selected_infos));
    $where[] = "info_type_id IN ($ids)";
}

$where_sql = !empty($where) ? "WHERE " . implode(" AND ", $where) : "";

$results = mysqli_query($con, "SELECT * FROM travel_packages $where_sql");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Filter Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <h2 class="mb-3">Travel Destination Filter</h2>

    <form method="GET">
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" id="city" class="form-control" placeholder="Enter city"
                   value="<?= htmlspecialchars($city_input) ?>">
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" name="country" id="country" class="form-control" placeholder="Enter country"
                   value="<?= htmlspecialchars($country_input) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Activities</label>
            <div class="form-check">
                <?php while ($row = mysqli_fetch_assoc($activities)) : ?>
                    <div>
                        <input type="checkbox" name="activities[]"
                               value="<?= $row['id'] ?>"
                            <?= in_array($row['id'], $selected_activities) ? 'checked' : '' ?>>
                        <?= $row['name'] ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Information Preferences</label>
            <div class="form-check">
                <?php while ($row = mysqli_fetch_assoc($infos)) : ?>
                    <div>
                        <input type="checkbox" name="info[]"
                               value="<?= $row['id'] ?>"
                            <?= in_array($row['id'], $selected_infos) ? 'checked' : '' ?>>
                        <?= $row['name'] ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Filter Results</button>
    </form>

    <hr>

    <h4>Results:</h4>
    <div class="row">
        <?php if (mysqli_num_rows($results) > 0): ?>
            <?php while ($package = mysqli_fetch_assoc($results)) : ?>
                <div class="col-md-4 mt-3">
                    <div class="card border p-3">
                        <h5><?= $package['city'] ?>, <?= $package['country'] ?></h5>
                        <p><?= $package['description'] ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No matching results found.</p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>

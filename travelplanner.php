<?php
$con = mysqli_connect("localhost", "root", "", "simple_page");

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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Adventure Planner</title>
  <link rel="stylesheet" href="styles.css">




  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>

<style>
    /* Base Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body, html {
  font-family: 'Segoe UI', sans-serif;
  background-color: #000;
  color: white;
background: linear-gradient(to bottom, rgb(219, 136, 52) 20%,#000000  70%);
}

/* Navbar */
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #00CEC3;
  padding: 1rem 2rem;
  color: white;
  animation: slideDown 0.8s ease-in-out;
}

.logo {
  font-size: 2rem;
  font-weight: bold;
  text-shadow: 1px 1px 2px black;
}

.navbar nav ul {
  list-style: none;
  display: flex;
  gap: 2rem;
}

.navbar nav ul li a {
  text-decoration: none;
  color: white;
  transition: all 0.3s ease;
  font-weight: bold;
  text-shadow: 1px 1px 2px black;
}

.navbar nav ul li a:hover {
  color: rgb(1, 119, 113);
  transform: scale(1.05);
}


/* Main Container */
.planner-container {
  padding: 30px 20px;
  max-width: 1000px;
  margin: 50px auto;
  border-radius: 10px;
}

.planner-container h1 {
  font-size: 2rem;
  margin-bottom: 10px;
  color: black;
}

.planner-container p {
  font-size: 1rem;
  margin-bottom: 20px;
  color: black;
}

/* Map Styling */
.map-container {
  text-align: center;
  margin-bottom: 25px;
}

.world-map {
  max-width: 100%;
  height: auto;
  border-radius: 10px;
}

.container {
    width: 100%;
    padding: 20px;
    margin: auto;
}

.city, .country, .description {
    margin: 10px 0;
    font-weight: normal;
}

.city {
    font-size: 1.5em;
    font-weight: bold;
}

.country {
    font-size: 1.2em;
    color: #6c757d;
}

.description {
    font-size: 1em;
    color: #343a40;
}



/* Base Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body, html {
  font-family: 'Segoe UI', sans-serif;
  background-color: #000;
  color: rgb(219, 136, 52);
  background: linear-gradient(to bottom, rgb(219, 136, 52) 20%, #000000 70%);
}

/* Main Container */
.container {
  padding: 30px 20px;
  max-width: 900px;
  margin: auto;
}

/* Form Sections */
.form-section {
  background-color: #00CEC3;
  padding: 20px;
  margin-bottom: 25px;
  border-radius: 10px;
  font-weight: bold;
}

/* Destination Box: City & Country Grouped */
.destination-group {
  display: flex;
  gap: 15px;
}

.destination-group .form-control {
  flex: 1;
  padding: 10px;
  border-radius: 6px;
  border: #00CEC3;
  font-size: 1rem;
}

/* Activity Section: Each Activity in Separate Box */
.activity-container {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
}

.activity-box {
  cursor: pointer;
  border: none;
  position: relative;
}

/* Hide the checkbox */
.activity-box input[type="checkbox"] {
  display: none;
}

/* Style the visual button (span) */
.activity-box span {
  display: inline-block;
  padding: 0.8rem 1.5rem;
  border-radius: 30px;
  font-weight: bold;
  background-color: #f0f0f0;
  color: #333;
  border: 2px solid #ccc;
  transition: all 0.3s ease;
}

/* When checkbox is checked, keep color */
.activity-box input[type="checkbox"]:checked + span {
  background-color: rgb(1, 119, 113);
  color: white;
  border-color: #00CEC3;
}
.activity-box:hover span {
  background-color: rgb(1, 119, 113);
  color: white;
  border-color: #00CEC3;
}


/* Information Preferences: Each Preference in Separate Box */
.info-container {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
}

.info-box {
  cursor: pointer;
  border: none;
  position: relative;
}

/* Hide the checkbox */
.info-box input[type="checkbox"] {
  display: none;
}

/* Style the visual button (span) */
.info-box span {
  display: inline-block;
  padding: 0.8rem 1.5rem;
  border-radius: 30px;
  font-weight: bold;
  background-color: #f0f0f0;
  color: #333;
  border: 2px solid #ccc;
  transition: all 0.3s ease;
}

/* When checkbox is checked, keep color */
.info-box input[type="checkbox"]:checked + span {
  background-color: rgb(1, 119, 113);
  color: white;
  border-color: #00CEC3;
}
.info-box:hover span {
  background-color: rgb(1, 119, 113);
  color: white;
  border-color: #00CEC3;
}

/* Checkbox Group (Horizontal Layout) */
.checkbox-group {
  display: flex;
  gap: 15px;
  flex-wrap: wrap;
}

.checkbox-group label {
  display: flex;
  align-items: center;
  font-size: 1rem;
}

/* Submit Button */
.btn-primary {
  background-color: #00CEC3;
  text-shadow: 1px 1px 5px black;
  color: white;
  font-weight: bold;
  padding: 12px 24px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-size: 1rem;
  display: block;
  margin: 20px auto 0;
}

.btn-primary:hover {
  background-color: #00CEC3;
}

.row .card {
  border-radius: 20px;
  box-shadow: 0 5px 25px rgba(0, 206, 195, 0.5);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  background-color: white;
}

.row .card:hover {
  transform: scale(1.02);
  box-shadow: 0 10px 35px rgba(0, 206, 195, 0.6);
}

.row .card h5 {
  font-size: 1.5rem;
  color: #00CEC3;
  margin-bottom: 0.5rem;
  text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
}

.row .card p {
  font-size: 1rem;
  color: #333;
}

/* Responsive */
@media (max-width: 768px) {
  .container {
    padding: 1rem;
  }

  .destination-group {
    flex-direction: column;
  }

  .checkbox-group {
    flex-direction: column;
  }

  .activity-container,
  .info-container {
    flex-direction: column;
  }
}



.map-container {
      width: 100%;
      max-width: 1000px;
      margin: 0 auto;
    }

    object {
      width: 100%;
      height: auto;
    }





</style>

  <header class="navbar">
    <div class="logo">🧭 COMPASS</div>
    <nav>
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="travelplanner.php">Travel Planner</a></li>
        <li><a href="destinations.php">Destinations</a></li>
        <li><a href="travelog.php">Travel Logs</a></li>
      </ul>
    </nav>
  </header>

  <main class="planner-container">
    <h1>ADVENTURE PLANNER</h1>
    <p>Either select a region on the map above or type it into the fields below:</p>

    <!-- Clickable Map -->
    <div class="map-container">
    <object id="worldMap" type="image/svg+xml" data="pictures/world.svg"></object>
</div>








    
    <div id="products"></div>

<div class="container py-4">

    <form method="GET">
        <div class="mb-3 form-section">
            <label class="form-label">Destination</label>
            <div class="destination-group">
                <input type="text" name="city" id="city" class="form-control" placeholder="City or closest major city"
                       value="<?= htmlspecialchars($city_input) ?>">
                <input type="text" name="country" id="country" class="form-control" placeholder="Country or Region"
                       value="<?= htmlspecialchars($country_input) ?>">
            </div>
        </div>

        <div class="mb-3 form-section">
    <label class="form-label">Activity</label>
    <div class="activity-container">
        <?php while ($row = mysqli_fetch_assoc($activities)) : ?>
            <label class="activity-box">
  <input type="checkbox" name="activities[]" value="<?= $row['id'] ?>"
    <?= in_array($row['id'], $selected_activities) ? 'checked' : '' ?>>
  <span><?= $row['name'] ?></span>
</label>

        <?php endwhile; ?>
    </div>
</div>


        <div class="mb-3 form-section">
    <label class="form-label">Information</label>
    <div class="info-container">
        <?php while ($row = mysqli_fetch_assoc($infos)) : ?>
            <label class="info-box">
                <input type="checkbox" name="info[]" value="<?= $row['id'] ?>"
                    <?= in_array($row['id'], $selected_infos) ? 'checked' : '' ?>>
                <span><?= $row['name'] ?></span>
            </label>
        <?php endwhile; ?>
    </div>
</div>

//button 
    <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>


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










  </main>





  <script>
const objectEl = document.getElementById('worldMap');

objectEl.addEventListener('load', () => {
  const svgDoc = objectEl.contentDocument;
  const paths = svgDoc.querySelectorAll('path');

  paths.forEach(path => {
    path.style.cursor = 'pointer';
    path.style.transition = 'fill 0.2s ease';

    // Store original fill
    const originalFill = path.getAttribute('fill') || '';

    path.addEventListener('mouseenter', () => {
      path.setAttribute('data-original-fill', originalFill); // backup
      path.setAttribute('fill', '#ffa500'); // orange on hover
    });

    path.addEventListener('mouseleave', () => {
      const prev = path.getAttribute('data-original-fill');
      if (prev) {
        path.setAttribute('fill', prev);
      } else {
        path.removeAttribute('fill'); // fallback
      }
    });

    path.addEventListener('click', () => {
      const country = path.getAttribute('title') || path.id || 'Unknown';

      // Fill in the country field
      const countryInput = document.getElementById('country');
      if (countryInput) {
        countryInput.value = country;

        // Submit the form
        countryInput.form.submit();
      } else {
        alert('Country input field not found.');
      }
    });
  });
});
</script>
























</body>
</html>


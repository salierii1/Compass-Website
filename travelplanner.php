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

$activity_condition = '';
$info_condition = '';

if (!empty($selected_activities)) {
    $ids = implode(",", array_map('intval', $selected_activities));
    $activity_condition = "activity_id IN ($ids)";
}

if (!empty($selected_infos)) {
    $ids = implode(",", array_map('intval', $selected_infos));
    $info_condition = "info_type_id IN ($ids)";
}

if ($activity_condition && $info_condition) {
    $where[] = "($activity_condition OR $info_condition)";
} elseif ($activity_condition) {
    $where[] = $activity_condition;
} elseif ($info_condition) {
    $where[] = $info_condition;
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
background: linear-gradient(to bottom, #00CEC3 20%,white  70%);
}

/* NAVBAR */
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #00CEC3;
  padding: 1rem 2rem;
  color: white;
}
.navbar {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 999;
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
  padding: 0;
  margin: 0;
}

.navbar nav ul li a {
  text-decoration: none;
  color: white;
  font-size: 1.2rem;
  transition: color 0.3s;
  font-weight: bold;
  text-shadow: 1px 1px 2px black;
}

.navbar nav ul li a:hover {
  color: rgb(1, 119, 113);
}

.sidebar-btn {
  background: none;
  border: none;
  color: white;
  font-size: 1.5rem;
  cursor: pointer;
  font-weight: bold;
  text-shadow: 1px 1px 2px black;
  transition: color 0.3s;
}

.navbar nav ul li {
  display: flex;
  align-items: center;
}

.sidebar-btn:hover {
  color: rgb(1, 119, 113);
}

.sidebar {
  position: fixed;
  top: 0;
  right: -300px;
  width: 250px;
  height: 100%;
  background-color: #00CEC3;
  box-shadow: -2px 0 8px rgba(0, 0, 0, 0.2);
  padding: 1rem 1rem;
  transition: right 0.3s ease-in-out;
  z-index: 1000;
  color: white;
}

.sidebar.open {
  right: 0;
}


.sidebar h3 {
  margin-bottom: 1rem;
  font-size: 2.5rem;
  color: white;
  text-shadow: 1px 1px 2px black;
  text-align: center;
}

.sidebar img {
  margin-top: 1.5rem;
  margin-bottom: 1rem;
  font-size: 1.5rem;
  color: white;
  text-shadow: 1px 1px 2px black;
  text-align: center;
}

.sidebar h2 {
  margin-bottom: 1rem;
  font-size: 1.5rem;
  color: white;
  text-shadow: 1px 1px 2px black;
  text-align: center;
}

.sidebar ul {
  list-style: none;
  padding: 0;
}

.sidebar ul li {
  margin: 1rem 0;
}

.sidebar ul li a {
  color: white;
  text-decoration: none;
  font-size: 1.1rem;
  transition: color 0.2s;
  font-weight: bold;
  text-shadow: 1px 1px 2px black;
}

.sidebar ul {
  display: flex;
  flex-direction: column;
  height: 70vh;
  justify-content: flex-start;
}

.sidebar ul li:last-child,
.sidebar ul li.logout-link {
  margin-top: auto;
}

.sidebar ul li.h,
.sidebar ul li.logout-link {
  margin-bottom: 1.5rem;
}

@media (max-width: 600px) {
  .sidebar ul {
    height: 60vh;
  }
}
.sidebar ul li {
  margin: 1rem 0;
  text-align: center;
}

.sidebar ul li a:hover {
  color: #003f3c;
}


/* Main Container */
.planner-container {
  padding: 30px 20px;
  max-width: 1000px;
  margin: 80px auto;
  border-radius: 10px;
}

.planner-container h1 {
  font-size: 3rem;
  font-weight: bold;
  margin-bottom: 10px;
  color: rgb(1, 119, 113);
  text-shadow: 1px 1px 2px black;
}

.planner-container p {
  font-size: 1.5rem;
  margin-bottom: 20px;
  color: rgb(1, 119, 113);
  text-shadow: 1px 1px 2px black;
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
  font-family: Georgia, 'Times New Roman', Times, serif;
  background-color: #000;
  color: rgb(1, 119, 113);
  background: linear-gradient(to bottom, #f0f0f0 20%, #00CEC3 70%);
}

/* Main Container */
.container {
  padding: 30px 20px;
  max-width: 900px;
  margin: auto;
}

.form-label {
  font-size: 1.2rem;
  margin-bottom: 10px;
  color: white;
  text-shadow: 1px 1px 2px black;
}

/* Form Sections */
.form-section {
  background-color: rgb(1, 119, 113);
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
  background-color: rgb(1, 119, 113);
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
  background-color:rgb(4, 70, 66);
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

.row h4 {
  font-size: 2rem;
  color: rgb(1, 119, 113);
  margin-bottom: 20px;
  font-weight: bold;
} 

.row .card h5 {
  font-size: 1.5rem;
  color: rgb(1, 119, 113);
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
    align-items: center;
  }
}



    .map-container {
      width: 100%;
      max-width: 100%;
      overflow: visible;
    }

    object#worldMap {
      width: 1100px;
      height: 80vh; /* Adjust this height as needed */
      display: block;
    }

    @keyframes fadeSlideUp {
  0% {
    opacity: 0;
    transform: translateY(30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}


.navbar {
  animation: fadeSlideUp 0.8s ease-out forwards;
}

.planner-container {
  opacity: 0;
  animation: fadeSlideUp 1s ease-out 0.3s forwards;
}

.sidebar {
  opacity: 0;
  animation: fadeSlideUp 1s ease-out 0.5s forwards;
}


</style>

  <script>
  document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');

    toggleBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      sidebar.classList.toggle('open');
    });

    document.addEventListener('click', (e) => {
      // Close sidebar if click outside
      if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
        sidebar.classList.remove('open');
      }
    });
  });
</script>
  <!-- NAVBAR -->
  <header class="navbar">
    <div class="logo">🧭 COMPASS</div>
    <nav>
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="travelplanner.php">Travel Planner</a></li>
        <li><a href="destinations.php">Destinations</a></li>
        <li><a href="travelog.php">Travel Logs</a></li>
        <li><button id="toggleSidebar" class="sidebar-btn">☰</button></li>
      </ul>
    </nav>

    <div class="sidebar" id="sidebar">
  <h3>🧭</h3>
  <h3>COMPASS</h3>
  <ul>
    <li style="text-align: center;">
      <img src="https://i.pravatar.cc/100" alt="Profile" style="border-radius: 50%; width: 80px; height: 80px; border: 2px solid white;">
    </li>
    <h2>@USERNAME</h2>
    <li><a href="#" class="h">History</a></li>
    <li><a href="#" class="logout">Log Out</a></li>
  </ul>
</div>


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


    <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>


    <hr>


<div class="row">
    <h4>Results:</h4>
    <?php if (mysqli_num_rows($results) > 0): ?>
        <?php while ($package = mysqli_fetch_assoc($results)) : ?>
            <div class="col-md-4 mt-3">
                <div class="card h-100 position-relative border p-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= htmlspecialchars($package['city']) ?>, <?= htmlspecialchars($package['country']) ?>
                        </h5>
                        <?php
                        $descWords = explode(' ', $package['description']);
                        $shortDesc = implode(' ', array_slice($descWords, 0, 10));
                        if (count($descWords) > 10) {
                            $shortDesc .= '...';
                        }
                        ?>
                        <p class="card-text"><?= htmlspecialchars($shortDesc) ?></p>

                        <?php
                        // Redirect logic
                        $redirects = [
                            6 => 'gateway.php',
                            7 => 'newzealand.php'
                        ];
                        $targetPage = $redirects[$package['id']] ?? 'gateway.php?id=' . $package['id'];
                        ?>
                        <a href="<?= $targetPage ?>" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="col-12">
            <p>No matching results found.</p>
        </div>
    <?php endif; ?>
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

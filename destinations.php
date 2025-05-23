<?php
$host = 'localhost';
$db = 'simple_page';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$selected_activities = isset($_GET['activity']) ? $_GET['activity'] : [];
$selected_info = isset($_GET['information']) ? $_GET['information'] : [];


$sql = "SELECT * FROM places WHERE 1=1";

if (!empty($search)) {
    $sql .= " AND (title LIKE '%$search%' OR description LIKE '%$search%' OR activity_tags LIKE '%$search%' OR info_tags LIKE '%$search%')";
}

if (!empty($selected_activities)) {
    foreach ($selected_activities as $activity) {
        $activity_safe = $conn->real_escape_string($activity);
        $sql .= " AND activity_tags LIKE '%$activity_safe%'";
    }
}

if (!empty($selected_info)) {
    foreach ($selected_info as $info) {
        $info_safe = $conn->real_escape_string($info);
        $sql .= " AND info_tags LIKE '%$info_safe%'";
    }
}

$result = $conn->query($sql);

$activity_options = ['Beach', 'Hiking', 'City', 'Nature'];
$info_options = ['Family-friendly', 'Budget', 'Luxury', 'Pet-friendly'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Compass Destinations</title>
  <link rel="stylesheet" href="style.css"/>
</head>

<style>
  /* Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Georgia, 'Times New Roman', Times, serif;
  background-color: white;
  color: #333;
  overflow-x: hidden;
}

.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #123499;
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
  color: #fcd639;
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
  color: #fcd639;
}

.sidebar {
  position: fixed;
  top: 0;
  right: -300px;
  width: 250px;
  height: 100%;
  background-color: #123499;
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
  color: #fcd639;
}

/* Hero Banner */
.featured-hero {
  background-image: url('https://cdn.tatlerasia.com/asiatatler/i/my/2018/11/05085630-thegreatoceanroad_cover_1920x1200.jpg');
  background-size: cover;
  min-height: 550px;
  margin: 7rem 2rem 0 2rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 5rem;
  border-radius: 20px;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
  flex-wrap: wrap;
  animation: fadeIn 1.2s ease-in-out;
}

.hero-text {
  flex: 1 1 300px;
  color: white;
  text-shadow: 1px 1px 2px black;
  animation: fadeUp 1.2s ease-in-out;
}

.hero-text h1 {
  font-size: 4.5rem;
  margin-bottom: 1rem;
}

.hero-text p {
  font-size: 1.5rem;
  font-weight: bold;
  max-width: 1000px;
}

.hero-img {
  flex: 1 1 250px;
  display: flex;
  justify-content: flex-end;
}

.hero-img img {
  max-width: 300px;
  border-radius: 10px;
  animation: float 3s ease-in-out infinite;
}


.destinations {
  display: flex;
  flex-direction: column;
  gap: 2rem;
  padding: 2rem;
}

.card {
  background: white;
  padding: 2rem;
  border-radius: 20px;
  display: flex;
  overflow: hidden;
  box-shadow: 0 5px 30px #123499;
  transition: transform 0.5s ease, box-shadow 0.5s ease;
  min-width: 400px;
  
  width: 100%;
  opacity: 0;
  animation: fadeInCard 1s ease forwards;
}


.card:nth-child(1) { animation-delay: 0.2s; }
.card:nth-child(2) { animation-delay: 0.4s; }
.card:nth-child(3) { animation-delay: 0.6s; }



.card img {
  width: 300px;
  height: auto;
  object-fit: cover;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
}

.card-content {
  padding: 1rem 2rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.card-content h2 {
  padding-left: 5rem;
  font-size: 3.3rem;
  color: #123499;
  margin-bottom: 0.3rem;

}

.card-content span {
  font-size: 3.3rem;
  color: #fcd639;
  margin-bottom: 0.3rem;
}

.details {
  padding: 1rem 0 0 5rem;
  color: #fcd639;
  font-size: 1.5rem;
  margin-bottom: 2.5rem;
  font-weight: bold;
  
}

.desc {
  color: #123499;
  padding: 3rem 0 0 5rem;
  font-size: 1.2rem;
  margin-bottom: 0.8rem;
  font-weight: bold;
 
}

.card-content a {
  margin: 10px 0 0 5rem;
  font-size: 1.2rem;
  align-self: flex-start;
  padding: 0.5rem 1rem;
  background: #fcd639;
  border-radius: 5px;
  border: none;
  color: white;
  font-weight: bold;
  text-decoration: none;
  text-shadow: 1px 1px 4px black;
  cursor: pointer;
  transition: background-color 0.3s, transform 0.3s;
}

.card-content a:hover {
  background-color: #123499;
  transform: scale(1.05);
}

/* Responsive */
@media (max-width: 768px) {
  .featured-hero {
    flex-direction: column;
    text-align: left;
    padding: 2rem;
  }

  .hero-img {
    justify-content: center;
    margin-top: 1rem;
  }

  .card {
    flex-direction: column;
  }

  .card img {
    width: 100%;
    height: auto;
    margin-bottom: 1rem;
  }

  .card-content {
    padding: 2rem;
  }
}

/* Animations */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

@keyframes fadeUp {
  from { opacity: 0; transform: translateY(40px); }
  to { opacity: 1; transform: translateY(0); }
}

@keyframes fadeInCard {
  to { opacity: 1; transform: translateY(0); }
  from { opacity: 0; transform: translateY(30px); }
}

@keyframes slideDown {
  from { transform: translateY(-100%); }
  to { transform: translateY(0); }
}

@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-8px); }
}

</style>

<body>

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
        <li><a href="triphistory.php">Trip History</a></li>
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
        <li><a href="home.php">Home</a></li>
        <li><a href="travelplanner.php">Travel Planner</a></li>
        <li><a href="destinations.php">Destinations</a></li>
        <li><a href="travelog.php">Travel Logs</a></li>
        <li><a href="triphistory.php">Trip History</a></li>
        <li><a href="logout.php" class="logout">Log Out</a></li>
      </ul>
    </div>


  </header>

  <section class="featured-hero">
    <div class="hero-text">
      <h1>FEATURED DESTINATION</h1>
      <p>Compass works hard to bring you the best possible trips for your rugged lifestyle. Here's our latest travel packages suited for the adventurous spirit.</p>
    </div>
  </section>

<form method="GET" action="destination.php" class="search-form">
    <input type="text" name="search" placeholder="Search Destinations..." 
           value="<?php echo htmlspecialchars($search); ?>" />

    <h3>Filter by Activity:</h3>
    <?php foreach ($activity_options as $option): ?>
        <label>
            <input type="checkbox" name="activity[]" value="<?php echo $option; ?>"
                <?php echo in_array($option, $selected_activities) ? 'checked' : ''; ?>>
            <?php echo $option; ?>
        </label><br>
    <?php endforeach; ?>

    <h3>Filter by Information:</h3>
    <?php foreach ($info_options as $option): ?>
        <label>
            <input type="checkbox" name="information[]" value="<?php echo $option; ?>"
                <?php echo in_array($option, $selected_info) ? 'checked' : ''; ?>>
            <?php echo $option; ?>
        </label><br>
    <?php endforeach; ?>

    <br><button type="Search">Search</button>
</form>

  <section class="destinations">
    <div class="card">
      <img src="https://www.mrporter.com/content/images/cms/ycm/resource/blob/476344/b6ef6d47026243d09813d1de1bc73623/e2be9882-43f0-471f-84d6-d3a6d414808e-data.jpg" alt="Surfing Safari" />
      <div class="card-content">
        <h2>California Surfing Safari  |  <span>$960</span></h2>
        <p class="details">Includes lodging,<br>food,<br>and airfare</p>
        <p class="desc">Be ready to go pro in a California surf town. We will catch some waves by morning and sip icy wet smoothies in the sun after lunch.</p>
        <a href="california.php">MORE DETAILS...</a>
      </div>
    </div>

    <div class="card">
      <img src="https://www.luxuryadventures.co.nz/wp-content/uploads/2023/03/NZMountainBiking4.jpg" alt="Bike New Zealand" />
      <div class="card-content">
        <h2>Bike New Zealand  |  <span>$1090</spanstyle=></h2>
        <p class="details">Includes lodging,<br>food,<br>and airfare</p>
        <p class="desc">Shred NZ’s scenery, mountains, and hidden trails suited for adrenaline-fueled riders. Push your legs to the limit.</p>
        <a href="newzealand.php">MORE DETAILS...</a>
      </div>
    </div>

    <div class="card">
      <img src="https://i.natgeofe.com/n/422a0bc7-4e2f-479c-93dc-56672c035241/devils-tower.jpg" alt="Devil's Tower" />
      <div class="card-content">
        <h2>Devil’s Tower Rock Climb  |  <span>$740</span></h2>
        <p class="details">Includes lodging,<br>food,<br>and airfare</p>
        <p class="desc">Take on the steep pitch and test the impossible cliffs of the beautiful Devil’s Tower, Wyoming.</p>
        <a href="gateway.php">MORE DETAILS...</a>
      </div>
    </div>
  </section>

</body>
</html>

</body>
</html>
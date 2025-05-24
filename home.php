<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['stdID'])) {
    header('Location: login.php');
    exit;
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simple_page";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch username from database
$stdID = $_SESSION['stdID'];
$stmt = $conn->prepare("SELECT username FROM users WHERE stdID = ?");
$stmt->bind_param("s", $stdID);
$stmt->execute();
$result = $stmt->get_result();

$current_username = "User"; // Default fallback
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $current_username = $user['username'];
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Adventure Travel</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<style>

 /* Base styles */
body {
  opacity: 0;
  transition: opacity 0.3s ease;
  margin: 0;
  font-family: Georgia, 'Times New Roman', Times, serif;
  background: #fff;
  overflow-x: hidden;
  padding-top: 60px;
  animation: fadeSlideDown 0.8s ease-out both;
}

body.loaded {
  opacity: 1;
}

/* Navbar */
.navbar {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 999;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #123499;
  padding: 1rem 2rem;
  color: white;
  flex-wrap: wrap; /* Allow wrapping */
}

.logo {
  font-size: 2rem;
  font-weight: bold;
  text-shadow: 1px 1px 2px black;
}

/* Nav list - horizontal by default */
.navbar nav ul {
  list-style: none;
  display: flex;
  gap: 2rem;
  padding: 0;
  margin: 0;
  flex-wrap: wrap;
  align-items: center;
}

/* Nav list items */
.navbar nav ul li {
  display: flex;
  align-items: center;
}

/* Nav links */
.navbar nav ul li a {
  text-decoration: none;
  color: white;
  font-size: 1.2rem;
  font-weight: bold;
  text-shadow: 1px 1px 2px black;
  transition: color 0.3s;
}

.navbar nav ul li a:hover {
  color: #fcd639;
}

/* Sidebar button (hamburger) */
.sidebar-btn {
  background: none;
  border: none;
  color: white;
  font-size: 1.5rem;
  cursor: pointer;
  font-weight: bold;
  text-shadow: 1px 1px 2px black;
  transition: color 0.3s;
  margin-left: 1rem;
  flex-shrink: 0;
}

.sidebar-btn:hover {
  color: #fcd639;
}

/* Sidebar panel */
.sidebar {
  position: fixed;
  top: 0;
  right: -300px;
  width: 250px;
  max-width: 80vw; /* Prevent overflow on small screens */
  height: 100%;
  background-color: #123499;
  box-shadow: -2px 0 8px rgba(0, 0, 0, 0.2);
  padding: 1rem 1rem;
  transition: right 0.3s ease-in-out;
  z-index: 1000;
  color: white;
  overflow-y: auto; /* Allow vertical scrolling */
  -webkit-overflow-scrolling: touch; /* Smooth scrolling on iOS */
}

/* Sidebar open state */
.sidebar.open {
  right: 0;
}

/* Sidebar headers and content */
.sidebar h3,
.sidebar h2 {
  text-align: center;
  color: white;
  text-shadow: 1px 1px 2px black;
  margin-bottom: 1rem;
}

.sidebar h3 {
  font-size: 2.5rem;
}

.sidebar h2 {
  font-size: 1.5rem;
}

.sidebar img {
  display: block;
  margin: 1.5rem auto 1rem;
  font-size: 1.5rem;
  color: white;
  text-shadow: 1px 1px 2px black;
  text-align: center;
}

/* Sidebar menu */
.sidebar ul {
  list-style: none;
  padding: 0;
  display: flex;
  flex-direction: column;
  height: 70vh;
  justify-content: flex-start;
  margin: 0;
}

.sidebar ul li {
  margin: 1rem 0;
  text-align: center;
}

.sidebar ul li:last-child,
.sidebar ul li.logout-link {
  margin-top: auto;
}

.sidebar ul li.h,
.sidebar ul li.logout-link {
  margin-bottom: 1.5rem;
}

.sidebar ul li a {
  color: white;
  text-decoration: none;
  font-size: 1.1rem;
  font-weight: bold;
  text-shadow: 1px 1px 2px black;
  transition: color 0.2s;
}

.sidebar ul li a:hover {
  color: #fcd639;
}

/* Hero section */
.hero {
  background:
    linear-gradient(to bottom, rgba(255,255,255,0) 60%, #fff 100%),
    url('https://images4.alphacoders.com/656/656354.jpg') no-repeat center center/cover;
  height: 80vh;
  position: relative;
}

.hero-overlay {
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(255, 255, 255, 0));
  height: 70%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.hero-content {
  text-align: left;
  color: white;
  padding: 8rem;
  animation: fadeSlideDown 1s ease-out both;
}

.hero-content h1 {
  font-size: 3.5rem;
  margin-bottom: 1rem;
}

.hero-content p {
  font-size: 1.5rem;
}

/* Features */
.feature {
  text-align: left;
  margin: 5rem 2rem 1rem;
}

.feature h2 {
  font-size: 2.5rem;
  color: #123499;
  text-shadow: 1px 1px 2px black;
}

.featured-card {
  position: relative;
  margin: 1rem auto;
  width: 98%;
  max-width: 2000px;
  height: 250px;
  background-size: cover;
  background-position: center;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
  animation: fadeSlideUp 1.2s ease-out both;
}

.featured-overlay {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 100%;
  padding: 2rem;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(255, 255, 255, 0));
  color: white;
}

.featured-overlay h2 {
  font-size: 2rem;
  font-weight: bold;
  margin-bottom: 0.5rem;
  text-shadow: 1px 1px 2px black;
}

.featured-overlay p {
  font-size: 1.5rem;
  font-weight: bold;
  padding-right: 40rem;
  margin-bottom: 1rem;
  text-shadow: 1px 1px 2px black;
}

.featured-overlay a {
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

.details-btn:hover {
  background-color: #123499;
  transform: scale(1.05);
}

/* Learn section */
.learn {
  text-align: left;
  margin: 5rem 2rem 1rem;
  opacity: 0;
  animation: fadeSlideUp 1s ease forwards;
  animation-delay: 1.2s;
}

.learn h2 {
  font-size: 1.8rem;
  color: #123499;
  font-weight: bold;
  text-shadow: 1px 1px 2px black;
}

/* Cards section */
.cards-section {
  display: flex;
  gap: 1.5rem;
  flex-wrap: wrap;
  justify-content: center;
}

.card {
  flex: 1 1 250px;
  height: 500px;
  margin: 1rem 1rem 5rem 1rem;
  background-size: cover;
  background-position: center;
  border-radius: 12px;
  overflow: hidden;
  position: relative;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  opacity: 0;
  animation: zoomFadeIn 0.8s ease forwards;
}

.card:hover {
  transform: translateY(-5px);
}

.card-overlay {
  position: absolute;
  bottom: 0;
  width: 100%;
  color: white;
  text-align: center;
}

.card-overlay h3 {
  margin: 0;
  font-size: 2.1rem;
  font-weight: bold;
  text-shadow: 1px 1px 2px black;
  padding: 1rem;
}

.card-overlay p {
  margin: 0.5rem 0.5rem 1.2rem 0.5rem;
  font-size: 1.5rem;
  font-weight: bold;
  color: white;
  text-shadow: 1px 1px 2px black;
}

.card-overlay a {
  display: inline-block;
  margin: 1rem;
  padding: 0.5rem 1rem;
  background-color: #fcd639;
  text-shadow: 1px 1px 2px black;
  color: white;
  text-decoration: none;
  border-radius: 5px;
  font-size: 1.2rem;
  font-weight: bold;
  transition: background-color 0.3s, transform 0.3s;
}

.card-overlay a:hover {
  background-color: #123499;
  transform: scale(1.05);
}

/* Footer */
.site-footer {
  background: #123499;
  color: white;
  padding: 3rem 0;
  margin-top: 4rem;
}

.footer-content {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  padding: 0 2rem;
}

.footer-section {
  flex: 1;
  padding: 0 1rem;
}

.footer-section h3 {
  font-size: 1.5rem;
  margin-bottom: 1.5rem;
  font-weight: bold;
  text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
}

.footer-section p {
  margin: 0.7rem 0;
  font-size: 1rem;
  line-height: 1.6;
}

.footer-bottom {
  text-align: center;
  margin-top: 3rem;
  padding-top: 2rem;
  border-top: 1px solid rgba(255,255,255,0.1);
}

.social-icons {
  margin-bottom: 1rem;
}

.social-icons a {
  color: white;
  font-size: 1.3rem;
  margin: 0 1rem;
  transition: transform 0.3s ease;
}

.social-icons a:hover {
  transform: translateY(-3px);
}

.copyright {
  font-size: 0.9rem;
  opacity: 0.8;
}

/* === ANIMATION KEYFRAMES === */
@keyframes fadeSlideDown {
  0% {
    opacity: 0;
    transform: translateY(-30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
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

@keyframes zoomFadeIn {
  0% {
    opacity: 0;
    transform: scale(0.95);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}

/* Staggered animation delay for cards */
.cards-section .card:nth-child(1) {
  animation-delay: 1.4s;
}
.cards-section .card:nth-child(2) {
  animation-delay: 1.6s;
}
.cards-section .card:nth-child(3) {
  animation-delay: 1.8s;
}

/* === RESPONSIVE BREAKPOINTS === */

/* Small tablets and large phones */
@media (max-width: 768px) {
  .navbar {
    flex-direction: row;
    justify-content: space-between;
  }
  
  .navbar nav ul {
    gap: 1rem;
  }
  
  /* Cards stack vertically */
  .cards-section {
    flex-direction: column;
    gap: 1.5rem;
  }
  
  .featured-card {
    height: 220px;
  }

  .featured-overlay {
    padding: 1rem;
  }

  .featured-overlay h2 {
    font-size: 1.5rem;
  }

  .featured-overlay p {
    font-size: 0.9rem;
    padding-right: 1rem;
  }
  
  .learn {
    margin: 3rem 1rem 1rem;
  }
  
  .learn h2 {
    font-size: 1.5rem;
  }

  .footer-content {
    flex-direction: column;
    text-align: center;
    padding: 0 1rem;
  }

  .footer-section {
    margin: 1.5rem 0;
  }
}

/* Mobile phones and very small devices */
@media (max-width: 480px) {
  .navbar {
    flex-direction: column;
    align-items: center;
    padding: 1rem;
  }
  
  .logo {
    font-size: 1.8rem;
    margin-bottom: 0.5rem;
  }
  
  /* Nav menu becomes vertical */
  .navbar nav ul {
    flex-direction: column;
    width: 100%;
    gap: 0.5rem;
  }
  
  .navbar nav ul li {
    width: 100%;
  }
  
  .navbar nav ul li a {
    font-size: 1.1rem;
    display: block;
    padding: 0.5rem 0;
    width: 100%;
  }
  
  /* Sidebar button aligns right top */
  .sidebar-btn {
    align-self: center;
    margin: 0;
  }
  
  /* Sidebar width shrinks */
  .sidebar {
    overflow-x: hidden;
  }
  
  .sidebar h3 {
    font-size: 2rem;
  }
  
  .sidebar h2 {
    font-size: 1.2rem;
  }

 
  
  .featured-overlay p {
    padding-right: 1rem;
  }
  
  .hero-content {
    padding: 3rem 1rem;
    font-size: 1rem;
  }
  
  .hero-content h1 {
    font-size: 2rem;
  }
  
  .hero-content p {
    font-size: 1rem;
  }
  
  .feature h2 {
    font-size: 2rem;
  }
  
  .card {
    height: 350px;
  }

  .card-overlay h3 {
    font-size: 1.5rem;
  }

  .card-overlay p {
    font-size: 1rem;
  }
}

/* Extra small devices - prevent horizontal overflow */
@media (max-width: 320px) {
  body {
    padding-top: 50px;
  }
  
  .navbar nav ul li a {
    font-size: 1rem;
  }
  
  .sidebar {
    overflow-x: hidden  ;
  }
}

@media (max-width: 768px) {
  .navbar {
    position: static;
  }
  
  html, body {
  background: #fff;
  margin: 0;
  padding: 0;
  border: none;
}

.sidebar {
  display: none;
  right: -300px;
}

/* Show sidebar when open */
.sidebar.open {
  display: block;
  right: 0;
}
}
/* Remove unwanted white box above navbar */

/* Hide sidebar by default */


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

<body>


  <header class="navbar">
    <div class="logo">
      <img src="pictures/WALOGO.png" alt="logo" style="height: 40px; width: auto;">
    </div>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="travelplanner.php">Travel Planner</a></li>
        <li><a href="destinations.php">Destinations</a></li>
        <li><a href="travelog.php">Travel Logs</a></li>
        <li><a href="triphistory.php">Trip History</a></li>
        <li><button id="toggleSidebar" class="sidebar-btn">☰</button></li>
      </ul>
    </nav>

    <div class="sidebar" id="sidebar">
  <div class="logo">
      <img src="pictures/WALOGO.png" alt="logo" style="height: 20px; width: auto;">
    </div>
  <ul>
    <li style="text-align: center;">
      <img src="https://i.pravatar.cc/100" alt="Profile" style="border-radius: 50%; width: 80px; height: 80px; border: 2px solid white;">
    </li>
    <h2>@<?= htmlspecialchars($current_username) ?></h2>
    <li><a href="home.php">Home</a></li>
    <li><a href="travelplanner.php">Travel Planner</a></li>
    <li><a href="destinations.php">Destinations</a></li>
    <li><a href="travelog.php">Travel Logs</a></li>
    <li><a href="triphistory.php">Trip History</a></li>
    <li><a href="logout.php" class="logout">Log Out</a></li>
  </ul>
</div>


  </header>


  <section class="hero">
    <div class="hero-overlay">
      <div class="hero-content">
        <h1>WELCOME USER!</h1>
        <p>
          Currently we have <strong>over 1500 extreme adventures</strong> for you to drool over. From surfing 40-foot waves in the middle of the ocean 
          to fishing for piranha in the Amazon, we've got it all. So take your pick:
        </p>
      </div>
    </div>
  </section>


   <div class="feature">
    <h2>Featured Destination</h2>
  </div>

  <section class="featured-destination">
  <div class="featured-card" style="background-image: url('https://madera.objects.liquidweb.services/photos/21871-tunnel-view-for-vymc-website-header-2800x800-2800x800.png')">
    <div class="featured-overlay">
      <h2>Yosemite</h2>
      <p>
        Experts only. Sign up now to scale El Capitan and Half Dome. Bring your own gear.
        We’ll provide food and a one hour video on scaling these amazing rocks.
      </p>
      <a href="yosemite.php" class="details-btn">More Details</a>
    </div>
  </div>
</section>


    <div class="learn">
    <h2>Learn More About Our Adventures</h2>
  </div>

<section class="cards-section">
  
  <div class="card" style="background-image: url('https://www.rmnpflyfish.com/uploads/4/2/2/8/42287855/dscf5207_orig.jpg')">
    <div class="card-overlay">
      <h3>Fly Fishing in the Rocky Mountains</h3>
      <p>You’ll get a seasoned guide and lots of dehydrated ravioli</p>
      <a href="fishing.php">More Details</a>
    </div>
  </div>
  <div class="card" style="background-image: url('https://whitewatercolorado.com/wp-content/uploads/4250817.jpg')">
    <div class="card-overlay">
      <h3>Level 5 Rapids!</h3>
      <p>Put your helmet on and grab your wetsuit. It’s time to conquer Siberia</p>
      <a href="rapids.php">More Details</a>
    </div>
  </div>
  <div class="card" style="background-image: url('https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi8Fl1dDtbMvx1gAKbeLFxwXoaY3TLdQ6b3HX_OqQmLUTSkRMPIWqZmW6BZRhGA222Zwpm49-ONPlkfGiGxE4wRA9QEdu_RHXHuSRs_mICNfNj41cJD6oIFm_3LH8TBVz4TsxW9u1wnjdk/s1600/DSCF1439.JPG')">
    <div class="card-overlay">
      <h3>Puget Sound Kayaking</h3>
      <p>One week of ocean kayaking in the Puget Sound.</p>
      <a href="">More Details</a>
    </div>
  </div>
</section>

  </main>


<footer class="site-footer">
    <div class="footer-content">
        <div class="footer-section">
            <h3>CONTACT US</h3>
            <p>Final Requirement, Compass Website</p>
            <p>Contact Number: 09777699066</p>
            <p>Email: compasswebsite@gmail.com</p>
        </div>
        
        <div class="footer-section">
            <h3>GROUP 8</h3>
            <p>PRIVACY POLICIES</p>
            <p>SUPPORT</p>
        </div>
        
        <div class="footer-section">
            <h3>ABOUT US</h3>
            <p>JEROEN PAGHUNASAN</p>
            <p>JIN ANTHONY PRADAS</p>
            <p>ALEXANDRA NYANZA REYES</p>
            <p>DENIEL SALCEDO</p>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-google-plus-g"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <p class="copyright">© Copyright. All rights reserved.</p>
    </div>
</footer>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</body>
</html>

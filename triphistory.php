<?php
session_start();

// Check if the user is logged in
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

$stdID = $_SESSION['stdID'];

// Fetch username from database
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

// Clear all trips for the current user
if (isset($_POST['clear_all'])) {
    $delete_stmt = $conn->prepare("DELETE FROM trips WHERE stdID = ?");
    $delete_stmt->bind_param("s", $stdID);
    $delete_stmt->execute();
    $delete_stmt->close();
    header('Location: triphistory.php');
    exit;
}

// Fetch trips from database for the current user
$stmt = $conn->prepare("SELECT * FROM trips WHERE stdID = ? ORDER BY id DESC");
$stmt->bind_param("s", $stdID);
$stmt->execute();
$result = $stmt->get_result();
$trips = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip History | Compass</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Georgia, 'Times New Roman', Times, serif;
    background: #fff;
    overflow-x: hidden;
    padding-top: 60px;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #123499;
    padding: 1rem 2rem;
    color: white;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 999;
    flex-wrap: wrap; /* allow wrapping on small screens */
}

.logo {
    font-size: 2rem;
    font-weight: bold;
    text-shadow: 1px 1px 2px black;
    flex: 1 1 auto; /* allow shrinking */
}

.navbar nav {
    flex: 2 1 auto;
}

.navbar nav ul {
    list-style: none;
    display: flex;
    gap: 2rem;
    padding: 0;
    margin: 0;
    flex-wrap: wrap; /* wrap nav items if needed */
    justify-content: flex-end;
}

.navbar nav ul li {
    display: flex;
    align-items: center;
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
    flex-shrink: 0;
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
    padding: 1rem;
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
    margin: 1.5rem 0 1rem;
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
    display: flex;
    flex-direction: column;
    height: 70vh;
    justify-content: flex-start;
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
    transition: color 0.2s;
    font-weight: bold;
    text-shadow: 1px 1px 2px black;
}

.sidebar ul li a:hover {
    color: #fcd639;
}

.history-container {
    margin: 80px auto 0;
    padding: 2rem 1rem;
    max-width: 1200px;
}

.history-header {
    text-align: left;
    margin-bottom: 2rem;
}

.history-header h1 {
    color: #123499;
    font-size: 3rem;
    text-shadow: 1px 1px 2px black;
}

.trip-grid {
    display: grid;
    gap: 2rem;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
}

.trip-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 5px 15px rgba(21, 0, 206, 0.4);
    transition: all 0.3s ease;
    margin-bottom: 1.5rem;
}

.trip-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(31, 0, 206, 0.4);
}

.badge {
    display: inline-block;
    padding: 0.4rem 0.8rem;
    margin: 0.2rem;
    background: #123499;
    color: white;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: bold;
}

.trip-destination {
    font-size: 1.8rem;
    color: #123499;
    font-weight: bold;
    margin-bottom: 1rem;
    text-shadow: 1px 1px 0px rgba(0,0,0,0.1);
}

.trip-detail {
    margin: 0.5rem 0;
    padding: 0.5rem;
    border-bottom: 1px solid #f0f0f0;
    color: #666;
}

.trip-detail span.label {
    font-weight: bold;
    color: #123499;
    margin-right: 0.5rem;
}

.no-trips {
    font-size: 1.2rem;
    text-align: center;
    padding: 2rem;
    color: #fcd639;
    text-shadow: 1px 1px 1px black;
}

.plan-trip-btn {
    display: inline-block;
    background: #123499;
    color: white;
    padding: 1rem 2rem;
    text-decoration: none;
    border-radius: 8px;
    margin-top: 1rem;
    font-weight: bold;
    transition: background-color 0.3s, transform 0.3s;
}

.plan-trip-btn:hover {
    background-color: #fcd639;
    transform: scale(1.05);
}

.btn-danger {
    font-size: 1.2rem;
    font-weight: bold;
    background: #fcd639;
    text-shadow: 1px 1px 2px black;
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
}

.btn-danger:hover {
    background: #123499;
    color: white;
    transform: scale(1.05);
}

.site-footer {
    background: #123499;
    color: white;
    padding: 3rem 1rem;
    margin-top: 4rem;
}

.footer-content {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    padding: 0 2rem;
    flex-wrap: wrap;
}

.footer-section {
    flex: 1 1 250px;
    padding: 0 1rem;
    margin-bottom: 2rem;
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

/* Responsive improvements */

@media (max-width: 1024px) {
    .navbar nav ul {
        gap: 1rem;
    }

    .trip-grid {
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    }
}

@media (max-width: 768px) {
    body {
        padding-top: 50px;
    }

    .navbar {
        padding: 0.8rem 1rem;
    }

    .logo {
        font-size: 1.5rem;
    }

    .navbar nav ul {
        gap: 1rem;
        justify-content: flex-end;
    }

    .navbar nav ul li a {
        font-size: 1rem;
    }

    .trip-card {
        padding: 1.5rem;
        margin: 1rem;
    }

    .trip-destination {
        font-size: 1.5rem;
    }

    .footer-content {
        flex-direction: column;
        text-align: center;
    }

    .footer-section {
        margin: 1.5rem 0;
        padding: 0;
    }
}

@media (max-width: 480px) {
    .navbar {
        justify-content: space-between;
        padding: 0.5rem 1rem;
    }
    

    .logo {
        font-size: 1.3rem;
    }

    .navbar nav ul {
        width: 100%;
        max-width: 300px;
        padding: 1rem 1.5rem;
        text-align: center;
        align-items: center;
    }

    .sidebar {
        width: 100%;
        max-width: 300px;
        padding: 1rem 1.5rem;
    }

  
    .trip-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
        padding: 0 1rem;
    }

    .trip-card {
        margin: 0;
        padding: 1rem;
        border-radius: 10px;
    }

    .plan-trip-btn {
        padding: 0.8rem 1.5rem;
        font-size: 1rem;
    }

    .btn-danger {
        font-size: 1rem;
        padding: 0.4rem 1rem;
    }
}

/* Make navbar not sticky on small screens */
@media (max-width: 768px) {
    .navbar {
        position: static;
    }
    body {
        padding-top: 0;
    }
}


    </style>
</head>
<body>  
    <!-- NAVBAR -->
    <header class="navbar">
        <div class="logo">
      <img src="pictures/WALOGO.png" alt="logo" class="logo" style="height: 40px; width: auto;">
    </div>
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
    </header>

    <div class="sidebar" id="sidebar">
        <h3>🧭</h3>
        <h3>COMPASS</h3>
        <ul>
            <li style="text-align: center;">
                <img src="https://i.pravatar.cc/100" alt="Profile" style="border-radius: 50%; width: 80px; height: 80px; border: 2px solid white;">
            </li>
            <h2>@<?= htmlspecialchars($current_username) ?></h2>
            <li><a href="home.php">Home</a></li>
            <li><a href="destinations.php">Destinations</a></li>
            <li><a href="travelplanner.php">Travel Planner</a></li>
            <li><a href="travelog.php">Travel Logs</a></li>
            <li><a href="triphistory.php">Trip History</a></li>
            <li><a href="logout.php" class="logout">Log Out</a></li>
        </ul>
    </div>

    <main class="history-container">
        <div class="history-header">
            <h1>Your Trip History</h1>
            <form method="POST" style="margin-top: 1rem;">
             <button type="submit" name="clear_all" class="btn-danger" 
                        onclick="return confirm('Are you sure you want to clear all trips?')">
                    Clear All Trips
                </button>   
            </form>
        </div>

        <div class="trip-grid">
            <?php if (!empty($trips)): ?>
                <?php foreach ($trips as $trip): ?>
                    <div class="trip-card">
                        <div class="trip-destination">
                            🌎 <?= htmlspecialchars($trip['selectedCountry']) ?>
                        </div>
                        <div class="trip-detail">
                            <span class="label">📅 Departure:</span> 
                            <?= htmlspecialchars($trip['departure_date']) ?>
                        </div>
                        <div class="trip-detail">
                            <span class="label">⏱️ Duration:</span> 
                            <?= htmlspecialchars($trip['duration']) ?> days
                        </div>
                        <div class="trip-detail">
                            <span class="label">💰 Budget:</span> 
                            $<?= htmlspecialchars($trip['budget']) ?>
                        </div>
                        <?php if (!empty($trip['activities'])): ?>
                            <div class="trip-detail">
                                <span class="label">🎯 Activities:</span><br>
                                <?php 
                                $activities = explode(", ", $trip['activities']);
                                foreach ($activities as $activity): 
                                    if (!empty(trim($activity))):
                                ?>
                                    <span class="badge"><?= htmlspecialchars(trim($activity)) ?></span>
                                <?php 
                                    endif;
                                endforeach; 
                                ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($trip['information'])): ?>
                            <div class="trip-detail">
                                <span class="label">ℹ️ Information:</span><br>
                                <?php 
                                $information = explode(", ", $trip['information']);
                                foreach ($information as $info): 
                                    if (!empty(trim($info))):
                                ?>
                                    <span class="badge"><?= htmlspecialchars(trim($info)) ?></span>
                                <?php 
                                    endif;
                                endforeach; 
                                ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($trip['notes'])): ?>
                            <div class="trip-detail">
                                <span class="label">📝 Notes:</span><br>
                                <span style="color: #666;"><?= nl2br(htmlspecialchars($trip['notes'])) ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-trips">
                    <p>No trips planned yet! Create your first adventure.</p>
                    <a href="travelplanner.php" class="plan-trip-btn">Plan a Trip</a>
                </div>
            <?php endif; ?>
        </div>
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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleBtn = document.getElementById('toggleSidebar');
            const sidebar = document.getElementById('sidebar');

            toggleBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                sidebar.classList.toggle('open');
            });

            document.addEventListener('click', (e) => {
                if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                    sidebar.classList.remove('open');
                }
            });
        });
    </script>
</body>
</html>
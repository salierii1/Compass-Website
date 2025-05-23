<?php
session_start();

// Clean up invalid trip data
if (isset($_SESSION['trips'])) {
    // Filter out any trips that don't have a destination
    $_SESSION['trips'] = array_filter($_SESSION['trips'], function($trip) {
        return !empty($trip['destination']) && !is_array($trip['destination']);
    });
}

// Clear all trips
if (isset($_POST['clear_all'])) {
    unset($_SESSION['trips']);
    header('Location: triphistory.php');
    exit;
}
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

        /* NAVBAR */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #00CEC3;
            padding: 1rem 2rem;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            color: white;
        }

        .navbar .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar nav ul {
            list-style: none;
            display: flex;
            gap: 1.5rem;
        }

        .navbar nav ul li {
            display: inline;
        }

        .navbar nav ul li a {
            color: white;
            font-weight: 500;
            text-decoration: none;
        }

        .navbar nav ul li a:hover {
            text-decoration: underline;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            background: #00CEC3;
            color: white;
            padding: 2rem;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            z-index: 998;
        }

        .sidebar.open {
            transform: translateX(0);
        }

        .sidebar h3 {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            text-align: center;
        }

        .sidebar ul {
            padding: 0;
            list-style: none;
        }

        .sidebar ul li {
            margin: 1rem 0;
        }

        .sidebar ul li a {
            color: white;
            font-weight: 500;
            text-decoration: none;
        }

        .sidebar ul li a:hover {
            text-decoration: underline;
        }

        .history-container {
            margin: 80px auto 0;
            padding: 2rem;
            max-width: 1200px;
        }

        .history-header {
            text-align: left;
            margin-bottom: 2rem;
        }

        .history-header h1 {
            color: rgb(1, 119, 113);
            font-size: 3rem;
            text-shadow: 1px 1px 2px black;
        }

        .trip-grid {
            display: grid;
            gap: 2rem;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        }

        .trip-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 206, 195, 0.2);
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .trip-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 206, 195, 0.3);
        }

        .trip-detail {
            margin: 0.5rem 0;
            padding: 0.5rem;
            border-bottom: 1px solid #f0f0f0;
            color: #666;
        }

        .trip-detail span {
            font-weight: bold;
            color: #00CEC3;
        }

        .no-trips {
            text-align: center;
            padding: 2rem;
            color: rgb(1, 119, 113);
        }

        .plan-trip-btn {
            display: inline-block;
            background: #00CEC3;
            color: white;
            padding: 1rem 2rem;
            text-decoration: none;
            border-radius: 8px;
            margin-top: 1rem;
            font-weight: bold;
            transition: background 0.3s;
        }

        .plan-trip-btn:hover {
            background: rgb(1, 119, 113);
        }

        .btn-danger {
            background: #dc3545;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .trip-card {
                padding: 1.5rem;
                margin: 1rem;
            }

            .trip-destination {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>  
    <!-- NAVBAR -->
    <header class="navbar">
        <div class="logo">🧭 COMPASS</div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="destinations.php">Destinations</a></li>
                <li><a href="travelplanner.php">Travel Planner</a></li>
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
            <h2>@USERNAME</h2>
            <li><a href="home.php">Home</a></li>
            <li><a href="destinations.php">Destinations</a></li>
            <li><a href="travelplanner.php">Travel Planner</a></li>
            <li><a href="travelog.php">Travel Logs</a></li>
            <li><a href="triphistory.php">Trip History</a></li>
            <li><a href="#" class="logout">Log Out</a></li>
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
            <?php if (isset($_SESSION['trips']) && !empty($_SESSION['trips'])): ?>
                <?php foreach ($_SESSION['trips'] as $trip): ?>
                    <div class="trip-card">
                        <div class="trip-destination">
                            🌎 <?= htmlspecialchars($trip['destination']) ?>
                        </div>
                        <div class="trip-detail">
                            <span>📅 Departure:</span> 
                            <?= htmlspecialchars($trip['departure_date']) ?>
                        </div>
                        <div class="trip-detail">
                            <span>⏱️ Duration:</span> 
                            <?= htmlspecialchars($trip['duration']) ?> days
                        </div>
                        <div class="trip-detail">
                            <span>💰 Budget:</span> 
                            $<?= htmlspecialchars($trip['budget']) ?>
                        </div>
                        <?php if (!empty($trip['activities'])): ?>
                            <div class="trip-detail">
                                <span>🎯 Activities:</span><br>
                                <?= nl2br(htmlspecialchars($trip['activities'])) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($trip['information'])): ?>
                            <div class="trip-detail">
                                <span>ℹ️ Information:</span><br>
                                <?= nl2br(htmlspecialchars($trip['information'])) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($trip['notes'])): ?>
                            <div class="trip-detail">
                                <span>📝 Notes:</span><br>
                                <?= nl2br(htmlspecialchars($trip['notes'])) ?>
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

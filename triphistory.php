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
            color: #123499;
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
            <?php if (isset($_SESSION['trips']) && !empty($_SESSION['trips'])): ?>
                <?php foreach ($_SESSION['trips'] as $trip): ?>
                    <div class="trip-card">
                        <div class="trip-destination">
                            🌎 <?= htmlspecialchars($trip['destination']) ?>
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
                        <?php if (!empty($trip['activities']) && is_array($trip['activities'])): ?>
                            <div class="trip-detail">
                                <span class="label">🎯 Activities:</span><br>
                                <?php foreach ($trip['activities'] as $activity): ?>
                                    <span class="badge"><?= htmlspecialchars($activity) ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($trip['information']) && is_array($trip['information'])): ?>
                            <div class="trip-detail">
                                <span class="label">ℹ️ Information:</span><br>
                                <?php foreach ($trip['information'] as $info): ?>
                                    <span class="badge"><?= htmlspecialchars($info) ?></span>
                                <?php endforeach; ?>
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
                
            <?php endif; ?>
        </div>
    </main>
        <div class="no-trips">
                    <p>No trips planned yet! Create your first adventure.</p>
                    <a href="travelplanner.php" class="plan-trip-btn">Plan a Trip</a>
                </div>
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

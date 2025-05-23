<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['stdID'])) {
    header("Location: login.php");
    exit();
}

$userID = $_SESSION['stdID'];
$sql = "SELECT * FROM travel_logs WHERE stdID = '$userID' ORDER BY created_at DESC";
$result = $conn->query($sql);

$logs = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $logs[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Logs | Compass</title>
    <style>
        * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Georgia, 'Times New Roman', Times, serif;
    }

    body {
      background-color: #fff;
      color: #333;
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

    .hero {
      margin: 70px auto;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
      background: linear-gradient(to bottom, #fff, #dfe8e1);
      background: url('pictures/grass.jpg') no-repeat center center/cover;
    }

    .hero-text {
      flex: 1 1 300px;
      padding: 1px;
      max-width: 1000px;
      animation: fadeInLeft 1s ease-in-out;
    }

    .hero-text h1 {
      color: #123499;
      font-size: 4rem;
      margin-bottom: 10px;
      text-shadow: 1px 1px 2px black;
    }

    .hero-text p {
      color: white;
      font-size: 1.8rem;
      text-shadow: 1px 1px 2px black;
      margin-bottom: 20px;
    }

    .hero-text button {
      padding: 15px 17px;
      width: 200px;
      background-color: #123499;
      color: white;
      text-shadow: 1px 1px 2px black;
      border: none;
      border-radius: 5px;
      font-size: 1.6rem;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .hero-text button:hover {
      background-color: rgb(1, 119, 113);
    }

    .hero-image {
      flex: 1 1 300px;
      max-width: 400px;
      padding: 20px;
      position: relative;
      animation: fadeInRight 1s ease-in-out;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .hero-image::before {
      content: "";
      position: absolute;
      width: 100%;
      height: 80%;
      background:hsl(48, 97.00%, 60.60%, 0.60);
      border-radius: 50%;
      z-index: 0;
      transform: translateX(-10%) scale(1.2);
    }

    .hero-image img {
      width: 100%;
      border-radius: 50%;
      position: relative;
      z-index: 1;
    }


    .cards {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 50px;
      padding: 40px 20px;
    }

    .card {
      background: white;
      border-radius: 10px;
      box-shadow: 0 5px 30px #123499;
      height: 500px;
      width: 350px;
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-10px);
    }

    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .card-content {
      padding: 12px;
    }

    .card h3 {
      font-size: 1.5rem;
      color: #123499;
      margin-bottom: 10px;
    }

    .card p {
      font-size: 1.2rem;
      line-height: 1.5;
    }

    .avatar1 {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: url('https://images.unsplash.com/photo-1633332755192-727a05c4013d?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8cG9ydHJhaXQlMjBtYW58ZW58MHx8MHx8fDA%3D') no-repeat center center/cover;
  margin: -25px auto 10px;
  position: relative;
      z-index: 3;
    }
    .avatar2 {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: url('https://smileyworldz.com/wp-content/uploads/2024/01/20250320_120749-1024x1024.jpg') no-repeat center center/cover;
  margin: -25px auto 10px;
  position: relative;
      z-index: 3;
    }

    .avatar3 {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: url('https://pbs.twimg.com/media/GrQapJtXYAAGZnn.jpg') no-repeat center center/cover;
  margin: -25px auto 10px;
  position: relative;
      z-index: 3;
    }

    @keyframes fadeInLeft {
      from { opacity: 0; transform: translateX(-30px); }
      to { opacity: 1; transform: translateX(0); }
    }

    @keyframes fadeInRight {
      from { opacity: 0; transform: translateX(30px); }
      to { opacity: 1; transform: translateX(0); }
    }

    @media (max-width: 768px) {
      .hero {
        flex-direction: column;
      }
    }

    .blog-container {
            margin: 80px auto 0;
            padding: 2rem;
            max-width: 1200px;
        }

        .create-button {
            background-color: #fcd639;
            color: white;
            border: none;
            padding: 1rem 2rem;
            font-size: 1.2rem;
            border-radius: 8px;
            cursor: pointer;
            margin-bottom: 2rem;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
            transition: background-color 0.3s, transform 0.3s;
        }

        .create-button:hover {
            background-color: #123499;
            transform: scale(1.05);
        }

        .blog-feed {
            display: grid;
            gap: 2rem;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        }

        .blog-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(19, 0, 161, 0.5);
            transition: transform 0.3s;
        }

        .blog-card:hover {
            transform: translateY(-5px);
        }

        .blog-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .blog-content {
            padding: 1.5rem;
        }

        .blog-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .author-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 1rem;
        }

        .blog-meta {
            color: #666;
            font-size: 0.9rem;
        }

        .blog-title {
            color: #123499;
            margin: 0.5rem 0;
            font-size: 1.5rem;
        }

        .blog-destination {
            color: #fcd639;
            font-weight: bold;
            margin-bottom: 0.5rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }

        .blog-description {
            color: #444;
            line-height: 1.6;
        }

        /* Form Styles */
        .create-form {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 206, 195, 0.2);
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #123499;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #00CEC3;
            outline: none;
        }

        #imagePreview {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            display: none;
            margin-top: 1rem;
        }










/* Travel Log Card Container */
.log-card {
    background-color: #ffffff;             /* White background */
    border-radius: 10px;                   /* Smooth rounded corners */
    box-shadow: 0 4px 12px rgba(0,0,0,0.1); /* Soft shadow for depth */
    padding: 24px 28px;                    /* Comfortable padding inside card */
    margin-bottom: 24px;                   /* Space below each card */
    max-width: 650px;                      /* Limit card width */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    cursor: default;
}

.log-card:hover {
    transform: translateY(-6px);           /* Slight lift on hover */
    box-shadow: 0 10px 20px rgba(0,0,0,0.15);
}

/* Title */
.log-card h2 {
    margin-top: 0;
    margin-bottom: 12px;
    font-weight: 700;
    font-size: 1.8rem;
    color: #222222;
}

/* Paragraphs */
.log-card p {
    margin: 6px 0;
    font-size: 1rem;
    line-height: 1.6;
    color: #444444;
}

/* Strong labels */
.log-card strong {
    color: #111111;
}

/* Travel Image */
.log-image {
    display: block;
    width: 100%;
    max-height: 320px;
    object-fit: cover;
    border-radius: 8px;
    margin-top: 20px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.12);
}

/* Link inside no-logs message */
p a {
    color: #007BFF;
    text-decoration: none;
    font-weight: 600;
}

p a:hover {
    text-decoration: underline;
}

/* Responsive: smaller cards on narrow screens */
@media (max-width: 700px) {
    .log-card {
        padding: 18px 20px;
        max-width: 100%;
    }
    .log-card h2 {
        font-size: 1.5rem;
    }
}

    </style>
</head>
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

  <section class="hero">
    <div class="hero-text">
      <h1>Share Your Thoughts</h1>
      <p>Create, update, edit, and add to the Adventures you experience with our Website.</p>
    </div>
    <div class="hero-image">
      <img src="pictures/girl.png" alt="Hero">
    </div>
  </section>

<main class="blog-container">
    <div id="blogFeedView">
        <button class="create-button" onclick="showCreateForm()">✏️ Create New Log</button>
        <div class="blog-feed"></div>
    </div>

    <div id="createFormView" style="display:none;">
        <form id="blogForm" onsubmit="handleSubmit(event)" enctype="multipart/form-data" class="create-form">
            <div class="form-group">
                <label for="title">Trip Title</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="destination">Destination</label>
                <input type="text" id="destination" name="destination" required>
            </div>
            <div class="form-group">
                <label for="date">Date of Travel</label>
                <input type="date" id="date" name="travel_date" required>
            </div>
            <div class="form-group">
                <label for="description">Experience</label>
                <textarea id="description" name="description" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" id="image" name="image" accept="image/*" required onchange="previewImage(event)">
                <img id="imagePreview" style="display:none; max-width: 100px; margin-top: 10px;">
            </div>
            <button type="submit" class="create-button">Publish Log</button>
        </form>
    </div>
</main>

<script>
let travelLogs = [];

function previewImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('imagePreview');
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    } else {
        preview.style.display = 'none';
    }
}

function showCreateForm() {
    document.getElementById('createFormView').style.display = 'block';
    document.getElementById('blogFeedView').style.display = 'none';
}

function renderBlogPosts() {
    const feed = document.querySelector('.blog-feed');
    feed.innerHTML = travelLogs.map(post => `
        <article class="blog-card">
            <img src="${post.image_path}" alt="${post.title}" class="blog-image">
            <div class="blog-content">
                <div class="blog-header">
                    <div class="blog-meta">${new Date(post.travel_date).toLocaleDateString()}</div>
                </div>
                <h2 class="blog-title">${post.title}</h2>
                <div class="blog-destination">${post.destination}</div>
                <p class="blog-description">${post.description}</p>
            </div>
        </article>
    `).join('');
}

function handleSubmit(event) {
    event.preventDefault();

    const form = document.getElementById('blogForm');
    const formData = new FormData(form);

    fetch('submit_log.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            fetchLogs();
            form.reset();
            document.getElementById('imagePreview').style.display = 'none';
            document.getElementById('createFormView').style.display = 'none';
            document.getElementById('blogFeedView').style.display = 'block';
        } else {
            alert(data.message || "Error saving log");
        }
    })
    .catch(error => {
        console.error("Submission error:", error);
        alert("Failed to submit. Please try again.");
    });
}

function fetchLogs() {
    fetch('fetch_logs.php')
        .then(res => res.json())
        .then(data => {
            travelLogs = data;
            renderBlogPosts();
        })
        .catch(err => {
            console.error("Fetch error:", err);
        });
}

// Initial load
fetchLogs();
</script>

</body>
</html>


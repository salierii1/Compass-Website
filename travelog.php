<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['stdID'])) {
    header("Location: login.php");
    exit();
}

$userID = $_SESSION['stdID'];
$stmt = $conn->prepare("SELECT * FROM travel_logs WHERE stdID = ? ORDER BY created_at DESC");
$stmt->bind_param("s", $userID);
$stmt->execute();
$result = $stmt->get_result();


$logs = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $logs[] = $row;
    }
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

/* === Navbar === */
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
  flex-wrap: wrap;
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

.navbar nav ul li {
  display: flex;
  align-items: center;
}

.navbar nav ul li a,
.sidebar-btn {
  text-decoration: none;
  color: white;
  font-size: 1.2rem;
  font-weight: bold;
  text-shadow: 1px 1px 2px black;
  transition: color 0.3s;
}

.sidebar-btn {
  background: none;
  border: none;
  font-size: 1.5rem;
  cursor: pointer;
}

.navbar nav ul li a:hover,
.sidebar-btn:hover {
  color: #fcd639;
}

/* === Sidebar === */
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
  display: flex;
  flex-direction: column;
}

.sidebar.open {
  right: 0;
}

.sidebar h3, .sidebar h2 {
  color: white;
  text-shadow: 1px 1px 2px black;
  text-align: center;
}

.sidebar ul {
  list-style: none;
  padding: 0;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
}

.sidebar ul li {
  margin: 1rem 0;
  text-align: center;
}

.sidebar ul li:last-child {
  margin-top: auto;
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

/* === Hero Section === */
.hero {
  margin-top: 90px;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 40px 20px;
  background: url('pictures/grass.jpg') no-repeat center center/cover;
  gap: 2rem;
}

.hero-text {
  flex: 1 1 300px;
  max-width: 600px;
  animation: fadeInLeft 1s ease-in-out;
  text-align: center;
}

.hero-text h1 {
  color: #123499;
  font-size: 3rem;
  margin-bottom: 10px;
  text-shadow: 1px 1px 2px black;
}

.hero-text p {
  color: white;
  font-size: 1.5rem;
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
  font-size: 1.4rem;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s;
}

.hero-text button:hover {
  background-color: rgb(1, 119, 113);
}

.hero-image {
  flex: 1 1 300px;
  max-width: 350px;
  position: relative;
  animation: fadeInRight 1s ease-in-out;
}

.hero-image::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 80%;
  background: hsla(48, 97%, 60%, 0.6);
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

/* === Cards Section === */
.cards {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 30px;
  padding: 40px 20px;
}

.card {
  background: white;
  border-radius: 10px;
  box-shadow: 0 5px 30px #123499;
  width: 320px;
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
  font-size: 1.4rem;
  color: #123499;
  margin-bottom: 10px;
}

.card p {
  font-size: 1.1rem;
  line-height: 1.5;
}

/* === Blog Feed === */
.blog-container {
  margin-top: 100px;
  padding: 2rem;
  max-width: 1200px;
  margin-left: auto;
  margin-right: auto;
}

.create-button {
  background-color: #fcd639;
  color: white;
  padding: 1rem 2rem;
  border: none;
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

/* === Travel Log Card === */
.log-card {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  padding: 24px;
  margin-bottom: 24px;
  max-width: 650px;
  transition: transform 0.25s, box-shadow 0.25s;
}

.log-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 10px 20px rgba(0,0,0,0.15);
}

.log-card h2 {
  font-size: 1.8rem;
  margin-bottom: 12px;
  color: #222;
}

.log-card p {
  font-size: 1rem;
  line-height: 1.6;
  color: #444;
}

.log-image {
  width: 100%;
  max-height: 320px;
  object-fit: cover;
  border-radius: 8px;
  margin-top: 20px;
  box-shadow: 0 6px 15px rgba(0,0,0,0.12);
}

/* === Form === */
.create-form {
  background: white;
  padding: 2rem;
  border-radius: 15px;
  box-shadow: 0 5px 15px rgba(0, 206, 195, 0.2);
  max-width: 600px;
  margin: 2rem auto;
}

.form-group {
  margin-bottom: 1.5rem;
}

.form-group label {
  color: #123499;
  font-weight: bold;
  margin-bottom: 0.5rem;
  display: block;
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

/* === Footer === */
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
  flex-wrap: wrap;
  justify-content: space-between;
  gap: 2rem;
}

.footer-section {
  flex: 1 1 200px;
}

.footer-section h3 {
  font-size: 1.5rem;
  margin-bottom: 1.5rem;
  font-weight: bold;
}

.footer-bottom {
  text-align: center;
  margin-top: 3rem;
  padding-top: 2rem;
  border-top: 1px solid rgba(255,255,255,0.1);
  font-size: 0.9rem;
  opacity: 0.8;
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

/* === Animations === */
@keyframes fadeInLeft {
  from { opacity: 0; transform: translateX(-30px); }
  to { opacity: 1; transform: translateX(0); }
}

@keyframes fadeInRight {
  from { opacity: 0; transform: translateX(30px); }
  to { opacity: 1; transform: translateX(0); }
}

/* === Mobile Responsive Fixes === */
@media (max-width: 768px) {


  .hero-text h1 {
    font-size: 2.5rem;
  }
  .hero-text p {
    font-size: 1.2rem;
  }
  .navbar nav ul {
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    padding: 0;
  }
  .footer-content {
    flex-direction: column;
    text-align: center;
  }
  .hero {
    flex-direction: column;
    padding: 20px 10px;
  }
  .card, .hero-image {
    width: 90%;
  }

  .navbar {
    position: static;
    align-items: center;
  }

  .site-footer {
    margin-top: 0;
    padding-bottom: 0;
  }
}



    </style>
</head>
<body>
<!-- Sidebar toggle logic is handled in the main script below; this duplicate block is removed to prevent conflicts -->
 
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
            <form id="blogForm" action="submit_log.php" method="POST" enctype="multipart/form-data" class="create-form">
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
                    <img id="imagePreview" style="display:none;">
                </div>
                <button type="submit" class="create-button">Publish Log</button>
            </form>
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
// Combine PHP logs with hardcoded posts
const blogPosts = [
    // PHP logs
    <?php foreach ($logs as $log): ?>
    ,{
        title: "<?= addslashes($log['title']) ?>",
        destination: "<?= addslashes($log['destination']) ?>",
        date: "<?= addslashes($log['travel_date']) ?>",
        description: "<?= addslashes($log['description']) ?>",
        image: "<?= addslashes($log['image_path']) ?>",
        avatar: "https://i.pravatar.cc/150?img=1",
        isUserPost: true
    },
    <?php endforeach; ?>
    // Sample posts
    ,{
        title: "Mountain Climbing in Switzerland",
        destination: "Swiss Alps",
        date: "2024-02-15",
        description: "An incredible journey through the majestic Swiss Alps...",
        image: "pictures/swiss alps.jpg",
        avatar: "https://i.pravatar.cc/150?img=1"
    },
    {
        title: "Beach Paradise in Bali",
        destination: "Nusa Dua, Bali",
        date: "2024-02-10",
        description: "Crystal clear waters, pristine beaches, and amazing local culture...",
        image: "https://images.unsplash.com/photo-1537996194471-e657df975ab4?ixlib=rb-4.0.3",
        avatar: "https://i.pravatar.cc/150?img=2"
    },
    {
        title: "Safari Adventure in Kenya",
        destination: "Masai Mara",
        date: "2024-01-28",
        description: "Witnessing the great migration and encountering majestic wildlife...",
        image: "https://images.unsplash.com/photo-1516426122078-c23e76319801?ixlib=rb-4.0.3",
        avatar: "https://i.pravatar.cc/150?img=3"
    },
    {
        title: "Ancient Temples of Japan",
        destination: "Kyoto",
        date: "2024-01-15",
        description: "Exploring the serene and mystical temples during cherry blossom season...",
        image: "https://images.unsplash.com/photo-1545569341-9eb8b30979d9?ixlib=rb-4.0.3",
        avatar: "https://i.pravatar.cc/150?img=4"
    },
    {
        title: "Northern Lights in Iceland",
        destination: "Reykjavik",
        date: "2024-01-05",
        description: "Chasing the aurora borealis through Iceland's stunning landscapes...",
        image: "pictures/northern lights.jpg",
        avatar: "https://i.pravatar.cc/150?img=5"
    }
];

// Render blog posts
function renderBlogPosts() {
    const feed = document.querySelector('.blog-feed');
    feed.innerHTML = blogPosts
        .sort((a, b) => new Date(b.date) - new Date(a.date))
        .map(post => `
            <article class="blog-card">
                <img src="${post.image}" alt="${post.title}" class="blog-image">
                <div class="blog-content">
                    <div class="blog-header">
                        <img src="${post.avatar}" alt="Author" class="author-avatar">
                        <div class="blog-meta">${new Date(post.date).toLocaleDateString()}</div>
                    </div>
                    <h2 class="blog-title">${post.title}</h2>
                    <div class="blog-destination">${post.destination}</div>
                    <p class="blog-description">${post.description}</p>
                </div>
            </article>
        `).join('');
}

// Show/hide form
function showCreateForm() {
    document.getElementById('blogFeedView').style.display = 'none';
    document.getElementById('createFormView').style.display = 'block';
}

// Image preview
function previewImage(event) {
    const preview = document.getElementById('imagePreview');
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
        
    }
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
    renderBlogPosts();
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');

    // Ensure the sidebar stays open when toggle is clicked
    toggleBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      sidebar.classList.toggle('open');
    });

    // Close sidebar only if click is outside sidebar and toggle button
    document.addEventListener('click', (e) => {
      if (!sidebar.contains(e.target) && e.target !== toggleBtn) {
        sidebar.classList.remove('open');
      }
    });

    // Prevent sidebar from closing when clicking inside it
    sidebar.addEventListener('click', (e) => {
      e.stopPropagation();
    });
});
</script>

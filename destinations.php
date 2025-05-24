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


.sidebar logo {
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
  margin: 7rem 2rem 2rem 2rem;
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


.filters, .search-box {
      display: flex;
      gap: 10px;
      margin: 2rem 2rem 0 2rem;
      flex-wrap: wrap;
    }

    input, select {
      font-size: 1rem;
      color: #123499;
      padding: 8px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .card {
      padding: 2rem 4rem 2rem 4rem;
      display: flex;
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(16, 0, 197, 0.3);
      margin: 2rem 2rem 0 2rem;
      overflow: hidden;
    }

    .card img {
      width: 280px;
      height: 220px;
      object-fit: cover;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .card-content {
      color: #123499;
      font-size: 2rem;
      padding: 1rem 2rem 1rem 2rem;
      flex: 1;
    }

    .tags span {
      background: #123499;
      color: white;
      padding: 4px 8px;
      margin: 2px;
      border-radius: 4px;
      font-size: 12px;
      display: inline-block;
    }

    .price {
      font-size: 1.6rem;
      font-weight: bold;
      color: green;
      margin-top: 5px;
    }

    .info-line {
      margin-top: 5px;
      font-size: 1rem;
      color: #666;
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

@media (max-width: 768px) {
    .footer-content {
        flex-direction: column;
        text-align: center;
    }
    
    .footer-section {
        margin: 1.5rem 0;
    }
} 
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
    <div class="logo">
      <img src="pictures/logo.png" alt="logo" class="logo" style="height: 40px; width: auto;">
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
      <img src="pictures/logo.png" alt="logo" style="height: 40px; width: auto;">
    </div>
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

  <div class="search-box">
    <input type="text" id="searchInput" placeholder="Search destinations...">
    <select id="priceFilter">
      <option value="">Price Range</option>
      <option value="low">Budget (₱0-₱14,999)</option>
      <option value="mid">Mid-range (₱15,000-₱29,999)</option>
      <option value="high">Luxury (₱30,000+)</option>
    </select>
    <select id="durationFilter">
      <option value="">Duration</option>
      <option value="short">Short (1-7 days)</option>
      <option value="long">Long (8+ days)</option>
    </select>
    <select id="activityFilter">
      <option value="">Activities</option>
      <option value="Hiking">Hiking</option>
      <option value="Mountain Biking">Mountain Biking</option>
      <option value="Skiing">Skiing</option>
      <option value="Fishing">Fishing</option>
      <option value="Surfing">Surfing</option>
    </select>
    <select id="infoFilter">
      <option value="">Information Needs</option>
      <option value="Transportation">Transportation</option>
      <option value="health">Health</option>
      <option value="Weather">Weather</option>
      <option value="Gear">Gear</option>
      <option value="Political Info">Political Info</option>
      <option value="Activity Specific">Activity Specific</option>
    </select>
  </div>

  <div id="results"></div>

  <script>
    const packages = [
      {
        destination: "Bangkok",
        date: "October 5, 2025 - October 12, 2025",
        route: "Manila - Bangkok",
        price: 28500,
        image: "https://linkstravelandtours.co.uk/wp-content/uploads/2018/12/bangkok-temple-dawn-thailand.jpg",
        activities: ["hiking"],
        duration: 7,
        tags: ["Thailand"],
        info: ["transportation", "health", "political-info"]
      },
      {
        destination: "Boracay",
        date: "November 1, 2025 - November 6, 2025",
        route: "Manila - Boracay",
        price: 12000,
        image: "https://lp-cms-production.imgix.net/2019-06/GettyImages-483535221_super.jpg",
        activities: ["Surfing"],
        duration: 6,
        tags: ["Philippines"],
        info: ["health"]
      },
      {
        destination: "Tokyo",
        date: "December 10, 2025 - December 20, 2025",
        route: "Manila - Tokyo",
        price: 35000,
        image: "https://www.qantas.com/content/travelinsider/en/travel-tips/things-to-know-before-you-go-to-tokyo/jcr:content/parsysTop/hero.img.full.medium.jpg/1708575449205.jpg",
        activities: ["Skiing"],
        duration: 10,
        tags: ["Japan"],
        info: ["transportation", "political-info"]
      },



  {
    "destination": "Kyoto, Japan",
    "date": "March 24, 2025 - March 30, 2025",
    "route": "Tokyo - Kyoto",
    "price": 28000,
    "image": "https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8a3lvdG98ZW58MHx8MHx8fDA%3D",
    "activities": ["Hiking", "Fishing"],
    "duration": 15,
    "tags": ["Japan", "Culture"],
    "info": ["Gear"]
  },
  {
    "destination": "Bali, Indonesia",
    "date": "July 10, 2025 - July 16, 2025",
    "route": "Jakarta - Bali",
    "price": 19000,
    "image": "https://www.outlooktravelmag.com/media/bali-1-1582544096.profileImage.2x-1536x884.webp",
    "activities": ["Surfing", "Kayaking"],
    "duration": 12,
    "tags": ["Beach", "Relaxation"],
    "info": ["Weather"]
  },
  {
    "destination": "Paris, France",
    "date": "June 1, 2025 - June 7, 2025",
    "route": "London - Paris",
    "price": 36000,
    "image": "https://img.static-af.com/transform/45cb9a13-b167-4842-8ea8-05d0cc7a4d04/",
    "activities": ["Mountain Biking", "Hiking"],
    "duration": 8,
    "tags": ["Europe", "Romance"],
    "info": ["Transportation"]
  },
  {
    "destination": "Queenstown, New Zealand",
    "date": "December 5, 2025 - December 12, 2025",
    "route": "Auckland - Queenstown",
    "price": 32000,
    "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Queenstown_1_%288168013172%29.jpg/1200px-Queenstown_1_%288168013172%29.jpg",
    "activities": ["Skiing", "Kayaking"],
    "duration": 8,
    "tags": ["Adventure", "Nature"],
    "info": ["Health"]
  },
  {
    "destination": "Reykjavík, Iceland",
    "date": "February 12, 2025 - February 17, 2025",
    "route": "London - Reykjavík",
    "price": 40000,
    "image": "https://silversea-discover.imgix.net/2021/06/REYKJAVIK-shutterstock_613997816.jpg?auto=compress%2Cformat&ixlib=php-3.3.1",
    "activities": ["Skiing", "Fishing"],
    "duration": 6,
    "tags": ["Cold", "Scandinavia"],
    "info": ["Gear"]
  },
  {
    "destination": "Santorini, Greece",
    "date": "September 18, 2025 - September 24, 2025",
    "route": "Athens - Santorini",
    "price": 25000,
    "image": "https://greeceinsiders.travel/wp-content/uploads/2021/02/Santorini-Oia.jpg",
    "activities": ["Kayaking", "Surfing"],
    "duration": 10,
    "tags": ["Romantic", "Europe"],
    "info": ["Political Info"]
  },
  {
    "destination": "Marrakech, Morocco",
    "date": "October 8, 2025 - October 13, 2025",
    "route": "Casablanca - Marrakech",
    "price": 21500,
    "image": "https://static.independent.co.uk/s3fs-public/thumbnails/image/2019/05/03/15/marrakech-hero.jpg",
    "activities": ["Mountain Biking", "Hiking"],
    "duration": 6,
    "tags": ["Africa", "Cultural"],
    "info": ["Activity Specific"]
  },
  {
    "destination": "Cape Town, South Africa",
    "date": "April 4, 2025 - April 11, 2025",
    "route": "Johannesburg - Cape Town",
    "price": 27000,
    "image": "https://cdn.craft.cloud/101e4579-0e19-46b6-95c6-7eb27e4afc41/assets/uploads/Guides/cape-town-frommers.jpg",
    "activities": ["Hiking", "Fishing"],
    "duration": 8,
    "tags": ["Africa", "Scenic"],
    "info": ["Health"]
  },
  {
    "destination": "Barcelona, Spain",
    "date": "May 10, 2025 - May 16, 2025",
    "route": "Madrid - Barcelona",
    "price": 23000,
    "image": "https://statemag.state.gov/wp-content/uploads/2024/05/0624POM-A-3-scaled.jpg",
    "activities": ["Mountain Biking", "Kayaking"],
    "duration": 7,
    "tags": ["Spain", "Art"],
    "info": ["Transportation"]
  },
  {
    "destination": "Seoul, South Korea",
    "date": "November 3, 2025 - November 9, 2025",
    "route": "Busan - Seoul",
    "price": 26000,
    "image": "https://www.agoda.com/wp-content/uploads/2024/04/Featured-image-Han-River-at-night-in-Seoul-South-Korea-1244x700.jpg",
    "activities": ["Surfing", "Hiking"],
    "duration": 7,
    "tags": ["Asia", "Trendy"],
    "info": ["Activity Specific"]
  }
    ];

    function filterPackages() {
      const search = document.getElementById("searchInput").value.toLowerCase();
      const price = document.getElementById("priceFilter").value;
      const duration = document.getElementById("durationFilter").value;
      const activity = document.getElementById("activityFilter").value;
      const info = document.getElementById("infoFilter").value;

      const filtered = packages.filter(pkg => {
        const matchesSearch = pkg.destination.toLowerCase().includes(search);
        const matchesPrice = 
          price === "" ||
          (price === "low" && pkg.price < 15000) ||
          (price === "mid" && pkg.price >= 15000 && pkg.price < 30000) ||
          (price === "high" && pkg.price >= 30000);
        const matchesDuration = 
          duration === "" ||
          (duration === "short" && pkg.duration <= 7) ||
          (duration === "long" && pkg.duration > 7);
        const matchesActivity = activity === "" || pkg.activities.includes(activity);
        const matchesInfo = info === "" || pkg.info.includes(info);
        return matchesSearch && matchesPrice && matchesDuration && matchesActivity && matchesInfo;
      });

      displayPackages(filtered);
    }

    function displayPackages(data) {
      const container = document.getElementById("results");
      container.innerHTML = "";
      if (data.length === 0) {
        container.innerHTML = "<p>No results found.</p>";
        return;
      }
      data.forEach(pkg => {
        const tags = [...pkg.activities, pkg.duration + " days", ...pkg.tags]
          .map(tag => `<span>${tag}</span>`).join(" ");
        const infoLine = `Info: ${pkg.info.join(", ")}`;
        container.innerHTML += `
          <div class="card">
            <img src="${pkg.image}" alt="${pkg.destination}">
            <div class="card-content">
              <h3>${pkg.destination}</h3>
              <div class="info-line">${pkg.date}</div>
              <div class="info-line">${pkg.route}</div>
              <div class="tags">${tags}</div>
              <div class="info-line">${infoLine}</div>
              <div class="price">₱${pkg.price.toLocaleString()}</div>
            </div>
          </div>
        `;
      });
    }

    // Event listeners
    document.querySelectorAll("input, select").forEach(el => {
      el.addEventListener("input", filterPackages);
    });

    // Initial display
    filterPackages();
  </script>

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

</body>
</html>
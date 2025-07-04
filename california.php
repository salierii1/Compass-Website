<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bike New Zealand</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
  }

    body {
      font-family: Georgia, 'Times New Roman', Times, serif;
      background-color: #fff;
      color: #333;
    }

    /* NAVBAR */
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
      position: relative;
      background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
        url('https://endlesstrailexpeditions.com/wp-content/uploads/2020/06/7fe1e526-4109-493a-ba86-e1644164108b.jpeg?w=1024')
        no-repeat center center/cover;
      color: white;
      margin: 70px auto 0;
      height: 60vh;
      text-align: center;
      padding: 5rem 1rem;
      animation: fadeIn 1s ease forwards;
      animation-delay: 0.2s;
      opacity: 0;
    }

    .hero h1 {
      font-size: 2.5rem;
      margin-bottom: 0.5rem;
      text-shadow: 1px 1px 5px black;
    }

    .price {
      font-size: 2.8rem;
      color: #fcd639;
      text-shadow: 1px 1px 5px black;
      font-weight: bold;
      animation: pop 1s ease-in-out;
    }

    .hero button {
      margin-top: 1rem;
      padding: 0.75rem 1.5rem;
      background-color: #123499;
      border: none;
      border-radius: 6px;
      color: white;
      text-shadow: 1px 1px 5px black;
      font-size: 1.3rem;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.3s;
    }

    .hero button:hover {
      background-color: #fcd639;
      transform: scale(1.05);
    }

    .photo-strip {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 1rem;
      padding: 1rem;
      position: relative;
      top: -100px;
      z-index: 2;
      animation: fadeIn 1s ease forwards;
      animation-delay: 0.4s;
      opacity: 0;
      
    }

    .photo-strip img {
      max-width: 100%;
      height: 200px;
      width: 400px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }

    .photo-strip img:hover {
      transform: scale(1.05);
    }

    .view-text {
      width: 100%;
      text-align: right;
      padding: 1rem;
    }

    .view-text a {
      font-size: 1.2rem;
      background-color: #123499;
      padding: 0.5rem 1rem;
      border-radius: 10px;
      color: white;
      font-weight: bold;
      text-decoration: none;
      transition: background-color 0.3s, transform 0.3s;
    }

    .view-text a:hover {
      background-color: #fcd639;
      transform: scale(1.05);
    }

    .description-section {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      padding: 2rem;
      margin-top: -60px;
      position: relative;
      z-index: 3;
      animation: fadeIn 1s ease forwards;
      animation-delay: 0.6s;
      opacity: 0;
    }

    .description-section > div {
      flex: 1 1 300px;
      font-size: 1.5rem;
      line-height: 1.5;
      border-right: 2px solid #123499;
      padding-right: 1rem;
    }

    .description-section > div:last-child {
      border-right: none;
    }

    .package {
      padding: 2rem;
      background: #fff;
      animation: fadeIn 1s ease forwards;
      animation-delay: 0.8s;
      opacity: 0;
    }

    .package h3 {
      color: #fcd639;
      text-shadow: 1px 1px 5px black;
      font-size: 2rem;
      margin-bottom: 2.2rem;
    }

    .badges {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
    }

    .badge {
      padding: 1rem 2rem;
      background-color:#123499;
      font-size: 1.4rem;
      color: white;
      border-radius: 30px;
      font-weight: bold;
      transition: transform 0.3s ease;
    }

    .badge:hover {
      transform: scale(1.05);
    }

    @keyframes pop {
      0% {
        transform: scale(0.8);
        opacity: 0;
      }
      100% {
        transform: scale(1);
        opacity: 1;
      }
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes slideDown {
      0% {
        transform: translateY(-100%);
        opacity: 0;
      }
      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }

    @media (max-width: 768px) {
      .navbar nav ul {
        flex-direction: column;
        gap: 1rem;
      }

      .hero h1 {
        font-size: 2rem;
      }

      .price {
        font-size: 2rem;
      }

      .hero button {
        font-size: 1rem;
      }

      .photo-strip {
        flex-direction: column;
        top: 0;
      }

      .description-section {
        flex-direction: column;
      }

      .description-section > div {
        border-right: none;
        border-bottom: 2px solid rgb(1, 119, 113);
        padding-bottom: 1rem;
      }

      .description-section > div:last-child {
        border-bottom: none;
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
    <div class="logo">
      <img src="pictures/logo.png" alt="logo" style="height: 40px; width: auto;">
    </div>
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
  <div class="logo">
      <img src="pictures/logo.png" alt="logo" class="logo" style="height: 40px; width: auto;">
    </div>
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

  <section class="hero">
    <h1>California Surfing Safari</h1>
    <div class="price">$1040</div>
    <a href="travelplanner.php"><button>Add to the Planner</button></a>
  </section>

  <div class="photo-strip">
    <img src="https://tpwmagazine.com/archive/2022/nov/scout1_adventures/img/Mustang%20Island_3321.jpg" alt="Surf 1">
    <img src="https://endlesstrailexpeditions.com/wp-content/uploads/2020/06/246b38b0-9e22-47a2-abab-48d425f44cc9_1_201_a.jpeg?w=1024" alt="Surf 2">
    <img src="https://assets.simpleviewinc.com/simpleview/image/upload/c_limit,h_1200,q_75,w_1200/v1/clients/slocal/acacia_productions_VISIT_SLOCAL_surf_gems_0008_68562bf3_c961_4f6f_9505_f143fe21e350_8efe4aed-3d88-4676-b194-721820d4e9e6.jpg" alt="Surf 3">
    <img src="https://cdn.outsideonline.com/wp-content/uploads/2025/04/Kaimana.sallasH.jpg" alt="Surf 4">
    <div class="view-text"><a href="#">View Photos &gt;&gt;</a></div>
  </div>

  <section class="description-section">
    <div>
      The Karapoti Trail, home to the Trek Karapoti Classic, twists around the Akatarawa Range and delivers 31 miles of technical single track and challenging fire road climbs. During the ride, there are several vistas to soothe those eyes while you reward your burning legs by taking a quick breather.
    </div>
    <div>
      Upper Hutt is New Zealand's mountain biking hub, and if you're looking for a group ride, stop by Mountain Trails bike shop. Or if you want a number plate on your handlebar, the Trek Karapoti Classic is scheduled for March 4, 2001.
    </div>
  </section>

  <section class="package">
    <h3>Package Includes:</h3>
    <div class="badges">
      <div class="badge">✈️ Airfare</div>
      <div class="badge">🍽️ Food</div>
      <div class="badge">🏨 Lodging</div>
      <div class="badge">🗺️ Local Guide</div>
    </div>
  </section>

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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Adventure Travel</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<style>

  body {
    opacity: 0;
    transition: opacity 0.3s ease;
  }
  body.loaded {
    opacity: 1;
  }


body {
  margin: 0;
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
  background-color: #123499; /* Updated to match navbar */
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
  animation: fadeInUp 1.5s ease-in-out;
}

.hero-content h1 {
  font-size: 3.5rem;
  margin-bottom: 1rem;
}

.hero-content p {
  font-size: 1.5rem;
}


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
  margin: 1rem;
  width: 98%;
  max-width: 2000px;
  height: 250px;
  background-size: cover;
  background-position: center;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
  
}

.featured-overlay {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 100%;
  color: #fcd639;
  background: linear-gradient(to top, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.3), rgba(0, 0, 0, 0.5));
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(255, 255, 255, 0));
  padding: 2rem;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
}

.featured-overlay h2 {
  font-size: 2rem;
  color: white;
  font-weight: bold;
  margin-bottom: 0.5rem;
  text-shadow: 1px 1px 2px black;
}

.featured-overlay p {
  color: orange;
  font-size: 1.5rem;
  color: white;
  font-weight: bold;
  padding: 0rem 40rem 0rem 0rem ;
  text-shadow: 1px 1px 2px black;
  margin-bottom: 1rem;
}

.featured-overlay a  {
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


@media (max-width: 768px) {
.feature {
    font-size: 1rem;
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
  }
}

.learn {
  text-align: left;
  margin: 5rem 2rem 1rem;
}
.learn h2 {
  font-size: 1.8rem;
  color: #123499;
  font-weight: bold;
  text-shadow: 1px 1px 2px black;
}

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
  transition: transform 0.3s ease;
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

/* RESPONSIVE */
@media (max-width: 768px) {
  .cards-section {
    flex-direction: column;
    gap: 1.5rem;
  }
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

/* === ANIMATED ELEMENTS === */
body {
  animation: fadeSlideDown 0.8s ease-out both;
}

.hero-content {
  animation: fadeSlideDown 1s ease-out both;
}

.featured-card {
  animation: fadeSlideUp 1.2s ease-out both;
}

.card {
  opacity: 0;
  animation: zoomFadeIn 0.8s ease forwards;
}

.learn {
  opacity: 0;
  animation: fadeSlideUp 1s ease forwards;
  animation-delay: 1.2s;
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



/* Add these styles to your existing <style> section */
.site-footer {
    background: linear-gradient(45deg, #FF8C00, #FF4500);
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
    <div class="logo">🧭 COMPASS</div>
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
      <a href="destinations.php" class="details-btn">More Details</a>
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
      <a href="">More Details</a>
    </div>
  </div>
  <div class="card" style="background-image: url('https://whitewatercolorado.com/wp-content/uploads/4250817.jpg')">
    <div class="card-overlay">
      <h3>Level 5 Rapids!</h3>
      <p>Put your helmet on and grab your wetsuit. It’s time to conquer Siberia</p>
      <a href="">More Details</a>
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


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

  /* General Reset */
body {
  margin: 0;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: #fff;
}

/* NAVBAR */
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: orange;
  padding: 1rem 2rem;
  color: white;
}

.logo {
  font-weight: bold;
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
  transition: color 0.3s;
  font-weight: bold;
  text-shadow: 1px 1px 2px black;
}

.navbar nav ul li a:hover {
  color: black;
}

/* HERO WELCOME */
.hero {
  background: 
    linear-gradient(to bottom, rgba(255,255,255,0) 50%, #fff 100%),
    url('https://images4.alphacoders.com/656/656354.jpg') no-repeat center center/cover;
  height: 100vh;
  position: relative;
}

.hero-overlay {
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(255, 255, 255, 0));
  height: 80%;
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
  font-size: 1.1rem;
}

/* MAIN SECTION */
.feature {
  text-align: left;
  margin: 5rem 2rem 1rem;
  
}
.feature h2 {
  font-size: 1.5rem;
  color: orange;
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
  color: #fff;
  background: linear-gradient(to top, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.3), rgba(0, 0, 0, 0.5));
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(255, 255, 255, 0));
  padding: 2rem;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
}

.featured-overlay h2 {
  font-size: 2rem;
  color: orange;
  text-shadow: 1px 1px 2px black;
  margin-bottom: 0.5rem;
}

.featured-overlay p {
  color: orange;
  font-size: 1rem;
  text-shadow: 1px 1px 2px black;
  margin-bottom: 1rem;
}

.details-btn {
  align-self: flex-start;
  padding: 0.5rem 0rem;
  background: transparent;
  border: none;
  color: #f0a500;
  font-weight: bold;
  text-decoration: underline;
  text-shadow: 1px 1px 2px black;
  cursor: pointer;
  transition: color 0.3s;
}

.details-btn:hover {
  color: White;
}

/* Responsive */
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
  font-size: 1.5rem;
  color: orange;
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
  height: 300px;
  margin: 1rem;
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
  color: #ff9800;
  padding: 1rem;
  background: linear-gradient(to top, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0));
  text-align: center;
}

.card-overlay h3 {
  margin: 0;
  font-size: 2.1rem;
  font-weight: bold;
  text-shadow: 1px 1px 2px black;
}

.card-overlay p {
  margin: 0.5rem 0 0;
  font-size: 0.95rem;
  color: #444;
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



</style>



<body>

  
  <!-- NAVBAR -->
  <header class="navbar">
    <div class="logo">🧭 COMPASS</div>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="travelplanner.php">Travel Planner</a></li>
        <li><a href="destinations.php">Destinations</a></li>
        <li><a href="travelog.php">Travel Logs</a></li>
      </ul>
    </nav>
  </header>

  <!-- HERO WELCOME SECTION -->
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

  <!-- MAIN SECTION -->
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
      <a href="destinations.php" class="details-btn">More Details...</a>
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
    </div>
  </div>
  <div class="card" style="background-image: url('https://whitewatercolorado.com/wp-content/uploads/4250817.jpg')">
    <div class="card-overlay">
      <h3>Level 5 Rapids!</h3>
      <p>Put your helmet on and grab your wetsuit. It’s time to conquer Siberia</p>
    </div>
  </div>
  <div class="card" style="background-image: url('https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi8Fl1dDtbMvx1gAKbeLFxwXoaY3TLdQ6b3HX_OqQmLUTSkRMPIWqZmW6BZRhGA222Zwpm49-ONPlkfGiGxE4wRA9QEdu_RHXHuSRs_mICNfNj41cJD6oIFm_3LH8TBVz4TsxW9u1wnjdk/s1600/DSCF1439.JPG')">
    <div class="card-overlay">
      <h3>Puget Sound Kayaking</h3>
      <p>One week of ocean kayaking in the Puget Sound.</p>
    </div>
  </div>
</section>

  </main>
</body>
</html>

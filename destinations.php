<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Featured Destination</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', sans-serif;
  color: white;
background: linear-gradient(to bottom, #000000 40%, #8F5B1A 100%);
}

/* HEADER */
.navbar {
  background-color: #1b1b1b;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem 2rem;
}

.logo {
  font-size: 1.5rem;
  font-weight: bold;
}

nav ul {
  list-style: none;
  display: flex;
  gap: 1.5rem;
}

nav a {
  color: white;
  text-decoration: none;
  font-weight: 500;
}

nav a:hover {
  color: orange;
}

/* HERO SECTION */
.featured-hero {
  background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0, 0, 0, 0.9)),
              url('pictures/sunset\ 1.png') center/cover no-repeat;
  padding: 4rem;
  height: 90vh;
  text-align: left;
}

.featured-hero h1 {
  font-size: 3.5rem;
  font-weight: bold;
  margin-top: 6.5rem;
  margin-bottom: 2rem;
  text-align: left;
}

.featured-hero p {
  font-size: 1.9rem;
  max-width: 1000px;
 
  
}

/* DESTINATION CARDS */
.destinations {
  display: grid;
  grid-template-columns: 1fr;
  gap: 2rem;
  padding: 2rem;
}

.card {
  background-size: cover;
  background-position: center;
  padding: 2rem;
  height: 450px; /* Increased height for longer card */
  display: flex;
  align-items: flex-end;
  position: relative;
  border-radius: 12px;
  overflow: hidden;
}

.card::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(0,0,0,0.85), rgba(0,0,0,0.2));
  z-index: 0;
}

.card-content {
  position: relative;
  z-index: 1;
  max-width: 500px;
}

.card h2 {
  font-size: 1.5rem;
  margin-bottom: 0.5rem;
}

.card .price {
  font-size: 1.4rem;
  font-weight: bold;
  margin-bottom: 0.2rem;
}

.card .details {
  font-size: 0.95rem;
  margin-bottom: 1rem;
  opacity: 0.9;
}

.card .desc {
  font-size: 0.95rem;
  margin-bottom: 0.8rem;
}

.card a {
  color: #fff;
  font-weight: bold;
  text-decoration: underline;
  font-size: 0.95rem;
}

.card a:hover {
  color: #8F5B1A;
}




</style>

  <header class="navbar">
    <div class="logo">🧭 COMPASS</div>
    <nav>
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="travelplanner.php">Travel Planner</a></li>
        <li><a href="destinations.php">Destinations</a></li>
        <li><a href="travelog.php">Travel Logs</a></li>
      </ul>
    </nav>
  </header>

  <section class="featured-hero">
    <div class="hero-content">
      <h1>FEATURED DESTINATION</h1>
      <p>Compass works hard to bring you the best possible trips for your rugged lifestyle. Here's our latest getaway packages suited for the adventurous spirit.</p>
    </div>
  </section>

  <section class="destinations">
    <div class="card" style="background-image: url('pictures/image\ 9.png');">
      <div class="card-content">
        <h2>California Surfing Safari</h2>
        <p class="price">$960</p>
        <p class="details">includes lodging,<br>food,<br>and airfare</p>
        <p class="desc">Be ready to go pro in a California surf town. We will catch some waves by morning and sip icy wet smoothies in the sun after lunch.</p>
        <a href="california.php">MORE DETAILS...</a>
      </div>
    </div>

    <div class="card" style="background-image: url('pictures/image\ 10.png');">
      <div class="card-content">
        <h2>Bike New Zealand</h2>
        <p class="price">$1490</p>
        <p class="details">includes lodging,<br>food,<br>and airfare</p>
        <p class="desc">Shred NZ’s scenery, mountains, and hidden trails suited for adrenaline-fueled riders. Push your legs to the limit.</p>
        <a href="newzealand.php">MORE DETAILS...</a>
      </div>
    </div>

    <div class="card" style="background-image: url('pictures/image\ 11.png');">
      <div class="card-content">
        <h2>Devil’s Tower Rock Climb</h2>
        <p class="price">$740</p>
        <p class="details">includes lodging,<br>food,<br>and airfare</p>
        <p class="desc">Take on the steep pitch and test the impossible cliffs of the beautiful Devil’s Tower, Wyoming.</p>
        <a href="gateway.php">MORE DETAILS...</a>
      </div>
    </div>
  </section>

</body>
</html>

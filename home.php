<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Compass - Home</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
  background-color: black;
  color: white;
  line-height: 1.6;
}

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

.hero {
background: 
    linear-gradient(to bottom, rgba(0,0,0,0) 70%, rgba(0,0,0,1) 100%),
    url('pictures/image 8.png') no-repeat center center/cover;
  height: 90vh;
  display: flex;
  align-items: center;
  padding: 0 2rem;
}

.hero-overlay {
  padding: 2rem;
  border-radius: 10px;
  max-width: 1000px;
}

.hero-content h1 {
  font-size: 5.5rem;
  margin-bottom: 1rem;
}

.hero-content p {
  font-size: 1.5rem;
  margin-bottom: 1rem;
}

.main-section {
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
  padding: 2rem;
}

.sidebar {
  flex: 1;
  max-width: 300px auto;
  background-color:rgb(219, 136, 52);
  color: white;
  padding: 1.2rem;
  border-radius: 10px;
  order: 0; /* default order */
}

.sidebar img {
  width: 100%;
  height: auto;
  border-radius: 8px;
  margin-bottom: 0.5rem;
}

.sidebar a {
  display: inline-block;
  margin-top: 1rem;
  color: blue;
  color: white;
    text-decoration: none;
}
.sidebar a:hover {
  text-decoration: underline;
}

.content {
  flex: 2;
  min-width: 300px;
  order: 1;
}

.content h2 {
  margin-bottom: 1rem;
  border-bottom: 1px solid white;
  display: inline-block;
  padding-bottom: 0.3rem;
}

.cards {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
}

.card {
  background-color: rgb(219, 136, 52);
  border-radius: 12px;
  padding: 1rem;
  flex: 1;
  min-width: 200px;
  height: 500px;
  color: white;
}

.card h3 {
    margin-top: 2.5rem;
  margin-bottom: 0.5rem;
  font-size: 2.1rem;
  color: #fffacd;
}
.card p {
    margin-top: 2.5rem;
  margin-bottom: 0.5rem;
  font-size: 1.8rem;
  color: #fffacd;
}

/* Mobile First */
@media (max-width: 768px) {
  .hero {
    height: auto;
    padding: 1rem;
  }

  .hero-overlay {
    width: 100%;
  }

  .main-section {
    flex-direction: column;
  }

  .sidebar {
    order: -1; /* Move Feature Destination to the top */
  }

  .cards {
    flex-direction: column;
  }
}


</style>


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

  <main class="main-section">
    <aside class="sidebar">
      <h3>Feature Destination</h3>
      <img src="pictures/image 5.png" alt="Yosemite" />
      <p><strong>Yosemite</strong></p>
      <p>
        Experts only. Sign up now to scare El Capitan and Half Dome. Bring your own gear.
        We’ll provide food and a one hour video on scaling these amazing rocks.
      </p>
      <a href="#">More Details...</a>
    </aside>

    <section class="content">
      <h2>Learn More About:</h2>
      <div class="cards">
        <div class="card">
          <h3>Fly Fishing in the Rocky Mountains</h3><br>
          <p>You’ll get a seasoned guide and lots of dehydrated ravioli</p>
        </div>
        <div class="card">
          <h3>Level 5 Rapids!</h3> <br>
          <p>Put your helmet on and grab your wetsuit. It’s time to conquer Siberia</p>
        </div>
        <div class="card">
          <h3>Puget Sound Kayaking</h3> <br>
          <p>One week of ocean kayaking in the Puget Sound.</p>
        </div>
      </div>
    </section>
  </main>
</body>
</html>

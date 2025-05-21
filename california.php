<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>California Surfing Safari</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom, #1b2130 0%, #f5f5f5 100%);
      color: #fff;
    }

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #222;
    padding: 1rem 2rem;
    flex-wrap: wrap;
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
      linear-gradient(to bottom, rgba(0, 0, 0, 0.2) 30%, rgba(142,89,24,1) 100%),
      url('pictures/image 12.png') no-repeat center center/cover;
      height: 80vh;
      display: flex;
      align-items: flex-end;
      padding: 20px;
      color: #fff;
    }

    .hero h1 {
      font-size: 28px;
      padding: 10px;
    }

    .content {
      background-color: #8E5918;
    padding: 10px 30px;
    }

    .content h2 {
      margin-bottom: 10px;
      color: white;
    }

    .package {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin-bottom: 20px;
    }

    .package div {
      background-color: #000;
      color: #f4b942;
      padding: 10px;
      border-radius: 5px;
      font-weight: bold;
    }

    .description {
      margin-bottom: 30px;
      font-size: 24px;
      color: #ddd;
    }

    .other-things {
      background-color: #111;
      padding: 20px;
      border-radius: 10px;
    }

    .other-things h3 {
      margin-bottom: 10px;
      color: #f4b942;
    }
    .other-things a {
      margin-top: 10px;
      color: white;
    text-decoration: none;
    }

    .other-things a:hover {
      text-decoration: underline;
      color: #f4b942;
    }
    

    .image-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
      gap: 10px;
    }

    .image-grid img {
      width: 100%;
      border-radius: 5px;
    }

    @media (max-width: 600px) {
      nav a {
        margin-left: 10px;
        font-size: 12px;
      }

      .hero {
        height: 250px;
        padding: 10px;
      }

      .hero h1 {
        font-size: 20px;
      }
      
    }
  </style>
</head>
<body>
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


  <section class="hero">
    <h1>CALIFORNIA SURFING SAFARI  -  $960 / 5 Days</h1>
  </section>

  <section class="content">
    <h2>Package Includes:</h2>
    <div class="package">
      <div>✈️ Airfare</div>
      <div>🏨 Lodging</div>
      <div>🍲 Food</div>
      <div>👩‍✈️ Local Guide</div>
    </div>
    <div class="description">
      Summertime in southern California, what could be better? Let us know what you're looking for and we'll find it and take you there. Do you want big, fast waves or gentle rollers? Do you prefer a slamming beach break or a long, peeling point break? California's got it all so sign up now before summer's gone!
    </div>
    <div class="description">
      You'll stay at the centrally located Newport Bonita in Newport Beach. From there you can strike out to Trestles, Malibu, Salt Creek, The Wedge, San Onofre, and a dozen secret spots. Or, you can just walk out to the local beach breaks.
    </div>
    <section class="other-things">
      <h3>Other Things To Do:  <a href="">View Photos...</a></h3>
      <div class="image-grid">
        <img src="https://lushpalm.com/wp-content/uploads/2017/06/vw-bus-road-trip_2-52.jpg" alt="Surfing Image 1">
        <img src="https://assets.simpleviewinc.com/simpleview/image/upload/c_limit,h_1200,q_75,w_1200/v1/clients/slocal/acacia_productions_VISIT_SLOCAL_surf_gems_0008_68562bf3_c961_4f6f_9505_f143fe21e350_8efe4aed-3d88-4676-b194-721820d4e9e6.jpg" alt="Surfing Image 2">
        <img src="https://lapoint.b-cdn.net/image/6ZI0n2lJvAyAfVZVRB8mIB/ffa8af2dbdb587c468cf394875a6fcac/South_Beach_Ericeira.jpg?fm=jpg&fl=progressive&w=1920&q=75" alt="Surfing Image 3">
        <img src="https://www.bajabound.com/images/content/breaktime.jpg" alt="Surfing Image 4">
      </div>
    </section>
  </section>
</body>
</html>

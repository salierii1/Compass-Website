<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Devil's Tower Gateway</title>
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
      url('https://www.devilstowerlodge.com/images/Old_Site/d86d2d30-2e45-43b5-bf54-d2c1ab56d1d1.jpg') no-repeat center center/cover;
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
    <h1>DEVIL'S TOWER GATEWAY - $740 / 5 Days</h1>
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
      Wyoming's climbing Mecca, Devil's Tower, stands at 865 feet and offers the begginer or the expert climber 200 fun and challenging routes. (In fact, a 6-year-old boy conquered the Tower in 1994). The array of cracks in the walls allows you to use your imagination as you test your climbing skills
    </div>
    <div class="description">
      President Teddy Roosevelt named Devil's Tower the first national monument in 1906. Today, the park hosts approximately 450,00 visitors annually. And 5.000 of those visitors are climbers. But beware, environmentalists are trying to limit that number. so treat the ark with respect.
    </div>
    <section class="other-things">
      <h3>Other Things To Do:  <a href="">View Photos...</a></h3>
      <div class="image-grid">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPZePnZZbJjmkJNnWnIiNk6QIrXkYfZcF0_w&s" alt="Surfing Image 1">
        <img src="https://media-cdn.tripadvisor.com/media/attractions-splice-spp-674x446/15/6e/4b/e3.jpg" alt="Surfing Image 2">
        <img src="https://www.devilstowercountry.com/images/climb-devils-tower/climb-devils-tower-national-monument.jpg" alt="Surfing Image 3">
        <img src="https://www.gdargaud.net/Climbing/Wyoming/ElMatadorJam.jpg" alt="Surfing Image 4">
      </div>
    </section>
  </section>
</body>
</html>

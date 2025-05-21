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
      url('https://www.newzealand.com/assets/Cycling-Great-Rides/Alps-2-Ocean/Alps2Ocean_Cycle_Trail__aWxvdmVrZWxseQo_CropResizeWzUwMCxudWxsLDg1LCJqcGciXQ.jpg') no-repeat center center/cover;
      height: 400px;
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
    <h1>BIKE NEW ZEALAND - $1490 / 3 Days</h1>
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
      The Karapoti Trail, home to the Trek Karapoti Classic, twists around the Akatarawa Range and delivers 31 miles of technical single track and challenging fire road climbs. During the ride, there are several vistas to soothe those eyes while you reward your burning legs by taking a quick breather.
    </div>
    <div class="description">
      Upper Hutt is New Zealand's mountain biking hub, and if you'r looking for a group ride, stop by Mountain Trails bike shop. Or if you want a number plate on your handlebar, the trek karapoti Classic is scheduled for March 4, 2001.
    </div>
    <section class="other-things">
      <h3>Other Things To Do:  <a href="">View Photos...</a></h3>
      <div class="image-grid">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNYkqnCa5FVl-VkTiKbVQC5BqnuNL_LgW1XA&s" alt="Surfing Image 1">
        <img src="https://www.nzcycletrail.com/assets/New-Homepage-Landing-Page/Lake-Dunstan-Cycle-Trail-Image-2-cropped-copyright-bennettandslater__ScaleWidthWzk2MF0.co.nz.jpg" alt="Surfing Image 2">
        <img src="https://www.luxuryadventures.co.nz/wp-content/uploads/2023/03/NZMountainBiking4.jpg" alt="Surfing Image 3">
        <img src="https://c02.purpledshub.com/uploads/sites/39/2019/03/1395058659590-2y51bz96zkq1-9d27503.jpg?w=1029&webp=1" alt="Surfing Image 4">
      </div>
    </section>
  </section>
</body>
</html>

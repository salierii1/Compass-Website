<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create a Travelog</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background: black;
      color: #fff;
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
    linear-gradient(to bottom, rgba(0,0,0,0.2) 70%, rgba(0,0,0,1) 100%),
    url('pictures/trees.jpg') no-repeat center center/cover;
      height: 90vh ;
      padding: 60px 20px 40px;
      text-align: left;
    }
    .hero {
        padding-left: 60px;
    }
    .hero h1 {
      font-size: 4.5rem;
      margin-top: 40px;
      margin-bottom: 30px;
    }

    .hero p {
        margin-top: 40px;
      margin-bottom: 40px;
      font-size: 2rem;
    }

    .hero a {
        font-size: 1.5rem;
      color: #f4b942;
      text-decoration: none;
      font-weight: bold;
      margin-top: 60px;
    }
    .hero a:hover {
        margin-top: 20px;
      text-decoration: underline;
    }

    .entries {
      padding: 20px;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .entry {
      background-color: #222;
      color: #fff;
      border-radius: 10px;
      padding: 40px;
      display: flex;
      flex-direction: row;
      gap: 15px;
      align-items: center;
      flex-wrap: wrap;
    }

    .entry img {
      width: 320px;
      height: 320px;
      object-fit: cover;
      border-radius: 5px;
      flex-shrink: 0;
    }

    .entry-content {
      flex: 1;
      min-width: 200px;
    }

    .entry-title {
        font-size: 2.3rem;
      font-weight: bold;
      margin-bottom: 8px;
      color: #f4b942;
    }

    .entry-description {
      font-size: 1.4rem;
      color: #ddd;
    }

    @media (max-width: 768px) {
      .entry {
        flex-direction: column;
        align-items: flex-start;
      }

      .entry img {
        width: 100%;
        height: auto;
      }

      .entry-content {
        width: 100%;
      }
    }

    @media (max-width: 480px) {
      .hero h1 {
        font-size: 20px;
      }
      .hero p {
        font-size: 13px;
      }
      nav a {
        margin-left: 10px;
        font-size: 12px;
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
        <li><a href="#">Travel Logs</a></li>
      </ul>
    </nav>
  </header>

  <section class="hero">
    <h1>Create a Travelog</h1>
    <p><strong>New Member:</strong><br>Keep all your wildest adventures online! Start your personal Travelog. <br></p>
    <a href="register.php">CREATE >></a>
    <p><strong>Current Member:</strong><br>If you're one of the members who already started a personal Travelog, this is the place to update, edit, and add to the adventures. <br></p>
    <a href="index.php">CREATE >></a>
  </section>

  <section class="entries">
    <div class="entry">
      <img src="https://res.cloudinary.com/gofjords-com/images/c_scale,w_448,h_299,dpr_2/f_auto,q_auto:eco/v1683890721/Experiences/XXLofoten/Kayaking/Evening%20kayaking%202020/Evening-kayaking-Svolvaer-Lofoten-XXlofoten-1/Evening-kayaking-Svolvaer-Lofoten-XXlofoten-1.jpg?_i=AA" alt="Kayaking">
      <div class="entry-content">
        <div class="entry-title">Conquering the rapids on the Rutan Islands</div>
        <div class="entry-description">Definitely our craziest journey ever! A beautiful collage of nature. Rapids reaching nearly 5mph, more than a dozen waterfalls, various sizes, and some killer rocks. We saw the biggest fish. Nothing beats the feeling of conquering loads of obstacles. The Rutan lake also has a lighter, relaxing side – check out the local villager.</div>
      </div>
    </div>

    <div class="entry">
      <img src="https://scl.cornell.edu/sites/scl/files/2020-05/COE%20ROCK%20Peterskill6%20HRZ.jpg" alt="Climbing">
      <div class="entry-content">
        <div class="entry-title">Scaling the mountain in Manural</div>
        <div class="entry-description">Some of the steepest cliffs around! My buddy and I began our day scale above the majestic raging water of Nanna.</div>
      </div>
    </div>

    <div class="entry">
      <img src="https://framerusercontent.com/images/mQcKcyt3Nb25vMYBSbb47aQ9Kw.jpg" alt="Cycling">
      <div class="entry-content">
        <div class="entry-title">Cycling the Irma Coastline</div>
        <div class="entry-description">Beautiful scenery combined with steep inclines and fast roads allowed for some great cycling. Don’t forget the helmet!</div>
      </div>
    </div>
  </section>
</body>
</html>

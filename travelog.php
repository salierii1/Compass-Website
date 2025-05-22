<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Compass - Travel Vlogs</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Georgia, 'Times New Roman', Times, serif;
    }

    body {
      background-color: #fff;
      color: #333;
    }

    .navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #00CEC3;
  padding: 1rem 2rem;
  color: white;

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
  color: rgb(1, 119, 113);
  transform: scale(1.05);
}

    .hero {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
      background: linear-gradient(to bottom, #fff, #dfe8e1);
      background: url('pictures/grass.jpg') no-repeat center center/cover;
    }

    .hero-text {
      flex: 1 1 300px;
      padding: 1px;
      max-width: 900px;
      animation: fadeInLeft 1s ease-in-out;
    }

    .hero-text h1 {
      color: rgb(1, 119, 113);
      font-size: 4rem;
      margin-bottom: 10px;
      text-shadow: 1px 1px 2px black;
    }

    .hero-text p {
      color: white;
      font-size: 1.4rem;
      text-shadow: 1px 1px 2px black;
      margin-bottom: 20px;
    }

    .hero-text button {
      padding: 15px 17px;
      width: 200px;
      background-color: #00CEC3;
      color: white;
      text-shadow: 1px 1px 2px black;
      border: none;
      border-radius: 5px;
      font-size: 1.6rem;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .hero-text button:hover {
      background-color: rgb(1, 119, 113);
    }

    .hero-image {
      flex: 1 1 300px;
      max-width: 400px;
      padding: 20px;
      position: relative;
      animation: fadeInRight 1s ease-in-out;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .hero-image::before {
      content: "";
      position: absolute;
      width: 100%;
      height: 80%;
      background:rgba(0, 206, 196, 0.25);
      border-radius: 50%;
      z-index: 0;
      transform: translateX(-10%) scale(1.2);
    }

    .hero-image img {
      width: 100%;
      border-radius: 50%;
      position: relative;
      z-index: 1;
    }


    .cards {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 50px;
      padding: 40px 20px;
    }

    .card {
      background: white;
      border-radius: 10px;
      box-shadow: 0 5px 30px #00CEC3;
      height: 500px;
      width: 350px;
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-10px);
    }

    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .card-content {
      padding: 12px;
    }

    .card h3 {
      font-size: 1.5rem;
      color: #00CEC3;
      margin-bottom: 10px;
    }

    .card p {
      font-size: 1.2rem;
      line-height: 1.5;
    }

    .avatar1 {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: url('https://images.unsplash.com/photo-1633332755192-727a05c4013d?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8cG9ydHJhaXQlMjBtYW58ZW58MHx8MHx8fDA%3D') no-repeat center center/cover;
  margin: -25px auto 10px;
  position: relative;
      z-index: 3;
    }
    .avatar2 {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: url('https://smileyworldz.com/wp-content/uploads/2024/01/20250320_120749-1024x1024.jpg') no-repeat center center/cover;
  margin: -25px auto 10px;
  position: relative;
      z-index: 3;
    }

    .avatar3 {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: url('https://pbs.twimg.com/media/GrQapJtXYAAGZnn.jpg') no-repeat center center/cover;
  margin: -25px auto 10px;
  position: relative;
      z-index: 3;
    }

    @keyframes fadeInLeft {
      from { opacity: 0; transform: translateX(-30px); }
      to { opacity: 1; transform: translateX(0); }
    }

    @keyframes fadeInRight {
      from { opacity: 0; transform: translateX(30px); }
      to { opacity: 1; transform: translateX(0); }
    }

    @media (max-width: 768px) {
      .hero {
        flex-direction: column;
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
    <div class="hero-text">
      <h1>Share Your Thoughts</h1>
      <p>Create, update, edit, and add to the Adventures you experience with our Website.</p>
      <button>CREATE</button>
    </div>
    <div class="hero-image">
      <img src="pictures/girl.png" alt="Hero">
    </div>
  </section>

  <section class="cards">
    <div class="card">
      <img src="https://www.newzealand.com/assets/Tourism-NZ/Nelson/img-1536221079-4393-6462-6778B1E0-0D02-97B2-3D592E45C515F277__aWxvdmVrZWxseQo_CropResizeWzE5MDAsMTAwMCw3NSwianBnIl0.jpg" alt="Kayaking">
      <div class="avatar1"></div>
      <div class="card-content">
        <h3>Conquering the rapids on the Rutan Islands</h3>
        <p>Definitely our craziest journey ever! A beautiful collage of nature's rapids, waterfalls, and more. Make sure to check out the local village!</p>
      </div>
    </div>

    <div class="card">
      <img src="https://www.reuters.com/resizer/v2/LJ3X5QKUOJLJ5CF2WML2RFV5EI.jpg?auth=0482f5fe094ad55ca895fc36216cbbc1f83e59999e7a8d7faadb13f99cbb2883" alt="Climbing">
      <div class="avatar2"></div>
      <div class="card-content">
        <h3>Scalling the mountain in Manural</h3>
        <p>Some of the steepest cliffs around! My buddy and I began our day scaling above the majestic raging water of Manural.</p>
      </div>
    </div>

    <div class="card">
      <img src="https://framerusercontent.com/images/mQcKcyt3Nb25vMYBSbb47aQ9Kw.jpg" alt="Cycling">
      <div class="avatar3"></div>
      <div class="card-content">
        <h3>Cycling the Irma Coastline</h3>
        <p>Beautiful scenery combined with steep inclines and flat roads allowed for some great cycling. Don’t forget the helmet!</p>
      </div>
    </div>
  </section>
</body>
</html>

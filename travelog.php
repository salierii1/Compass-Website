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

/* NAVBAR */
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #00CEC3;
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
  color: rgb(1, 119, 113);
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
  color: rgb(1, 119, 113);
}

.sidebar {
  position: fixed;
  top: 0;
  right: -300px;
  width: 250px;
  height: 100%;
  background-color: #00CEC3;
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
  color: #003f3c;
}

    .hero {
      margin: 70px auto;
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
    <div class="logo">🧭 COMPASS</div>
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
  <h3>🧭</h3>
  <h3>COMPASS</h3>
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

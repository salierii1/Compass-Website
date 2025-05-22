<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>California Surfing Safari</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Georgia, 'Times New Roman', Times, serif;
      background-color: #fff;
      color: #333;
    }

    /* NAVBAR */
    .navbar {
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color: #00CEC3;
      padding: 1rem 2rem;
      color: white;
      animation: slideDown 1.2s ease-in-out;
    }

    .logo {
      font-size: 2rem;
      font-weight: bold;
      text-shadow: 1px 1px 2px black;
      margin-bottom: 0.5rem;
    }

    .navbar nav ul {
      list-style: none;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 2rem;
      padding: 0;
    }

    .navbar nav ul li a {
      text-decoration: none;
      color: white;
      font-size: 1.2rem;
      font-weight: bold;
      transition: color 0.3s;
      text-shadow: 1px 1px 2px black;
    }

    .navbar nav ul li a:hover {
      color: rgb(1, 119, 113);
    }

    /* HERO */
    .hero {
      background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
        url('https://endlesstrailexpeditions.com/wp-content/uploads/2020/06/7fe1e526-4109-493a-ba86-e1644164108b.jpeg?w=1024')
        no-repeat center center/cover;
      color: white;
      height: 60vh;
      text-align: center;
      padding: 5rem 1rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .hero h1 {
      font-size: 2.5rem;
      margin-bottom: 0.5rem;
      text-shadow: 1px 1px 5px black;
    }

    .price {
      font-size: 2.8rem;
      color: #00CEC3;
      text-shadow: 1px 1px 5px black;
      font-weight: bold;
    }

    .hero button {
      margin-top: 1rem;
      padding: 0.75rem 1.5rem;
      background-color: #00CEC3;
      border: none;
      border-radius: 6px;
      color: white;
      font-size: 1.3rem;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .hero button:hover {
      background-color: rgb(1, 119, 113);
    }

    /* PHOTO STRIP */
    .photo-strip {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      gap: 1rem;
      padding: 2rem 1rem;
    }

    .photo-strip img {
      max-width: 100%;
      width: 300px;
      height: auto;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }

    .photo-strip img:hover {
      transform: scale(1.05);
    }

    .view-text {
      width: 100%;
      text-align: center;
      padding-top: 1rem;
    }

    .view-text a {
      font-size: 1.2rem;
      color: rgb(1, 119, 113);
      font-weight: bold;
      text-decoration: none;
    }

    .view-text a:hover {
      color: #00CEC3;
    }

    /* MEDIA QUERIES */
    @media (max-width: 768px) {
      .hero h1 {
        font-size: 2rem;
      }

      .price {
        font-size: 2rem;
      }

      .hero button {
        font-size: 1rem;
      }

      .photo-strip img {
        width: 80%;
      }

      .navbar nav ul {
        flex-direction: column;
        gap: 1rem;
      }
    }

    /* Animations (optional but preserved) */
    @keyframes slideDown {
      0% {
        transform: translateY(-100%);
        opacity: 0;
      }
      100% {
        transform: translateY(0);
        opacity: 1;
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
    <h1>California Surfing Safari</h1>
    <div class="price">$940</div>
    <a href="travelplanner.php"><button>Add to the Planner</button></a>
  </section>

  <div class="photo-strip">
    <img src="https://assets.simpleviewinc.com/simpleview/image/upload/c_limit,h_1200,q_75,w_1200/v1/clients/slocal/acacia_productions_VISIT_SLOCAL_surf_gems_0008_68562bf3_c961_4f6f_9505_f143fe21e350_8efe4aed-3d88-4676-b194-721820d4e9e6.jpg" alt="Surf 1">
    <img src="https://endlesstrailexpeditions.com/wp-content/uploads/2020/06/246b38b0-9e22-47a2-abab-48d425f44cc9_1_201_a.jpeg?w=1024" alt="Surf 2">
    <img src="https://tpwmagazine.com/archive/2022/nov/scout1_adventures/img/Mustang%20Island_3321.jpg" alt="Surf 3">
    <img src="https://endlesstrailexpeditions.com/wp-content/uploads/2020/06/7fe1e526-4109-493a-ba86-e1644164108b.jpeg?w=1024" alt="Surf 4">
    <div class="view-text"><a href="#">View Photos &gt;&gt;</a></div>
  </div>

</body>
</html>

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
      font-family: Georgia, 'Times New Roman', Times, serif;
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
      animation: slideDown 1.2s ease-in-out;
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
      position: relative;
      background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
        url('https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi6FtW_xxtck3E57XjJjkiV76ZTDkbJvCCf1pUbAq10G-U5z0Y6TYVxaGU0Zi6CMsv0VflWJBMQeb3Q0533MIPm0A6A9GvFHCnr6LlnIbLCkDbBp87zhqpTLEwJl_TVN1RND80edvJOOXM/s1600/Western+USA+2015+Pics+751_RockClimbers2_mm.JPG')
        no-repeat center center/cover;
      color: white;
      height: 60vh;
      text-align: center;
      padding: 5rem 1rem;
      animation: fadeIn 1s ease forwards;
      animation-delay: 0.2s;
      opacity: 0;
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
      animation: pop 1s ease-in-out;
    }

    .hero button {
      margin-top: 1rem;
      padding: 0.75rem 1.5rem;
      background-color: #00CEC3;
      border: none;
      border-radius: 6px;
      color: white;
      text-shadow: 1px 1px 5px black;
      font-size: 1.3rem;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .hero button:hover {
      background-color: rgb(1, 119, 113);
    }

    .photo-strip {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 1rem;
      padding: 1rem;
      position: relative;
      top: -100px;
      z-index: 2;
      animation: fadeIn 1s ease forwards;
      animation-delay: 0.4s;
      opacity: 0;
      
    }

    .photo-strip img {
      max-width: 100%;
      height: 200px;
      width: 400px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }

    .photo-strip img:hover {
      transform: scale(1.05);
    }

    .view-text {
      width: 100%;
      text-align: right;
      padding: 1rem;
    }

    .view-text a {
      font-size: 1.2rem;
      color: rgb(1, 119, 113);
      font-weight: bold;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .view-text a:hover {
      color: #00CEC3;
    }

    .description-section {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      padding: 2rem;
      margin-top: -60px;
      position: relative;
      z-index: 3;
      animation: fadeIn 1s ease forwards;
      animation-delay: 0.6s;
      opacity: 0;
    }

    .description-section > div {
      flex: 1 1 300px;
      font-size: 1.5rem;
      line-height: 1.5;
      border-right: 2px solid rgb(1, 119, 113);
      padding-right: 1rem;
    }

    .description-section > div:last-child {
      border-right: none;
    }

    .package {
      padding: 2rem;
      background: #fff;
      animation: fadeIn 1s ease forwards;
      animation-delay: 0.8s;
      opacity: 0;
    }

    .package h3 {
      font-size: 2rem;
      margin-bottom: 2.2rem;
    }

    .badges {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
    }

    .badge {
      padding: 1rem 2rem;
      background-color: rgb(1, 119, 113);
      font-size: 1.4rem;
      color: white;
      border-radius: 30px;
      font-weight: bold;
      transition: transform 0.3s ease;
    }

    .badge:hover {
      transform: scale(1.05);
    }

    @keyframes pop {
      0% {
        transform: scale(0.8);
        opacity: 0;
      }
      100% {
        transform: scale(1);
        opacity: 1;
      }
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

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

    @media (max-width: 768px) {
      .navbar nav ul {
        flex-direction: column;
        gap: 1rem;
      }

      .hero h1 {
        font-size: 2rem;
      }

      .price {
        font-size: 2rem;
      }

      .hero button {
        font-size: 1rem;
      }

      .photo-strip {
        flex-direction: column;
        top: 0;
      }

      .description-section {
        flex-direction: column;
      }

      .description-section > div {
        border-right: none;
        border-bottom: 2px solid rgb(1, 119, 113);
        padding-bottom: 1rem;
      }

      .description-section > div:last-child {
        border-bottom: none;
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
    <h1>Devil's Tower Gateway Rock Climb</h1>
    <div class="price">$740</div>
     <a href="travelplanner.php"><button>Add to the Planner</button></a>
  </section>

  <div class="photo-strip">
    <img src="https://i0.wp.com/wyomingmountainguides.com/wp-content/uploads/2022/04/img_4365.jpg?fit=4032%2C3024&ssl=1" alt="Surf 1">
    <img src="https://acoupledaystravel.com/wp-content/uploads/2021/04/Devils-2.jpg" alt="Surf 2">
    <img src="https://cdn.climbing.com/wp-content/uploads/2014/04/GettyImages-562479501-scaled.jpg" alt="Surf 3">
    <img src="https://www.mensjournal.com/.image/ar_4:3%2Cc_fill%2Ccs_srgb%2Cfl_progressive%2Cq_auto:good%2Cw_1200/MTk2MTM2NjkzMTA4MDU3MjMz/gettyimages-auroc8302000046-e503662d-6816-4d76-ade4-1be300ae8aa6.jpg" alt="Surf 4">
    <div class="view-text"><a href="#">View Photos &gt;&gt;</a></div>
  </div>

  <section class="description-section">
    <div>
      Wyoming's climbing Mecca, Devil's Tower, stands at 865 feet and offers the beginner or the expert climber 200 fun and challenging routes. (In fact, a 6-year-old boy conquered the Tower in 1994.) The array of cracks in the walls allows you to use your imagination as you test your climbing skills.
    </div>
    <div>
      President Teddy Roosevelt named Devils Tower the first national monument in 1906. Today, the park hosts approximately 450,000 visitors annually. And 5,000 of those visitors are climbers. But beware, environmentalists are trying to limit that number, so treat the park with respect.

    </div>
  </section>

  <section class="package">
    <h3>Package Includes:</h3>
    <div class="badges">
      <div class="badge">✈️ Airfare</div>
      <div class="badge">🍽️ Food</div>
      <div class="badge">🏨 Lodging</div>
      <div class="badge">🗺️ Local Guide</div>
    </div>
  </section>
</body>
</html>

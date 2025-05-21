<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign Up</title>
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

body, html {
  height: 100%;
  width: 100%;
}

.background {
  background: url('https://images.unsplash.com/photo-1560719168-32825e16d2c6?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bmF0dXJlJTIwcm9hZHxlbnwwfHwwfHx8MA%3D%3D&fbclid=IwZXh0bgNhZW0CMTEAAR6XGnKn29vcV9Ym8HxAkkOVEuTwA7i0hawTCH-hhrEYvnmzL056V6NHGQqA3Q_aem_Ch-4l-d8kWvyRyXDuioNvQ') no-repeat center center/cover;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 1rem;
}

.signup-container {
  background-color: rgba(0, 0, 0, 0.75);
  padding: 3rem 2.5rem;
  border-radius: 20px;
  width: 100%;
  max-width: 500px;
  color: white;
  text-align: center;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
}

.logo {
  width: 60px;
  margin-bottom: 15px;
}

h2 {
  font-size: 2rem;
  margin-bottom: 2rem;
  letter-spacing: 1px;
}

form {
  display: flex;
  flex-direction: column;
  gap: 1.2rem;
}

.name-fields {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
}

.name-fields input {
  flex: 1;
  min-width: 120px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  padding: 0.9rem 1rem;
  border: none;
  border-radius: 8px;
  font-size: 1rem;
  background-color: #f0f0f0;
  color: #333;
  transition: all 0.3s ease;
}

input:focus {
  outline: none;
  box-shadow: 0 0 0 2px orange;
}

button {
  background-color: #FFA500;
  color: black;
  padding: 1rem;
  font-weight: bold;
  font-size: 1.1rem;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #ff8c00;
}

@media (max-width: 600px) {
  .signup-container {
    padding: 2rem;
  }

  .name-fields {
    flex-direction: column;
  }
}

</style>

  <div class="background">
    <div class="signup-container">
      <img src="depositphotos_106097000-stock-illustration-vintage-compass-wind-rose-symbol-removebg-preview.png" alt="Logo" class="logo" />
      <h2>Sign Up</h2>
      <form>
        <div class="name-fields">
          <input type="text" placeholder="First Name" required />
          <input type="text" placeholder="Last Name" required />
        </div>
        <input type="email" placeholder="Email" required />
        <input type="text" placeholder="Username" required />
        <input type="password" placeholder="Password" required />
        <button type="submit">SUBMIT</button>
      </form>
    </div>
  </div>
</body>
</html>

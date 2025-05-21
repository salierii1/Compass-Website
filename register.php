<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-image: url('./pictures/background.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            position: relative;
        }

        .header {
            background-color: #1f1f1f;
            padding: 30px 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            color: white;
            justify-content: space-between;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 10px; 
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 10px; 
        }

        .header2 {
            background-color: rgb(255, 255, 255);
            padding: 30px 20px;
            color: white;
        }

        .logo {
            height: 80px;
        }

        .logo2 {
            height: 40px;
        }

        .COMPASS {
            height: 80px;
        }

        .header h1,
        .header2 h1 {
            color: #f0a500;
            font-weight: normal;
            margin: 0;
            font-size: 30px;
        }

        .create-account,
        .forgot-password {
            display: block;
            margin-top: 10px;
            font-size: 12px;
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        .create-account:hover,
        .forgot-password:hover {
            text-decoration: underline;
            color: #f0a500; 
        }

        button {

            padding: 12px;
            margin-top: 15px;
            border: none;
            border-radius: 6px;
            background: linear-gradient(45deg, #f0a500, #d18b00); 
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        button:hover {
            background: linear-gradient(45deg, #d18b00, #b37400);
            transform: scale(1.05); 
        }

        button:active {
            transform: scale(0.98); 
        }

        .COMPASS {
            height: 40px;
            width: auto; 
        }

        .signin {
            height: 40px; 
            width: auto; 
        }

        .tagline {
            font-size: 16px;
            color: #ccc;
            margin-left: 10px;
            font-style: italic;
        }

        .user-section {
            display: flex;
            align-items: center; 
            gap: 10px; 
        }

        .user-section img {
            height: 40px;
        }

        .user-section a {
            font-size: 16px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            display: flex;
            align-items: center; 
            height: 40px; 
        }

        .header2 {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            border-bottom: 2px solid #ccc; 
        }

        .signin {
            height: 40px;
            width: auto;
        }

        .welcome-text {
            font-size: 18px;
            font-weight: bold;
            color: black;
        }

        .password-container {
            display: flex;
            align-items: center;
            width: 100%;
        }

        #password {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #togglePassword {
            cursor: pointer;
            font-size: 18px;
            color: #666;
            background: #f0a500;
            border: none;
            outline: none;
            width: -1000px;
            margin-left: 25px;
            margin-top: 3px
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            height: 500px;
            width: 700px; 
            padding: 20px;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-column {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        input {
            width: 100%;
            height: 35px;
            padding: 8px;
        }

        .password-container {
            display: flex;
            align-items: center;
            width: 100%;
        }

        .register-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .register-form label {
            font-size: 14px;
            font-weight: bold;
            color: #f0a500;
        }

        .register-form input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #fff;
            font-size: 14px;
            transition: all 0.3s ease-in-out;
        }

        .register-form input:focus {
            border-color: #f0a500;
            outline: none;
            box-shadow: 0 0 5px rgba(240, 165, 0, 0.5);
        }

        .register-button {
            width: 100px;
            padding: 12px;
            margin-top: 15px;
            border: none;
            border-radius: 6px;
            background: linear-gradient(45deg, #f0a500, #d18b00);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .register-button:hover {
            background: linear-gradient(45deg, #d18b00, #b37400);
            transform: scale(1.05);
        }

        .register-button:active {
            transform: scale(0.98);
        }

        .login-container {
           display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 60px); 
        }

        .login-box {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 50px;
            border-radius: 10px;
            width: 500px;
            height: auto; 
            margin-bottom: 300px;
        }

        .login-box label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: bold;
            color: #f0a500; 
        }

        .login-box input {
            width: 320px;
            padding: 10px;
            border: 1px solid #ccc; 
            border-radius: 6px;
            background-color: #fff; 
            font-size: 14px;
            transition: all 0.3s ease-in-out;
        }

        .login-box input:focus {
            border-color: #f0a500; 
            outline: none;
            box-shadow: 0 0 5px rgba(240, 165, 0, 0.5);
        }













@media (max-width: 768px) {
    .login-box {
        width: 1200px;
        max-width: 400px;
        padding: 30px;
        margin-left: auto; 
        margin-right: auto;
    }

    .form-row {
        flex-direction: column; 
        gap: 10px;
    }

    .form-column {
        width: 100%; 
    }

    .password-container {
        flex-direction: row; 
        justify-content: space-between;
    }

    .register-form input, .login-box input {
        width: 370px;
        font-size: 16px; 
    }

    .register-button, button {
        width: 100%;
        padding: 14px; 
    }

    .login-container {
        height: auto;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
}


@media (min-width: 1366px) {
    .login-box {
        width: 2000px;
        height: 450px;
        max-width: 700px; 
        padding: 40px;
        margin-top: 300px;
        margin-left: auto; 
        margin-right: auto;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .form-column {
        flex: 1;
        min-width: 250px; 
    }

    .password-container {

        align-items: center;
        width: 900px;
    }

    .register-form input, .login-box input {
        width: 300px;
        max-width: 400px;
        height: 30px
    }
    
    .register-button, button {
        width: auto;
        min-width: 200px;
    }
}


</style>
</head>


<body>


<div class="header">
    <div class="logo-container">
        <img src="./pictures/compasslogo.png" alt="Compass Logo" class="logo">
        <img src="./pictures/COMPASS.png" alt="Compass" class="COMPASS">
        <p class="tagline">Navigate your way with COMPASS</p>
    </div>


    <div class="user-section">
        <img src="./pictures/users.png" alt="users" class="logo2">
        <a href="" class="logo2">User</a>
    </div>
</div>

<div class="header2">
    <img src="./pictures/signup.png" alt="signin" class="signin">
    <p class="welcome-text">Hello there, new user! Please fill out the sign-up form.</p>
</div>


<div class="login-container">
    <form class="login-box" action="register2.php" method="POST">
        <div class="form-row">
            <div class="form-column">
                <label for="first_name">First Name:</label>
                <input type="text" name="fName" placeholder="First Name" required>
            </div>
            <div class="form-column">
                <label for="middle_name">Middle Name:</label>
                <input type="text" name="mName" placeholder="Middle Name">
            </div>
        </div>

        <div class="form-row">
            <div class="form-column">
                <label for="last_name">Last Name:</label>
                <input type="text" name="sName" placeholder="Last Name" required>
            </div>
            <div class="form-column">
                <label for="student_id">Student ID:</label>
                <input type="text" name="stdID" placeholder="Student ID" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-column">
                <label for="email">Email:</label>
                <input type="email" name="mail" placeholder="Email" required>
            </div>
            <div class="form-column">
                <label for="username">Username:</label>
                <input type="text" name="username" placeholder="Username" required>
            </div>
        </div>

        <label for="password">Password: <span style="font-size: 11px; color: #ccc;">(Minimum 8 characters, must include uppercase, lowercase, number, and special character)</span></label>
        <div class="password-container">
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="button" id="togglePassword">👁️</button>
        </div>

        <button type="submit">Login</button>

        <a href="./login.php" class="forgot-password">Already have an account?</a>
    </form>
</div>

</div>


    <script>

    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");
  
    togglePassword.addEventListener("click", () => {
      const type = passwordInput.type === "password" ? "text" : "password";
      passwordInput.type = type;
      togglePassword.textContent = type === "password" ? "👁️" : "🙈";
    });
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
    
  
  
  
  
  </script>








</body>
</html>

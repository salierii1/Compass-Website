<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body, html {
    margin: 0;
    padding: 0;
    font-family: Georgia, 'Times New Roman', Times, serif;
    background: url('https://www.travelandleisure.com/thmb/xieEX63911EUWlO90w3wiuaVYAU=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/georgia-hogpen-gap-FALLROADTRIP0817-deb62bb6ce6f4533bfc63dfe6a1fe7ed.jpg') no-repeat center center/cover;
    color: white;
    height: 100%;

    background-image: url('https://www.travelandleisure.com/thmb/xieEX63911EUWlO90w3wiuaVYAU=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/georgia-hogpen-gap-FALLROADTRIP0817-deb62bb6ce6f4533bfc63dfe6a1fe7ed.jpg');
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

/* === FLEX CONTAINER FOR BOTH SECTIONS === */
.container {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    height: 100vh;
    gap: 40px;
    padding: 0 40px;
}

/* === WELCOME TEXT STYLE === */
.welcome-text {
    max-width: 800px;
    padding: 1rem;
    text-shadow: 1px 1px 2px black;
}

.welcome-text h1 {
    font-size: 3rem;
    margin-bottom: 0.5rem;
    color: white;
}

.welcome-text p {
    font-size: 1.2rem;
    font-weight: bold;
    color: #ddd;
}

.signup a {
    color:rgb(252, 214, 57);
    text-decoration: underline;
}

/* === LOGIN FORM STYLES === */
.login-box {
    
    background-color: white;
    padding: 40px;
    border-radius: 12px;
    width: 100%;
    max-width: 400px;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
}

.login-box label {
    display: block;
    margin-top: 15px;
    margin-bottom: 5px;
    font-size: 20px;
    font-weight: bold;
    color: #123499;
}

.login-box input {
    width: 95%;
    padding: 10px;
    border-color: 3px solid #123499;
    border-radius: 6px;
    background-color: white;
    font-size: 18px;
    
}

.login-box input:focus {
    width: 10px;
    outline: none;
    box-shadow: 0 0 6px rgba(240, 205, 0, 0.6);
}
.login-box input {
    width: 100%;
    padding: 10px;
    border: 3px solid #123499;
    border-radius: 6px;
    background-color: white;
    font-size: 18px;
    box-sizing: border-box;
}
/* Prevent password input from shrinking on focus */
.login-box input:focus {
    width: 100%;
    outline: none;
    box-shadow: 0 0 6px rgba(240, 205, 0, 0.6);
}
.password-container{
    align-items: center;
    gap: 10px;
}

#togglePassword {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 20px;
}

button {
    width: 100%;
    padding: 12px;
    margin-top: 20px;
    background: #123499;
    border: none;
    border-radius: 6px;
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.2s ease;
}

button:hover {
    background: #fcd639;
    transform: scale(1.05);
}

.create-account,
.forgot-password {
    display: block;
    margin-top: 10px;
    font-size: 16px;
    color: #c79e00;
    font-weight: bold;
    text-align: left;
    text-decoration: none;
}

.create-account:hover,
.forgot-password:hover {
    color: #123499;
    text-decoration: underline;
}

.error-message {
    background-color: rgba(255, 0, 0, 0.1);
    border: 1px solid red;
    color: red;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 6px;
    text-align: center;
    font-size: 14px;
}

@media (max-width: 768px) {
    .container {
        flex-direction: column;
        gap: 20px;
        padding: 20px;
        height: auto;
    }

    .welcome-text {
        text-align: center;
        padding: 1rem 0;
    }

    .login-box {
        width: 100%;
        max-width: 400px;
        padding: 30px;
    }

    .password-container {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    .register-form input, .login-box input {
        width: 100%;
        font-size: 16px;
    }

    .register-button, button {
        width: 100%;
        padding: 14px;
    }

    .login-container {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
}




    </style>
</head>
<body>

<div class="container">
    <div class="welcome-text">
      <h1>WELCOME TO<br><span>COMPASS – YOUR JOURNEY STARTS HERE!</span></h1>
      <p>Explore destinations, plan unforgettable adventures, and manage your travels—all in one place.</p>
      <p class="signup"><a href="signup.php"></a></p>
    </div>


<div class="login-container">
    <form class="login-box" action="login2.php" method="POST">
        <?php if(isset($_GET['error'])): ?>
            <div class="error-message">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="Username" required>

        <a href="register.php" class="create-account">No username? Create an account.</a>

        <label for="password">Password:</label>

        <div class="password-container">
            <input type="password" id="password" name="password" placeholder="Password" required>
            
            <button type="button" id="togglePassword">👁️</button>
            
        </div>
        <a href="forget.php" class="forgot-password">Forgot Password?</a>
        <button type="submit">Login</button>

        
    </form>
</div>

<div id="error-message" style="color: red; margin-top: 10px; text-align: center;">
    <?php
    if (isset($_GET['error'])) {
        echo htmlspecialchars($_GET['error']);
    }
    ?>
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
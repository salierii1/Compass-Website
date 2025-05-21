<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
</head>
<body>


<div class="forgot-container">
        <h1>Forgot Password</h1>
        <p>Please enter your email address to reset your password.</p>
        <form action="reset_pass.php" method="POST">
            <input type="email" name="email" placeholder="Email Address" required>
            <button type="submit">Reset Password</button>
        </form>
        <p><a href="login.php">Back to Login</a></p>
    </div>








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
    background-repeat: no-repeat; 
    background-attachment: fixed; 
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
            margin-left: 1125px;
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
            width: 478px;
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

        .password-container {
            display: flex;
            align-items: center;
            width: 478px;
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
            background: none;
            border: none;
            outline: none;
            width: 10px;
        }

        .forgot-container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 10px;
            width: 400px;
            text-align: center;
            margin: auto;
            margin-top: 50px;
        }

        .forgot-container h1 {
            color: #f0a500;
        }

        .forgot-container p {
            color: #ccc;
        }

        .forgot-container input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #fff;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .forgot-container button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: linear-gradient(45deg, #f0a500, #d18b00);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .forgot-container button:hover {
            background: linear-gradient(45deg, #d18b00, #b37400);
            transform: scale(1.05);
        }

        .forgot-container a {
            color: #f0a500;
            text-decoration: none;
            font-size: 14px;
        }

        .forgot-container a:hover {
            text-decoration: underline;
        }
    </style>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - COMPASS</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: url('https://www.travelandleisure.com/thmb/xieEX63911EUWlO90w3wiuaVYAU=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/georgia-hogpen-gap-FALLROADTRIP0817-deb62bb6ce6f4533bfc63dfe6a1fe7ed.jpg') no-repeat center center/cover;
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .forgot-container {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 50px;
            border-radius: 10px;
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        .forgot-container h2 {
            color: #f0a500;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        .forgot-container p {
            color: white;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .forgot-container label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: bold;
            color: #f0a500;
            text-align: left;
        }

        .forgot-container input {
            width: 100%;
            padding: 12px;
            border: 3px solid #123499;
            border-radius: 6px;
            background-color: #fff;
            font-size: 14px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        .forgot-container input:focus {
            border-color: #f0a500;
            outline: none;
            box-shadow: 0 0 5px rgba(240, 165, 0, 0.5);
        }

        .forgot-container button {
            width: 100%;
            padding: 15px;
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
            transform: scale(1.02);
        }

        .back-to-login {
            display: inline-block;
            margin-top: 20px;
            color: #123499;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .back-to-login:hover {
            color: #fcd639;
        }

        .success-message {
            background: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }

        .error-message {
            background: #f44336;
            color: white;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .forgot-container {
                margin: 20px;
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="forgot-container">
        <h2>Forgot Password</h2>
        <p>Enter your email address and we'll send you a link to reset your password.</p>
        
        <?php if (isset($_GET['success'])): ?>
            <div class="success-message">
                A password reset link has been sent to your email address.
            </div>
        <?php endif; ?>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="error-message">
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php endif; ?>
        
        <form action="send_reset_email.php" method="POST">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Send Reset Link</button>
        </form>
        
        <a href="login.php" class="back-to-login">Back to Login</a>
    </div>
</body>
</html>

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



        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 60px); 
        }
        .forgot-container {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 50px;
            border-radius: 10px;
            width: 500px;
            height: auto;
            margin-left: 1125px;
            margin-bottom: 300px;
            color: #333;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }

        

        .forgot-container {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 40px;
            border-radius: 10px;
            width: 400px;
            text-align: center;
            margin: auto;
            margin-top: 50px;
        }

        .forgot-container h1 {
            color: #123499;
        }

        .forgot-container p {
            color:rgb(234, 159, 10);
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
            font-weight: bold;
        }

        .forgot-container input {
            width: 95%;
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
            background: #123499;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .forgot-container button:hover {
            background: rgb(234, 159, 10);
            transform: scale(1.05);
        }

        .forgot-container a {
            color: #123499;
            text-decoration: none;
            font-size: 14px;
        }

        .forgot-container a:hover {
            color: rgb(234, 159, 10);
            text-decoration: underline;
        }
    </style>
</body>
</html>
<?php

include 'connect.php';
date_default_timezone_set('Asia/Manila');

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $sql = "SELECT * FROM users WHERE reset_token = ? AND reset_expires > NOW()";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set New Password - COMPASS</title>
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
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo { height: 80px; }
        .logo2 { height: 40px; }
        .COMPASS { height: 40px; }
        .signin { height: 40px; }

        .tagline {
            font-size: 16px;
            color: #ccc;
            margin-left: 10px;
            font-style: italic;
        }

        .welcome-text {
            font-size: 18px;
            font-weight: bold;
            color: black;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 180px);
        }

        .login-box {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 50px;
            border-radius: 10px;
            width: 500px;
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
            width: 100%;
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

        button {
            width: 100%;
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

        .success-message {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            margin: 20px auto;
            max-width: 500px;
        }

        .success-message h2 {
            color: #f0a500;
            margin-bottom: 20px;
        }

        .success-message p {
            color: white;
            margin-bottom: 20px;
        }

        .login-link {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(45deg, #f0a500, #d18b00);
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .login-link:hover {
            background: linear-gradient(45deg, #d18b00, #b37400);
            transform: scale(1.05);
        }

        .password-requirements {
            color: #ccc;
            font-size: 12px;
            margin-top: 5px;
        }

        .error-text {
            color: #ff3333;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

        .invalid {
            border-color: #ff3333 !important;
        }

        .valid {
            border-color: #4CAF50 !important;
        }

        button:disabled {
            background: linear-gradient(45deg, #808080, #666666);
            cursor: not-allowed;
            transform: none;
        }

        @media (max-width: 768px) {
            .login-box {
                width: 90%;
                padding: 30px;
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
        <img src="./pictures/signin.png" alt="signin" class="signin">
        <p class="welcome-text">Set New Password</p>
    </div>

    <div class="login-container">
        <form class="login-box" action="set_newpass.php" method="POST" id="passwordForm" onsubmit="return validateForm()">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
            
            <label for="new_password">New Password</label>
            <input type="password" id="new_password" name="new_password" required onkeyup="validatePassword()">
            <div class="password-requirements">
                Password must contain:
                <ul>
                    <li id="length">At least 8 characters</li>
                    <li id="uppercase">One uppercase letter</li>
                    <li id="lowercase">One lowercase letter</li>
                    <li id="number">One number</li>
                    <li id="special">One special character</li>
                </ul>
            </div>
            <div class="error-text" id="password-error"></div>
            
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required onkeyup="validatePassword()">
            <div class="error-text" id="confirm-error"></div>
            
            <button type="submit" id="submitBtn" disabled>Update Password</button>
        </form>
    </div>

    <script>
        function validatePassword() {
            const password = document.getElementById('new_password').value;
            const confirm = document.getElementById('confirm_password').value;
            const submitBtn = document.getElementById('submitBtn');
            let isValid = true;

            // Password requirements
            const requirements = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /[0-9]/.test(password),
                special: /[!@#$%^&*(),.?":{}|<>]/.test(password)
            };

            // Update requirement indicators
            for (const [req, met] of Object.entries(requirements)) {
                const element = document.getElementById(req);
                element.style.color = met ? '#4CAF50' : '#ff3333';
                isValid = isValid && met;
            }

            // Check password match
            if (password && confirm) {
                if (password !== confirm) {
                    document.getElementById('confirm-error').style.display = 'block';
                    document.getElementById('confirm-error').textContent = 'Passwords do not match';
                    isValid = false;
                } else {
                    document.getElementById('confirm-error').style.display = 'none';
                }
            }

            // Enable/disable submit button
            submitBtn.disabled = !isValid || !password || !confirm;
            
            return isValid;
        }

        function validateForm() {
            if (!validatePassword()) {
                return false;
            }
            
            // Clear form data after submission
            setTimeout(() => {
                document.getElementById('passwordForm').reset();
            }, 100);
            
            return true;
        }

        // Clear form on page load
        document.getElementById('passwordForm').reset();
    </script>
</body>
</html>
<?php
    } else {
        echo "Invalid or expired token.";
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST['new_password']) || empty($_POST['confirm_password'])) {
        echo "<script>alert('Both password fields are required.'); history.back();</script>";
        exit();
    }

    if ($_POST['new_password'] !== $_POST['confirm_password']) {
        echo "<script>alert('Passwords do not match.'); history.back();</script>";
        exit();
    }

    $password = $_POST['new_password'];
    
    // Server-side password validation
    if (strlen($password) < 8 ||
        !preg_match('/[A-Z]/', $password) ||
        !preg_match('/[a-z]/', $password) ||
        !preg_match('/[0-9]/', $password) ||
        !preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
        echo "<script>alert('Password does not meet requirements.'); history.back();</script>";
        exit();
    }

    $token = $_POST['token'];
    $newPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

    try {
        $sql = "UPDATE users SET password = ?, reset_token = NULL, reset_expires = NULL WHERE reset_token = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $newPassword, $token);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Password Updated - COMPASS</title>
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
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                    }

                    .logo { height: 80px; }
                    .logo2 { height: 40px; }
                    .COMPASS { height: 40px; }
                    .signin { height: 40px; }

                    .tagline {
                        font-size: 16px;
                        color: #ccc;
                        margin-left: 10px;
                        font-style: italic;
                    }

                    .welcome-text {
                        font-size: 18px;
                        font-weight: bold;
                        color: black;
                    }

                    .login-container {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: calc(100vh - 180px);
                    }

                    .login-box {
                        background-color: rgba(0, 0, 0, 0.7);
                        padding: 50px;
                        border-radius: 10px;
                        width: 500px;
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
                        width: 100%;
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

                    button {
                        width: 100%;
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

                    .success-message {
                        text-align: center;
                        background-color: rgba(0, 0, 0, 0.7);
                        padding: 30px;
                        border-radius: 10px;
                        margin: 20px auto;
                        max-width: 500px;
                    }

                    .success-message h2 {
                        color: #f0a500;
                        margin-bottom: 20px;
                    }

                    .success-message p {
                        color: white;
                        margin-bottom: 20px;
                    }

                    .login-link {
                        display: inline-block;
                        padding: 12px 30px;
                        background: linear-gradient(45deg, #f0a500, #d18b00);
                        color: white;
                        text-decoration: none;
                        border-radius: 6px;
                        font-weight: bold;
                        transition: all 0.3s ease-in-out;
                    }

                    .login-link:hover {
                        background: linear-gradient(45deg, #d18b00, #b37400);
                        transform: scale(1.05);
                    }

                    @media (max-width: 768px) {
                        .login-box {
                            width: 90%;
                            padding: 30px;
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
                    <img src="./pictures/signin.png" alt="signin" class="signin">
                    <p class="welcome-text">Password Updated</p>
                </div>

                <div class="login-container">
                    <div class="success-message">
                        <h2>Password Changed Successfully!</h2>
                        <p>Your password has been updated. You can now login with your new password.</p>
                        <a href="login.php" class="login-link">Back to Login</a>
                    </div>
                </div>
                <script>
                    // Redirect to login page after 3 seconds
                    setTimeout(function() {
                        window.location.href = 'login.php';
                    }, 3000);
                </script>
            </body>
            </html>
            <?php
        } else {
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Password Reset Failed - COMPASS</title>
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
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                    }

                    .logo { height: 80px; }
                    .logo2 { height: 40px; }
                    .COMPASS { height: 40px; }
                    .signin { height: 40px; }

                    .tagline {
                        font-size: 16px;
                        color: #ccc;
                        margin-left: 10px;
                        font-style: italic;
                    }

                    .welcome-text {
                        font-size: 18px;
                        font-weight: bold;
                        color: black;
                    }

                    .login-container {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: calc(100vh - 180px);
                    }

                    .login-box {
                        background-color: rgba(0, 0, 0, 0.7);
                        padding: 50px;
                        border-radius: 10px;
                        width: 500px;
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
                        width: 100%;
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

                    button {
                        width: 100%;
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

                    .error-message {
                        text-align: center;
                        background-color: rgba(0, 0, 0, 0.7);
                        padding: 30px;
                        border-radius: 10px;
                        margin: 20px auto;
                        max-width: 500px;
                        border: 2px solid #ff3333;
                    }

                    .error-message h2 {
                        color: #ff3333;
                        margin-bottom: 20px;
                    }

                    .error-message p {
                        color: white;
                        margin-bottom: 20px;
                    }

                    .try-again-link {
                        display: inline-block;
                        padding: 12px 30px;
                        background: linear-gradient(45deg, #ff3333, #cc0000);
                        color: white;
                        text-decoration: none;
                        border-radius: 6px;
                        font-weight: bold;
                        transition: all 0.3s ease-in-out;
                    }

                    .try-again-link:hover {
                        background: linear-gradient(45deg, #cc0000, #990000);
                        transform: scale(1.05);
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
                    <img src="./pictures/signin.png" alt="signin" class="signin">
                    <p class="welcome-text">Password Reset Failed</p>
                </div>

                <div class="login-container">
                    <div class="error-message">
                        <h2>Failed to Reset Password</h2>
                        <p>Sorry, we couldn't reset your password. The reset link may have expired or already been used.</p>
                        <a href="forget.php" class="try-again-link">Try Again</a>
                    </div>
                </div>
                <script>
                    // Redirect to forget password page after 3 seconds
                    setTimeout(function() {
                        window.location.href = 'forget.php';
                    }, 3000);
                </script>
            </body>
            </html>
            <?php
        }
    } catch (Exception $e) {
        echo "<script>alert('An error occurred: " . htmlspecialchars($e->getMessage()) . "'); history.back();</script>";
        exit();
    }
}
?>

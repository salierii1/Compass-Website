<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fName = mysqli_real_escape_string($conn, $_POST['fName']);
    $mName = mysqli_real_escape_string($conn, $_POST['mName']);
    $sName = $_POST['sName'] ?? '';
    $stdID = mysqli_real_escape_string($conn, $_POST['stdID']);
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Password complexity validation
    $uppercase = preg_match('/[A-Z]/', $password);
    $lowercase = preg_match('/[a-z]/', $password);
    $number    = preg_match('/[0-9]/', $password);
    $special   = preg_match('/[!@#$%^&*()_+\-=\[\]{};:"\\|,.<>\/?~`]/', $password);
    
    if (!$uppercase || !$lowercase || !$number || !$special || strlen($password) < 8) {
        $error_message = "Password must be at least 8 characters long and contain uppercase, lowercase, number, and special character.";
        echo "<script>window.location.href='register.php?error=" . urlencode($error_message) . "'</script>";
        exit();
    }

    $checkUsername = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($checkUsername);

    if ($result->num_rows > 0) {
        $error_message = "Username already taken. Please choose a different username.";
        echo "<script>window.location.href='register.php?error=" . urlencode($error_message) . "'</script>";
        exit();
    } 
    
    $checkStdID = "SELECT * FROM users WHERE stdID='$stdID'";
    $result2 = $conn->query($checkStdID);

    if ($result2->num_rows > 0) {
        $error_message = "Student ID already has an account";
        echo "<script>window.location.href='register.php?error=" . urlencode($error_message) . "'</script>";
        exit();
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
        $sql = "INSERT INTO users (fName, mName, sName, stdID, mail, username, password) 
                VALUES ('$fName', '$mName', '$sName', '$stdID', '$mail', '$username', '$hashed_password')";
    
        if ($conn->query($sql) === TRUE) {
            // Show terms and conditions popup instead of direct redirect
            echo "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Terms and Conditions</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                        background: rgba(0, 0, 0, 0.5);
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        min-height: 100vh;
                    }
                    .terms-popup {
                        background: white;
                        border-radius: 10px;
                        padding: 30px;
                        max-width: 600px;
                        max-height: 80vh;
                        overflow-y: auto;
                        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
                        position: relative;
                    }
                    .terms-header {
                        text-align: center;
                        margin-bottom: 20px;
                        color: #123499;
                    }
                    .terms-content {
                        line-height: 1.6;
                        color: #333;
                        max-height: 400px;
                        overflow-y: auto;
                        border: 1px solid #ddd;
                        padding: 20px;
                        margin-bottom: 20px;
                    }
                    .terms-content h3 {
                        color: #123499;
                        margin-top: 20px;
                        margin-bottom: 10px;
                    }
                    .terms-footer {
                        text-align: center;
                        border-top: 1px solid #ddd;
                        padding-top: 20px;
                    }
                    .agree-btn {
                        background: #123499;
                        color: white;
                        padding: 12px 30px;
                        border: none;
                        border-radius: 5px;
                        font-size: 16px;
                        font-weight: bold;
                        cursor: pointer;
                        transition: background 0.3s;
                    }
                    .agree-btn:hover {
                        background: #0f2a7a;
                    }
                    .success-message {
                        background: #4CAF50;
                        color: white;
                        padding: 15px;
                        border-radius: 5px;
                        margin-bottom: 20px;
                        text-align: center;
                        font-weight: bold;
                    }
                </style>
            </head>
            <body>
                <div class='terms-popup'>
                    <div class='success-message'>
                        ✓ Account Created Successfully!
                    </div>
                    
                    <div class='terms-header'>
                        <h2>Terms and Conditions</h2>
                        <p>Please read and accept our terms and conditions to continue</p>
                    </div>
                    
                    <div class='terms-content'>
                        <h3>1. Acceptance of Terms</h3>
                        <p>By accessing and using Compass Travel Website, you accept and agree to be bound by the terms and provision of this agreement.</p>
                        
                        <h3>2. Use License</h3>
                        <p>Permission is granted to temporarily download one copy of the materials on Compass Travel Website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>
                        <ul>
                            <li>modify or copy the materials</li>
                            <li>use the materials for any commercial purpose or for any public display</li>
                            <li>attempt to reverse engineer any software contained on the website</li>
                            <li>remove any copyright or other proprietary notations from the materials</li>
                        </ul>
                        
                        <h3>3. Privacy Policy</h3>
                        <p>Your privacy is important to us. We collect and use your personal information solely for the purpose of providing travel planning services. We do not share your personal information with third parties without your consent.</p>
                        
                        <h3>4. User Account</h3>
                        <p>When you create an account with us, you must provide information that is accurate, complete, and current at all times. You are responsible for safeguarding the password and for all activities that occur under your account.</p>
                        
                        <h3>5. Travel Planning Services</h3>
                        <p>Compass provides travel planning tools and information. While we strive to provide accurate and up-to-date information, we cannot guarantee the accuracy of all travel-related information and recommendations.</p>
                        
                        <h3>6. Limitation of Liability</h3>
                        <p>In no event shall Compass Travel Website or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on the website.</p>
                        
                        <h3>7. Modifications</h3>
                        <p>Compass may revise these terms of service at any time without notice. By using this website, you are agreeing to be bound by the then current version of these terms of service.</p>
                        
                        <h3>8. Contact Information</h3>
                        <p>If you have any questions about these Terms and Conditions, please contact us at compasswebsite@gmail.com or call 09777699066.</p>
                    </div>
                    
                    <div class='terms-footer'>
                        <button class='agree-btn' onclick='agreeAndContinue()'>I Agree to Terms and Conditions</button>
                    </div>
                </div>
                
                <script>
                    function agreeAndContinue() {
                        alert('Thank you for accepting our terms and conditions!');
                        window.location.href = 'login.php?success=registered';
                    }
                </script>
            </body>
            </html>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

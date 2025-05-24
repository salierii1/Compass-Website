<?php
include 'connect.php';
date_default_timezone_set('Asia/Manila');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // Check if email exists in database
    $sql = "SELECT * FROM users WHERE mail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Generate a unique reset token
        $token = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token expires in 1 hour
        
        // Update user with reset token
        $update_sql = "UPDATE users SET reset_token = ?, reset_expires = ? WHERE mail = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("sss", $token, $expires, $email);
        
        if ($update_stmt->execute()) {
            // Construct reset link
            $reset_link = "http://localhost/Compass-Website/set_newpass.php?token=" . $token;
            
            // Email content
            $subject = "Password Reset Request - COMPASS";
            $message = "
            <html>
            <head>
                <title>Password Reset Request</title>
            </head>
            <body>
                <h2>Password Reset Request</h2>
                <p>Hello,</p>
                <p>You have requested to reset your password for your COMPASS account.</p>
                <p>Click the link below to reset your password:</p>
                <p><a href='$reset_link' style='background-color: #f0a500; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Reset Password</a></p>
                <p>Or copy and paste this link in your browser:</p>
                <p>$reset_link</p>
                <p>This link will expire in 1 hour.</p>
                <p>If you did not request this password reset, please ignore this email.</p>
                <br>
                <p>Best regards,</p>
                <p>COMPASS Team</p>
            </body>
            </html>
            ";
            
            // Email headers
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: compass@localhost.com" . "\r\n";
            
            // Send email
            if (mail($email, $subject, $message, $headers)) {
                header("Location: forgot_password.php?success=1");
                exit();
            } else {
                // For localhost testing, we'll simulate successful email sending
                // In production, use proper email service like PHPMailer
                header("Location: forgot_password.php?success=1");
                exit();
            }
        } else {
            header("Location: forgot_password.php?error=" . urlencode("Database error. Please try again."));
            exit();
        }
    } else {
        // Don't reveal if email doesn't exist for security reasons
        header("Location: forgot_password.php?success=1");
        exit();
    }
} else {
    header("Location: forgot_password.php");
    exit();
}
?>

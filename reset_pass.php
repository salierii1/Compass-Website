<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    date_default_timezone_set('Asia/Manila');

    //Check if email exists
    $sql = "SELECT * FROM users WHERE mail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        //Generate token and expiry
        $token = bin2hex(random_bytes(32));
        $expires = date("Y-m-d H:i:s", strtotime("+30 minutes"));

        //Save token and expiry in the database
        $update = "UPDATE users SET reset_token = ?, reset_expires = ? WHERE mail = ?";
        $stmt = $conn->prepare($update);
        $stmt->bind_param("sss", $token, $expires, $email);
        $stmt->execute();

        // Update this line to match your project's URL path
        $resetLink = "http://localhost/Compass%20Website/set_newpass.php?token=$token";

        //Send reset email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'verify.processpw@gmail.com'; //Your Gmail
            $mail->Password   = 'kmld vqmw tinc fzpd'; //App password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('verify.processpw@gmail.com', 'Password Reset');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = "Hi, <br><br>Click the link below to reset your password:<br><a href='$resetLink'>$resetLink</a><br><br>This link expires in 30 minutes.";

            $mail->send();
            echo "<script>alert('A password reset link has been sent to your email.'); window.location.href='login.php';</script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "<script>alert('Email not found.'); window.location.href='forget_password.php';</script>";
    }
}
?>

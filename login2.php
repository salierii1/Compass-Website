<?php
include "connect.php";
session_start();

// Initialize login attempts if not set
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
    $_SESSION['last_attempt_time'] = time();
}

// Check if account is locked
if ($_SESSION['login_attempts'] >= 3) {
    $lockout_time = 300; // 5 minutes lockout
    $time_passed = time() - $_SESSION['last_attempt_time'];
    
    if ($time_passed < $lockout_time) {
        $remaining_time = ceil(($lockout_time - $time_passed) / 60);
        die("Account is temporarily locked. Please try again in $remaining_time minutes.");
    } else {
        // Reset attempts after lockout period
        $_SESSION['login_attempts'] = 0;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // Reset login attempts on successful login
            $_SESSION['login_attempts'] = 0;
            $_SESSION['stdID'] = $user['stdID'];
            $_SESSION['username'] = $user['username'];

            header("Location: home.php");
            exit();
        } else {
            $_SESSION['login_attempts']++;
            $_SESSION['last_attempt_time'] = time();
            $remaining_attempts = 3 - $_SESSION['login_attempts'];
            die("Invalid password! You have $remaining_attempts attempts remaining.");
        }
    } else {
        $_SESSION['login_attempts']++;
        $_SESSION['last_attempt_time'] = time();
        $remaining_attempts = 3 - $_SESSION['login_attempts'];
        die("Username does not exist! You have $remaining_attempts attempts remaining.");
    }
}
?>
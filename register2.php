<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fName = mysqli_real_escape_string($conn, $_POST['fName']);
    $mName = mysqli_real_escape_string($conn, $_POST['mName']);
    $sName = $_POST['sName'] ?? '';
    $stdID = mysqli_real_escape_string($conn, $_POST['stdID']);
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Password complexity validation
    $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
    if (!preg_match($password_pattern, $password)) {
        die("Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.");
    }

    $checkUsername = "SELECT * FROM users WHERE stdID='$stdID'";
    $result = $conn->query($checkUsername);

    if ($result->num_rows > 0) {
        echo "Username already has an account";
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
        $sql = "INSERT INTO users (fName, mName, sName, stdID, mail, username, password) 
                VALUES ('$fName', '$mName', '$sName', '$stdID', '$mail', '$username', '$hashed_password')";
    
        if ($conn->query($sql) === TRUE) {
            echo "<script>(' Account Created!!! '); window.location.href = 'welcome.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

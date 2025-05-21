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
            echo "<script>alert('Account Created Successfully!'); window.location.href = 'login.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

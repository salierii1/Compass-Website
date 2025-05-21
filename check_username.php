<?php
include 'connect.php';

header('Content-Type: application/json');

if(isset($_GET['username'])) {
    $username = mysqli_real_escape_string($conn, $_GET['username']);
    
    $query = "SELECT username FROM users WHERE username = '$username'";
    $result = $conn->query($query);
    
    echo json_encode(['taken' => $result->num_rows > 0]);
}
?>

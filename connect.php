<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simple_page";

$conn = new mysqli("$servername", "$username", "$password" , "$dbname");

if ($conn->connect_error) {
    die ("Connect failed: " .$conn->connect_error);
}
    
?>

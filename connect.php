<?php

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "arcadiadb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) { 
    die("Connection failure: " 
        . $conn->connect_error); 
} 

?>
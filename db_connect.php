<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'final';

// Create connection
function getConnection() {
    global $host, $username, $password, $database;
    
    $conn = new mysqli($host, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

// Close connection
function closeConnection($conn) {
    if ($conn) {
        $conn->close();
    }
}
?> 
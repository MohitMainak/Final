<?php
// Database setup script
$host = 'localhost';
$username = 'root';
$password = '';

try {
    // Connect to MySQL without specifying a database
    $conn = new mysqli($host, $username, $password);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Create database if it doesn't exist
    $sql = "CREATE DATABASE IF NOT EXISTS final";
    if ($conn->query($sql) === TRUE) {
        echo "Database 'final' created successfully or already exists<br>";
    } else {
        echo "Error creating database: " . $conn->error . "<br>";
    }
    
    // Select the database
    $conn->select_db('final');
    
    // Create table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS string_info (
        string_id INT AUTO_INCREMENT PRIMARY KEY,
        message VARCHAR(50) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table 'string_info' created successfully or already exists<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
    
    // Check if table is empty and insert sample data
    $result = $conn->query("SELECT COUNT(*) as count FROM string_info");
    $row = $result->fetch_assoc();
    
    if ($row['count'] == 0) {
        $sql = "INSERT INTO string_info (message) VALUES 
                ('Hello World'),
                ('Test Message'),
                ('Sample Data')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Sample data inserted successfully<br>";
        } else {
            echo "Error inserting sample data: " . $conn->error . "<br>";
        }
    } else {
        echo "Table already contains data<br>";
    }
    
    echo "<br><strong>Database setup completed successfully!</strong><br>";
    echo "<a href='index.php'>Go to main page</a>";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    if (isset($conn)) {
        $conn->close();
    }
}
?> 
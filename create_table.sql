-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS final;

-- Use the final database
USE final;

-- Create the string_info table
CREATE TABLE IF NOT EXISTS string_info (
    string_id INT AUTO_INCREMENT PRIMARY KEY,
    message VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Optional: Insert some sample data
INSERT INTO string_info (message) VALUES 
('Hello World'),
('Test Message'),
('Sample Data'); 
<?php
// Database Connection Handler

require_once 'config.php';

class Database {
    private $connection;
    private $error;
    
    public function __construct() {
        $this->connect();
    }
    
    private function connect() {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        
        if ($this->connection->connect_error) {
            $this->error = "Connection failed: " . $this->connection->connect_error;
            if (SHOW_ERRORS) {
                die($this->error);
            }
            return false;
        }
        
        $this->connection->set_charset("utf8");
        return true;
    }
    
    public function getConnection() {
        return $this->connection;
    }
    
    public function getError() {
        return $this->error;
    }
    
    public function close() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}

// Create database and tables if they don't exist
function createDatabase() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD);
    
    if ($conn->connect_error) {
        return "Connection failed: " . $conn->connect_error;
    }
    
    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
    if (!$conn->query($sql)) {
        return "Error creating database: " . $conn->error;
    }
    
    // Select database
    $conn->select_db(DB_NAME);
    
    // Create registrations table
    $sql = "CREATE TABLE IF NOT EXISTS registrations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        fullname VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(20) NOT NULL,
        password VARCHAR(255) NOT NULL,
        dob DATE NOT NULL,
        gender VARCHAR(20) NOT NULL,
        course VARCHAR(50) NOT NULL,
        address TEXT,
        profilepic VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if (!$conn->query($sql)) {
        return "Error creating table: " . $conn->error;
    }
    
    $conn->close();
    return "success";
}
?>

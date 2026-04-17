-- Web Technology Project Database
-- Import this SQL file manually via phpMyAdmin

-- Create Database
CREATE DATABASE IF NOT EXISTS webtechnology;

-- Use the database
USE webtechnology;

-- Create registrations table
CREATE TABLE IF NOT EXISTS registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    dob DATE NOT NULL,
    gender VARCHAR(20) NOT NULL,
    course VARCHAR(50) NOT NULL,
    address TEXT,
    profilepic VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create index on email for faster queries
CREATE INDEX idx_email ON registrations(email);

-- Insert sample data (optional)
-- INSERT INTO registrations (fullname, email, phone, password, dob, gender, course, address) 
-- VALUES ('John Doe', 'john@example.com', '1234567890', 'password123', '1995-05-15', 'male', 'Web Development', '123 Main St');

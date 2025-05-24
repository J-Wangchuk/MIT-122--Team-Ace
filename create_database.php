<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "elms_dev";

// Create connection
$conn = new mysqli($host, $user, $pass);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

// Create users table
$conn->query("
    CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        role ENUM('admin', 'employee') DEFAULT 'employee'
    )
");

// Create leaves table
$conn->query("
    CREATE TABLE leave_requests (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        leave_type VARCHAR(50),
        start_date DATE,
        end_date DATE,
        reason TEXT,
        status ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    )
");

// Create employees table
$conn->query("
    CREATE TABLE employees (
        user_id INT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        department VARCHAR(100) NOT NULL,
        phone_no VARCHAR(20) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        dob DATE NOT NULL,
        blood_group VARCHAR(10) NOT NULL,
        nationality VARCHAR(50) NOT NULL,
        join_date DATE NOT NULL,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    )
");

echo "Database and tables created successfully.";

// Insert an admin user
$conn->query("
    INSERT INTO users (email, password, role) VALUES 
    ('admin@example.com', 'abc123', 'admin')
");
// Fetch the user IDs of the inserted admin and employee
$admin_id = $conn->insert_id;

// Insert an admin employee
$conn->query("
    INSERT INTO employees (user_id, name, department, phone_no, email, dob, blood_group, nationality, join_date) VALUES 
    ($admin_id, 'Admin User', 'Administration', '1234567890', 'admin@example.com', '1980-01-01', 'O+', 'American', '2023-10-01')
");
// Insert an employee user
$conn->query("
    INSERT INTO users (email, password, role) VALUES 
    ('employee@example.com', 'abc123', 'employee')
");
// Fetch the user IDs of the inserted admin and employee
$employee_id = $conn->insert_id;

// Insert an employee
$conn->query("
    INSERT INTO employees (user_id, name, department, phone_no, email, dob, blood_group, nationality, join_date) VALUES 
    ($employee_id, 'Employee User', 'Engineering', '0987654321', 'employee@example.com', '1990-01-01', 'A+', 'American', '2023-10-01')
");

echo " and users created successfully.";
$conn->close();
?>

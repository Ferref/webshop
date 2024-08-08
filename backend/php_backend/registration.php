<?php
// Enable error reporting for debugging purposes (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Report all MySQL errors
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Start session to store form data
session_start();

// Database connection settings
$db_name = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'db_name';

// Create connection
$conn = new mysqli($dbname, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die(json_encode([
        'status' => 'error',
        'message' => 'connection failed' . $conn->connect_error
    ]));
}

// Create database if it does not exist
$sql = 'CREATE DATABASE $dbname IF NOT EXISTS';

if(!$conn($sql)){
    die('')
}

// Select the database

// SQL to create table if it doesn't exist

// Check if data is submitted

// Get form data

// Validate input

// Check if passwords match

// Check if email or username already exists

// Hash the password

// Prepare SQL statement

// Execute the statement

// Close the statement

// Close the connection
?>

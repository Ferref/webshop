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
    die(json_encode([
        'status' => 'error',
        'message' => 'connection failed'
    ]));
}

// Select the database
$conn->select_db($db_name);

// SQL to create table if it doesn't exist
$table_sql = 
"
    CREATE TABLE IF NOT EXISTS users(
        email VARCHAR(50) PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(50) NOT NULL UNIQUE,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )
";

// Check if connection to the dataabse table was succesfull
if($conn -> query($table_sql)){
    die(json_encode([
        'status' => 'error',
        'message' => 'connection failed'
    ]));
}

// Check if data is submitted, get form data
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if(!empty($email) && !empty($username) && !empty($password1) && !empty($password2)){
        if($password1 === $password2){
            // Check if email or username already exists!
            $stmt = $conn->prepare("SELECT id FROM WHERE email = ? OR username = ?");
            $stmt->bind_param('ss', $email, $username);
            $stmt->execute();
            $stmt->store_result();

            // If a matching record is forund return an error
            if($stmt->num_rows > 0){
                echo json_encode([
                    'status' => 'error',
                    'message' => 'connection failed'
                ]);
            }
            else
            {
                $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
                $stmt->$conn->prepare('sss', "INSERT INTO users VALUES(?, ?, ?)");
                $stmt->bind_param('sss', $email, $username, $hashed_password);

                // Execute the sql statement
                

            }

        }
        else{
            echo json_encode([
                'status' => 'error',
                'message' => 'Passwords do not match!'
            ]); 
        }
    }
    else
    {
        echo json_encode([
            'status' => 'error',
            'message' => 'Please fill in all the fields!'
        ]);
    }
}
else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method!'
    ]);
}



// Execute the statement

// Close the statement

// Close the connection
?>

// picinyuszi ♥♥♥
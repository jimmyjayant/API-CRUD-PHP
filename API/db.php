<?php
// Connect to the server 
$conn = new mysqli("localhost", "root", "");
if($conn->connect_error)
{
    die("MySQL database connection failed!");
}

// Create database myapidb
$sql = "CREATE DATABASE IF NOT EXISTS myapidb";

if(!$conn->query($sql))
{
    die("MySQL Database Creation Failed!");
}

// Connect to the myapidb database 
$conn = new mysqli("localhost", "root", "", "myapidb");

if($conn->connect_error)
{
    die("Database connection failed!");
}

// Create table in myapidb 'apidatatable'
$sql = "CREATE TABLE IF NOT EXISTS apidatatable (
id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname varchar(100) UNIQUE NOT NULL,
email varchar(100) UNIQUE NOT NULL
)";

if(!$conn->query($sql))
{
    die("Error Creating Table!");
}


// SQL Query Template
$sql = "INSERT IGNORE INTO apidatatable(fullname, email) VALUES(?,?)";

// Prepare the sql query template
$stmt = $conn->prepare($sql);

// Check if prepared statement exists
if($stmt)
{
    // Bind parameters
    $stmt->bind_param("ss", $fullname, $email);

    // Provide values to variables
    $fullname = "Vishal Kumar";
    $email = "vishalkumar@gmail.com";

    // Execute the prepared statement
    $stmt->execute();

    $fullname = "Krishan Kumar";
    $email = "krishan01@gmail.com";

    // Execute the prepared statement
    $stmt->execute();

    $fullname = "Manoj Kumar";
    $email = "manoj34@gmail.com";

    // Execute the prepared statement
    $stmt->execute();

    $fullname = "Hansraj";
    $email = "hans@gmail.com";

    // Execute the prepared statement
    $stmt->execute();

    $fullname = "Vishnu Kumar";
    $email = "vishnu@outlook.com";

    // Execute the prepared statement
    $stmt->execute();

    // Close the prepared statement
    $stmt->close();
}

// Create table token in myapidb database
$sql = "CREATE TABLE IF NOT EXISTS token(
id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
token_key varchar(100) NOT NULL UNIQUE,
token_counter int(6) UNSIGNED NOT NULL
)";

if(!$conn->query($sql))
{
    die("Error Creating Table!");
}

// SQL Query template
$sql = "INSERT IGNORE INTO token(token_key, token_counter) VALUES(?,?)";

// Prepare the sql query template
$stmt = $conn->prepare($sql);

if($stmt)
{
    // Bind parameters
    $stmt->bind_param("si", $key, $counter);

    // Provide values to variables
    $key = "asdfghjklzxcvbnm";
    $counter = "0";

    // Execute the prepared statement
    $result = $stmt->execute();

    // Show result
    if($result)
    {
        // echo "Data Inserted Successfully!";
    }
    else
    {
        echo "Data Insertion Failed!";
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the connection 
//$conn->close();
?>

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

// Insert data into the table 'apidatatable'
/*
$sql = "INSERT IGNORE INTO apidatatable (fullname, email) VALUES ('Vishal Kumar', 'vishalkumar@gmail.com'),
                                                          ('Krishan Kumar', 'krishan01@gmail.com'),
                                                          ('Manoj Kumar', 'manoj34@gmail.com'),
                                                          ('Hansraj', 'hans@gmail.com'),
                                                          ('Vishnu Kumar', 'vishnu@outlook.com')";
*/

// Insert data into the table 'apidatatable' using multi_query() function
$sql = "INSERT IGNORE INTO apidatatable (fullname, email) VALUES ('Vishal Kumar', 'vishalkumar@gmail.com');";
$sql .= "INSERT IGNORE INTO apidatatable (fullname, email) VALUES ('Krishan Kumar', 'krishan01@gmail.com');";
$sql .= "INSERT IGNORE INTO apidatatable (fullname, email) VALUES ('Manoj Kumar', 'manoj34@gmail.com');";
$sql .= "INSERT IGNORE INTO apidatatable (fullname, email) VALUES ('Hansraj', 'hans@gmail.com');";
$sql .= "INSERT IGNORE INTO apidatatable (fullname, email) VALUES ('Vishnu Kumar', 'vishnu@outlook.com');";

// Perform sql query
/*
$result = $conn->query($sql);

if($result !== TRUE)
{
    die("Error Inserting Data!");
}
*/

if($conn->multi_query($sql))
{
    do{
        if($result = $conn->store_result())
        {
            $result->free();
        }
    }while($conn->next_result());
}
else
{
    die("Error Inserting Data!");
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


$sql = "INSERT IGNORE INTO token (token_key, token_counter) VALUES ('asdfghjklzxcvbnm', 0)";

if(!$conn->query($sql))
{
    die("Error Inserting Data!");
}

// Close the connection 
//$conn->close();
?>

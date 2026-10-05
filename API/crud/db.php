<?php

// Database Credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myapidb";

// Connect to the myapidb database 
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error)
{
    die("Database connection failed!");
}
?>

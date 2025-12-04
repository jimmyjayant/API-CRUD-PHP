<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['insertsubmit']))
    {
        // Connect to the myapidb database 
        $conn = new mysqli("localhost", "root", "", "myapidb");

        if($conn->connect_error)
        {
            die("Database connection failed!");
        }

        function sanitize_input($input)
        {
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
        }

        $fullname = sanitize_input($_POST['fullname']);
        $email = sanitize_input($_POST['email']);

        // SQL Query
        $sql = "INSERT INTO apidatatable (fullname, email) VALUES ('$fullname', '$email')";

        // Perform sql query
        if($conn->query($sql))
        {
            echo "Data Inserted Successfully.";
        }
        else
        {
            echo "Error Inserting Data!";
        }
    }
}
else
{
    echo "Error getting Data!";
}
?>

<?php
if($_SERVER['REQUEST_METHOD'] !== 'POST')
{
    echo "Request method is not POST!";
}
else
{
    if(!isset($_POST['insertsubmit']))
    {
        echo "Error getting data!";
    }
    else
    {
        // Connect to the myapidb database 
        require_once("db.php");

        // function sanitize_input()
        require_once("filter.php");

        // Sanitize the user input
        $fullname = sanitize_input($_POST['fullname']);
        $email = sanitize_input($_POST['email']);

        // SQL Query Template
        $sql = "INSERT IGNORE INTO apidatatable (fullname, email) VALUES (?,?)";

        // Prepare the sql query template
        $stmt = $conn->prepare($sql);

        // Check if prepared statement exists
        if($stmt)
        {
            // Bind parameters
            $stmt->bind_param("ss", $fullname, $email);

            // Execute the prepared statement
            $result = $stmt->execute();

            if($result)
            {
                echo "Data Inserted Successfully!";
            }
            else
            {
                echo "Data Insertion Failed!";
            }

            // Close the prepared statement
            $stmt->close();
        }
    }
}
?>

<?php
if($_SERVER['REQUEST_METHOD'] !== "POST")
{
    echo "Request method is not POST!";
}
else
{
    if(!isset($_POST['removesubmit']))
    {
        echo "Error submitting form!";
    }
    else
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

        $deleteid = sanitize_input($_POST['deleteid']);

        // SQL Query Template
        $sql = "DELETE FROM apidatatable WHERE id=?";

        // Prepare the SQL query template
        $stmt = $conn->prepare($sql);

        // Check if prepared statement exists
        if($stmt)
        {
            // Bind parameters
            $stmt->bind_param("i", $deleteid);

            // Execute the prepared statement
            $result = $stmt->execute();

            if($result)
            {
                echo "Data Deleted Successfully. Please go back and Refresh the webpage to see the updated results.";
            }
            else
            {
                echo "Error Deleting Data!";
            }

            // Close the prepared statement
            $stmt->close();
        }
    }
}
?>

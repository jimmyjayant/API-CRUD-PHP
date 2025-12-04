<?php
if($_SERVER['REQUEST_METHOD'] === "POST")
{ 
    if(isset($_POST['removesubmit']))
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

        // SQL Query
        $sql = "DELETE FROM apidatatable WHERE id = $deleteid";

        // Perform sql query
        if($conn->query($sql))
        {
            echo "Data Deleted Successfully. Please go back and Refresh the webpage to see the updated results.";
        }
        else
        {
            echo "Error Deleting Data!";
        }
    }
}
else
{
    echo "Error Submitting Form!";
}
?>

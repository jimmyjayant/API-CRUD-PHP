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
        require_once("db.php");

        require_once("filter.php");

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

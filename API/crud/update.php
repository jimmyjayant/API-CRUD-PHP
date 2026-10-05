<?php
if($_SERVER['REQUEST_METHOD'] !== 'POST')
{
    echo "Request method is not POST!";
}
else
{
    if(!isset($_POST['updatesubmit']))
    {
        echo "Error getting Data!";
    }
    else
    {
        // Connect to the myapidb database 
        require_once("db.php");

        require_once("filter.php");

        $idvalue = sanitize_input($_POST['idvalue']);
        $fullname = sanitize_input($_POST['newfullname']);
        $email = sanitize_input($_POST['newemail']);

        // SQL Query Template
        $sql = "UPDATE apidatatable SET fullname = ?, email = ? WHERE id = ?";

        // Prepare the sql query template
        $stmt = $conn->prepare($sql);

        // Check if prepared statement exists
        if($stmt)
        {
            // Bind parameters
            $stmt->bind_param("ssi", $fullname, $email, $idvalue);

            // Execute the prepared statement
            $result = $stmt->execute();

            if($result)
            {
                echo "Data Updated Successfully. Please go back and Refresh the webpage to see the updated results.";
            }
            else
            {
                echo "Error updating data!";
            }
        }
    }
}
?>

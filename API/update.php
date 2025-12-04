<?php
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['updatesubmit']))
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

        $idvalue = sanitize_input($_POST['idvalue']);
        $fullname = sanitize_input($_POST['newfullname']);
        $email = sanitize_input($_POST['newemail']);

        // SQL Query
        $sql = "UPDATE apidatatable SET fullname = '$fullname', email = '$email' WHERE id = $idvalue";

        // Perform sql query
        if($conn->query($sql))
        {
            echo "Data Updated Successfully. Please go back and Refresh the webpage to see the updated results.";
        }
        else
        {
            echo "Error Updating Data!";
        }
    }
}
else
{
    echo "Error getting Data!";
}
?>

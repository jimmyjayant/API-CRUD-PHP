<?php
if($_SERVER['REQUEST_METHOD'] !== "POST")
{
    $data['status'] = 'error';
    $data['data'] = 'Request method is not POST!';
    $data = json_encode($data);
    header("Content-Type: application/json");
    echo $data;
    exit();
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
            $data['status'] = 'success';
            $data['data'] = 'Data Deleted Successfully.';
            $data = json_encode($data);
            header("Content-Type: application/json");
            echo $data;
        }
        else
        {
            $data['status'] = 'error';
            $data['data'] = 'Error Deleting Data!';
            $data = json_encode($data);
            header("Content-Type: application/json");
            echo $data;
        }

        // Close the prepared statement
        $stmt->close();
    }
}
?>

<?php
if($_SERVER['REQUEST_METHOD'] !== "DELETE")
{
    $data['status'] = 'error';
    $data['data'] = 'Request method is not DELETE!';
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

    // $deleteid = sanitize_input($_DELETE['deleteid']);
    $deleteid = file_get_contents('php://input');
    $deleteid = json_decode($deleteid, true);
    $id = $deleteid['deleteid'];
    
    // SQL Query Template
    $sql = "DELETE FROM apidatatable WHERE id=?";

    // Prepare the SQL query template
    $stmt = $conn->prepare($sql);

    // Check if prepared statement exists
    if($stmt)
    {
        // Bind parameters
        $stmt->bind_param("i", $id);

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

<?php
if($_SERVER['REQUEST_METHOD'] !== 'PUT')
{
    $data['status'] = 'error';
    $data['data'] = 'Request method is not PUT!';
    $data = json_encode($data);
    header("Content-Type: application/json");
    echo $data;
    exit();
}
else
{
    // Connect to the myapidb database 
    require_once("../app/Database/db.php");

    require_once("../app/Helpers/sanitize.php");

    // Decode the json data
    $data = file_get_contents('php://input');

    $data = json_decode($data, true);

    $idvalue = sanitize_input($userID);

    $fullname = sanitize_input($data['newfullname']);
    $email = sanitize_input($data['newemail']);

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
            $data['status'] = 'success';
            $data['data'] = 'Data Updated Successfully. Please refresh the webpage.';
            $data = json_encode($data);
            header("Content-Type: application/json");
            echo $data;
            exit();
        }
        else
        {
            $data['status'] = 'error';
            $data['data'] = 'Error updating data!';
            $data = json_encode($data);
            header("Content-Type: application/json");
            echo $data;
            exit();
        }
    }
}
?>

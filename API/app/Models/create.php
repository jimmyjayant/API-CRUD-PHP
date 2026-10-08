<?php
if($_SERVER['REQUEST_METHOD'] !== 'POST')
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
    // Decode the json data
    $data = file_get_contents('php://input');

    $data = json_decode($data, true);

    // Connect to the myapidb database 
    require_once("../app/Database/DB.php");

    // function sanitize_input()
    require_once("../app/Helpers/Sanitize.php");

    // Sanitize the user input
    $fullname = sanitize_input($data['fullname']);
    $email = sanitize_input($data['email']);

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
            $data['status'] = "success";
            $data['data'] = "Data Inserted Successfully!";
            $data = json_encode($data);
            header("Content-Type: application/json");
            echo $data;
        }
        else
        {
            $data['status'] = "error";
            $data['data'] = "Data Insertion Failed!";
            $data = json_encode($data);
            header("Content-Type: application/json");
            echo $data;
        }

        // Close the prepared statement
        $stmt->close();
    }
}
?>

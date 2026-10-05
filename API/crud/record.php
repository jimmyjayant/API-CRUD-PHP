<?php
require_once("db.php");

// Read api data from table apidatatable

// SQL Query Template
$sql = "SELECT id, fullname, email FROM apidatatable WHERE id=?";

// Prepare the SQL query template
$stmt = $conn->prepare($sql);

// Check if prepared statement exists
if($stmt)
{
    // Bind Parameters
    $stmt->bind_param("i", $id);

    // Provide values to variables
    $id = $_GET['id'];

    // Execute the prepared statement
    $result = $stmt->execute();

    if($result)
    {
        $row = $stmt->get_result();

        if($row->num_rows == 0)
        {
            $data['data'] = "No record found!";
            $data['status'] = 'error';
            $data = json_encode($data);
            header("Content-Type:application/json");
            echo $data;
        }
        else
        {
            $record = $row->fetch_assoc();

            $data['newfullname'] = $record['fullname'];
            $data['newemail'] = $record['email'];

            $data['status'] = 'success';
            $data = json_encode($data);
            header("Content-Type: application/json");
            echo $data;
            exit();
        }
    }
}
?>

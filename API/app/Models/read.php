<?php
require_once("../app/Database/db.php");

// Read api data from table apidatatable

// SQL Query Template
$sql = "SELECT id, fullname, email FROM apidatatable";

// Prepare the SQL query template
$stmt = $conn->prepare($sql);

// Check if prepared statement exists
if($stmt)
{
    // Execute the prepared statement
    $result = $stmt->execute();

    if($result)
    {
        $row = $stmt->get_result();

        if($row->num_rows == 0)
        {
            $data['data'] = "No entry found. Please add new user! Click on Create New User button present at top right corner of webpage";
            $data['status'] = 'error';
            $data = json_encode($data);
            header("Content-Type:application/json");
            echo $data;
            exit();
        
        }
        else
        {
            ob_start();

            echo "<table>
            <tr>
            <th data-id='ID'>ID</th>
            <th data-id='Full Name'>Full Name</th>
            <th data-id='Email'>Email</th>
            <th data-id='Edit'>Edit</th>
            <th data-id='Delete'>Delete</th>
            </tr>";

            while($data = $row->fetch_assoc())
            {
                echo "<tr>
                <td data-id='ID'>{$data['id']}</td>
                <td data-id='Full Name'>{$data['fullname']}</td>
                <td data-id='Email'>{$data['email']}</td>
                <td data-id='Edit'><img src='images/edit.png' onclick='edit({$data['id']})' 
                title='Edit Entry No. {$data['id']}'></td>
                <td data-id='Delete'><img src='images/delete.png' onclick='del({$data['id']})' 
                title='Delete Entry No. {$data['id']}'></td>
                </tr>";
            }
            
            echo "</table>";

            $data['data'] = ob_get_clean();

            $data['status'] = 'success';

            $data = json_encode($data);
            header("Content-Type: application/json");
            echo $data;
        }
    }
}
?>

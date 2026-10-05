<?php
require_once("db.php");

// Read api data from table apidatatable

// SQL Query Template
$sql = "SELECT * FROM apidatatable";

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
            echo "No entry found. Please add new user! Click on Create New User button present at top right corner of webpage";
        }
        else
        {
            echo "<table>
            <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th></th>
            <th></th>
            </tr>";

            while($data = $row->fetch_assoc())
            {
                echo "<tr>
                <td>{$data['id']}</td>
                <td>{$data['fullname']}</td>
                <td>{$data['email']}</td>
                <td><img src='../API/images/edit.png' onclick='edit({$data['id']})' title='Edit Entry No. {$data['id']}'></td>
                <td><img src='../API/images/delete.png' onclick='del({$data['id']})' title='Delete Entry No. {$data['id']}'></td>
                </tr>";
            }
            
            echo "</table>";
        }
    }
}
?>

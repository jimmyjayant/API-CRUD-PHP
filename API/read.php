<?php
require("db.php");

// Read api data from table apidatatable
$sql = "SELECT * FROM apidatatable";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
    echo "<table><tr><th>ID</th><th>Full Name</th><th>Email</th><th></th><th></th></tr>";
    while($row = $result->fetch_assoc())
    {
        echo "<tr><td>{$row['id']}</td><td>{$row['fullname']}</td><td>{$row['email']}</td>
        <td><img src='edit icon.png' onclick='edit({$row['id']})' title='Edit Entry No. {$row['id']}'></td>
        <td><img src='delete icon.png' onclick='del({$row['id']})' title='Delete Entry No. {$row['id']}'></td>
        </tr>";
    }
    echo "</table>";
}
?>

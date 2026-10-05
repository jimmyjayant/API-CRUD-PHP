<?php
if($_SERVER['REQUEST_METHOD'] !== "POST")
{
    die("The request was not submitted.");
}
else
{
    if(!isset($_POST['key']))
    {
        die("Invalid API Key!");
    }
    else
    {      
        // Connect to the mysql database 'myapidb'
        require_once("db.php");

        // SQL Query Template
        $sql = "SELECT * FROM token WHERE token_key=?";

        // Prepare the SQL Query Template
        $stmt = $conn->prepare($sql);

        // Check if prepared statement exists
        if($stmt)
        {
            // Bind parameters
            $stmt->bind_param("s", $key);

            // Provide values to variables
            $key = $_POST['key'];

            // Execute the prepared statement
            $result = $stmt->execute();

            if($result)
            {
                $row = $stmt->get_result();

                $data = $row->fetch_assoc();

                if($data['token_counter'] >= 5)
                {
                    die("API Limit Reached");
                }
                else
                {
                    $apicounter = $data['token_counter'] + 1;

                    // SQL Query Template
                    $sql = "UPDATE token SET token_counter=? WHERE token_key=?";

                    // Prepare the sql query template
                    $stmt = $conn->prepare($sql);

                    // Check if prepared statement exists
                    if($stmt)
                    {
                        // Bind parameters
                        $stmt->bind_param("is", $apicounter, $key);

                        // Provide values to variables
                        $key = $data['token_key'];

                        // Execute the prepared statement
                        $result = $stmt->execute();

                        if($result)
                        {
                            // SQL Query Template
                            $sql = "SELECT * FROM apidatatable";

                            // Prepare the sql query template
                            $stmt = $conn->prepare($sql);

                            // Check if prepared statement exists
                            if($stmt)
                            {
                                // Execute the prepared statement
                                $result = $stmt->execute();

                                if($result)
                                {
                                    $row = $stmt->get_result();

                                    echo "<table><tr><th>ID</th><th>Full Name</th><th>Email</th></tr>";

                                    while($data = $row->fetch_assoc())
                                    {
                                        echo "<tr>
                                        <td>{$data['id']}</td>
                                        <td>{$data['fullname']}</td>
                                        <td>{$data['email']}</td>
                                        </tr>";
                                    }

                                    echo "</table>";
                                }
                                else
                                {
                                    die("Error Retrieving Data");
                                }
                            }
                        }
                        else
                        {
                            die("Please Try Again Later!");
                        }
                    }
                }
            }
            else
            {
                die("Error Retrieving Data!");
            }
        }        
    }
}
?>

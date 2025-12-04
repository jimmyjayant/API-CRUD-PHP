<?php
if($_SERVER['REQUEST_METHOD'] === "POST")
{
    if(isset($_POST['key']))
    {            
        // Connect to the mysql database 'myapidb'
        $conn = new mysqli("localhost", "root", "", "myapidb");
        if($conn->connect_error)
        {
            die("Database Connection failed." . $conn->connect_error);
        }

        // SQL query
        $sql = "SELECT * FROM token WHERE token_key='{$_POST['key']}'";
        $result = $conn->query($sql);
        if($result->num_rows === 1)
        {
            $row = $result->fetch_assoc();
            if($row['token_counter'] >= 5)
            {
                die("API Limit Reached");
            }
            else
            {
                $apicounter = $row['token_counter'] + 1;
                $sql = "UPDATE token SET token_counter = $apicounter WHERE token_key = '{$row['token_key']}'";
                $result = $conn->query($sql);
                if(!$result)
                {
                    die("Please Try Again Later!");
                }
                else
                {
                    $sql = "SELECT * FROM apidatatable";
                    $result = $conn->query($sql);
                    if(!$result)
                    {
                        die("Error Retrieving Data");
                    }
                    else
                    {
                        if($result->num_rows > 0)
                        {
                            echo "<table><tr><th>ID</th><th>Full Name</th><th>Email</th></tr>";
                            while($row = $result->fetch_assoc())
                            {
                                echo "<tr><td>{$row['id']}</td><td>{$row['fullname']}</td><td>{$row['email']}</td></tr>";
                            }
                            echo "</table>";
                        }
                    }
                }
            }
        }
        else
        {
            die("Error Retrieving Data!");
        }
    }
    else
    {
        die("Invalid API Key!");
    }
}
else
{
    die("The request was not submitted.");
}
?>

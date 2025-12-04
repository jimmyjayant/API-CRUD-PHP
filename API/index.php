<!DOCTYPE html>
<html lang="en-IN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            API CRUD PHP
        </title>
        <style>
            * {
                box-sizing:border-box;
            }

            body {
                margin:0;
                padding:0;
            }

            .header {
                display:flex;
                flex-direction:row;
                flex-wrap:nowrap;
                justify-content:space-between;
                padding:1rem;
            }

            .heading {
                flex:1;
                text-align:center;
                font-size:clamp(1rem, 2vw + 1rem, 3rem);
                align-self:center;
            }

            .create {
                align-self:center;
            }

            .create img {
                vertical-align:middle;
                padding:0.3rem;
                margin-bottom:0.1rem;
            }

            .create button {
                font-size:1rem;
                padding:1rem;
                background-color:transparent;
                border:none;
                cursor:pointer;
            }

            .create button:hover {
                background-color:lightgreen;
            }

            #readapidata table {
                border:none;
                width:100%;
                border-collapse:collapse;
            }

            #readapidata table tr {
                font-size:1.5rem;
                padding:1rem;
                text-align:center;
            }

            #readapidata table th {
                padding:1rem;
            }

            #readapidata table td {
                padding:1rem;
                font-size:1.5rem;
            }

            #readapidata table tr:hover {
                background-color:lightgrey;
                cursor:pointer;
            }

            #insertapidata {
                display:none;
            }

            #insertapidata h2 {
                text-align:center;
            }

            #insertapidata form {
                text-align:center;
            }

            #editapidata {
                display:none;
                text-align:center;
            }

            #deleteapidata {
                display:none;
                text-align:center;
            }

            hr {
                display:none;
            }

            #readapidata, #insertapidata, #editapidata, #deleteapidata {
                padding:1rem;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <div class="heading">
                API CRUD PHP 
            </div>
            <div class="create">
                <button type="button" onclick="showinsertdiv()"><img src="add icon.png">Create New User</button>
            </div>
        </div>

        <div id="readapidata">

        </div>

        <hr>

        <div id="insertapidata">
            <h2>
                Insert API Data 
            </h2>
            
            <form action="create.php" method="post">
                <label for="fullname">Enter New Full Name:- </label>
                <input type="text" id="fullname" name="fullname" required>
                <br>
                <br>
                <label for="email">New Email:- </label>
                <input type="email" id="email" name="email" required>
                <br>
                <br>
                <input type="submit" name="insertsubmit" value="Submit">
                <input type="reset" value="Reset"> 
            </form>
        </div>

        <hr>

        <div id="editapidata">
            <h2>
                Edit API Data 
            </h2>

            <form action="update.php" method="post">
                <label for="newfullname">Enter Full Name:- </label>
                <input type="text" id="newfullname" name="newfullname" required>
                <br>
                <br>
                <label for="newemail">Email:- </label>
                <input type="email" id="newemail" name="newemail" required>
                <br>
                <br>
                <input type="hidden" name="idvalue" value="">
                <input type="submit" name="updatesubmit" value="Submit">
                <input type="reset" value="Reset">
            </form>
        </div>

        <hr>

        <div id="deleteapidata">
            <h2>
                Delete API Data 
            </h2>

            <form action="delete.php" method="post">
                <h3>
                    Are you sure you want to delete the specific record no . <span id="recordno"></span> from the database table? 
                </h3>
                <br>
                <input type="hidden" name="deleteid" value="">
                <input type="submit" name="removesubmit" value="Yes">
                <button type="button" onclick="hideagain()">No</button>
            </form>
        </div>
        <script>
            function getapidata()
            {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                    document.getElementById("readapidata").innerHTML = this.responseText;
                }

                xmlhttp.open("GET", "read.php");
                xmlhttp.send();

                document.querySelector("#readapidata + hr").style.display = "block";
            }

            document.addEventListener("DOMContentLoaded", getapidata);
            
            function showinsertdiv()
            {
                document.getElementById("insertapidata").style.display = "block";
                document.querySelector("#insertapidata + hr").style.display = "block";
            }

            function edit(id)
            {
                let id_of_row = id;
                console.log(id_of_row);
                document.getElementById("editapidata").style.display = "block";
                document.querySelector("#editapidata form input[type=hidden]").value = id_of_row;

                document.querySelector("#editapidata + hr").style.display = "block";
            }

            function del(id)
            {
                let id_of_row = id;
                console.log(id_of_row);
                document.getElementById("deleteapidata").style.display = "block";
                document.getElementById("recordno").innerHTML = id_of_row;
                document.querySelector("#deleteapidata form input[type=hidden]").value = id_of_row;
            }

            function hideagain()
            {
                document.getElementById("deleteapidata").style.display = "none";
                document.querySelector("#readapidata + hr").style.display = "none";
            }
        </script>
    </body>
</html>

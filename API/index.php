<!DOCTYPE html>
<html lang="en-IN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>API CRUD PHP</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <div class="heading">
                API CRUD PHP 
            </div>
            <div class="create">
                <button type="button" onclick="showinsertdiv()">
                    <img src="add icon.png">
                    Create New User
                </button>
            </div>
        </div>

        <div class="main">
            <div id="readapidata"></div>

            <hr>

            <div id="insertapidata">
                <h2>Insert API Data</h2>
                
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
                <h2>Edit API Data</h2>

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
                <h2>Delete API Data</h2>

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
            <script src="script.js"></script>
        </div>

        <footer>
            Copyright &copy; 2026 Jimmy Jayant
            <br>
            <img src="india_img.png">भारत में निर्मित
        </footer>
    </body>
</html>

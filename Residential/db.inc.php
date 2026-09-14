<!--
Creator: Joseph Lalor
Date: 05/02/2026
Student Number: c00312883
Title: db.inc.php
Purpose: Setup connection to database -->
<html>
<body>
<?php
$hostname = "localhost";
$username="bidmaster";
$password="Auct10nRul3$";
$dbname="Auctioneers";
$con = mysqli_connect ($hostname, $username, $password, $dbname); //connect to db
if (!$con) //error handling
    {
        die ("Failed to connect to MySQL: ". mysqli_connect_error()); //display connection error and stop execution
    }
?>
</body>
</html>
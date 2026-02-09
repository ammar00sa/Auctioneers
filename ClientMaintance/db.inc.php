<!--
Creator: Ismael Charaf Megrini
Date: 05/02/2026-->
<html>
<body>
<?php
$hostname = "localhost";
$username="bidmaster";
$password="Auct10nRul3$";
$dbname="Auctioneers";
$con = mysqli_connect ($hostname, $username, $password, $dbname); //connect to db
if (!$con)
    {
        die ("Failed to connect to MySQL: ". mysqli_connect_error());
    }
?>
</body>
</html>
<!-- Name:                 AMMAR SALAH -->
<!-- Student Number:       C00313510 -->
<!-- Title:                Data Base connection  file -->
<!-- Date:                 8 FEB 2026 -->
 
 <?php
$hostname = "localhost";
$username = "bidmaster";
$password = "Auct10nRul3$";
$dbname   = "Auctioneers";

$con = mysqli_connect($hostname, $username, $password, $dbname);

if (!$con) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

mysqli_set_charset($con, "utf8");
?>

<!-- Oyindamola Olaosun C00313475  Project Work--->

<!-- Database connection -->
<?php 
    $hostname = "localhost";
    $username =  "bidmaster";
    $password = "Auct10nRul3$";

    $dbname = "Auctioneers";

    // Use of mysqli_connect()
    $con = mysqli_connect($hostname, $username, $password, $dbname);

    // Error handling
    if(!$con){
        die("Failed to connect to MYSQL: " . mysqli_connect_error());
    }
?>
<!-- Oyindamola Olaosun C00313475  Lab 3--->

<!-- Database commection -->
<?php 
    $hostname = "localhost";
    $username =  "dammytimmy";
    $password = "IntelGenius18**";

    $dbname = "MYDBC00313475";

    // Use of mysqli_connect()
    $con = mysqli_connect($hostname, $username, $password, $dbname);

    // Error handling
    if(!$con){
        die("Failed to connect to MYSQL: " . mysqli_connect_error());
    }
?>
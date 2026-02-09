<!--
Creator: Joseph Lalor
Date: 05/02/2026
Student Number: c00312883
Title: resPropAdd.php
Purpose: Send details of form down to database -->
<?php
include 'db.inc.php'; 

$sql = "Insert into Residential (Status, Address, AskingPrice, Location, ViewingTime,
Eircode, NumBathrooms, NumBedrooms, Site, Notes, Area, Type, HeatingType, NumLevels, NumReception,
ClientID) VALUES ('For Sale', '$_POST[address]', '$_POST[askingprice]', '$_POST[location]',
        '$_POST[vtimes]', '$_POST[eircode]', '$_POST[bathrooms]', '$_POST[bedrooms]',
        '$_POST[site]', '$_POST[notes]', '$_POST[area]', '$_POST[proptype]', '$_POST[heating]',
        '$_POST[levels]', '$_POST[receptrooms]', '$_POST[client]')";   

if (!mysqli_query($con, $sql)) {        
    die ("An Error in the SQL Query: ". mysqli_error($con));
}

echo "<br>A record has been added for ". $_POST['address'] . "<br>"; 

mysqli_close($con); 
?>
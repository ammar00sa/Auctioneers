<!-- Created by: Joseph Lalor
Date: 26/01/2026
Student Number: c00312883
Title: listbox.php
Purpose: A HTML form for entering a new Residential Property-->
<?php
include "db.inc.php"; // database connection
date_default_timezone_set('UTC'); // Set the default timezone to UTC

// SQL query updated to also select email and phone from persons table
$sql = "SELECT ResidentialID, Status, Address, AskingPrice, Location, ViewingTime,
Eircode, NumBathrooms, NumBedrooms, Site, Notes, Area, Type, HeatingType, NumLevels, NumReception,
ClientID FROM Residential";

if (!$result = mysqli_query($con, $sql)) { //error handling
    die('Error in querying the database' . mysqli_error($con));
}

// Create HTML select element (listbox) to display all properties
echo "<br><select name='listbox' id='listbox' onclick='populate()'>";

// Loop through each row returned from the database
while ($row = mysqli_fetch_array($result)) {
    $status = $row['Status'];
    $address = $row['Address'];
    $askingprice = $row['AskingPrice'];
    $location = $row['Location'];
    $viewingtime = $row['ViewingTime'];
    $eircode = $row['Eircode'];
    $bath = $row['NumBathrooms'];
    $bed = $row['NumBedrooms'];
    $site = $row['Site'];
    $notes = $row['Notes'];
    $area = $row['Area'];
    $type = $row['Type'];
    $heating = $row['HeatingType'];
    $levels = $row['NumLevels'];
    $recept = $row['NumReception'];
    $client = $row['ClientID'];
    $id = $row['ResidentialID'];
    $fulltext = "$status/$address/$askingprice/$location/$viewingtime/$eircode/$bath/$bed/$site/$notes/$area/$type/$heating/$levels/$recept/$client/$id";
    echo "<option value='$fulltext'>$address</option>";
}

echo "</select>";
?>
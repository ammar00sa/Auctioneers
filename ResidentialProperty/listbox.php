<!-- Created by: Joseph Lalor
Date: 26/01/2026
Student Number: c00312883
Title: listbox.php
Purpose: A HTML form for entering a new Residential Property-->
<?php
include "db.inc.php"; // database connection
date_default_timezone_set('UTC'); // Set the default timezone to UTC

// SQL query updated to also select email and phone from persons table
$sql = "SELECT Status, Address, AskingPrice, Location, ViewingTime,
Eircode, NumBathrooms, NumBedrooms, Site, Notes, Area, Type, HeatingType, NumLevels, NumReception,
ClientID FROM Residential";

if (!$result = mysqli_query($con, $sql)) { //error handling
    die('Error in querying the database' . mysqli_error($con));
}

// Create HTML select element (listbox) to display all persons
echo "<br><select name='listbox' id='listbox' onclick='populate()'>";

// Loop through each row returned from the database
while ($row = mysqli_fetch_array($result)) {
    $id = $row['Status'];
    $fname = $row['Address'];
    $sname = $row['AskingPrice'];
    $dateofBirth = $row['Location'];
    $dob = $row['ViewingTime'];
    $email = $row['Eircode'];
    $phone = $row['NumBathrooms'];
    $bed = $row['NumBedrooms'];
    $bed = $row['Site'];
    $bed = $row['Notes'];
    $bed = $row['Area'];
    $bed = $row['Type'];
    $bed = $row['HeatingType'];
    $bed = $row['NumLevels'];
    $bed = $row['NumReception'];
    $bed = $row['ClientID'];
    $allText = "$id,$fname,$sname,$dob,$email,$phone";
    echo "<option value='$allText'>$fname $sname</option>";
}

echo "</select>";
mysqli_close($con); //close connection
?>
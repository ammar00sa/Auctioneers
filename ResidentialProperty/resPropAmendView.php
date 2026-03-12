<!-- Created by: Joseph Lalor
Date: 12/03/2026
Student Number: c00312883
Title: resPropAmendView.php
Purpose: A PHP file for amending a Residential Property record-->
<?php
include 'db.inc.php'; //include connection to database

$sql = "UPDATE Residential SET 
    Address = '$_POST[amendaddress]',
    AskingPrice = '$_POST[amendaskingprice]',
    Location = '$_POST[amendlocation]',
    ViewingTime = '$_POST[amendviewingtime]',
    Eircode = '$_POST[amendeircode]',
    NumBathrooms = '$_POST[amendbath]',
    NumBedrooms = '$_POST[amendbed]',
    Site = '$_POST[amendsite]',
    Notes = '$_POST[amendnotes]',
    Area = '$_POST[amendarea]',
    Type = '$_POST[amendtype]',
    HeatingType = '$_POST[amendheating]',
    NumLevels = '$_POST[amendlevels]',
    NumReception = '$_POST[amendrecept]',
    ClientID = '$_POST[amendclient]'
    WHERE ResidentialID = '$_POST[amendid]'";

if (!mysqli_query($con, $sql)) {
    echo "Error " . mysqli_error($con);
} else {
    if (mysqli_affected_rows($con) != 0) {
        echo mysqli_affected_rows($con) . " record(s) updated <br>";
        echo "ID: " . $_POST['amendid'] . "<br>";
        echo "Address: " . $_POST['amendaddress'] . "<br>";
        echo "Asking Price: " . $_POST['amendaskingprice'] . "<br>";
        echo "Location: " . $_POST['amendlocation'] . "<br>";
        echo "Viewing Time: " . $_POST['amendviewingtime'] . "<br>";
        echo "Eircode: " . $_POST['amendeircode'] . "<br>";
        echo "Bathrooms: " . $_POST['amendbath'] . "<br>";
        echo "Bedrooms: " . $_POST['amendbed'] . "<br>";
        echo "Site: " . $_POST['amendsite'] . "<br>";
        echo "Notes: " . $_POST['amendnotes'] . "<br>";
        echo "Area: " . $_POST['amendarea'] . "<br>";
        echo "Type: " . $_POST['amendtype'] . "<br>";
        echo "Heating: " . $_POST['amendheating'] . "<br>";
        echo "Levels: " . $_POST['amendlevels'] . "<br>";
        echo "Reception Rooms: " . $_POST['amendrecept'] . "<br>";
        echo "Client ID: " . $_POST['amendclient'];
    } else {
        echo "No records were changed";
    }
}

mysqli_close($con); //close database connection
?>

<!-- Form with button to return to the previous screen -->
<form action="resPropAmendView.html.php" method="post">
    <input type="submit" value="Return to Previous Screen">
</form>
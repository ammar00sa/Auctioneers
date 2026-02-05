<!--
Creator: Joseph Lalor
Date: 05/02/2026
Student Number: c00312883 -->
<html>
<body>
<?php
include 'db.inc.php'; 

$sql = "Insert into Residential (Status, Address, AskingPrice, Location, ViewingTime,
Eircode, NumBathrooms, NumBedrooms, Site, Area, Type, HeatingType, NumLevels, NumReception,
ClientID)
        
VALUES ('For Sale', '$_POST[Address]', '$_POST[AskingPrice]', '$_POST[Location]',
        '$_POST[ViewingTime]', '$_POST[Eircode]', '$_POST[NumBathrooms]', '$_POST[NumBedrooms]',
        '$_POST[Site]', '$_POST[Area]', '$_POST[Type]', '$_POST[HeatingType]',
        '$_POST[NumLevels]', '$_POST[NumReception]', '$_POST[ClientID]',)";    

if (!mysqli_query($con, $sql)) {        
    die ("An Error in the SQL Query: ". mysqli_error($con));
}

echo "<br>A record has been added for ". $_POST['Address'] . "<br>"; 

mysqli_close($con); 
?>
</body>
</html>
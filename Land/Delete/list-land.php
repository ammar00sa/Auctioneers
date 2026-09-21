<!-- Name:                 AMMAR SALAH -->
<!-- Student Number:       C00313510 -->
<!-- Title:                Drop down land list box php file -->
<!-- Date:                 10 FEB 2026 -->
<!-- Project Y2 2026 -->

<?php
// Include database connection file
include "db.inc.php";

// SQL statement to select the details of all land properties that are not deleted (Dflag = 0)
$sql = "SELECT LandID, Status, Address, AskingPrice, Location, ViewingTime, Eircode,
               NumberOfAcres, Notes, ResidenceDetails, Quotas, BuildingsAndoutOffices
        FROM Land
        WHERE Dflag = 0";

// Run the query
$result = mysqli_query($con, $sql);

// If the query fails, stop and show an error message
if (!$result) {
    die("Error loading land properties: " . mysqli_error($con));
}

// Loop through each record returned from the database
while ($row = mysqli_fetch_assoc($result)) {

    // Store database fields into variables
    $LandID    = $row['LandID'];
    $Status    = $row['Status'];
    $Address   = $row['Address'];
    $Eircode   = $row['Eircode'];
    $Price     = $row['AskingPrice'];
    $Location  = $row['Location'];
    $Viewing   = $row['ViewingTime'];
    $Acres     = $row['NumberOfAcres'];
    $Notes     = $row['Notes'];
    $Details   = $row['ResidenceDetails'];
    $Quotas    = $row['Quotas'];
    $Buildings = $row['BuildingsAndoutOffices'];

    // Output an <option> tag for the dropdown list
    
    echo "<option value='$LandID'
        data-status=\"$Status\"
        data-address=\"$Address\"
        data-eircode=\"$Eircode\"
        data-price=\"$Price\"
        data-location=\"$Location\"
        data-viewing=\"$Viewing\"
        data-acres=\"$Acres\"
        data-notes=\"$Notes\"
        data-details=\"$Details\"
        data-quotas=\"$Quotas\"
        data-buildings=\"$Buildings\"
      >$Address - $Eircode</option>";
}
?>

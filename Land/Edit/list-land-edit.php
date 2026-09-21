<!-- Name:                 AMMAR SALAH -->
<!-- Student Number:       C00313510 -->
<!-- Title:                Drop down land list box php file (Edit / Amend View) -->
<!-- Date:                 19 FEB 2026 -->


<?php
    // Include database connection file
    include "db.inc.php";

    // Set variable for filter value, default is all properties
    $filter = isset($_POST['filter']) ? $_POST['filter'] : "all";

    // Select land details with client name and highest bid
    $sql = "SELECT L.LandID, L.Status, L.Address, L.AskingPrice, L.Location, L.ViewingTime, L.Eircode,
                   L.NumberOfAcres, L.Notes, L.ResidenceDetails, L.Quotas, L.BuildingsAndoutOffices,
                   L.ClientID, C.Name AS ClientName,
                   COALESCE(
                     (SELECT MAX(B.BidAmount)
                      FROM Bid B
                      WHERE B.LandID = L.LandID
                        AND B.Dflag = 0
                     ), 0
                   ) AS HighestBid
            FROM Land L
            LEFT JOIN Client C ON L.ClientID = C.ClientID
            WHERE L.Dflag = 0";

    // If sold properties are selected, only show sold records
    if($filter == "sold")
    {
        $sql .= " AND L.Status = 'Sold'";
    }
    // Otherwise if unsold properties are selected, show all properties that are not sold
    else if($filter == "unsold")
    {
        $sql .= " AND (L.Status <> 'Sold' OR L.Status IS NULL OR L.Status = '')";
    }

    // Error handling, 
    if(!$result = mysqli_query($con, $sql))
    {
        // Die kills rest of script
        die("Error loading land properties: " . mysqli_error($con));
    }

    // Iterate through the result set
    while($row = mysqli_fetch_assoc($result))
    {
        $LandID = $row['LandID'];
        $Status = $row['Status'];
        $Address = $row['Address'];
        $Eircode = $row['Eircode'];
        $Price = $row['AskingPrice'];
        $Location = $row['Location'];
        $Viewing = $row['ViewingTime'];
        $Acres = $row['NumberOfAcres'];
        $Notes = $row['Notes'];
        $Details = $row['ResidenceDetails'];
        $Quotas = $row['Quotas'];
        $Buildings = $row['BuildingsAndoutOffices'];
        $ClientID = $row['ClientID'];
        $ClientName = $row['ClientName'];
        $HighestBid = $row['HighestBid'];

        // Assigns each field in the listbox with the values and displays each entry via their address and eircode
        // data attributes are used by javascript to populate the form with further information from the db about the land property
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
                data-clientid=\"$ClientID\"
                data-clientname=\"$ClientName\"
                data-highestbid=\"$HighestBid\"
              >$Address - $Eircode</option>";
    }

    // Close connection
    mysqli_close($con);
?>

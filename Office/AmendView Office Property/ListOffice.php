<!-- Oyindamola Olaosun C00313475 -->

<?php 
    include "db.inc.php";

    // Selects all the undeleted office records from the Office Table
    $sql = "SELECT OfficeID, Address, Eircode, Location, Status, AskingPrice, ViewingTime, Internet, OwnershipType, Reception, Area, Floor, Layout, TelephoneServices, Access, Security, Canteen
    FROM Office WHERE Dflag = 0";

    //Error Handling
    if(!$result = mysqli_query($con, $sql)){
        die("Error in query in the database" . mysqli_error($con));
    }


    //Using the mysqli_fetch_array()
    echo "<option value=''>---Office List----</option>";
    // mysqli_fetch_array($result) fetches a result row as an associative array
    while($row = mysqli_fetch_array($result)){
        $id = $row['OfficeID'];
        $address = $row['Address'];
        $eircode = $row['Eircode'];
        $location = $row['Location'];
        $status = $row['Status'];
        $askingPrice = $row['AskingPrice'];
        $viewingTime = $row['ViewingTime'];
        $internet = $row['Internet'];
        $ownershipType = $row['OwnershipType'];
        $reception = $row['Reception'];
        $area = $row['Area'];
        $floor = $row['Floor'];
        $layout = $row['Layout'];
        $tel = $row['TelephoneServices'];
        $access = $row['Access'];
        $security = $row['Security'];
        $canteen = $row['Canteen'];
        //Important query for selecting the highest bid from the Bid Table 
        $sqlBid = "SELECT MAX(BidAmount) AS highestBid
        FROM Bid WHERE OfficeID = '$id' AND Dflag = 0";

        // Error Handling
        if(!$resultBid = mysqli_query($con, $sqlBid)){
            die("Error in bid query" . mysqli_error($con));
        }

        
        $rowBid = mysqli_fetch_array($resultBid);

        // Check if a bid exists
        if($rowBid['highestBid']){
            $highestBid = $rowBid['highestBid'];
        }
        else{
            $highestBid = 0;
        }

        $alltext = "${id}|${address}|${eircode}|${location}|${status}|${askingPrice}|${viewingTime}|${internet}|${ownershipType}|${reception}|${area}|${floor}|${layout}|${tel}|${access}|${security}|${canteen}|${highestBid}";
        echo "<option value='$alltext'>$address $eircode</option>";
    }

    // Close the connection
    mysqli_close($con);

?>
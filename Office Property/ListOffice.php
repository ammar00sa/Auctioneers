<?php 
    include "db.inc.php";

    // SQL Query using matching address condition
    $sql = "SELECT OfficeID, Address, Eircode, Location, Status, AskingPrice, ViewingTime, Internet, OwnershipType, Reception, Area, Floor, Layout, TelephoneServices, Access, Security, Canteen FROM Office WHERE DeletedFlag = 0";

    //Error Handling
    if(!$result = mysqli_query($con, $sql)){
        die("Error in query in the database" . mysqli_error($con));
    }

   
    //Using the mysqli_fetch_array()
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

        $alltext = "${id}|${address}|${eircode}|${location}|${status}|${askingPrice}|${viewingTime}|${internet}|${ownershipType}|${reception}|${area}|${floor}|${layout}|${tel}|${access}|${security}|${canteen}";
        echo "<option value='$alltext'>$id  $eircode</option>";
    }

    echo "</select>";

    // Close the connection
    mysqli_close($con);
    
?>
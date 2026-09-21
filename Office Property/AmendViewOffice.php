<!-- Oyindamola Olaosun AmendViewOffice Property -->
<?php 
    include 'db.inc.php';

    // SQL query updated to match the Student table and the HTML form names
    // Note: We use the names from the <input name="..."> attributes
    $sql = "UPDATE Office SET 
            Address = '{$_POST['amendaddress']}', 
            AskingPrice = '{$_POST['amendaskingprice']}', 
            Location = '{$_POST['amendlocation']}', 
            ViewingTime = '{$_POST['amendviewingtime']}', 
            Eircode = '{$_POST['amendeircode']}', 
            Internet = '{$_POST['amendinternet']}',
            OwnershhipType = '{$_POST['amendownershiptype']}',
            Reception = '{$_POST['amendreception']}',
            Area = '{$_POST['amendarea']}',
            Floor = '{$_POST['amendfloor']}',
            Layout = '{$_POST['amendlayout']}',
            TelephoneServices = '{$_POST['amendtel']}',
            Access = '{$_POST['amendaccess']}',
            Security = '{$_POST['amendsecurity']}',
            Canteen = '{$_POST['amendcanteen']}',
            WHERE OfficeID = '{$_POST['amendofficeid']}'";


    // Execute and Error Handling
    if(!mysqli_query($con, $sql)){
        echo "Error: " . mysqli_error($con);
    }
    else{
        if(mysqli_affected_rows($con) != 0){
            echo mysqli_affected_rows($con) . " record(s) updated <br>";
            echo "Office ID: " . $_POST['amendofficeid'] . " (" . $_POST['amendeircode'] . ") has been updated successfully.";
        }
        else{
            echo "No changes were made to the record.";
        }
    }

    // Close connection
    mysqli_close($con);
?>

<br><br>
<form action="AmendViewOffice.html.php" method="post">
    <input type="submit" value="Return to Previous Screen">
</form>
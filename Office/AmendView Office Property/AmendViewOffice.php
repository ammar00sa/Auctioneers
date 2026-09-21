<!-- Name: Oyindamola Olaosun -->
<!-- Student ID: C00313475 -->
<!-- Amend/View Office Property php file interacts with the database as it executes on the sever -->
<?php 
    include 'db.inc.php';

    //UPDATE SQL query to match the Office table and the HTML form names
    $sql = "UPDATE Office SET 
            Address = '{$_POST['amendaddress']}', 
            AskingPrice = '{$_POST['amendaskingprice']}', 
            Location = '{$_POST['amendlocation']}', 
            ViewingTime = '{$_POST['amendviewingtime']}', 
            Eircode = '{$_POST['amendeircode']}', 
            Internet = '{$_POST['amendinternet']}',
            OwnershipType = '{$_POST['amendownershiptype']}',
            Reception = '{$_POST['amendreception']}',
            Area = '{$_POST['amendarea']}',
            Floor = '{$_POST['amendfloor']}',
            Layout = '{$_POST['amendlayout']}',
            TelephoneServices = '{$_POST['amendtel']}',
            Access = '{$_POST['amendaccess']}',
            Security = '{$_POST['amendsecurity']}',
            Canteen = '{$_POST['amendcanteen']}'
            WHERE OfficeID = '{$_POST['amendofficeid']}'";


    // Execute and Error Handling
    if(!mysqli_query($con, $sql)){
        header("Location: AmendViewOffice.html.php?status=error");
        exit();
    }

    // Confirmation that data has been added
    header("Location: AmendViewOffice.html.php?status=success&amendofficeid=" . $_POST['amendofficeid']);
    exit();

    if(mysqli_affected_rows($con) != 0){
        header("Location: AmendViewOffice.html.php?status=success&amendofficeid=" . $_POST['amendofficeid']);
        exit();
    } else {
        header("Location: AmendViewOffice.html.php?status=nochange&amendofficeid=" . $_POST['amendofficeid']);
        exit();
    }

    // Close connection
    mysqli_close($con);
?>

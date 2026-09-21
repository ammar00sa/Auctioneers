<!-- Name: Oyindamola Olaosun -->
<!-- Student ID: C00313475 -->
<!-- Delete Office Property php file interacts with the database as it executes on the sever -->

<?php 
// Session -> super global variable used to store information on a user to be used 
// across multiple pages. A user is assigned a session-id e.g login credentials

    session_start();
    echo "Confirmation of Deletion <br>";
?>

<?php 
    include 'db.inc.php';

    //Soft delete the Office record
    $sql = "UPDATE Office SET DFlag = 1 WHERE OfficeID = '".$_POST['delofficeid']."'";

    // Error Handling
    if(!mysqli_query($con, $sql)){
         header("Location: ShowOfficeDelete.html.php?status=error");
        exit();
    }

    if(mysqli_affected_rows($con) == 0){
        header("Location: ShowOfficeDelete.html.php?status=nochange");
        exit();
    }

    
    //Checking if any bids exist for this OfficeID
    $checkBids = "SELECT * FROM Bid WHERE OfficeID = '" . $_POST['delofficeid'] . "' AND Dflag = 0";

    $result = mysqli_query($con, $checkBids);

    if(!$result){
        header("Location: ShowOfficeDelete.html.php?status=error");
        exit();
    }

    $rowcount = mysqli_num_rows($result);


    //if bids exist, soft delete too
    if($rowcount > 0){
        $sql2 = "UPDATE Bid SET Dflag = 1 WHERE OfficeID = '".$_POST['delofficeid']."'";
    
        if(!mysqli_query($con, $sql2)){
         header("Location: ShowOfficeDelete.html.php?status=error");
        exit();
        }

        $propertyId = mysqli_insert_id($con);
        //Show confirmation message
        
        header("Location: ShowOfficeDelete.html.php?status=success&propertyID=" . $propertyId);
        exit();

        }

    // Confirmation that data has been added
    $_SESSION['officeid'] = $_POST['delofficeid'];
    $_SESSION['address'] = $_POST['deladdress'];
    $_SESSION['eircode'] = $_POST['deleircode'];
    $_SESSION['location'] = $_POST['dellocation'];
    $_SESSION['floor'] = $_POST['delfloor'];
    $_SESSION['area'] = $_POST['delarea'];
    $_SESSION['askingprice'] = $_POST['delaskingprice'];
    $_SESSION['tel'] = $_POST['deltel'];
    $_SESSION['reception'] = $_POST['delreception'];
    $_SESSION['layout'] = $_POST['dellayout'];
    $_SESSION['internet'] = $_POST['delinternet'];
    $_SESSION['access'] = $_POST['delaccess'];
    $_SESSION['security'] = $_POST['delsecurity'];
    $_SESSION['canteen'] = $_POST['delcanteen'];
    $_SESSION['ownershiptype'] = $_POST['delownershiptype'];
    $_SESSION['viewingtime'] = $_POST['delviewingtime'];

    header("Location: ShowOfficeDelete.html.php?status=success&officeid=".$_POST['delofficeid']."&bidsdeleted=".$rowcount);

    mysqli_close($con); 
?>
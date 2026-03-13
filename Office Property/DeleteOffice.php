<?php 
// Session -> super global variable used to store information on a user to be used 
// across multiple pages. A user is assigned a session-id e.g login credentials

    session_start();
    echo "Confirmation of Deletion <br>";
?>

<?php 
    include 'db.inc.php';


    $sql = "UPDATE Office SET DeletedFlag = 1 WHERE OfficeID = '".$_POST['delofficeid']."'";

    // Error Handling
    if(!mysqli_query($con, $sql)){
        die("An Error in the SQL Query: " . mysqli_error($con));
    }

    if(mysqli_affected_rows($con) == 0){
        echo "No record deleted" . "<br>";
    }

    
    //Affecting Bid Table
    $checkBids = "SELECT * FROM Bid WHERE OfficeID = '" . $_POST['delofficeid'] . "' AND Dflag = 0";

    $result = mysqli_query($con, $checkBids);

    if(!$result){
        die("Error checking bids: " . mysqli_error($con));
    }

    $rowcount = mysqli_num_rows($result);


    //if bids are found for this OfficeID
    if($rowcount > 0){
        $sql2 = "UPDATE Bid SET DFlag = 1 WHERE OfficeID = '".$_POST['delofficeid']."'";
    
        if(!mysqli_query($con, $sql2)){
        die("Error deleting bids: " . mysqli_error($con));
        }

        //Show confirmation message
        echo "Related bid(s) deleted successfully <br>";
        }

    // Confirmation that data has been added
    echo "Records have been deleted: ";
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

    mysqli_close($con); 
?>
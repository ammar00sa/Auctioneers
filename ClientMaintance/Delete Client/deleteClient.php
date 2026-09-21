<!-- Name: Ismael Charaf Megrini -->
<!-- Student ID: C00313241 -->


<?php 
    session_start();
    echo "Confirmation of Deletion <br>";
?>

<?php 
    include 'db.inc.php';

    // Mark client as deleted
    $sql = "UPDATE Client SET DFlag = 1 WHERE ClientID = '".$_POST['delId']."'";

    // Check if query executed successfully
    if(!mysqli_query($con, $sql)){
         header("Location: deleteClient.html.php?status=error");
        exit();
    }

    // Check if any rows were updated
    if(mysqli_affected_rows($con) == 0){
        header("Location: deleteClient.html.php?status=nochange");
        exit();
    }

    // Store deleted client details in session
    $_SESSION['ClientID'] = $_POST['delId'];
    $_SESSION['Address'] = $_POST['delAddress'];
    $_SESSION['Email'] = $_POST['delEmail'];
    $_SESSION['Phone'] = $_POST['delPhone'];
    $_SESSION['ClientType'] = $_POST['delClientType'];
    $_SESSION['Name'] = $_POST['delName'];
    $_SESSION['Eircode'] = $_POST['delEircode'];

    // Redirect with success message
    header("Location: deleteClient.html.php?status=success&officeid=".$_POST['delofficeid']."&bidsdeleted=".$rowcount);

    // Close database connection
    mysqli_close($con); 
?>
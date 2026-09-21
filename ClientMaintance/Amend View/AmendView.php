<!-- Name: Ismael Charaf Megrini-->
<!-- Student ID: C00313241 -->

<?php 
    include 'db.inc.php';

    //UPDATE SQL query to match the Office table and the HTML form names
        $sql = "UPDATE Client SET 
                Address = '{$_POST['amendaddress']}', 
                Email = '{$_POST['amendemail']}', 
                Phone = '{$_POST['amendphone']}', 
                ClientType = '{$_POST['amendtype']}', 
                Name = '{$_POST['amendname']}', 
                Eircode = '{$_POST['amendeircode']}'
                WHERE ClientID = '{$_POST['amendclientid']}'";
    

    // Execute and Error Handling
    if(!mysqli_query($con, $sql)){
        header("Location: AmendView.html.php?status=error");
        exit();
    }

    // Confirmation that data has been added
    header("Location: AmendView.html.php?status=success&amendclientid=" . $_POST['amendclientid']);
    exit();

    if(mysqli_affected_rows($con) != 0){
        header("Location: AmendView.html.php?status=success&amendclientid=" . $_POST['amendclientid']);
        exit();
    } else {
        header("Location: AmendView.html.php?status=nochange&amendclientid=" . $_POST['amendclientid']);
        exit();
    }

    // Close connection
    mysqli_close($con);
?>

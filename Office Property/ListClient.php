<?php 
    include "db.inc.php";

    $sql = "SELECT ClientID, Name FROM Client";
    //$sql = "SELECT ClientID, Name FROM Client WHERE DeletedFlag = 0";


    //Error Handling
    if(!$result = mysqli_query($con, $sql)){
        die("Error in queryinh the database" . mysqli_error($con));
    }

    // listClientID
    //Using the mysqli_fetch_array()
    while($row = mysqli_fetch_array($result)){
		$id = $row['ClientID'];
        $name = $row['Name'];
        $text = "${id}. ${name}";
        echo "<option value='$text'>$id $name</option>";
    }

    echo "</select>";

    // Close the connection
    mysqli_close($con);
?>
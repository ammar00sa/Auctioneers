<!-- Oyindamola Olaosun C00313475  Lab 3--->


<?php
    include 'db.inc.php'; //connection to database
    date_default_timezone_set("UTC"); //sets default timezone for an area

    $sql = "SELECT * FROM persons where personid = " . $_POST['personid'];

    // Select query
    $result = mysqli_query($con, $sql);
        
    // Error Handling
    if(!mysqli_query($con, $sql)){
        die("An Error in the SQL Query: " . mysqli_error($con));
    }

    // No of rows afected 
    $rowcount = mysqli_affected_rows($con);
    // Error Handling
    if(!mysqli_affected_rows($con)){
        die("No affected rows: " . mysqli_error($con));
    }

    //Deatils about the record returned
    if($rowcount == 1){
        echo "<br>The details of the selected person are <br> <br>";
        $row = mysqli_fetch_array($result);
        echo "The person id is :" . $_POST['personid'] . "<br> <br>";
        echo "First Name is : ";
        echo $row['firstName'] . "<br>";
        echo $row['lastName'] . "<br>";

        $date = date_create($row['DOB']);
        echo "Date of Birth is :" . date_format($date, "d/m/Y");
    }
    else if($rowcount == 0){
        echo "No matching records";
    }

    // Close of the database
    mysqli_close($con);
?>
<form action="view1.html" method="post">
    <br>
    <input type="submit" value="Return to select page"/>
</form>
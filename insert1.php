<!-- Oyindamola Olaosun C00313475  Lab 3--->

<?php 
    include 'db.inc.php'; //connection to database
    date_default_timezone_set("UTC");
    echo "The details sent down are: <br>";

    echo "First Name is: " . $_POST['firstname'] . '<br>';
    echo "Surname is : " . $_POST["surname"] . "<br>";

    // Used to create a date object
    $date = date_create($_POST['dob']);

    echo "Date of Birth is :" . date_format($date, "d/m/Y") . "<br>";

    // Insert Query
$sql = "INSERT INTO persons (firstname, lastname, DOB) 
VALUES ('".$_POST['firstname']."', '".$_POST['surname']."', '".$_POST['dob']."')";

// Error handling
    if(!mysqli_query($con, $sql)){
        die("An Error in the SQL Query: " . mysqli_error($con));
    }

    // Confirmation that record has been added
    echo "<br> A record has been added for " . $_POST['firstname'] . " " . $_POST['surname'] . ".";

    // Important to close the database
    mysqli_close($con);
?>

<form action="insert1.html" method="post">
    <br>
    <input type="submit" value="Return to Insert Page">
</form>
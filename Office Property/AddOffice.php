<?php 
    include 'db.inc.php';

    // View all the inputs in the form
    echo "The details sent down are: <br>";
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            foreach ($_POST as $key => $value) {
                echo "Field Name: " . $key .   $value . "<br>";
                $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
    }

    // SQL Expression
    $sql = "INSERT INTO Office (Address, Eircode, Location, Status, AskingPrice, ViewingTime, Internet, OwnershipType, Reception,  Area, Floor, Layout, TelephoneServices, Access, Security, Canteen, ClientID) 
            VALUES (
            '".$_POST['address']."', 
            '".$_POST['eircode']."', 
            '".$_POST['location']."',
            '".$_POST['status']."',
            '".$_POST['price']."',
            '".$_POST['viewingtime']."',
            '".$_POST['internet']."',
            '".$_POST['ownership']."',
            '".$_POST['reception']."',
            '".$_POST['area']."',
            '".$_POST['floor']."',
            '".$_POST['layout']."',
            '".$_POST['tel']."',
            '".$_POST['access']."',
            '".$_POST['security']."',
            '".$_POST['canteen']."',
			'".$_POST['listClientID']."'
            )";

    // Error Handling
    if(!mysqli_query($con, $sql)){
        die("An Error in the SQL Query: " . mysqli_error($con));
    }

    // Confirmation that data has been added
    echo "Records that have been added: ";
    foreach ($_POST as $name => $value) {
        echo "Field Name: " . htmlspecialchars($name) . " | Value: " . htmlspecialchars($value) . "<br>";
    }

    mysqli_close($con);    
?>
<form action="AddOffice.html.php" method="post">
    <br>
    <input type="submit" value="Return to Add Office Screen">
</form>
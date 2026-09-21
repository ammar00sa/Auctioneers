<?php
include "db.inc.php"; // Database connection
date_default_timezone_set('UTC');

// Get all active clients
$sql = "SELECT * FROM Client WHERE DFlag = 0";

if (!$result = mysqli_query($con, $sql))
{
    // Show error if query fails
    die('Error in querying the database' . mysqli_error($con));
}

// Display each client in listbox
while ($row = mysqli_fetch_array($result))
{
    $id = $row['ClientID'];
    $fname = $row['Name'];
    $email = $row['Email'];
    $address = $row['Address'];
    $type = $row['ClientType'];
    $eircode = $row['Eircode'];
    $phone = $row['Phone'];

    // Combine all client data with pipe separator
    $allText = $id . "|" . $fname . "|" . $email . "|" . $address . "|" . $type . "|" . $eircode . "|" . $phone;
    echo "<option value='$allText'>$fname</option>";
}

// Close connection
mysqli_close($con);
?>


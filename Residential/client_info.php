<!--
Creator: Joseph Lalor
Date: 26/03/2026
Student Number: c00312883
Title: client_info.php
Purpose: A PHP file for generating a client details window for the Office Property Report-->
<?php
include 'db.inc.php'; // your database connection file
 
$id = mysqli_real_escape_string($con, $_GET['id']); // sanitise the id passed via GET to prevent SQL injection
$sql = "SELECT * FROM Client WHERE ClientID = '$id'"; // adjust table/column names
$result = mysqli_query($con, $sql);
$client = mysqli_fetch_array($result); // fetch the matching client row as an array
 
if (!$client) { // if no client was found, display message and stop execution
    echo "No client found.";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Client Information</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Client Information</h2>
    <table> <!--table displays each client field as a row with a label and value-->
        <tr><th>Field</th><th>Value</th></tr>
        <tr><td>Client ID</td><td><?= $client['ClientID'] ?></td></tr>
        <tr><td>Name</td><td><?= $client['Name'] ?></td></tr>
        <tr><td>Address</td><td><?= $client['Address'] ?></td></tr>
        <tr><td>Phone</td><td><?= $client['Phone'] ?></td></tr>
        <tr><td>Eircode</td><td><?= $client['Eircode'] ?></td></tr>
    </table>
</body>
</html>
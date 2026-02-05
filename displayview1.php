<!-- Oyindamola Olaosun C00313475  Lab 3--->

<?php
// Start of  a session
session_start();
include 'db.inc.php'; //use of include function to introduce db connection

// Querying records using condition - mysqli_query()
$sql = "SELECT * FROM persons WHERE personid = " . $_POST['personid'];
// Error Handling
if (!$result = mysqli_query($con, $sql)) {
    die('Error in querying the database' . mysqli_error($con));
}

//mysqli_affected_rows() - tells us how many rows were affected by the last db query
$rowcount = mysqli_affected_rows($con);
$_SESSION['personid'] = $_POST['personid'];


if ($rowcount == 1) {
    //mysqli_fetch_array() -> retrieve a arow of data from a DB result as an array
    $row = mysqli_fetch_array($result);
    $_SESSION['personid'] = $row['personId'];
    $_SESSION['firstname'] = $row['firstName'];
    $_SESSION['lastname'] = $row['lastName'];
    $_SESSION['dob'] = $row['DOB'];
} else if ($rowcount == 0) {
    // Remove variable in a single session
    unset($_SESSION['firstname']);
    unset($_SESSION['lastname']);
    unset($_SESSION['dob']);
}

mysqli_close($con);

// Redirect back to the calling form with the values to display in session variables if a record was found
header('Location: view1.html.php');
?>

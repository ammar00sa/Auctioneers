<!-- Name:                 AMMAR SALAH -->
<!-- Student Number:       C00313510 -->
<!-- Title:                Add Land Property PHP file -->
<!-- Date:                 8 FEB 2026 -->
<!-- Project Y2 2026 -->
<?php
	session_start();
	// Include database connection file
	include "db.inc.php";

	// Check if the form was submitted correctly
	if (!isset($_POST['submit']))
	{
		// Set session message for failed submission
		$_SESSION['msg'] = "Form not submitted.";
		$_SESSION['type'] = "error";
		header("Location: add-land.html.php");
		exit;
	}

	// Set variables for POST
	$clientID = $_POST['clientList'];

	// Set default status for all newly added land properties
	$status = "For Sale";

	// Concatenate the address into a single string
	// If address line 2 is not empty, include additional address lines
	if(!empty($_POST['adrs2']))
	{
		$address = $_POST['adrs1'] . " " . $_POST['adrs2'] . " " . $_POST['adrs3'];
	}
	else
	{
		// Otherwise, we can assume only line 1 was entered by the user
		$address = $_POST['adrs1'];
	}

	$price = $_POST['price'];
	$location = $_POST['location'];
	$viewing = $_POST['viewing_times'];
	$eircode = $_POST['eircode'];

	// Land-Specific Details
	$acres = $_POST['acres'];
	$notes = $_POST['notes'];
	$details = $_POST['details'];
	$quotas = $_POST['quotas'];
	$buildings = $_POST['buildings'];

	//Insert SQL Query 
	$sql = "INSERT INTO Land
	(Status, Address, AskingPrice, Location, ViewingTime, Eircode,
	NumberOfAcres, Notes, ResidenceDetails, Quotas, BuildingsAndoutOffices, ClientID)
	VALUES
	('$status', '$address', '$price', '$location', '$viewing', '$eircode',
	'$acres', '$notes', '$details', '$quotas', '$buildings', '$clientID')";

	// If the SQL query fails ( error handeling )
	if(!mysqli_query($con, $sql))
	{
		// Set session variables for error message
		$_SESSION['msg'] = "Error inserting land: " . mysqli_error($con);
		$_SESSION['type'] = "error";
		header("Location: add-land.html.php");
		exit;
	}

	// Set the session variable for a success message
	$_SESSION['msg'] = "Land record added successfully. New Land ID: " . mysqli_insert_id($con);
	$_SESSION['type'] = "success";

	// Close connection
	mysqli_close($con);
?>

<script>
	
	window.location = "add-land.html.php"; // Sending the result whic is the Flash message ) to the page
</script>
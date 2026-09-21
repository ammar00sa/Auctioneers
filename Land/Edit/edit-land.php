<!-- Name:                 AMMAR SALAH -->
<!-- Student Number:       C00313510 -->
<!-- Title:                Amend/View Land Property PHP file -->
<!-- Date:                 19 FEB 2026 -->

<?php
	session_start();

	// Include database connection file
	include "db.inc.php";

	// Check if the save button was pressed
	if (!isset($_POST['save']))
	{
		$_SESSION['msg'] = "Land not updated.";
		$_SESSION['type'] = "error";
		header("Location: edit-land.html.php");
		exit;
	}

	// Check if the user selected a land property
	if (!isset($_POST['landList']) || $_POST['landList'] == "")
	{
		$_SESSION['msg'] = "No land property selected.";
		$_SESSION['type'] = "error";
		header("Location: edit-land.html.php");
		exit;
	}

	// Get the selected LandID
	$landID = $_POST['landList'];

	// Read form fields
	$status = $_POST['status'];
	$address = $_POST['adrs1'];
	$location = $_POST['location'];
	$eircode = $_POST['eircode'];
	$viewing = $_POST['viewing_times'];
	$price = $_POST['price'];
	$acres = $_POST['acres'];
	$quotas = $_POST['quotas'];
	$buildings = $_POST['buildings'];
	$details = $_POST['details'];
	$notes = $_POST['notes'];
	$highestBid = $_POST['highest_bid'];

	// Read client fields
	// client_name = name shown on the form
	// client_id   = hidden field used to update the Client table
	$clientName = $_POST['client_name'];
	$clientID = $_POST['client_id'];

	// SQL statement to update the land record
	$sql = "UPDATE Land SET
				Status = '$status',
				Address = '$address',
				AskingPrice = '$price',
				Location = '$location',
				ViewingTime = '$viewing',
				Eircode = '$eircode',
				NumberOfAcres = '$acres',
				Notes = '$notes',
				ResidenceDetails = '$details',
				Quotas = '$quotas',
				BuildingsAndoutOffices = '$buildings'
			WHERE LandID = $landID";

	// Run the land query and check if it works
	if (!mysqli_query($con, $sql))
	{
		$_SESSION['msg'] = "Error updating land: " . mysqli_error($con);
		$_SESSION['type'] = "error";
		mysqli_close($con);
		header("Location: edit-land.html.php");
		exit;
	}

	// Store how many rows were affected by the land query
	$landRows = mysqli_affected_rows($con);

	// SQL statement to update the client name record
	$clientSQL = "UPDATE Client SET
					Name = '$clientName'
				  WHERE ClientID = $clientID";

	// Run the client query and check if it works
	if (!mysqli_query($con, $clientSQL))
	{
		$_SESSION['msg'] = "Land updated, but error updating client name: " . mysqli_error($con);
		$_SESSION['type'] = "warn";
		mysqli_close($con);
		header("Location: edit-land.html.php");
		exit;
	}

	// Store how many rows were affected by the client query
	$clientRows = mysqli_affected_rows($con);

	// If either query updated a record, show success message
	if ($landRows > 0 || $clientRows > 0)
	{
		$_SESSION['msg'] = "Land record updated successfully.";
		$_SESSION['type'] = "success";
	}
	else
	{
		$_SESSION['msg'] = "No record updated (no changes made).";
		$_SESSION['type'] = "warn";
	}

	// Close the database connection
	mysqli_close($con);

	// Redirect to the page
	header("Location: edit-land.html.php");
	exit;
?>
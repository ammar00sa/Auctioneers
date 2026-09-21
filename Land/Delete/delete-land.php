<!-- Name:                 AMMAR SALAH -->
<!-- Student Number:       C00313510 -->
<!-- Title:                Delete Land Property PHP file -->
<!-- Date:                 8 FEB 2026 -->
<!-- Project Y2 2026 -->

<!DOCTYPE html>
<?php
	session_start();
?>

<?php
	// Include database connection file
	include "db.inc.php";

	// Check if the delete button was pressed
	if (!isset($_POST['delete']))
	{
		$_SESSION['msg'] = "Land not deleted.";
		$_SESSION['type'] = "error";
		header("Location: delete-land.html.php");
		exit;
	}

	// Check if a land property was selected from the dropdown list
	if (!isset($_POST['landList']) || $_POST['landList'] == "")
	{
		$_SESSION['msg'] = "No land property selected.";
		$_SESSION['type'] = "error";
		header("Location: delete-land.html.php");
		exit;
	}

	// Set variable for selected land id
	$landID = $_POST['landList'];

	// UPDATE statements for deleting the entries in the table
	// UPDATE statement for the Land table
	$landSQL = "UPDATE Land SET Dflag = 1 WHERE LandID = '$landID'";
	// UPDATE statement for the Bid table
	$bidSQL = "UPDATE Bid SET Dflag = 1 WHERE LandID = '$landID'";
	// SELECT statement for checking if any active bids exist for the land property
	$checkBidSQL = "SELECT * FROM Bid WHERE LandID = '$landID' AND Dflag = 0";

	// If there's a problem with the query for LAND
	if(!mysqli_query($con, $landSQL))
	{
		$_SESSION['msg'] = "Error deleting land: " . mysqli_error($con);
		$_SESSION['type'] = "error";
		header("Location: delete-land.html.php");
		exit;
	}
	// Otherwise
	else
	{
		// So long as AT LEAST 1 row was affected, we will execute the update
		if(mysqli_affected_rows($con) != 0)
		{
			$_SESSION['msg'] = "Land record deleted successfully.";
			$_SESSION['type'] = "success";
		}
		else
		{
			$_SESSION['msg'] = "No record updated (LandID not found or already deleted).";
			$_SESSION['type'] = "warn";
			mysqli_close($con);
			header("Location: delete-land.html.php");
			exit;
		}
	}

	// Run query to check if active bids exist for this land property
	if(!$result = mysqli_query($con, $checkBidSQL))
	{
		$_SESSION['msg'] = "Error checking bids: " . mysqli_error($con);
		$_SESSION['type'] = "error";
		mysqli_close($con);
		header("Location: delete-land.html.php");
		exit;
	}

	// If bids exist for this land property, also delete the related bids
	if(mysqli_num_rows($result) != 0)
	{
		// If there's a problem with the query for BID
		if(!mysqli_query($con, $bidSQL))
		{
			$_SESSION['msg'] = "Land deleted, but error deleting bids: " . mysqli_error($con);
			$_SESSION['type'] = "warn";
			mysqli_close($con);
			header("Location: delete-land.html.php");
			exit;
		}
		// Otherwise
		else
		{
			// So long as AT LEAST 1 row was affected, we will execute the update
			if(mysqli_affected_rows($con) != 0)
			{
				$_SESSION['msg'] = "Land record deleted successfully. Related bid(s) deleted successfully.";
				$_SESSION['type'] = "success";
			}
		}
	}
	else
	{
		$_SESSION['msg'] = "Land record deleted successfully. No active bids found for this land.";
		$_SESSION['type'] = "success";
	}

	header('Location: delete-land.html.php'); // Response Message
	mysqli_close($con);
?>
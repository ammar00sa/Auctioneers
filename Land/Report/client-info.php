<!-- Name:                 AMMAR SALAH -->
<!-- Student Number:       C00313510 -->
<!-- Title:                Client Information popup PHP file -->
<!-- Date:                 19 FEB 2026 -->
<!-- Project Y2 2026 -->

<?php
	// Include php script that connects to the db
	include "db.inc.php";

	// Check if a client id was received from the previous page
	if (!isset($_POST['clientid']) || $_POST['clientid'] == "")
	{
		echo "No client selected.";
		exit;
	}

	// Set variable for selected client id
	$clientID = $_POST['clientid'];

	// Prepare the statement for the SELECT query on Client
	$sql = "SELECT ClientID, Name, Address, Email, Phone, ClientType, Eircode
			FROM Client
			WHERE ClientID = $clientID";

	// Error handling, if a problem with the query, print a relevant message
	if(!$result = mysqli_query($con, $sql))
	{
		// Die kills rest of script
		die("Error loading client: " . mysqli_error($con));
	}

	// Fetch the result row
	$row = mysqli_fetch_assoc($result);

	// Close connection
	mysqli_close($con);

	// If no record was found, print a message and stop the script
	if(!$row)
	{
		echo "Client not found.";
		exit;
	}

	// Set variables for the client details
	$name = $row['Name'];
	$addr = $row['Address'];
	$email = $row['Email'];
	$phone = $row['Phone'];
	$type = $row['ClientType'];
	$eir = $row['Eircode'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Client Information</title>

	<!-- Link local stylesheet for page layout / popup styling -->
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<!-- Main Content Area -->
	<div class="card" style="width:min(700px,96vw);">

		<!-- Set heading for the page -->
		<div class="content__top">
			<h2>Client Information</h2>
		</div>

		<!-- Container for popup content -->
		<div class="land-grid">
			<div class="land-panel">
				<fieldset>

					<!-- Client Specific Details -->
					<legend>Client Details</legend>

					<!-- Two column layout for client details -->
					<div class="two-col">

						<!-- Begin Left Column -->
						<div class="col">

							<!-- Container for Client ID -->
							<div class="inputbox">
								<label>Client ID</label>
								<input type="text" value="<?php echo $clientID; ?>" readonly>
							</div>

							<!-- Container for Client Name -->
							<div class="inputbox">
								<label>Name</label>
								<input type="text" value="<?php echo $name; ?>" readonly>
							</div>

							<!-- Container for Client Type -->
							<div class="inputbox">
								<label>Client Type</label>
								<input type="text" value="<?php echo $type; ?>" readonly>
							</div>

							<!-- Container for Phone -->
							<div class="inputbox">
								<label>Phone</label>
								<input type="text" value="<?php echo $phone; ?>" readonly>
							</div>

						</div>

						<!-- Begin Right Column -->
						<div class="col">

							<!-- Container for Email -->
							<div class="inputbox">
								<label>Email</label>
								<input type="text" value="<?php echo $email; ?>" readonly>
							</div>

							<!-- Container for Address -->
							<div class="inputbox">
								<label>Address</label>
								<input type="text" value="<?php echo $addr; ?>" readonly>
							</div>

							<!-- Container for Eircode -->
							<div class="inputbox">
								<label>Eircode</label>
								<input type="text" value="<?php echo $eir; ?>" readonly>
							</div>

						</div>

					</div>

					<!-- Close button -->
					<div class="form-actions">
						<input type="button" value="Close" onclick="window.close()">
					</div>

				</fieldset>
			</div>
		</div>

	</div>
</body>
</html>
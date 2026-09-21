<!-- Name:                 AMMAR SALAH -->
<!-- Student Number:       C00313510 -->
<!-- Title:                Add Land Property html file -->
<!-- Date:                 8 FEB 2026 -->
<!-- Project Y2 2026 -->
<!DOCTYPE html>
<?php
	// Start session for flash message display after record insert
	session_start();
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add a New Land Property</title>

	<!-- Link local stylesheet for page layout / form styling -->
	<link rel="stylesheet" href="/Land/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
	<!-- Main Content Area -->
	<div class="card">
		
		<!-- Set heading for the form -->
		<div class="content__top">
			<h2>Add a New Land Property</h2>
		</div>

		<!-- Start form, sending info via Post to add-land.php, on submit call the function confirmSubmit to ensure user confirms before sending -->
		<form id="landForm" action="add-land.php" onsubmit="return confirmSubmit()" method="post">

			<div class="layout">

				<!-- Include sidebar navigation menu -->
				<?php include "menu.php"; ?>

				<!-- Container for all main add land content -->
				<div class="land-grid">

					<!-- Container for Listbox containing all clients with their client id in the values -->
					<div class="land-panel">
						<div class="inputbox">
							<label for="clientList"><h2>Select a Property Owner</h2></label>
							<!-- Calls the php script to make the dynamic listbox and insert it into the form via an include -->
							<select id="clientList" name="clientList" required title="Select the client associated with this land property">
								<option value="" disabled selected>-- Select Client --</option>
								<?php include "list-client.php"; ?>
							</select>
						</div>
					</div>

<!-- Script which checks if the session variable has been set for when a land property has been added, if so, echo a message out -->
					<?php
					if (isset($_SESSION['msg']))
					{
						// Protect message output from html injection
						$msg = htmlspecialchars($_SESSION['msg']);

						// Set type for css styling of message box
						$type = $_SESSION['type'] ?? "success";

						// Ensure only expected types are allowed
						if(!in_array($type, ["success", "error", "warn"]))
						{
							$type = "success";
						}

						echo "<div class='msg msg-$type'>
								<i class='fa-solid fa-circle-info'></i>
								<span>$msg</span>
							  </div>";

						// Clear session variables so message only displays once
						unset($_SESSION['msg']);
						unset($_SESSION['type']);
					}
					?>

					<!-- Begin Form Input Section -->
					<div class="land-panel">

						<fieldset>

							<!-- Land Specific Details -->
							<legend>Land Details</legend>

							<!-- Two column layout for form fields -->
							<div class="two-col">

								<!-- Begin Left Column -->
								<div class="col">

									<!-- Container for Address Line 1 -->
									<div class="inputbox">
										<label for="adrs1">Address Line 1: <span class="required">*</span></label><br>
										<input type="text" name="adrs1" id="adrs1" required placeholder="123 Main Street" title="Enter the main street address of the property">
									</div>

									<!-- Container for Address Line 2 -->
									<div class="inputbox">
										<label for="adrs2">Address Line 2: </label><br>
										<input type="text" name="adrs2" id="adrs2" placeholder="Kilkenny Road" title="Optional: apartment, suite, unit, or building details">
									</div>

									<!-- Container for Address Line 3 -->
									<div class="inputbox">
										<label for="adrs3">Address Line 3: </label><br>
										<input type="text" name="adrs3" id="adrs3" placeholder="Near Junction 5 / Adjacent to River Barrow" title="Optional additional address information">
									</div>

									<!-- Container for Location -->
									<div class="inputbox">
										<label for="location">Location: <span class="required">*</span></label><br>
										<input type="text" name="location" id="location" required placeholder="Carlow" title="Enter the town or city where the property is located">
									</div>

									<!-- Container for Eircode -->
									<div class="inputbox">
										<!-- Pattern: Eircode 1 alpha char(upper or lowercase) followed by TWO digits, zero to one spaces any four of a alpha char or number -->
										<label for="eircode">Eircode: <span class="required">*</span></label><br>
										<input type="text" name="eircode" id="eircode" required placeholder="Y21 R234" pattern="[A-Za-z]{1}\d{2}[ ]?[A-Za-z\d]{4}" title="Enter a valid Irish Eircode (example: D02 X285)">
									</div>

									<!-- Container for Viewing Times -->
									<div class="inputbox">
										<label for="viewing_times">Viewing Times: <span class="required">*</span></label><br>
										<select name="viewing_times" id="viewing_times" required>
											<option value="">Select viewing time</option>
											<option value="monday">Monday (9am – 5pm)</option>
											<option value="tuesday">Tuesday (9am – 5pm)</option>
											<option value="wednesday">Wednesday (9am – 5pm)</option>
											<option value="thursday">Thursday (9am – 5pm)</option>
											<option value="friday">Friday (9am – 5pm)</option>
											<option value="weekend">Weekends (5pm – 8pm)</option>
										</select>
									</div>

								</div>

								<!-- Begin Right Column -->
								<div class="col">

									<!-- Container for Asking Price -->
									<div class="inputbox">
										<label for="price">Asking Price: <span class="required">*</span></label><br>
										<!-- Min = €1, max = €100 million -->
										<input type="number" name="price" id="price" min="1" max="100000000" required title="Enter the asking price in euros">
									</div>

									<!-- Container for Acres -->
									<div class="inputbox">
										<!-- Min 1 - validation that we have atleast an acre of land, max = 100000 -->
										<label for="acres">Acres: <span class="required">*</span></label><br>
										<input type="number" name="acres" id="acres" min="1" max="100000" required title="Enter the total land size in acres">
									</div>

									<!-- Container for Quotas -->
									<div class="inputbox">
										<!-- Max set to 1 million -->
										<label for="quotas">Quotas: <span class="required">*</span></label><br>
										<input type="number" name="quotas" id="quotas" min="0" max="1000000" required title="Enter agricultural quotas if applicable">
									</div>

									<!-- Container for Buildings -->
									<div class="inputbox">
										<label for="buildings">Buildings: <span class="required">*</span></label><br>
										<textarea name="buildings" id="buildings" rows="3" required placeholder="3-bay hay shed, cattle pen, storage barn" title="Describe any buildings included with the land"></textarea>
									</div>

									<!-- Container for Residence Details -->
									<div class="inputbox">
										<label for="details">Residence Details: <span class="required">*</span></label><br>
										<textarea name="details" id="details" rows="3" required placeholder="No residence on site / Old 2-bedroom farmhouse requiring renovation" title="Provide details about any residence on the land"></textarea>
									</div>

									<!-- Container for Notes -->
									<div class="inputbox">
										<label for="notes">Notes: </label><br>
										<textarea name="notes" id="notes" rows="3" placeholder="Good road frontage, fertile soil, suitable for grazing or development (subject to planning)" title="Optional: add any extra information or comments"></textarea>
									</div>

								</div>
								<!-- End Two Column Layout -->
							</div>

							<!-- Submit/Reset buttons -->
							<div class="form-actions">
								<input type="submit" value="Add Land" name="submit" title="Submit and save this land property">
								<input type="reset" value="Reset" name="reset" title="Clear all fields and start again">										    </div>

						</fieldset>

					</div>
					<!-- End Main Form Section -->

				</div>

			</div>

		</form>

	</div>

	<!-- Link JavaScript file -->
	<script src="land.js"></script>
</body>
</html>
<!-- Name:                 AMMAR SALAH -->
<!-- Student Number:       C00313510 -->
<!-- Title:                Delete Land Property html file -->
<!-- Date:                 8 FEB 2026 -->
<!-- Project Y2 2026 -->

<!DOCTYPE html>
<?php
	session_start();
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete a Land Property</title>

	<!-- Link stylesheet  -->
	<link rel="stylesheet" href="/Land/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
	<!-- Main Content Area -->
	<div class="card">

		<!-- Set heading for the form -->
		<div class="content__top">
			<h2>Delete a Land Property</h2>
		</div>

		<!-- Start form, sending info via Post to delete-land.php -->
		<form id="landForm" action="delete-land.php" onsubmit="return confirmCheck()" method="post">

			<div class="layout">

				<!-- Include sidebar navigation menu -->
				<?php include "menu.php"; ?>

				<!-- Container for all main delete land content -->
				<div class="land-grid">

					<!-- Container for Listbox containing all land properties -->
					<div class="land-panel">
						<div class="inputbox">
							<label for="landList"><h2>Select a Land Property to Delete</h2></label>
							<!-- Calls the php script to make the dynamic listbox and insert it into the form via an include -->
							<select id="landList" name="landList" required title="Select the Land property you wish to delete">
								<option value="" disabled selected>-- Select Land Property --</option>
								<?php include "list-land.php"; ?>
							</select>
						</div>
					</div>

					<!-- Script to echo out that the land property has been deleted -->
					<?php
					if (isset($_SESSION['msg']))
					{
						$msg = htmlspecialchars($_SESSION['msg']);
						$type = $_SESSION['type'] ?? "success";

						if(!in_array($type, ["success", "error", "warn"]))
						{
							$type = "success";
						}

						echo "<div class='msg msg-$type'>
								<i class='fa-solid fa-circle-info'></i>
								<span>$msg</span>
							  </div>";

						unset($_SESSION['msg']);
						unset($_SESSION['type']);
					}
					?>

					<!-- Begin form Container -->
					<div class="land-panel">

						<fieldset>

							<legend>Delete a Land Property</legend>

							<!-- Two column layout for form fields -->
							<div class="two-col">

								<!--  Left Column -->
								<div class="col">

									<!-- Container for Status -->
									<div class="inputbox">
										<label for="status">Status: </label><br>
										<input type="text" name="status" id="status" required readonly title="Current property status">
									</div>

									<!-- Container for Address -->
									<div class="inputbox">
										<label for="adrs1">Address: </label><br>
										<input type="text" name="adrs1" id="adrs1" required title="Enter the main street address of the property">
									</div>

									<!-- Container for Location -->
									<div class="inputbox">
										<label for="location">Location: </label><br>
										<input type="text" name="location" id="location" required title="Enter the town or city where the property is located">
									</div>

									<!-- Container for Eircode -->
									<div class="inputbox">
										<!-- Pattern: Eircode 1 alpha char(upper or lowercase) followed by TWO digits, zero to one spaces any four of a alpha char or number -->
										<label for="eircode">Eircode: </label><br>
										<input type="text" name="eircode" id="eircode" required pattern="[A-Za-z]{1}\d{2}[ ]?[A-Za-z\d]{4}" title="Enter a valid Irish Eircode (example: D02 X285)">
									</div>

									<!-- Container for Viewing Times -->
									<div class="inputbox">
										<label for="viewing_times">Viewing Times: </label><br>
										<select name="viewing_times" id="viewing_times" required>
											<option value=""></option>
											<option value="monday">Monday (9am – 5pm)</option>
											<option value="tuesday">Tuesday (9am – 5pm)</option>
											<option value="wednesday">Wednesday (9am – 5pm)</option>
											<option value="thursday">Thursday (9am – 5pm)</option>
											<option value="friday">Friday (9am – 5pm)</option>
											<option value="weekend">Weekends (5pm – 8pm)</option>
										</select>
									</div>

								</div>

								<!--  Right Column -->
								<div class="col">

									<!-- Container for Asking Price -->
									<div class="inputbox">
										<label for="price">Asking Price: </label><br>
										<!-- Min = €1, max = €100 million -->
										<input type="number" name="price" id="price" min="1" max="100000000" required title="Enter the asking price in euros">
									</div>

									<!-- Container for Acres -->
									<div class="inputbox">
										<!-- Min 1 - validation that we have atleast an acre of land, max = 100000 -->
										<label for="acres">Acres: </label><br>
										<input type="number" name="acres" id="acres" min="1" max="100000" required title="Enter the total land size in acres">
									</div>

									<!-- Container for Quotas -->
									<div class="inputbox">
										<!-- Max set to 1 million -->
										<label for="quotas">Quotas: </label><br>
										<input type="number" name="quotas" id="quotas" min="0" max="1000000" required title="Enter agricultural quotas if applicable">
									</div>

									<!-- Container for Buildings -->
									<div class="inputbox">
										<label for="buildings">Buildings: </label><br>
										<textarea name="buildings" id="buildings" rows="3" required title="Describe any buildings included with the land"></textarea>
									</div>

									<!-- Container for Residence Details -->
									<div class="inputbox">
										<label for="details">Residence Details: </label><br>
										<textarea name="details" id="details" rows="3" required title="Provide details about any residence on the land"></textarea>
									</div>

									<!-- Container for Notes -->
									<div class="inputbox">
										<label for="notes">Notes: </label><br>
										<textarea name="notes" id="notes" rows="3" title="Optional: add any extra information or comments"></textarea>
									</div>

								</div>
								<!-- End Two Column Layout -->
							</div>

							<!-- Submit/Reset buttons -->
							<div class="form-actions">
								<input type="submit" value="Delete Land" name="delete" title="Delete this land property">
								<input type="reset" value="Reset" name="reset" title="Clear all fields and start again">
							</div>

						</fieldset>

					</div>
					<!-- End Form Container -->

				</div>

			</div>

		</form>

	</div>

	<!-- Link JavaScript file  -->
	<script src="deleteland.js"></script>
</body>
</html>
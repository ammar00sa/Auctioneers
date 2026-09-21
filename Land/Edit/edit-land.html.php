<!-- Name:                 AMMAR SALAH -->
<!-- Student Number:       C00313510 -->
<!-- Title:                Amend/View Land Property html file -->
<!-- Date:                 19 FEB 2026 -->
<!-- Project Y2 2026 -->


<?php
	// Start session for flash message display after record update
	session_start();

	// Set variable for filter value, default is all properties
	$filterVal = isset($_POST['filter']) ? $_POST['filter'] : "all";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Amend/View a Land Property</title>

	<!-- Link  css stylesheet   -->
	<link rel="stylesheet" href="/Land/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
	<!-- Main Content Area -->
	<div class="card">

		<!-- Set heading for the form -->
		<div class="content__top">
			<h2>Amend/View a Land Property</h2>
		</div>

		<!-- Start form, sending info via Post back to edit-land.html.php for filtering -->
		<!-- Save Changes button overrides the action and sends info to edit-land.php -->
		<form id="landForm" action="edit-land.html.php" method="post" onsubmit="return confirmAmendSubmit()">

			<div class="layout">

				<!-- Include sidebar navigation menu -->
				<?php include "menu.php"; ?>

				<!-- Container for all main amend/view land content -->
				<div class="land-grid">

					<!-- Hidden input used for identifying what action the user performed -->
					<input type="hidden" id="actionType" name="actionType" value="">
					<!-- Hidden input used for storing the related client id -->
					<input type="hidden" id="client_id" name="client_id" value="">

					<!-- Container for filter and property selection -->
					<div class="land-panel">

						<!-- Container for Property Filter -->
						<div class="inputbox">
							<label for="filter">Filter Properties</label>

							<!-- On change, submit the form back to this page and set action type to filter -->
							<select id="filter" name="filter" onchange="document.getElementById('actionType').value='filter'; this.form.submit();" title="Filter by sold/unsold properties">
								<option value="all" <?php if($filterVal=="all") echo "selected"; ?>>All Properties</option>
								<option value="sold" <?php if($filterVal=="sold") echo "selected"; ?>>Sold Properties</option>
								<option value="unsold" <?php if($filterVal=="unsold") echo "selected"; ?>>Unsold Properties</option>
							</select>
						</div>

						<!-- Container for Listbox containing all land properties -->
						<div class="inputbox">
							<label for="landList"></label>

							<!-- Calls the php script to make the dynamic listbox and insert it into the form via an include -->
							<select id="landList" name="landList" required title="Select the Land property you wish to view/amend">
								<option value="" disabled selected>-- Select Land Property --</option>
								<?php include "list-land-edit.php"; ?>
							</select>
						</div>

					</div>

					<!-- Script which checks if the session variable has been set for when a land property has been amended, if so, echo a message out -->
					<?php
					if (isset($_SESSION['msg']))
					{
						$msg = htmlspecialchars($_SESSION['msg']);
						$type = $_SESSION['type'] ?? "success";

						if(!in_array($type, ["success","error","warn"]))
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

							<!-- Land Specific Details -->
							<legend>Land Details</legend>

							<!-- Two column layout for form fields -->
							<div class="two-col">

								<!--  Left Column -->
								<div class="col">

									<!-- Container for Status -->
									<div class="inputbox">
										<label for="status">Status <span class="required">*</span></label>
										<input type="text" id="status" name="status" readonly>
									</div>

									<!-- Container for Address -->
									<div class="inputbox">
										<label for="adrs1">Address <span class="required">*</span></label>
										<input type="text" id="adrs1" name="adrs1" required>
									</div>

									<!-- Container for Location -->
									<div class="inputbox">
										<label for="location">Location <span class="required">*</span></label>
										<input type="text" id="location" name="location" required>
									</div>

									<!-- Container for Eircode -->
									<div class="inputbox">
										<!-- Pattern: Eircode 1 alpha char(upper or lowercase) followed by TWO digits, zero to one spaces any four of a alpha char or number -->
										<label for="eircode">Eircode <span class="required">*</span></label>
										<input type="text" id="eircode" name="eircode" required pattern="[A-Za-z]{1}\d{2}[ ]?[A-Za-z\d]{4}">
									</div>

									<!-- Container for Viewing Times -->
									<div class="inputbox">
										<label for="viewing_times">Viewing Times <span class="required">*</span></label>
										<select id="viewing_times" name="viewing_times" required>
											<option value=""></option>
											<option value="monday">Monday (9am – 5pm)</option>
											<option value="tuesday">Tuesday (9am – 5pm)</option>
											<option value="wednesday">Wednesday (9am – 5pm)</option>
											<option value="thursday">Thursday (9am – 5pm)</option>
											<option value="friday">Friday (9am – 5pm)</option>
											<option value="weekend">Weekends (5pm – 8pm)</option>
										</select>
									</div>

									<!-- Container for Client Name -->
									<div class="inputbox">
										<label for="client_name">Client Name</label>
										<input type="text" id="client_name" name="client_name">
									</div>

								</div>

								<!--  Right Column -->
								<div class="col">

									<!-- Container for Asking Price -->
									<div class="inputbox">
										<label for="price">Asking Price <span class="required">*</span></label>
										<!-- Min = €1, max = €100 million -->
										<input type="number" id="price" name="price" min="1" max="100000000" required>
									</div>

									<!-- Container for Acres -->
									<div class="inputbox">
										<!-- Min 1 - validation that we have atleast an acre of land, max = 100000 -->
										<label for="acres">Acres <span class="required">*</span></label>
										<input type="number" id="acres" name="acres" min="1" max="100000" required>
									</div>

									<!-- Container for Quotas -->
									<div class="inputbox">
										<!-- Max set to 1 million -->
										<label for="quotas">Quotas <span class="required">*</span></label>
										<input type="number" id="quotas" name="quotas" min="0" max="1000000" required>
									</div>

									<!-- Container for Highest Bid -->
									<div class="inputbox">
										<label for="highest_bid">Highest Bid</label>
										<input type="number" id="highest_bid" name="highest_bid" readonly>
									</div>

									<!-- Container for Buildings -->
									<div class="inputbox">
										<label for="buildings">Buildings <span class="required">*</span></label>
										<textarea id="buildings" name="buildings" rows="3" required></textarea>
									</div>

									<!-- Container for Residence Details -->
									<div class="inputbox">
										<label for="details">Residence Details <span class="required">*</span></label>
										<textarea id="details" name="details" rows="3" required></textarea>
									</div>

									<!-- Container for Notes -->
									<div class="inputbox">
										<label for="notes">Notes</label>
										<textarea id="notes" name="notes" rows="3"></textarea>
									</div>

								</div>
								<!-- End Two Column Layout -->
							</div>

							<!-- Submit/Reset buttons -->
							<div class="form-actions">
								<input type="button" value="Amend Details" id="amendBtn">
								<input type="submit" value="Save Changes" name="save" id="saveBtn" formaction="edit-land.php" onclick="document.getElementById('actionType').value='save';">
								<input type="button" value="Reset" onclick="window.location.reload();">
							</div>

						</fieldset>
					</div>
					<!-- End Form Container -->

				</div>

			</div>

		</form>

	</div>

	<!-- Link JavaScript file -->
	<script src="editland.js"></script>
</body>
</html>
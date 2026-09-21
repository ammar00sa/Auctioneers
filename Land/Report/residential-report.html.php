<!-- Name:                 AMMAR SALAH -->
<!-- Student Number:       C00313510 -->
<!-- Title:                Residential Property Report html/php file -->
<!-- Date:                 19 FEB 2026 -->
<!-- Project Y2 2026 -->

<?php
	// Include connection file
	include "db.inc.php";

	// Set variable for sort order, default is asking price
	$order = isset($_POST['order']) ? $_POST['order'] : "price";

	// Prepare the statement for the SELECT query on Residential
	// Highest bid is got using a subquery on the Bid table, if no bids exist return 0
	$sql = "SELECT R.ResidentialID,
				   R.Address,
				   R.Type,
				   R.NumBedrooms,
				   R.NumReception,
				   R.Status,
				   R.AskingPrice,
				   R.ClientID,
				   COALESCE(
					 (SELECT MAX(B.BidAmount)
					  FROM Bid B
					  WHERE B.ResidentialID = R.ResidentialID
						AND B.Dflag = 0
					 ), 0
				   ) AS HighestBid
			FROM Residential R
			WHERE R.Dflag = 0
			  AND (R.Status = 'For Sale' OR R.Status = 'Sale Agreed')";

	// If sorting by bedrooms, order by bedrooms first then asking price
	if ($order == "bedrooms")
	{
		$sql .= " ORDER BY R.NumBedrooms ASC, R.AskingPrice ASC";
	}
	// Otherwise sort by asking price
	else
	{
		$sql .= " ORDER BY R.AskingPrice ASC";
	}

	// Error handling, if a problem with the query, print a relevant message
	if(!$result = mysqli_query($con, $sql))
	{
		// Die kills rest of script
		die("Error loading residential report: " . mysqli_error($con));
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Residential Property Report</title>

	<!-- Link local stylesheet for page layout  -->
	<link rel="stylesheet" href="style.css">
	<!-- Link Font stylesheet for icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
	<!-- Main Content Area -->
	<div class="card">

		<!-- Set heading for the page -->
		<div class="content__top">
			<h2>Residential Property Report</h2>
		</div>

		<div class="layout">

			<!-- Include sidebar navigation menu -->
			<?php include "menu.php"; ?>

			<!-- Container for all main report content -->
			<div class="land-grid">

				<!-- Container for sort buttons -->
				<div class="land-panel">

					<!-- Start form for sorting, sending info via Post back to the same page -->
					<form id="orderForm" method="post" action="residential-report.html.php">
						<div class="form-actions sort-actions">

							<!-- Button for sorting by asking price -->
							<button type="submit"
									name="order"
									value="price"
									class="sort-btn"
									<?php if ($order == "price") echo "disabled"; ?>
									title="Sort by asking price (ascending)">
								Sort by Price
							</button>

							<!-- Button for sorting by bedrooms then asking price -->
							<button type="submit"
									name="order"
									value="bedrooms"
									class="sort-btn"
									<?php if ($order == "bedrooms") echo "disabled"; ?>
									title="Sort by number of bedrooms, then asking price">
								Sort by Bedrooms
							</button>

						</div>
					</form>

				</div>

				<!-- Container for residential property report table -->
				<div class="land-panel">
					<fieldset>

						<legend>Properties For Sale / Sale Agreed</legend>

						<!-- Overflow allows horizontal scrolling when table is too wide -->
						<div style="overflow:auto;">
							<table class="report-table">
								<thead>
									<tr>
										<th>Select</th>
										<th>Property Number</th>
										<th>Address</th>
										<th>Type of Property</th>
										<th>Num. of Bedrooms</th>
										<th>Num. of Receptions</th>
										<th>Status</th>
										<th>Highest Bid</th>
										<th>Asking Price</th>
									</tr>
								</thead>

								<tbody>
								<?php
								// Iterate through the result set
								while($row = mysqli_fetch_assoc($result))
								{
									$resID = $row['ResidentialID'];
									$address = $row['Address'];
									$type = $row['Type'];
									$beds = $row['NumBedrooms'];
									$recepts = $row['NumReception'];
									$status = $row['Status'];
									$highestBid = $row['HighestBid'];
									$price = $row['AskingPrice'];
									$clientID = $row['ClientID'];

									// Assign each record to a table row data attributes are used by javascript to store the client id and                                        residential id of the selected row
echo "<tr>
        <td>
            <input type='radio'
                   name='selectedProperty'
                   class='rowSelect'
                   data-clientid='$clientID'
                   data-resid='$resID'>
        </td>
        <td>$resID</td>
        <td>$address</td>
        <td>$type</td>
        <td>$beds</td>
        <td>$recepts</td>
        <td>$status</td>
        <td>$highestBid</td>
        <td>$price</td>
      </tr>";
}

								// Close connection
								mysqli_close($con);
								?>
								</tbody>
							</table>
						</div>

					</fieldset>

					<!-- Button for opening client information, disabled until a property is selected -->
					<div class="form-actions" style="padding-top:10px;">
						<input type="button" id="clientBtn" value="Client Information" disabled title="Select a property first, then view client details">
					</div>

				</div>

				<!-- Hidden form used for sending the selected client id to client-info.php in a new tab -->
				<form id="clientForm" action="client-info.php" method="post" target="_blank">
					<input type="hidden" name="clientid" id="clientid" value="">
				</form>

			</div>

		</div>

	</div>

	<!-- Link JavaScript file for row selection, button enabling and popup form submission -->
	<script src="residential-report.js"></script>
</body>
</html>
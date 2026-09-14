<!--
Creator: Joseph Lalor
Date: 25/03/2026
Student Number: c00312883
Title: offPropReport.html.php
Purpose: A PHP file for generating an Office Property Report-->
<!DOCTYPE html>
<html>
<head>
<title>Office Property Report</title>  <!--title-->
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
include 'db.inc.php';
date_default_timezone_set('UTC');
?>

<div class="card"> <!--class for styling purposes-->

<!-- hidden form used to resubmit the page with a chosen sort order -->
<form class="hidden" action = "offPropReport.html.php" method = "post" name = "reportForm">
<input type = "hidden" name = "choice"> <!--hidden field carries the sort choice (AskingPrice or Area) on submit-->
</form>
<header class="content__top"> <!--header css class-->
<h1>Office Property Report</h1>
</header>
<div class="layout"> <!--class for styling purposes-->

<div id="menu"><aside class="sidebar">

        <!-- Logo -->
        <div class="brand-side">
          <img src="logo.png" alt="Logo" class="brand-side__logo">
        </div>

        <!-- Navigation -->
        <nav>

          <!-- Sidebar title -->
          <div class="side-title">Reports Menu</div>

          <!-- Menu list -->
          <ul class="side-menu">

            <!-- Residential report -->
            <li>
              <a class="side-menu__link" href="/Land/Report/residential-report.html.php">
                <i class="fa-solid fa-house"></i>
                <span>Residential Property Report</span>
              </a>
            </li>

            <!-- Land report -->
            <li>
              <a class="side-menu__link" href="report-land.html">
                <i class="fa-solid fa-tree"></i>
                <span>Land Property Report</span>
              </a>
            </li>

            <!-- Office report -->
            <li>
              <a class="side-menu__link" href="https://c2p-auctioneers26.candept.com/Residential/offPropReport.html.php">
                <i class="fa-solid fa-building"></i>
                <span>Office Property Report</span>
              </a>
            </li>

            <!-- Bid / client report -->
            <li>
              <a class="side-menu__link" href="https://c2p-auctioneers26.candept.com/Office/Bid%20Report/BidReport.php">
                <i class="fa-solid fa-gavel"></i>
                <span>Bid / Client Report</span>
              </a>
            </li>

            <!-- Individual client report -->
            <li>
              <a class="side-menu__link" href="report-client.html">
                <i class="fa-solid fa-user"></i>
                <span>Individual Client Report</span>
              </a>
            </li>

            <!-- Exit -->
            <li class="danger">
              <a class="side-menu__link" href="https://c2p-auctioneers26.candept.com/Main%20Screens/reports.html">
                <i class="fa-solid fa-house"></i>
                <span>Exit</span>
              </a>
            </li>

          </ul>
        </nav>

      </aside></div> <!--sidebar styling class and adding php sidebar-->

<div class="grid"> <!--sets up styling grid as in css-->
<h4>Click a button to see the Office Property Report in the desired order</h4>
<div class="panel"> <!--panel class from css-->
<fieldset> 
<legend>Residential Property Details</legend> <!--top label of fieldset-->
<input type = 'button' id = "priceButton" value = 'Price Order'
onclick = 'priceOrder()' title = 'Click here to see offices in price order'>
<input type = 'button' id = "areaButton" value = 'Area Order'
onclick = 'areaOrder()' title = 'Click here to see offices in order of area'>
<br>
<br>
<script>
// opens client_info.php in a small popup window, passing the ClientID of the selected property
function clientInfo() {
    var selected = document.querySelector('input[name="selectid"]:checked'); // find the checked radio button
    if (!selected) {
        alert('Please select a property first!');
        return;
    }
    var clientid = selected.value;
    window.open('client_info.php?id=' + clientid, '_blank', 'width=600,height=400'); // open popup with client details
}
// sets sort choice to AskingPrice and submits the hidden form to reload the report
function priceOrder()
{
    document.reportForm.choice.value = "AskingPrice";
    document.reportForm.submit();
}
// sets sort choice to Area and submits the hidden form to reload the report
function areaOrder()
{
    document.reportForm.choice.value = "Area";
    document.reportForm.submit();
}
</script>

<?php

$choice = "AskingPrice";    // In case this is the first time through and $_POST[choice] hasn't been set
if (ISSET($_POST['choice']))
{
    $choice = $_POST['choice'];
}
if ($choice == "Area")
{
?>
    <script>
    // disable the active sort button so the user cannot re-sort by the same column
    document.getElementById("priceButton").disabled = false;
    document.getElementById("areaButton").disabled = true;
    </script>
<?php
    $sql = "SELECT * FROM Office WHERE DFlag = 0 ORDER BY AskingPrice";
    produceReport($con,$sql);
}
else //if ($choice == "Price") or the default display before any button is clicked
{
?>
    <script>
    document.getElementById("areaButton").disabled = false;
    document.getElementById("priceButton").disabled = true;
    </script>
<?php
    $sql = "SELECT * FROM Office WHERE DFlag = 0 ORDER BY Area";
    produceReport($con,$sql);
};

// builds and outputs the report table from the given query result
function produceReport($con,$sql)
{
    $result = mysqli_query($con,$sql);

    echo "<table>
            <tr><th>Select</th><th>Property Number</th><th>Address</th><th>Area</th><th>Security</th><th>Freehold / Long Lease</th><th>Status</th><th>Highest Bid</th><th>Asking Price</th></tr>";

    while ($row=mysqli_fetch_array($result))
    {
        echo    "<tr><td>".'<input type="radio" name="selectid" value='.$row['ClientID'].'>'."</td>
                <td>".$row['OfficeID']."</td>
                <td>".$row['Address']."</td>
                <td>".$row['Area']."</td>
                <td>".$row['Security']."</td>
                <td>".$row['OwnershipType']."</td>
                <td>".$row['Status']."</td>
                <td>".( function() use ($con, $row) {
    $officeID = mysqli_real_escape_string($con, $row['OfficeID']);
    $bidSql = "SELECT MAX(BidAmount) AS HighestBid FROM Bid WHERE OfficeID = '$officeID'";
    $bidResult = mysqli_query($con, $bidSql);
    $bidRow = mysqli_fetch_array($bidResult);
    return ($bidRow['HighestBid'] !== null) ? $bidRow['HighestBid'] : 0;
} )()."</td>
                <td>".$row['AskingPrice']."</td>
                </tr>";
    }

    echo "</table>";
}

mysqli_close($con);
?>
<input type = 'button' id = "clientButton" value = 'Client Information'
onclick = 'clientInfo()' title = 'Click here to see info on client'>
</fieldset>
</div>
</div>
</div>
</div>
</body>
</html>
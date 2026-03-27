<!-- Name of the screen:  Bid Report -->
<!--Purpose of screen:   Displays the Bid Report, given the option to show in reverse date order  (Frontend) -->
<!--Student ID: C00313475 -->
<!--Student Name: Oyindamola Olaosun  -->
<!-- Date Written: 19th March, 2026 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bid Report</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include 'db.inc.php';
        //  sets the default timezone used by all date/time functions in the script
        date_default_timezone_set('UTC');
    ?>

    <div class="card">
        <div class="content__top">
            <h2>Bid Report</h2>
        </div>

        <div class="layout">
            <!-- Menu Bar -->
            <aside class="sidebar">
                <div class="brand-side">
                    <img src="logo.png" alt="Logo" class="brand-side__logo"/>
                </div>
                <nav>
                    <div class="side-title">Property Maintenance</div>
                    <ul class="side-menu">
                        <li><a class="side-menu__link" href="https://c2p-auctioneers26.candept.com/Office/Add%20Office%20Property/AddOffice.html.php"><i class="fa-solid fa-building"></i><span>Add a New Office Property</span></a></li>
                        <li><a class="side-menu__link" href="https://c2p-auctioneers26.candept.com/Office/Delete%20Office%20Property/ShowOfficeDelete.html.php"><i class="fa-solid fa-trash"></i><span>Delete an Office Property</span></a></li>
                        <li><a class="side-menu__link" href="https://c2p-auctioneers26.candept.com/Office/AmendView%20Office%20Property/AmendViewOffice.html.php"><i class="fa-solid fa-pen-to-square"></i><span>Amend/View an Office Property</span></a></li>
                        <li class="danger"><a class="side-menu__link" href="https://c2p-auctioneers26.candept.com/Main%20Screens/home.html"><i class="fa-solid fa-house"></i><span>Exit</span></a></li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="land-grid">

                <!-- Property Type Selection Panel — dark panel (first-of-type) -->
                <div class="land-panel">
                    <form action="BidReport.php" method="post" name="reportForm">
                        <div class="inputbox">
                            <label for="propertyType">Select Property Type: </label>
                            <select name="propertyType" id="propertyType" required>
                                <option value="">---Choose Property Type---</option>
                                <option value="Office">Office</option>
                                <option value="Residential">Residential</option>
                                <option value="Land">Land</option>
                            </select>
                        </div>
                        <div class="form-actions">
                            <input type="submit" value="Generate Bid Report">
                        </div>
                    </form>
                </div>

                <!-- Report Results Panel -->
                <div class="land-panel">
                    <?php 
                        if(isset($_POST['propertyType']) && $_POST['propertyType'] != ""){
                            $type = $_POST['propertyType'];

                            // SQL 1 — Get all properties of chosen type that are for sale
                            $propertySql = "SELECT * FROM $type WHERE Dflag = 0 AND Status = 'For Sale'";

                            $resultProperty = mysqli_query($con, $propertySql);

                            if(!$resultProperty){
                                die("Error retrieving properties: " . mysqli_error($con));
                            }

                            echo "<h3>Bid Report for $type Properties - Latest Bids First</h3>";

                            //  report-table
                            echo "<table class='report-table'>
                                    <tr>
                                        <th>Property Number</th>
                                        <th>Address</th>
                                        <th>Client Number</th>
                                        <th>Client Name</th>
                                        <th>Bid Amount</th>
                                        <th>Bid Date</th>
                                        <th>Select</th>
                                    </tr>";

                            // Loop through each property
                            while($rowProperty = mysqli_fetch_array($resultProperty)){
                                if($type == "Office"){
                                    $propertyID = $rowProperty['OfficeID'];
                                    $idColumn   = "OfficeID";
                                }
                                else if($type == "Residential"){
                                    $propertyID = $rowProperty['ResidentialID'];
                                    $idColumn   = "ResidentialID";
                                }
                                else{
                                    $propertyID = $rowProperty['LandID'];
                                    $idColumn   = "LandID";
                                }

                                $address = $rowProperty['Address'];

                                // SQL 2 — Get all bids for this property in reverse date order
                                $sqlBid = "SELECT * FROM Bid
                                           WHERE $idColumn = '$propertyID'
                                           AND Dflag = 0
                                           ORDER BY BidDate DESC";

                                $resultBid = mysqli_query($con, $sqlBid);

                                if(!$resultBid){
                                    die("Error retrieving bids: " . mysqli_error($con));
                                }

                                // Loop through each bid for this property
                                while($rowBid = mysqli_fetch_array($resultBid)){

                                    // SQL 3 — Get client details for this bid
                                    $sqlClient = "SELECT * FROM Client WHERE ClientID = '".$rowBid['ClientID']."'";

                                    $resultClient = mysqli_query($con, $sqlClient);
                                    if(!$resultClient){
                                        die("Error retrieving client: " . mysqli_error($con));
                                    }
                                    $rowClient = mysqli_fetch_array($resultClient);

                                    // Format date
                                    $date  = date_create($rowBid['BidDate']);
                                    $FDate = date_format($date, "d/m/Y");
                                    //Escaping apostrophe in the name e.g Michael O'Hanlon
                                    $clientName = htmlspecialchars($rowClient['Name'], ENT_QUOTES);
                                    echo "<tr>
                                            <td>".$propertyID."</td>
                                            <td>".$address."</td>
                                            <td>".$rowBid['ClientID']."</td>
                                            <td>".$rowClient['Name']."</td>
                                            <td>€".$rowBid['BidAmount']."</td>
                                            <td>".$FDate."</td>
                                            <td>
                                                <input type='radio' name='selectedBid'
                                                value='".$rowBid['BidID']."|".$rowBid['ClientID']."|".$clientName."|".$rowClient['Email']."|".$rowClient['Phone']."'
                                                onclick='storeBid(this.value)'>
                                            </td>
                                          </tr>";
                                }
                            }

                            echo "</table>";

                            // sort-actions and sort-btn classes from CSS
                            echo "<br>";
                            echo "<div class='form-actions sort-actions'>
                                    <input type='button' class='sort-btn' value='Client Information' onclick='showClientInfo()' title='Select a bid first then click here'>
                                  </div>";
                        }
                    ?>
                </div>

            </div>
        </div>
    </div>

    <script>
        var selectedBidData = "";

        // Store the selected bid data from radio button
        function storeBid(value){
            selectedBidData = value;
        }

        // Show client info in a popup window
        function showClientInfo(){
            if(selectedBidData === ""){
                alert("Please select a bid first.");
                return;
            }

            var details   = selectedBidData.split('|');
            var bidID     = details[0];
            var clientID  = details[1];
            var name      = details[2];
            var email     = details[3];
            var phone     = details[4];

            //A browser trick to decode HTML entities back to normal characters
            var txt = document.createElement("textarea");
            txt.innerHTML = name;
            name = txt.value;

            // Opens a popup window with client details
            var popup = window.open("", "Client Information", "width=400,height=300");
            popup.document.write("<h2>Client Information</h2>");
            popup.document.write("<p><strong>Client ID:</strong> " + clientID + "</p>");
            popup.document.write("<p><strong>Name:</strong> " + name + "</p>");
            popup.document.write("<p><strong>Email:</strong> " + email + "</p>");
            popup.document.write("<p><strong>Phone:</strong> " + phone + "</p>");
            popup.document.write("<br><input type='button' value='Close' onclick='window.close()'>");
        }
    </script>

</body>
</html>
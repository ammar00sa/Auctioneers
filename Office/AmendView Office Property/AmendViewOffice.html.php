<!-- Name of the screen:  Amend/View an Office Property -->
<!-- Purpose of screen:   Select Office property for either amending or viewing its details (Frontend) -->
<!-- Student ID: C00313475 -->
<!-- Student Name: Oyindamola Olaosun -->
<!-- Date Written: 13th March, 2026 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amend/View Office</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <script>
        // Filling the form below with the data
        function populate() {
            var sel = document.getElementById("listOffice");
            var result;

            // Selected option using selectedIndex
            // The selectedIndex property sets or returns the index of the selected option in a drop-down list.
            result = sel.options[sel.selectedIndex].value;

            // Stop if default option is selected
            if (result === 'default') return;

            var officeDetails = result.split('|');
            document.getElementById("amendofficeid").value    = officeDetails[0];
            document.getElementById("amendaddress").value     = officeDetails[1];
            document.getElementById("amendeircode").value     = officeDetails[2];
            document.getElementById("amendlocation").value    = officeDetails[3];
            document.getElementById("showstatus").value       = officeDetails[4];
            document.getElementById("amendaskingprice").value = officeDetails[5];
            document.getElementById("amendviewingtime").value = officeDetails[6];
            document.getElementById("amendinternet").value    = officeDetails[7];
            document.getElementById("amendownershiptype").value = officeDetails[8];
            document.getElementById("amendreception").value   = officeDetails[9];
            document.getElementById("amendarea").value        = officeDetails[10];
            document.getElementById("amendfloor").value       = officeDetails[11];
            document.getElementById("amendlayout").value      = officeDetails[12];
            document.getElementById("amendtel").value         = officeDetails[13];
            document.getElementById("amendaccess").value      = officeDetails[14];
            document.getElementById("amendsecurity").value    = officeDetails[15];
            document.getElementById("amendcanteen").value     = officeDetails[16];
            document.getElementById("showhighestbid").value   = officeDetails[17];
        }

        // Toggle between Amend or View Details
        // Disabled input fields for the view options
        function toggleLock() {
            if (document.getElementById("amendViewbutton").value === "Amend Details") {
                document.getElementById("amendaddress").disabled      = false;
                document.getElementById("amendeircode").disabled      = false;
                document.getElementById("amendlocation").disabled     = false;
                document.getElementById("amendviewingtime").disabled  = false;
                document.getElementById("amendaskingprice").disabled  = false;
                document.getElementById("amendinternet").disabled     = false;
                document.getElementById("amendownershiptype").disabled = false;
                document.getElementById("amendreception").disabled    = false;
                document.getElementById("amendarea").disabled         = false;
                document.getElementById("amendfloor").disabled        = false;
                document.getElementById("amendlayout").disabled       = false;
                document.getElementById("amendtel").disabled          = false;
                document.getElementById("amendaccess").disabled       = false;
                document.getElementById("amendsecurity").disabled     = false;
                document.getElementById("amendcanteen").disabled      = false;
                document.getElementById("amendViewbutton").value      = "View Details";
            } else {
                document.getElementById("amendaddress").disabled      = true;
                document.getElementById("amendeircode").disabled      = true;
                document.getElementById("amendlocation").disabled     = true;
                document.getElementById("amendviewingtime").disabled  = true;
                document.getElementById("amendaskingprice").disabled  = true;
                document.getElementById("amendinternet").disabled     = true;
                document.getElementById("amendownershiptype").disabled = true;
                document.getElementById("amendreception").disabled    = true;
                document.getElementById("amendarea").disabled         = true;
                document.getElementById("amendfloor").disabled        = true;
                document.getElementById("amendlayout").disabled       = true;
                document.getElementById("amendtel").disabled          = true;
                document.getElementById("amendaccess").disabled       = true;
                document.getElementById("amendsecurity").disabled     = true;
                document.getElementById("amendcanteen").disabled      = true;
                document.getElementById("amendViewbutton").value      = "Amend Details";
            }
        }

        // Confirmation for the user wanting to save edits
        function confirmCheck() {
            var response;
            response = confirm('Are you sure you want to save these changes?');

            if (response) {
                document.getElementById("amendaddress").disabled      = false;
                document.getElementById("amendeircode").disabled      = false;
                document.getElementById("amendlocation").disabled     = false;
                document.getElementById("amendviewingtime").disabled  = false;
                document.getElementById("amendaskingprice").disabled  = false;
                document.getElementById("amendinternet").disabled     = false;
                document.getElementById("amendownershiptype").disabled = false;
                document.getElementById("amendreception").disabled    = false;
                document.getElementById("amendarea").disabled         = false;
                document.getElementById("amendfloor").disabled        = false;
                document.getElementById("amendlayout").disabled       = false;
                document.getElementById("amendtel").disabled          = false;
                document.getElementById("amendaccess").disabled       = false;
                document.getElementById("amendsecurity").disabled     = false;
                document.getElementById("amendcanteen").disabled      = false;
                return true;
            } else {
                populate();
                toggleLock();
                return false;
            }
        }

        // Function to choose to list all sold or unsold properties
        function filterOffices() {
            // The list box
            var filter = document.getElementById("filterStatus").value;
            // Office list box
            var select = document.getElementById("listOffice");
            // Option elements in the list box
            var options = select.options;

            // Loops through all the office properties
            for (var i = 0; i < options.length; i++) {
                var optionValue  = options[i].value;
                var officeDetails = optionValue.split('|');
                // Initializing the status field (index 4)
                var status = officeDetails[4];

                // Conditions for the filter function
                if (filter === 'all') {
                    options[i].style.display = '';
                } else if (filter === 'unsold' && (status === 'For Sale' || status === 'Sale Agreed')) {
                    options[i].style.display = '';
                } else if (filter === 'sold' && status === 'Sale Completed') {
                    options[i].style.display = '';
                } else {
                    options[i].style.display = 'none';
                }
            }

            // Reset the form when filter changes
            select.selectedIndex = 0;
            document.getElementById("amendaddress").value       = '';
            document.getElementById("amendeircode").value       = '';
            document.getElementById("amendlocation").value      = '';
            document.getElementById("showstatus").value         = '';
            document.getElementById("amendaskingprice").value   = '';
            document.getElementById("amendviewingtime").value   = '';
            document.getElementById("amendinternet").value      = '';
            document.getElementById("amendownershiptype").value = '';
            document.getElementById("amendreception").value     = '';
            document.getElementById("amendarea").value          = '';
            document.getElementById("amendfloor").value         = '';
            document.getElementById("amendlayout").value        = '';
            document.getElementById("amendtel").value           = '';
            document.getElementById("amendaccess").value        = '';
            document.getElementById("amendsecurity").value      = '';
            document.getElementById("amendcanteen").value       = '';
            document.getElementById("showhighestbid").value     = '';
        }
    </script>

    <div class="card">

        <div class="content__top">
            <h2>Amend/View Office Property</h2>
            <h4>Please select an office property and then click the amend button if you wish to update</h4>
        </div>

        <!-- Amend / View Form -->
        <form action="AmendViewOffice.php" method="post" name="myForm" onsubmit="return confirmCheck()">
            <div class="layout">

                <aside class="sidebar">
                    <div class="brand-side">
                        <img src="logo.png" alt="Logo" class="brand-side__logo"/>
                    </div>

                    <nav>
                        <div class="side-title">Property Maintenance</div>
                        <ul class="side-menu">
                            <li>
                                <a class="side-menu__link" href="https://c2p-auctioneers26.candept.com/Office/Add%20Office%20Property/AddOffice.html.php">
                                    <i class="fa-solid fa-building"></i>
                                    <span>Add a New Office Property</span>
                                </a>
                            </li>
                            <li>
                                <a class="side-menu__link" href="https://c2p-auctioneers26.candept.com/Office/Delete%20Office%20Property/ShowOfficeDelete.html.php">
                                    <i class="fa-solid fa-trash"></i>
                                    <span>Delete an Office Property</span>
                                </a>
                            </li>
                            <li>
                                <a class="side-menu__link" href="https://c2p-auctioneers26.candept.com/Office/AmendView%20Office%20Property/AmendViewOffice.html.php">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <span>Amend/View an Office Property</span>
                                </a>
                            </li>
                            <li class="danger">
                                <a class="side-menu__link" href="https://c2p-auctioneers26.candept.com/Main%20Screens/home.html">
                                    <i class="fa-solid fa-house"></i>
                                    <span>Exit</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </aside>

                <div class="office-grid">
                    <div class="office-panel">

                        <!-- Filter for Sold and Unsold properties -->
                        <div class="inputbox">
                            <label for="filterStatus" id="filter-label">Filter by Status: </label>
                            <select name="filterStatus" id="filterStatus" onchange="filterOffices()">
                                <option value="all">All Properties</option>
                                <option value="unsold">Unsold (For Sale / Sale Agreed)</option>
                                <option value="sold">Sold (Sale Completed)</option>
                            </select>
                        </div>

                        <div class="inputbox">
                            <!-- List box for all office properties -->
                            <label for="listOffice"><span class="required"></span></label>
                            <select name="listOffice" id="listOffice" onclick="populate()">
                                <option value="default">--Office List--</option>
                                <?php include "ListOffice.php"; ?>
                            </select>
                        </div>

                    </div>

                    <!-- A unique property number is allocated and displayed on the screen -->
                    <!-- Knowledge of redirecting -->
                    <?php
                        if (isset($_GET['status'])) {
                            if ($_GET['status'] === 'success') {
                                echo '<p style="color: #0b1220;">ⓘOffice ID: <strong>' . $_GET['amendofficeid'] . '</strong> has been updated successfully.</p>';
                            } else if ($_GET['status'] === 'nochange') {
                                echo '<p style="color: #0b1220;">ⓘNo changes were made to the record.</p>';
                            } else {
                                echo '<p style="color: #0b1220;">ⓘAn error occurred. Please try again.</p>';
                            }
                        }
                    ?>

                    <div class="office-panel">
                        <fieldset>
                            <legend>Office Details</legend>

                            <!-- Form to amend/view -->
                            <input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()" class="toggleBtn">

                            <div class="two-col">
                                <div class="col">

                                    <div class="inputbox" hidden>
                                        <label for="amendofficeid" hidden>Office ID: </label>
                                        <input type="text" name="amendofficeid" id="amendofficeid" hidden>
                                    </div>

                                    <div class="inputbox">
                                        <label for="amendaddress">Address: </label>
                                        <input type="text" name="amendaddress" id="amendaddress" disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="amendeircode">Eircode: </label>
                                        <input type="text" name="amendeircode" id="amendeircode"
                                            title="Enter Eircode"
                                            pattern="^[A-Za-z][0-9]{2}[A-Za-z0-9]{4}$"
                                            disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="amendlocation">Location: </label>
                                        <input type="text" name="amendlocation" id="amendlocation"
                                            title="Enter location..."
                                            pattern="[A-Za-z\s\.,]+"
                                            disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="amendfloor">Floor: </label>
                                        <input type="number" name="amendfloor" id="amendfloor"
                                            title="Enter floor number..."
                                            min="1"
                                            disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="amendarea">Area (in square m²): </label>
                                        <input type="number" name="amendarea" id="amendarea"
                                            step="0.01"
                                            min="37"
                                            title="Enter area..."
                                            disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="amendaskingprice">Asking Price: </label>
                                        <input type="number" name="amendaskingprice" id="amendaskingprice"
                                            title="Enter asking price...."
                                            step="0.01"
                                            disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="amendtel">Tel: </label>
                                        <input type="text" id="amendtel" name="amendtel"
                                            title="Phone Number"
                                            pattern="[0-9\s\-\(\)]+"
                                            disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="amendreception">Reception: </label>
                                        <input type="text" id="amendreception" name="amendreception" disabled>
                                    </div>
                                    <div class="inputbox">
                                        <!-- Status cannot be altered -->
                                        <label for="showstatus">Status: </label>
                                        <input type="text" id="showstatus" name="showstatus" disabled>
                                    </div>

                                </div>

                                <div class="col">
                                    <div class="inputbox">
                                        <label for="amendlayout">Layout: </label>
                                        <input type="text" id="amendlayout" name="amendlayout"
                                            title="Layout"
                                            disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="amendinternet">Internet: </label>
                                        <input type="text" name="amendinternet" id="amendinternet"
                                            title="Internet.."
                                            disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="amendaccess">Access: </label>
                                        <input type="text" name="amendaccess" id="amendaccess" disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="amendsecurity">Security: </label>
                                        <input type="text" name="amendsecurity" id="amendsecurity" disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="amendcanteen">Canteen: </label>
                                        <input type="text" name="amendcanteen" id="amendcanteen" disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="amendownershiptype">Ownership Type: </label>
                                        <input type="text" name="amendownershiptype" id="amendownershiptype"
                                            title="Ownership"
                                            disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="amendviewingtime">Viewing Time: </label>
                                        <input type="text" name="amendviewingtime" id="amendviewingtime" disabled>
                                    </div>
                                    <!-- Highest bid can never be altered -->
                                    <div class="inputbox">
                                        <label for="showhighestbid">Highest Bid: </label>
                                        <input type="text" name="showhighestbid" id="showhighestbid" value="0" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <input type="submit" value="Save Changes">
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>
</html>
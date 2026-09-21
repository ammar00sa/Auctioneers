<!-- Name of the screen:  Delete an Office Property -->
<!-- Purpose of screen:   Select Office property for soft delete (Frontend) -->
<!-- Student ID: C00313475 -->
<!-- Student Name: Oyindamola Olaosun -->
<!-- Date Written: 9th March, 2026 -->

<?php
    // Start of a session
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Office Property</title>
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
            document.getElementById("delofficeid").value    = officeDetails[0];
            document.getElementById("deladdress").value     = officeDetails[1];
            document.getElementById("deleircode").value     = officeDetails[2];
            document.getElementById("dellocation").value    = officeDetails[3];
            document.getElementById("delstatus").value      = officeDetails[4];
            document.getElementById("delaskingprice").value = officeDetails[5];
            document.getElementById("delviewingtime").value = officeDetails[6];
            document.getElementById("delinternet").value    = officeDetails[7];
            document.getElementById("delownershiptype").value = officeDetails[8];
            document.getElementById("delreception").value   = officeDetails[9];
            document.getElementById("delarea").value        = officeDetails[10];
            document.getElementById("delfloor").value       = officeDetails[11];
            document.getElementById("dellayout").value      = officeDetails[12];
            document.getElementById("deltel").value         = officeDetails[13];
            document.getElementById("delaccess").value      = officeDetails[14];
            document.getElementById("delsecurity").value    = officeDetails[15];
            document.getElementById("delcanteen").value     = officeDetails[16];

            var highestBid = officeDetails[17];
            // If there is a bid on the property, message flagged to the user
            if (highestBid > 0) {
                alert("Warning: This property has an existing bid of $" + highestBid + ". All associated bids will also be deleted!");
            }
        }

        // Confirm if the user wants to delete
        function confirmCheck() {
            var response;
            response = confirm('Are you sure you want to delete this property?');

            if (response) {
                document.getElementById("deladdress").disabled      = false;
                document.getElementById("deleircode").disabled      = false;
                document.getElementById("dellocation").disabled     = false;
                document.getElementById("delviewingtime").disabled  = false;
                document.getElementById("delaskingprice").disabled  = false;
                document.getElementById("delinternet").disabled     = false;
                document.getElementById("delownershiptype").disabled = false;
                document.getElementById("delreception").disabled    = false;
                document.getElementById("delarea").disabled         = false;
                document.getElementById("delfloor").disabled        = false;
                document.getElementById("dellayout").disabled       = false;
                document.getElementById("deltel").disabled          = false;
                document.getElementById("delaccess").disabled       = false;
                document.getElementById("delsecurity").disabled     = false;
                document.getElementById("delcanteen").disabled      = false;
                return true;
            } else {
                populate();
                return false;
            }
        }
    </script>

    <div class="card">

        <div class="content__top">
            <h2>Delete Office Property</h2>
            <h4>Please select a person and then click the delete button</h4>
        </div>

        <form action="DeleteOffice.php" method="post" onsubmit="confirmCheck()">
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
                        <div class="inputbox">
                            <!-- Office list box -->
                            <label for="listOffice"><span class="required"></span></label>
                            <select id="listOffice" name="listOffice" required onclick="populate()">
                                <option value="default">--Office List--</option>
                                <?php include "ListOffice.php"; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Message displayed that the office property has been deleted -->
                    <?php
                        if (isset($_GET['status'])) {
                            if ($_GET['status'] === 'success') {
                                echo '<p style="color: #0b1220;">ⓘOffice ID: <strong>' . $_GET['officeid'] . '</strong> (' . $_SESSION['address'] . ') has been deleted successfully.</p>';
                                // Confirm bids deleted if there were any
                                if (isset($_GET['bidsdeleted']) && $_GET['bidsdeleted'] > 0) {
                                    echo '<p style="color: green;">All associated bids for this property have also been deleted.</p>';
                                }
                            } else if ($_GET['status'] === 'nochange') {
                                echo '<p style="color: #0b1220;">ⓘNo record was deleted.</p>';
                            } else {
                                echo '<p style="color: #0b1220;">ⓘAn error occurred. Please try again.</p>';
                            }
                        }
                    ?>

                    <div class="office-panel">
                        <fieldset>
                            <legend>Office Details</legend>

                            <!-- Form to view -->
                            <div class="two-col">
                                <div class="col">

                                    <div class="inputbox" hidden>
                                        <label for="delofficeid" hidden>Office ID: </label>
                                        <input type="text" name="delofficeid" id="delofficeid" hidden>
                                    </div>
                                    <div class="inputbox">
                                        <label for="deladdress">Address: </label>
                                        <input type="text" name="deladdress" id="deladdress" disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="deleircode">Eircode: </label>
                                        <input type="text" name="deleircode" id="deleircode"
                                            title="Enter Eircode"
                                            pattern="^[A-Za-z][0-9]{2}[A-Za-z0-9]{4}$"
                                            disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="dellocation">Location: </label>
                                        <input type="text" name="dellocation" id="dellocation"
                                            title="Enter location..."
                                            pattern="[A-Za-z\s\.,]+"
                                            disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="delfloor">Floor: </label>
                                        <input type="number" name="delfloor" id="delfloor"
                                            title="Enter floor number..."
                                            min="1"
                                            disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="delarea">Area: m²</label>
                                        <input type="number" name="delarea" id="delarea"
                                            step="0.01"
                                            min="37"
                                            title="Enter area..."
                                            disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="delaskingprice">Asking Price: </label>
                                        <input type="number" name="delaskingprice" id="delaskingprice"
                                            title="Enter asking price...."
                                            step="0.01"
                                            disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="deltel">Tel: </label>
                                        <input type="text" id="deltel" name="deltel"
                                            title="Phone Number"
                                            pattern="[0-9\s\-\(\)]+"
                                            disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="delreception">Reception: </label>
                                        <input type="text" id="delreception" name="delreception" disabled>
                                    </div>
                                    <div class="inputbox">
                                        <!-- The user is made aware of the status of the property,
                                             whether it is for sale, sale agreed or sale completed -->
                                        <label for="delstatus">Status: </label>
                                        <input type="text" id="delstatus" name="delstatus" disabled>
                                    </div>

                                </div>

                                <div class="col">
                                    <div class="inputbox">
                                        <label for="dellayout">Layout: </label>
                                        <input type="text" id="dellayout" name="dellayout"
                                            title="Layout"
                                            disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="delinternet">Internet: </label>
                                        <input type="text" name="delinternet" id="delinternet"
                                            title="Internet.."
                                            disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="delaccess">Access: </label>
                                        <input type="text" name="delaccess" id="delaccess" disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="delsecurity">Security: </label>
                                        <input type="text" name="delsecurity" id="delsecurity" disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="delcanteen">Canteen: </label>
                                        <input type="text" name="delcanteen" id="delcanteen" disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="delownershiptype">Ownership Type: </label>
                                        <input type="text" name="delownershiptype" id="delownershiptype"
                                            title="Ownership"
                                            disabled>
                                    </div>
                                    <div class="inputbox">
                                        <label for="delviewingtime">Viewing Time: </label>
                                        <input type="text" name="delviewingtime" id="delviewingtime" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <input type="reset" name="cancel" value="Cancel">
                                <input type="submit" value="Delete Office Property" name="submit" onclick="confirmCheck(event)">
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php
        // End of session
        session_destroy();
    ?>

</body>
</html>
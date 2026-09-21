<!--

    Name: Ismael Charaf Megrini 
    Student Number: C00313241
    Date: 2/26/2026

    -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Land Property Report</title>
    <link rel="stylesheet" href="style.css"> <!-- Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>


    <div class="card">
        <div class="content__top">
            <h2>Land Property Report</h2>
        </div>

        <div class="layout">
                <aside class="sidebar">
                    <div class="brand-side">
                        <img src="logo.png" alt="Logo" class="brand-side__logo" />
                    </div>

                    <nav>
                        <div class="side-title">Client Maintenance</div> <!-- Menu title -->
                        <ul class="side-menu">
                            <li>
                                <a class="side-menu__link" href="addClient.html">
                                    <!-- Add new client -->
                                    <i class="fa-solid fa-user-plus"></i>
                                    <span>Add a New Client</span>
                                </a>
                            </li>
                            <li>
                                <a class="side-menu__link" href="deleteClient.html.php">
                                    <!-- Delete client -->
                                    <i class="fa-solid fa-user-minus"></i>
                                    <span>Delete a Client</span>
                                </a>
                            </li>
                            <li>
                                <a class="side-menu__link" href="editClient.html">
                                    <!--Edit client(it will direct you to the editClient page)-->
                                    <i class="fa-solid fa-user-pen"></i>
                                    <span>Amend / View a Client</span>
                                </a>
                            </li>

                            <div class="side-divider"></div>

                            <li class="danger">
                                <a class="side-menu__link" href="../MainScreens/home.html">
                                    <i class="fa-solid fa-house"></i>
                                    <span>Exit</span> <!--Exit Button(it redirect you to the main Auctioneers page)-->
                                </a>
                            </li>
                        </ul>
                    </nav>
                </aside>




            <div class="client-grid">
                <form action="landPropertyReport.php" method="post" name="reportForm" id="reportForm">
                    <input type="hidden" name="sortOrder" id="sortOrder" value="<?php echo isset($_POST['sortOrder']) ? $_POST['sortOrder'] : 'AskingPrice'; ?>">

                    <div class="client-panel">
                        <div class="form-actions sort-actions">
                            <input type="button" id="btnAsking" class="sort-btn" value="Asking Price" onclick="submitForm('AskingPrice')" <?php if(!isset($_POST['sortOrder']) || $_POST['sortOrder'] == 'AskingPrice') echo 'disabled'; ?>>
                            <input type="button" id="btnAcreage" class="sort-btn" value="Acreage" onclick="submitForm('Acreage')" <?php if(isset($_POST['sortOrder']) && $_POST['sortOrder'] == 'Acreage') echo 'disabled'; ?>>
                        </div>
                    </div>
                <div class="client-panel">
                    <?php
                        // Connect to Auctioneers database
                        include __DIR__ . '/../Add Client/db.inc.php';
                        if (!$con) {
                            die('Database connection failed: ' . mysqli_connect_error());
                        }

                        // Default sort order is AskingPrice (ascending)
                        $order = "AskingPrice ASC"; 
                        if (isset($_POST['sortOrder']) && $_POST['sortOrder'] == "Acreage") {
                            $order = "NumberOfAcres ASC";
                        }

                        $sql = "SELECT * FROM Land WHERE Dflag = 0 AND (Status = 'For Sale' OR Status = 'Sale Agreed') ORDER BY $order";
                        $result = mysqli_query($con, $sql);

                        echo "<table class='report-table'>
                                <tr>
                                    <th>Property Number</th>
                                    <th>Address</th>
                                    <th>No. of Acres</th>
                                    <th>Quotas</th>
                                    <th>Residence Details</th>
                                    <th>Status</th>
                                    <th>Asking Price</th>
                                    <th>Select</th>
                                </tr>";

                        while($row = mysqli_fetch_array($result)) {
                            $sqlClient = "SELECT * FROM Client WHERE ClientID = '".$row['ClientID']."'";
                            $resClient = mysqli_query($con, $sqlClient);
                            $rowClient = mysqli_fetch_array($resClient);
                            $clientName = htmlspecialchars($rowClient['Name'], ENT_QUOTES);

                            echo "<tr>
                                    <td>".$row['LandID']."</td>
                                    <td>".$row['Address']."</td>
                                    <td>".$row['NumberOfAcres']."</td>
                                    <td>".$row['Quotas']."</td>
                                    <td>".$row['ResidenceDetails']."</td>
                                    <td>".$row['Status']."</td>
                                    <td>€".$row['AskingPrice']."</td>
                                    <td>
                                        <input type='radio' name='selectedProp' 
                                        value='".$row['LandID']."|".$row['ClientID']."|".$clientName."|".$rowClient['Email']."|".$rowClient['Phone']."|".$rowClient['Address']."|".$rowClient['ClientType']."|".$rowClient['Eircode']."'
                                        onclick='storeProperty(this.value)'>
                                    </td>
                                  </tr>";
                        }
                        echo "</table>";
                    ?>
                    <br>
                    <div class="form-actions">
                        <input type="button" class="sort-btn" value="Client Information" onclick="showClientInfo()">
                    </div>
                </div>
             </form>
            </div>
        </div>
    </div>

    <script>
        var selectedPropData = "";

        function storeProperty(value) {
            selectedPropData = value;
        }

        function submitForm(order) {
            document.getElementById('sortOrder').value = order;
            document.getElementById('reportForm').submit();
        }

        function showClientInfo() {
            if (selectedPropData === "") {
                alert("Please select a property first.");
                return;
            }

            var details = selectedPropData.split('|');
            var clientID = details[1];
            var name = details[2];
            var email = details[3];
            var phone = details[4];
            var address = details[5];
            var clientType = details[6];
            var eircode = details[7];

            var popup = window.open("", "Client Info", "width=420,height=380");
            popup.document.write("<h2>Client Information</h2>");
            popup.document.write("<p><strong>Client ID:</strong> " + clientID + "</p>");
            popup.document.write("<p><strong>Name:</strong> " + name + "</p>");
            popup.document.write("<p><strong>Email:</strong> " + email + "</p>");
            popup.document.write("<p><strong>Phone:</strong> " + phone + "</p>");
            popup.document.write("<p><strong>Address:</strong> " + address + "</p>");
            popup.document.write("<p><strong>Client Type:</strong> " + clientType + "</p>");
            popup.document.write("<p><strong>Eircode:</strong> " + eircode + "</p>");
            popup.document.write("<br><input type='button' value='Close' onclick='window.close()'>");
        }
    </script>
</body>
</html>
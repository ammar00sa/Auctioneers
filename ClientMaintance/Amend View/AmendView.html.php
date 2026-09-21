<!--

    Name: Ismael Charaf Megrini 
    Student Number: C00313241
    Date: 2/26/2026
    Purpose: Add client screen to insert new clients

    -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Maintenance - Amend/View Client</title>
    <link rel="stylesheet" href="style.css"> <!--Css stylesheet file connection-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>


    <script>
        function populate() {

            var sel = document.getElementById("listbox");
            var result;
            result = sel.options[sel.selectedIndex].value;
            var personDetails = result.split('|');
            document.getElementById("amendclientid").value = personDetails[0];
            document.getElementById("amendname").value = personDetails[1];
            document.getElementById("amendemail").value = personDetails[2];
            document.getElementById("amendaddress").value = personDetails[3];
            document.getElementById("amendtype").value = personDetails[4];
            document.getElementById("amendeircode").value = personDetails[5];
            document.getElementById("amendphone").value = personDetails[6];

        }


        function toggleLock() {


            if (document.getElementById("amendViewbutton").value === "Amend Details") {
                document.getElementById("amendname").disabled = false;
                document.getElementById("amendemail").disabled = false;
                document.getElementById("amendaddress").disabled = false;
                document.getElementById("amendtype").disabled = false;
                document.getElementById("amendeircode").disabled = false;
                document.getElementById("amendphone").disabled = false;
                document.getElementById("amendViewbutton").value = "View Details";
            } else {
                document.getElementById("amendname").disabled = true;
                document.getElementById("amendemail").disabled = true;
                document.getElementById("amendaddress").disabled = true;
                document.getElementById("amendtype").disabled = true;
                document.getElementById("amendeircode").disabled = true;
                document.getElementById("amendphone").disabled = true;
                document.getElementById("amendViewbutton").value = "Amend Details";
            }


        }

        function confirmCheck() {

            var response;
            response = confirm('Are you sure you want to save these changes?');

            if (response) {
                document.getElementById("amendclientid").disabled = false;
                document.getElementById("amendname").disabled = false;
                document.getElementById("amendemail").disabled = false;
                document.getElementById("amendaddress").disabled = false;
                document.getElementById("amendtype").disabled = false;
                document.getElementById("amendeircode").disabled = false;
                document.getElementById("amendphone").disabled = false;
                return true;
            } else {
                populate();
                toggleLock();
                return false;
            }



        }

    </script>




    <div class="card">
        <div class="content__top">
            <h2>Amend/View Client Maintance</h2>
        </div>

        <form action="AmendView.php" method="post" onsubmit="return confirmCheck()">
            <div class="layout">
                <aside class="sidebar">
                    <div class="brand-side">
                        <img src="logo.png" alt="Logo" class="brand-side__logo" />
                    </div>

                    <nav>
                        <div class="side-title">Client Maintenance</div> <!--Left menu section-->
                        <ul class="side-menu">
                            <li>
                                <a class="side-menu__link" href="addClient.html">
                                    <!--Add client(it will direct you to the addClient page)-->
                                    <i class="fa-solid fa-user-plus"></i>
                                    <span>Add a New Client</span>
                                </a>
                            </li>
                            <li>
                                <a class="side-menu__link" href="deleteClient.html.php">
                                    <!--Delete client(it will direct you to the deleteClient page)-->
                                    <i class="fa-solid fa-user-minus"></i>
                                    <span>Delete a Client</span>
                                </a>
                            </li>
                            <li>
                                <a class="side-menu__link is-active" href="editClient.html">
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



                    <center>
                        <div class="inputboxlist">
                            <!-- Client list box -->
                            <label for="listbox"><span class="required"></span></label>
                            <select id="listbox" name="listbox" required onclick="populate()">
                                <option value="default">--Client List--</option>
                                <?php include "listbox.php"; ?>
                            </select>
                        </div>
                    </center>

                    <br>


                    <?php
                    if (isset($_GET['status'])) {
                        if ($_GET['status'] === 'success') {
                            echo '<p style="color: #0b1220;">ⓘClient ID: <strong>' . $_GET['amendclientid'] . '</strong> has been updated successfully.</p>';
                        } else if ($_GET['status'] === 'nochange') {
                            echo '<p style="color: #0b1220;">No changes were made to the record.</p>';
                        } else {
                            echo '<p style="color: #0b1220;">An error occurred. Please try again.</p>';
                        }
                    }
                    ?>




                    <div class="client-panel">

                        <fieldset>
                            <legend>Client Details</legend>

                            <!-- Form to amend/view -->
                            <center><input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()"
                                class="toggleBtn"></center>

                                <br>    

                            <div class="two-col">
                                <div class="col">

                                    <div class="inputbox" hidden>
                                        <label for="amendclientid" hidden>Client ID: </label>
                                        <input type="text" name="amendclientid" id="amendclientid" hidden>
                                    </div>

                                    <div class="inputbox">
                                        <label for="amendname">Full Name: </label>
                                        <input type="text" name="amendname" id="amendname" disabled>
                                    </div>

                                    <div class="inputbox">
                                        <label for="amendemail">Email Address: </label>
                                        <input type="email" name="amendemail" id="amendemail" disabled>
                                    </div>

                                    <div class="inputbox">
                                        <label for="amendphone">Phone Number: </label>
                                        <input type="text" name="amendphone" id="amendphone" title="Phone Number"
                                            pattern="[0-9\s\-\(\)]+" disabled>
                                    </div>

                                    <div class="inputbox">
                                        <label for="amendtype">Client Type: </label>
                                        <input type="text" id="amendtype" name="amendtype" disabled>
                                    </div>

                                </div>


                                <div class="col">

                                    <div class="inputbox">
                                        <label for="amendaddress">Postal Address: </label>
                                        <input type="text" name="amendaddress" id="amendaddress" disabled>
                                    </div>

                                    <div class="inputbox">
                                        <label for="amendeircode">Eircode: </label>
                                        <input type="text" name="amendeircode" id="amendeircode" title="Enter Eircode"
                                            pattern="^[A-Za-z][0-9]{2}[A-Za-z0-9]{4}$" disabled>
                                    </div>

                                </div>
                            </div>

                            <div class="form-actions">
                                <input type="reset" name="Cancel" value="Cancel">

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
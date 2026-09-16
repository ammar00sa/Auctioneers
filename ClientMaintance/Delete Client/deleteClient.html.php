<!--

    Name: Ismael Charaf Megrini 
    Student Number: C00313241
    Date: 2/26/2026
    Purpose: Screen used to delete clients

    -->

<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Maintenance - Delete Client</title>
    <link rel="stylesheet" href="style.css"> <!-- Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <div class="card">
        <div class="content__top">
            <h2>Client Maintenance</h2>
        </div>

        <form action="deleteClient.php" method="post" onsubmit="return confirmCheck()">
            <div class="layout">
                <aside class="sidebar">
                    <div class="brand-side">
                        <img src="logo.png" alt="Logo" class="brand-side__logo" />
                    </div>

                    <nav>
                        <div class="side-title">Client Maintenance</div> <!-- Menu title -->
                        <ul class="side-menu">
                            <li>
                                <a class="side-menu__link" href="../Add Client/addClient.html">
                                    <!-- Add new client -->
                                    <i class="fa-solid fa-user-plus"></i>
                                    <span>Add a New Client</span>
                                </a>
                            </li>
                            <li>
                                <a class="side-menu__link is-active" href="deleteClient.html.php">
                                    <!-- Delete client -->
                                    <i class="fa-solid fa-user-minus"></i>
                                    <span>Delete a Client</span>
                                </a>
                            </li>
                            <li>
                                <a class="side-menu__link" href="../Amend View/AmendView.html.php">
                                    <!-- Edit/View client -->
                                    <i class="fa-solid fa-user-pen"></i>
                                    <span>Amend / View a Client</span>
                                </a>
                            </li>

                            <div class="side-divider"></div>

                            <li class="danger">
                                <a class="side-menu__link" href="../MainScreens/home.html">
                                    <i class="fa-solid fa-house"></i>
                                    <span>Exit</span> <!-- Back to main screen -->
                                </a>
                            </li>
                        </ul>
                    </nav>
                </aside>



                <div class="client-grid">


                
                        <center><div class="inputboxlist">
                            <!-- Client list box -->
                            <label for="listbox"><span class="required"></span></label>
                            <select id="listbox" name="listbox" required onclick="populate()">
                                <option value="default">--Client List--</option>
                                <?php include "listbox.php"; ?>
                            </select>
                        </div></center>
                  
                    <!-- Message displayed that the client has been deleted -->
                    <?php
                        if (isset($_GET['status'])) {
                            if ($_GET['status'] === 'success') {
                                echo '<p style="color: #0b1220;">ⓘClient has been deleted successfully.</p>';
                                if (isset($_GET['bidsdeleted']) && $_GET['bidsdeleted'] > 0) {
                                    echo '<p style="color: green;">All associated bids for this client have also been deleted.</p>';
                                }
                            } else if ($_GET['status'] === 'nochange') {
                                echo '<p style="color: #0b1220;">ⓘNo record was deleted.</p>';
                            } else {
                                echo '<p style="color: red;">ⓘAn error occurred. Please try again.</p>';
                            }
                        }
                    ?>

                    <br>


                    <div class="client-panel">
                        <fieldset>
                            <legend>Client Details</legend>

                           

                            <script>

                              // Filling the form below with the data
                              function populate() {

                                var sel = document.getElementById("listbox");
                                var result;
                                // Selected option using selectedIndex
                                result = sel.options[sel.selectedIndex].value;
                                var personDetails = result.split('|');
                                document.getElementById("delId").value = personDetails[0];
                                document.getElementById("delName").value = personDetails[1];
                                document.getElementById("delEmail").value = personDetails[2];
                                document.getElementById("delAddress").value = personDetails[3];
                                document.getElementById("delClientType").value = personDetails[4];
                                document.getElementById("delEircode").value = personDetails[5];
                                document.getElementById("delPhone").value = personDetails[6];

                              }

                              // Confirm if the user wants to delete
                              function confirmCheck() {

                                var response;
                                response = confirm('Are you sure you want to delete this Client ?');
                                if (response) {

                                  document.getElementById("delId").disabled = false;
                                  document.getElementById("delAddress").disabled = false;
                                  document.getElementById("delEmail").disabled = false;
                                  document.getElementById("delPhone").disabled = false;
                                  document.getElementById("delClientType").disabled = false;
                                  document.getElementById("delName").disabled = false;
                                  document.getElementById("delEircode").disabled = false;

                                  return true

                                }
                                else {

                                  populate();
                                  return false;

                                }
                              }

                            </script>

                            <br>
                            <br>


                            <div class="two-col">

                                <div class="col">
                                    <div class="inputbox">
                                        <label for="delId">Person Id: </label>
                                        <input type="text" name="delId" id="delId" readonly>
                                    </div>

                                    <br>

                                    <div class="inputbox">
                                        <label for="delName">Name: </label>
                                        <input type="text" name="delName" id="delName" disabled>
                                    </div>

                                    <br>

                                    <div class="inputbox">
                                        <label for="delEircode">Eircode: </label>
                                        <input type="text" name="delEircode" id="delEircode" disabled>
                                    </div>

                                    <br>

                                    <div class="inputbox">
                                        <label for="delPhone">Phone: </label>
                                        <input type="tel" name="delPhone" id="delPhone" disabled>
                                    </div>

                                    <br>
                                </div>

                                <div class="col">
                                    <div class="inputbox">
                                        <label for="delEmail">Email: </label>
                                        <input type="email" name="delEmail" id="delEmail" disabled>
                                    </div>

                                    <br>

                                    <div class="inputbox">
                                        <label for="delClientType">Client Type: </label>
                                        <input type="text" name="delClientType" id="delClientType" disabled>
                                    </div>

                                    <br>

                                    <div class="inputbox">
                                        <label for="delAddress">Address: </label>
                                        <textarea name="delAddress" id="delAddress" disabled ></textarea>
                                    </div>

                                    <br>
                                </div>
                            </div>

                            <br>
                            <br>
                            <br>

                            <div class="form-actions">
                                <input type="reset" name="Cancel" value="Cancel">
                                <input type="submit" name="Submit" value="Delete Client" onclick="return confirmCheck()">
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php
    session_destroy();
    ?>






</body>

</html>
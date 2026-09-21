<!-- Name: Oyindamola Olaosun -->
<!-- Student ID: C00313475 -->
<!-- Add Office Property php file interacts with the database as it executes on the server -->

<?php
    // Connecting to the database
    include 'db.inc.php';

    // A PHP superglobal variable that identifies the HTTP method used to access a script
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        foreach ($_POST as $key => $value) {
            // filter_input() gets an external variable (e.g from form input) and optionally filters it.
            // INPUT_POST: type, variable: $key, filter FILTER_SANITIZE_SPECIAL_CHARS
            $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }

    // Insert SQL into the Office Table
    $sql = "INSERT INTO Office (Address, Eircode, Location, AskingPrice, ViewingTime, Internet, OwnershipType, Reception, Area, Floor, Layout, TelephoneServices, Access, Security, Canteen, ClientID)
            VALUES (
                '" . $_POST['address'] . "',
                '" . $_POST['eircode'] . "',
                '" . $_POST['location'] . "',
                '" . $_POST['price'] . "',
                '" . $_POST['viewingtime'] . "',
                '" . $_POST['internet'] . "',
                '" . $_POST['ownership'] . "',
                '" . $_POST['reception'] . "',
                '" . $_POST['area'] . "',
                '" . $_POST['floor'] . "',
                '" . $_POST['layout'] . "',
                '" . $_POST['tel'] . "',
                '" . $_POST['access'] . "',
                '" . $_POST['security'] . "',
                '" . $_POST['canteen'] . "',
                '" . $_POST['listClientID'] . "'
            )";

    // Error Handling
    if (!mysqli_query($con, $sql)) {
        header("Location: AddOffice.html.php?status=error");
        exit();
    }

    // mysqli_insert_id() -> returns the id (generated with AUTO_INCREMENT) from the last query.
    $propertyId = mysqli_insert_id($con);

    // Confirmation that data has been added
    header("Location: AddOffice.html.php?status=success&propertyID=" . $propertyId);
    exit();

    mysqli_close($con);
?>
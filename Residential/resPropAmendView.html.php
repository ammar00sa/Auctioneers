<!-- Created by: Joseph Lalor
Date: 26/01/2026
Student Number: c00312883
Title: resPropAmendView.html.php
Purpose: A HTML/PHP form for viewing/amending a Residential Property-->
<!DOCTYPE html>
<html>
<head>
    <!-- Link to the external CSS stylesheet for styling -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="resPropAdd.js"></script> <!--error detecting javascript-->
    <title>Amend/View a Residential Property</title>  <!--title-->
</head>
<body>
<script>
// This function gets the selected value from the listbox,
// splits it into an array, and populates the form fields
function populate()
{
    var sel = document.getElementById("listbox");   // Get the listbox element
    var result;
    result = sel.options[sel.selectedIndex].value;   // Get the selected option's value
    var personDetails = result.split('/');           // Split the value into an array using comma delimiter
    document.getElementById("amendstatus").value = personDetails[0];            // Assign person ID
    document.getElementById("amendaddress").value = personDetails[1];           // Assign first name
    document.getElementById("amendaskingprice").value = personDetails[2];       // Assign last name
    document.getElementById("amendlocation").value = personDetails[3];          // Assign date of birth
    document.getElementById("amendviewingtime").value = personDetails[4];       // Assign email (Task 2 addition)
    document.getElementById("amendeircode").value = personDetails[5];           // Assign phone (Task 2 addition)
    document.getElementById("amendbath").value = personDetails[6];
    document.getElementById("amendbed").value = personDetails[7];
    document.getElementById("amendsite").value = personDetails[8];
    document.getElementById("amendnotes").value = personDetails[9];
    document.getElementById("amendarea").value = personDetails[10];
    document.getElementById("amendtype").value = personDetails[11];
    document.getElementById("amendheating").value = personDetails[12];
    document.getElementById("amendlevels").value = personDetails[13];
    document.getElementById("amendrecept").value = personDetails[14];
    document.getElementById("amendclient").value = personDetails[15];
    document.getElementById("id").value = personDetails[16]; // hidden field stores the ResidentialID for the UPDATE query
}

// This function toggles the form fields between disabled (view-only) and enabled (editable)
function toggleLock()
{
    if (document.getElementById("amendViewbutton").value == "Amend Details") // If currently in view mode
    {
        // Enable all editable fields so the user can modify them
        document.getElementById("amendstatus").disabled = false;
        document.getElementById("amendaddress").disabled = false;
        document.getElementById("amendaskingprice").disabled = false;
        document.getElementById("amendlocation").disabled = false;
        document.getElementById("amendviewingtime").disabled = false;
        document.getElementById("amendeircode").disabled = false;
        document.getElementById("amendbath").disabled = false;
        document.getElementById("amendbed").disabled = false;
        document.getElementById("amendsite").disabled = false;
        document.getElementById("amendnotes").disabled = false;
        document.getElementById("amendarea").disabled = false;
        document.getElementById("amendtype").disabled = false;
        document.getElementById("amendheating").disabled = false;
        document.getElementById("amendlevels").disabled = false;
        document.getElementById("amendrecept").disabled = false;
        document.getElementById("amendclient").disabled = false;
        document.querySelector('input[type="submit"]').disabled = false;
        document.querySelector('input[type="reset"]').disabled = false;
        document.getElementById("amendViewbutton").value = "View Details"; // Change button text
    }
    else // If currently in amend mode
    {
        // Disable all fields to return to view-only mode
        document.getElementById("amendstatus").disabled = true;
        document.getElementById("amendaddress").disabled = true;
        document.getElementById("amendaskingprice").disabled = true;
        document.getElementById("amendlocation").disabled = true;
        document.getElementById("amendviewingtime").disabled = true;
        document.getElementById("amendeircode").disabled = true;
        document.getElementById("amendbath").disabled = true;
        document.getElementById("amendbed").disabled = true;
        document.getElementById("amendsite").disabled = true;
        document.getElementById("amendnotes").disabled = true;
        document.getElementById("amendarea").disabled = true;
        document.getElementById("amendtype").disabled = true;
        document.getElementById("amendheating").disabled = true;
        document.getElementById("amendlevels").disabled = true;
        document.getElementById("amendrecept").disabled = true;
        document.getElementById("amendclient").disabled = true;
        document.querySelector('input[type="submit"]').disabled = true;
        document.querySelector('input[type="reset"]').disabled = true;        
        document.getElementById("amendViewbutton").value = "Amend Details"; // Change button text back
    }
}

// This function confirms the user wants to save changes before submitting
function confirmCheck()
{
    var response;
    response = confirm('Are you sure you want to save these changes?');
    if (response) // If user clicks OK
    {
        // Enable all fields so their values are included in the form submission
        // disabled fields are not submitted with the form by default
        document.getElementById("amendstatus").disabled = false;
        document.getElementById("amendaddress").disabled = false;
        document.getElementById("amendaskingprice").disabled = false;
        document.getElementById("amendlocation").disabled = false;
        document.getElementById("amendviewingtime").disabled = false;
        document.getElementById("amendeircode").disabled = false;
        document.getElementById("amendbath").disabled = false;
        document.getElementById("amendbed").disabled = false;
        document.getElementById("amendsite").disabled = false;
        document.getElementById("amendnotes").disabled = false;
        document.getElementById("amendarea").disabled = false;
        document.getElementById("amendtype").disabled = false;
        document.getElementById("amendheating").disabled = false;
        document.getElementById("amendlevels").disabled = false;
        document.getElementById("amendrecept").disabled = false;
        document.getElementById("amendclient").disabled = false;
        return true; // Allows form submission
    }
    else
    {
        // If user cancels, repopulate fields with original data and lock them
        populate();
        toggleLock();
        return false; // Prevents form submission
    }
}

// runs both confirmCheck and validate before allowing submission
// both must return true for the form to submit
function handleSubmit() {
    if (!confirmCheck()) {
        return false;  // user clicked cancel
    }
    if (!validate()) {
        return false;  // validation failed
    }
    return true;
}
</script>


    <div class="card"> <!--class for styling purposes-->
    <header class="content__top"> <!--header css class-->
        <h1>Amend/View a Residential Property</h1>
    </header>
<!-- Form that submits amended data to resPropAmendView.php for processing -->
<form action="resPropAmendView.php" method="Post" onsubmit="return handleSubmit()"> <!--post method used to add to database and submission validation using javascript-->

    <div class="layout"> <!--class for styling purposes-->

        <div id="menu"><?php include 'sidebar.html.php'; ?></div> <!--sidebar styling class and adding php sidebar-->
        


    <div class="grid">
        <h4>Please select a property and then click the amend button if you wish to update</h4>
        <div class="panel">
            <fieldset> 
              <legend>Residential Property Details</legend>

                <input type="text" id="updateMsg" disabled style="display: none;"><br> <!--hidden field shown by updated() after a successful save-->

                <!-- Include the listbox which fetches persons from the database -->
                <?php include 'listbox.php'; ?>
            
<br><br>
        <!-- Button to toggle between Amend and View modes -->
<input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()"><br><br>

<label for="amendclient">Client:</label><br>
<select name="amendclient" id="amendclient" disabled> <!--disabled by default, enabled when amend mode is active-->
    <option value="">-- Select a client --</option>
    <?php 
    $clientResult = mysqli_query($con, "SELECT ClientID, Name FROM Client");
    while ($row = mysqli_fetch_assoc($clientResult)) { ?>
        <option value="<?= htmlspecialchars($row['ClientID']) ?>">
            <?= htmlspecialchars($row['Name']) ?>
        </option>
    <?php } ?>
</select><br>
        <div id="clienterrmsg"></div> <!--target for javascript client validation error message-->

        <div class="two-col">
        <div class="col">
            
        <label for="amendstatus">Property type: </label><br>
        <select name="amendstatus" id="amendstatus"disabled>
            <option value="For Sale">For Sale</option>
            <option value="Sale Agreed">Sale Agreed</option>
        </select><br> 

        <label for="amendtype">Property type: </label><br>
        <select name="amendtype" id="amendtype" required disabled>
            <option value="semidetached">Semi Detached</option>
            <option value="terraced">Terraced</option>
            <option value="detached">Detached</option>
            <option value="apartment">Apartment</option>
            <option value="mews">Mews</option>
        </select><br> 

        <label for="amendaddress">Address:</label><br>
        <input type="text" id="amendaddress" name="amendaddress" pattern="^[,a-zA-Z\d ]+$"
        required oninvalid="this.setCustomValidity('Please only use alphabetic characters')" 
        oninput="this.setCustomValidity('')" maxlength="100" disabled><br>

        <label for="amendeircode">Eircode:</label><br>
        <input type="text" id="amendeircode" name="amendeircode" required pattern="^[A-Z]{1}[\d]{2}[ ]?[A-Z\d]{4}$" 
        required oninvalid="this.setCustomValidity('Please enter a valid Eircode')" 
        oninput="this.setCustomValidity('')" disabled><br>

        <label for="amendlocation">Location:</label><br>
        <input type="text" id="amendlocation" name="amendlocation" placeholder="Notes on location" maxlength="100" disabled><br>

        <label for="amendlevels">Number of Levels:</label><br>
        <input type="number" id="amendlevels" name="amendlevels" required pattern="^[\d]+$" min="1" max="10" 
        oninvalid="this.setCustomValidity('Please enter a number between 1 and 10')" 
        oninput="this.setCustomValidity('')" disabled><br>

        <label for="amendrecept">Number of Reception Rooms:</label><br>
        <input type="number" id="amendrecept" name="amendrecept" required pattern="^[\d]+$" min="0" 
        max="10" oninvalid="this.setCustomValidity('Please enter a number between 0 and 10')" 
        oninput="this.setCustomValidity('')" disabled><br>

        <label for="amendbed">Number of Bedrooms:</label><br>
        <input type="number" id="amendbed" name="amendbed" required pattern="^[\d]+$" min="1" 
        max="50" oninvalid="this.setCustomValidity('Please enter a number between 1 and 50')" 
        oninput="this.setCustomValidity('')" disabled><br>

        <label for="amendbath">Number of Bathrooms:</label><br>
        <input type="number" id="amendbath" name="amendbath" required pattern="^[\d]+$" min="0" max="50"
        oninvalid="this.setCustomValidity('Please enter a number between 0 and 50')" 
        oninput="this.setCustomValidity('')" disabled><br>

        </div>

        <div class="col">
        <label for="amendarea">Area of house in meters squared:</label><br>
        <input type="number" id="amendarea" name="amendarea" required pattern="^[\d]+$" min="10" max="10000" 
        oninvalid="this.setCustomValidity('Please enter a number between 10m and 10000m')" 
        oninput="this.setCustomValidity('')" disabled><br>

        <label for="amendheating">Heating: </label><br>
        <select name="amendheating" id="amendheating" required disabled>
            <option value="OFCH">OFCH</option>
            <option value="GFCH">GFCH</option>
            <option value="SFCH">SFCH</option>
            <option value="ECH">ECH</option>
            <option value="other">Other</option>
            <option value="none">None</option>
        </select><br>

        <label for="amendsite">Site: </label><br>
        <textarea name="amendsite" id="amendsite" rows="5" cols="30" required placeholder="Size, gardens, driveway, etc" maxlength="255" disabled>
        </textarea><br>

        <label for="amendnotes">Notes: </label><br>
        <textarea name="amendnotes" id="amendnotes" rows="5" cols="30" placeholder="E.G. Exceptional condition, beautiful view, landscaped gardens" maxlength="255" disabled>
        </textarea><br>

        <label for="amendaskingprice">Asking price:</label><br>
        <input type="number" id="amendaskingprice" name="amendaskingprice" required pattern="^[\d, ]+$" min="1000"
        oninvalid="this.setCustomValidity('Please enter a number greater than 1000')" 
        oninput="this.setCustomValidity('')" maxlength="100" disabled><br>

        <label for="amendviewingtime">Viewing Times: </label><br>
        <select id="amendviewingtime" name="amendviewingtime" disabled>
                <option value="">Select viewing time</option>
                <option value="monday">Monday (9am – 5pm)</option>
                <option value="tuesday">Tuesday (9am – 5pm)</option>
                <option value="wednesday">Wednesday (9am – 5pm)</option>
                <option value="thursday">Thursday (9am – 5pm)</option>
                <option value="friday">Friday (9am – 5pm)</option>
                <option value="weekend">Weekends (5pm – 8pm)</option>
        </select>
        <br>
        <input type="hidden" id="id" name="id" style="display: none;"> <!--hidden field holds the ResidentialID used to identify the record in the UPDATE query--></div>
        </div>
        </div>

        <div class="form-actions"> <!--css class for styling-->
            <input type="submit" value="Submit" disabled> <!--submit button - remains disabled until amend mode is activated-->
            <input type="reset" value="Reset" disabled> <!--reset button - remains disabled until amend mode is activated-->
        </div>
    </fieldset>
    </div>
    </div>
    </div>
    </div>
    </form>

</body>
</html>
<!-- Created by: Joseph Lalor
Date: 27/01/2026-->
<!--
Creator: Joseph Lalor
Project: PHP Labsheet 6 - Task 1
Date: 05/03/2026
Student Number: c00312883 -->
<?php session_start(); //start session to access session variables
?>

<html>

<head>
    <!-- Link to the external CSS stylesheet for styling -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="resPropAdd.js"></script> <!--error detecting javascript-->
    <title>Delete a Residential Property</title>  <!--title-->
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
    document.getElementById("status").value = personDetails[0];            // Assign person ID
    document.getElementById("address").value = personDetails[1];           // Assign first name
    document.getElementById("askingprice").value = personDetails[2];       // Assign last name
    document.getElementById("location").value = personDetails[3];          // Assign date of birth
    document.getElementById("viewingtime").value = personDetails[4];       // Assign email (Task 2 addition)
    document.getElementById("eircode").value = personDetails[5];           // Assign phone (Task 2 addition)
    document.getElementById("bath").value = personDetails[6];
    document.getElementById("bed").value = personDetails[7];
    document.getElementById("site").value = personDetails[8];
    document.getElementById("notes").value = personDetails[9];
    document.getElementById("area").value = personDetails[10];
    document.getElementById("type").value = personDetails[11];
    document.getElementById("heating").value = personDetails[12];
    document.getElementById("levels").value = personDetails[13];
    document.getElementById("recept").value = personDetails[14];
    document.getElementById("client").value = personDetails[15];
    document.getElementById("id").value = personDetails[16];
    document.querySelector('input[type="submit"]').disabled = false;
}

// This function toggles the form fields between disabled (view-only) and enabled (editable)
function toggleLock()
{
    if (document.getElementById("amendViewbutton").value == "Amend Details") // If currently in view mode
    {
        // Enable all editable fields so the user can modify them
        document.getElementById("status").disabled = false;
        document.getElementById("address").disabled = false;
        document.getElementById("askingprice").disabled = false;
        document.getElementById("location").disabled = false;
        document.getElementById("viewingtime").disabled = false;
        document.getElementById("eircode").disabled = false;
        document.getElementById("bath").disabled = false;
        document.getElementById("bed").disabled = false;
        document.getElementById("site").disabled = false;
        document.getElementById("notes").disabled = false;
        document.getElementById("area").disabled = false;
        document.getElementById("type").disabled = false;
        document.getElementById("heating").disabled = false;
        document.getElementById("levels").disabled = false;
        document.getElementById("recept").disabled = false;
        document.getElementById("client").disabled = false;
    }
    else // If currently in amend mode
    {
        // Disable all fields to return to view-only mode
        document.getElementById("status").disabled = true;
        document.getElementById("address").disabled = true;
        document.getElementById("askingprice").disabled = true;
        document.getElementById("location").disabled = true;
        document.getElementById("viewingtime").disabled = true;
        document.getElementById("eircode").disabled = true;
        document.getElementById("bath").disabled = true;
        document.getElementById("bed").disabled = true;
        document.getElementById("site").disabled = true;
        document.getElementById("notes").disabled = true;
        document.getElementById("area").disabled = true;
        document.getElementById("type").disabled = true;
        document.getElementById("heating").disabled = true;
        document.getElementById("levels").disabled = true;
        document.getElementById("recept").disabled = true;
        document.getElementById("client").disabled = true;
        document.querySelector('input[type="submit"]').disabled = true;
    }
}

// This function confirms the user wants to save changes before submitting
function confirmCheck()
{
    var response;
    response = confirm('Are you sure you want to delete this record?');
    if (response) // If user clicks OK
    {
        // Enable all fields so their values are included in the form submission
        // disabled fields are not submitted with the form by default
        document.getElementById("status").disabled = false;
        document.getElementById("address").disabled = false;
        document.getElementById("askingprice").disabled = false;
        document.getElementById("location").disabled = false;
        document.getElementById("viewingtime").disabled = false;
        document.getElementById("eircode").disabled = false;
        document.getElementById("bath").disabled = false;
        document.getElementById("bed").disabled = false;
        document.getElementById("site").disabled = false;
        document.getElementById("notes").disabled = false;
        document.getElementById("area").disabled = false;
        document.getElementById("type").disabled = false;
        document.getElementById("heating").disabled = false;
        document.getElementById("levels").disabled = false;
        document.getElementById("recept").disabled = false;
        document.getElementById("client").disabled = false;
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
</script>


    <div class="card"> <!--class for styling purposes-->
    <header class="content__top"> <!--header css class-->
        <h1> Delete a Person</h1>
    </header>
<!-- Form that submits amended data to resPropAmendView.php for processing -->
<form action="resPropAmendView.php" method="Post" onsubmit="return validate()"> <!--post method used to add to database and submission validation using javascript-->

    <div class="layout"> <!--class for styling purposes-->

        <div id="menu"><?php include 'sidebar.html.php'; ?></div> <!--sidebar styling class and adding php sidebar-->
        


    <div class="grid">
        <h4>Please select a property and then click the delete button</h4>
        <div class="panel">
            <fieldset> 
              <legend>Residential Property Details</legend>

                <input type="text" id="updateMsg" disabled style="display: none;"><br>

                <!-- Include the listbox which fetches persons from the database -->
                <?php include 'listbox.php'; ?>
            
<br><br>

<label for="client">Client:</label><br>
<select name="client" id="client" disabled>
    <option value="">-- Select a client --</option>
    <?php 
    $clientResult = mysqli_query($con, "SELECT ClientID, Name FROM Client");
    while ($row = mysqli_fetch_assoc($clientResult)) { ?>
        <option value="<?= htmlspecialchars($row['ClientID']) ?>">
            <?= htmlspecialchars($row['Name']) ?>
        </option>
    <?php } ?>
</select><br>
        <div id="clienterrmsg"></div>

        <div class="two-col">
        <div class="col">
            
        <label for="status">Property type: </label><br>
        <select name="status" id="status"disabled>
            <option value="For Sale">For Sale</option>
            <option value="Sale Agreed">Sale Agreed</option>
        </select><br> 

        <label for="type">Property type: </label><br>
        <select name="type" id="type" required disabled>
            <option value="semidetached">Semi Detached</option>
            <option value="terraced">Terraced</option>
            <option value="detached">Detached</option>
            <option value="apartment">Apartment</option>
            <option value="mews">Mews</option>
        </select><br> 

        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" pattern="^[,a-zA-Z\d ]+$"
        required oninvalid="this.setCustomValidity('Please only use alphabetic characters')" 
        oninput="this.setCustomValidity('')" maxlength="100" disabled><br>

        <label for="eircode">Eircode:</label><br>
        <input type="text" id="eircode" name="eircode" required pattern="^[A-Z]{1}[\d]{2}[ ]?[A-Z\d]{4}$" 
        required oninvalid="this.setCustomValidity('Please enter a valid Eircode')" 
        oninput="this.setCustomValidity('')" disabled><br>

        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" placeholder="Notes on location" maxlength="100" disabled><br>

        <label for="levels">Number of Levels:</label><br>
        <input type="number" id="levels" name="levels" required pattern="^[\d]+$" min="1" max="10" 
        oninvalid="this.setCustomValidity('Please enter a number between 1 and 10')" 
        oninput="this.setCustomValidity('')" disabled><br>

        <label for="recept">Number of Reception Rooms:</label><br>
        <input type="number" id="recept" name="recept" required pattern="^[\d]+$" min="0" 
        max="10" oninvalid="this.setCustomValidity('Please enter a number between 0 and 10')" 
        oninput="this.setCustomValidity('')" disabled><br>

        <label for="bed">Number of Bedrooms:</label><br>
        <input type="number" id="bed" name="bed" required pattern="^[\d]+$" min="1" 
        max="50" oninvalid="this.setCustomValidity('Please enter a number between 1 and 50')" 
        oninput="this.setCustomValidity('')" disabled><br>

        <label for="bath">Number of Bathrooms:</label><br>
        <input type="number" id="bath" name="bath" required pattern="^[\d]+$" min="0" max="50"
        oninvalid="this.setCustomValidity('Please enter a number between 0 and 50')" 
        oninput="this.setCustomValidity('')" disabled><br>

        </div>

        <div class="col">
        <label for="area">Area of house in meters squared:</label><br>
        <input type="number" id="area" name="area" required pattern="^[\d]+$" min="10" max="10000" 
        oninvalid="this.setCustomValidity('Please enter a number between 10m and 10000m')" 
        oninput="this.setCustomValidity('')" disabled><br>

        <label for="heating">Heating: </label><br>
        <select name="heating" id="heating" required disabled>
            <option value="OFCH">OFCH</option>
            <option value="GFCH">GFCH</option>
            <option value="SFCH">SFCH</option>
            <option value="ECH">ECH</option>
            <option value="other">Other</option>
            <option value="none">None</option>
        </select><br>

        <label for="site">Site: </label><br>
        <textarea name="site" id="site" rows="5" cols="30" required placeholder="Size, gardens, driveway, etc" maxlength="255" disabled>
        </textarea><br>

        <label for="notes">Notes: </label><br>
        <textarea name="notes" id="notes" rows="5" cols="30" placeholder="E.G. Exceptional condition, beautiful view, landscaped gardens" maxlength="255" disabled>
        </textarea><br>

        <label for="askingprice">Asking price:</label><br>
        <input type="number" id="askingprice" name="askingprice" required pattern="^[\d, ]+$" min="1000"
        oninvalid="this.setCustomValidity('Please enter a number greater than 1000')" 
        oninput="this.setCustomValidity('')" maxlength="100" disabled><br>

        <label for="viewingtime">Viewing Times: </label><br>
        <select id="viewingtime" name="viewingtime" disabled>
                <option value="">Select viewing time</option>
                <option value="monday">Monday (9am – 5pm)</option>
                <option value="tuesday">Tuesday (9am – 5pm)</option>
                <option value="wednesday">Wednesday (9am – 5pm)</option>
                <option value="thursday">Thursday (9am – 5pm)</option>
                <option value="friday">Friday (9am – 5pm)</option>
                <option value="weekend">Weekends (5pm – 8pm)</option>
        </select>
        <br>
        <input type="hidden" id="id" name="id" style="display: none;"></div>
        </div>
        </div>

        <div class="form-actions"> <!--css class for styling-->
            <input type = "submit" value = "Delete the record" disabled>
        </div>
    </fieldset>
    </div>
    </div>
    </div>
    </div>
    </form>

</body>
</html>
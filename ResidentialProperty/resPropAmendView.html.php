<!-- Created by: Joseph Lalor
Date: 26/01/2026
Student Number: c00312883
Title: resPropAmendView.html.php
Purpose: A HTML/PHP form for viewing/amending a new Residential Property-->
<!DOCTYPE html>
<html>
<head>
    <!-- Link to the external CSS stylesheet for styling -->
    <link rel="stylesheet" type="text/css" href="layout2.css">
</head>
<body>

<h1>Amend/View a Person</h1>
<h4>Please select a person and then click the amend button if you wish to update</h4>

<!-- Include the listbox which fetches persons from the database -->
<!-- Updated listbox2.php now also retrieves email and phone -->
<?php include 'listbox2.php'; ?>

<script>
// This function gets the selected value from the listbox,
// splits it into an array, and populates the form fields
function populate()
{
    var sel = document.getElementById("listbox");   // Get the listbox element
    var result;
    result = sel.options[sel.selectedIndex].value;   // Get the selected option's value
    var personDetails = result.split(',');           // Split the value into an array using comma delimiter
    // Display the full details of the selected person
    document.getElementById("display").innerHTML = "The details of the selected person are: " + result;
    document.getElementById("amendid").value = personDetails[0];        // Assign person ID
    document.getElementById("amendfirstname").value = personDetails[1]; // Assign first name
    document.getElementById("amendlastname").value = personDetails[2];  // Assign last name
    document.getElementById("amendDOB").value = personDetails[3];       // Assign date of birth
    document.getElementById("amendemail").value = personDetails[4];     // Assign email (Task 2 addition)
    document.getElementById("amendphone").value = personDetails[5];     // Assign phone (Task 2 addition)
}

// This function toggles the form fields between disabled (view-only) and enabled (editable)
function toggleLock()
{
    if (document.getElementById("amendViewbutton").value == "Amend Details") // If currently in view mode
    {
        // Enable all editable fields so the user can modify them
        document.getElementById("amendfirstname").disabled = false;
        document.getElementById("amendlastname").disabled = false;
        document.getElementById("amendDOB").disabled = false;
        document.getElementById("amendemail").disabled = false;   // Enable email field (Task 2 addition)
        document.getElementById("amendphone").disabled = false;   // Enable phone field (Task 2 addition)
        document.getElementById("amendViewbutton").value = "View Details"; // Change button text
    }
    else // If currently in amend mode
    {
        // Disable all fields to return to view-only mode
        document.getElementById("amendfirstname").disabled = true;
        document.getElementById("amendlastname").disabled = true;
        document.getElementById("amendDOB").disabled = true;
        document.getElementById("amendemail").disabled = true;    // Disable email field (Task 2 addition)
        document.getElementById("amendphone").disabled = true;    // Disable phone field (Task 2 addition)
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
        // Disabled fields are not submitted with the form by default
        document.getElementById("amendid").disabled = false;
        document.getElementById("amendfirstname").disabled = false;
        document.getElementById("amendlastname").disabled = false;
        document.getElementById("amendDOB").disabled = false;
        document.getElementById("amendemail").disabled = false;   // Enable email for submission (Task 2 addition)
        document.getElementById("amendphone").disabled = false;   // Enable phone for submission (Task 2 addition)
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

<!-- Paragraph to display the selected person's details -->
<p id="display"></p>

<!-- Button to toggle between Amend and View modes -->
<input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()">

<!-- Form that submits amended data to AmendView2.php for processing -->
<form name="myForm" action="AmendView2.php" onsubmit="return confirmCheck()" method="post">
    <!-- Person ID field - always disabled as it is the primary key and should not be changed -->
    <label for="amendid">Person Id</label>
    <input type="text" name="amendid" id="amendid" disabled><br>
    
    <!-- First Name field -->
    <label for="amendfirstname">First Name</label>
    <input type="text" name="amendfirstname" id="amendfirstname" disabled><br>
    
    <!-- Last Name field -->
    <label for="amendlastname">Surname</label>
    <input type="text" name="amendlastname" id="amendlastname" disabled><br>
    
    <!-- Date of Birth field with date input type -->
    <label for="amendDOB">Date of Birth</label>
    <input type="date" name="amendDOB" id="amendDOB" title="format is dd-mm-yyyy" disabled><br>
    
    <!-- Email Address field (Task 2 addition) -->
    <label for="amendemail">Email Address</label>
    <input type="text" name="amendemail" id="amendemail" disabled><br>
    
    <!-- Phone Number field (Task 2 addition) -->
    <label for="amendphone">Phone Number</label>
    <input type="text" name="amendphone" id="amendphone" disabled><br>
    
    <br>
    <!-- Submit button to save the changes -->
    <input type="submit" value="Save Changes">
</form>

</body>
</html>
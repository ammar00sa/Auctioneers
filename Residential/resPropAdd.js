/*Created by: Joseph Lalor
Date: 26/01/2026
Student Number: c00312883
Title: resPropAdd.js
Purpose: A Javascript file to check the validity of the form, checking if a client has been selected
*/
document.addEventListener("DOMContentLoaded", function() {
    document.addEventListener("blur", function(e) {
        validateClientSelection(); // runs validation to check if a cleint is selected whenever user clicks off
    });
});

// checks that the user has selected a client from the dropdown before submitting
function validateClientSelection()
    {
        var client = document.getElementById("client"); //client selectbox tag
        var clientSelected; //client selection check
        clientSelected = client.options[client.selectedIndex].value; //assigns currently selected value to clientSelected variable
        if (clientSelected == "") //if empty return false
            {
                document.getElementById("clienterrmsg").style.color = "red"; // make error message red
                document.getElementById("clienterrmsg").innerHTML = "*Please select a client";
                return false;
            }
        else //else allow adding record
            {
                document.getElementById("clienterrmsg").innerHTML = ""; // clear any previous error message
                return true;
            }
    }

// main validation function called on form submit
// runs client check first, then asks for confirmation before allowing submission
function validate() {
    if (!validateClientSelection()) {
        return false; // stop submission if no client selected
    }

    var response = confirm('Are you sure you want to add this record?');

    if (response) {
        alert("Adding record...");
        return true; // allow form to submit
    } else {
        return false; // user cancelled, prevent submission
    }
}
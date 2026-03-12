/*Created by: Joseph Lalor
Date: 26/01/2026
Student Number: c00312883
Title: element.js
Purpose: A Javascript file to check the validity of the form, checking if a client has been selected
*/

document.getElementById("client").addEventListener("blur", function() {
    validateClientSelection();
});

function validateClientSelection()
    {
        var client = document.getElementById("client"); //client selectbox tag
        var clientSelected; //client selection check
        clientSelected = client.options[client.selectedIndex].value; //assigns currently selected value to clientSelected variable
        if (clientSelected == "") //if empty return false
            {
                document.getElementById("clienterrmsg").style.color = "red";
                document.getElementById("clienterrmsg").innerHTML = "*Please select a client";
                return false;
            }
        else //else allow adding record
            {
                document.getElementById("clienterrmsg").innerHTML = "";
                return true;
            }
    }
function validate()
    {
        validateClientSelection();
        if (!validateClientSelection())
            {
                return false;
            }
        else
            {
                alert("Adding record...");
                return true;
            }
    }
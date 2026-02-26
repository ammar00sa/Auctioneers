/*Created by: Joseph Lalor
Date: 26/01/2026
Student Number: c00312883
Title: element.js
Purpose: A Javascript file to check the validity of the form, checking if a client has been selected
*/
function validate()
    {
        var client = document.getElementById("client"); //client selectbox tag
        var clientSelected; //client selection check
        clientSelected = client.options[client.selectedIndex].value; //assigns currently selected value to clientSelected variable
        if (clientSelected == "") //if empty return false
            {
                alert("You must select a client before submitting");
                return false;
            }
        else //else allow adding record
            {
                alert("Adding record...");
                return true;
            }
    }
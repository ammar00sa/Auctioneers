function validate()
    {
        var client = document.getElementById("client");
        var clientSelected;
        clientSelected = client.options[client.selectedIndex].value;
        if (clientSelected == "")
            {
                alert("You must select a client before submitting");
                return false;
            }
        else 
            {
                alert("Adding record...");
                return true;
            }
    }
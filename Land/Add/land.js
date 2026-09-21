//<!-- Name:                 AMMAR SALAH -->
//<!-- Student Number:       C00313510 -->
//<!-- Title:                JS file -->
//<!-- Date:                 8 FEB 2026 -->
<!-- Project Y2 2026 -->


// Function confirmSubmit() prompts user to confirm if they want to save the land details
function confirmSubmit()
{
	var response;
	response = confirm("Are you sure the land details are correct?");
	return response;
}

// Function toggleLock() is called on load, locking all fields until the user selects a client first
function toggleLock()
{
	document.getElementById("adrs1").disabled = true;
	document.getElementById("adrs2").disabled = true;
	document.getElementById("adrs3").disabled = true;
	document.getElementById("location").disabled = true;
	document.getElementById("eircode").disabled = true;
	document.getElementById("viewing_times").disabled = true;
	document.getElementById("price").disabled = true;
	document.getElementById("acres").disabled = true;
	document.getElementById("quotas").disabled = true;
	document.getElementById("buildings").disabled = true;
	document.getElementById("details").disabled = true;
	document.getElementById("notes").disabled = true;

	document.querySelector("input[type='submit']").disabled = true;
	document.querySelector("input[type='reset']").disabled = true;
}

// When we unlock, we only unlock fields that should be editable once a client has been selected
function unlock()
{
	document.getElementById("adrs1").disabled = false;
	document.getElementById("adrs2").disabled = false;
	document.getElementById("adrs3").disabled = false;
	document.getElementById("location").disabled = false;
	document.getElementById("eircode").disabled = false;
	document.getElementById("viewing_times").disabled = false;
	document.getElementById("price").disabled = false;
	document.getElementById("acres").disabled = false;
	document.getElementById("quotas").disabled = false;
	document.getElementById("buildings").disabled = false;
	document.getElementById("details").disabled = false;
	document.getElementById("notes").disabled = false;

	document.querySelector("input[type='submit']").disabled = false;
	document.querySelector("input[type='reset']").disabled = false;
}

// Function toggleFields() checks if a client has been selected from the listbox
function toggleFields()
{
	// Selected client is got by the element with id clientList
	var sel = document.getElementById("clientList");

	// If the user has selected a client, unlock all editable fields
	if(sel.value != "")
	{
		unlock();
	}
	// Otherwise, keep all fields locked
	else
	{
		toggleLock();
	}
}

// Wait until the page is fully loaded before running the script
window.addEventListener("DOMContentLoaded", function()
{
	// Run once when the page loads to lock all fields by default
	toggleLock();

	// When the user selects a client, call toggleFields again
	document.getElementById("clientList").addEventListener("change", toggleFields);
	    
	// Reload page on reset
	document.querySelector("input[type='reset']").addEventListener("click", function(e) {
    e.preventDefault();
    location.reload();
});
});

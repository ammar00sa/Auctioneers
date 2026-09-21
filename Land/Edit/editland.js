// Name:                 AMMAR SALAH
// Student Number:       C00313510
// Title:                JS file (Amend/View Land)
// Date:                 19 FEB 2026




// Variable amendMode is used for checking whether the form is currently in amend mode or view mode
var amendMode = false;

// Function confirmAmendSubmit() prompts user to confirm if they want to save the changes
function confirmAmendSubmit()
{
	var actionType;
	actionType = document.getElementById("actionType").value;

	// If the action is not save, allow the form to submit normally
	if(actionType != "save")
	{
		return true;
	}

	// If the user has not clicked Amend Details first, prevent saving
	if(!amendMode)
	{
		alert("Please click 'Amend Details' before saving changes.");
		return false;
	}

	// Otherwise, prompt the user to confirm saving the changes
	return confirm("Are you sure you want to save these changes?");
}

// Function toggleLock() is called onload, locking all fields until the user chooses to amend the selected land property
function toggleLock()
{
	// Status and Highest Bid are always display only
	document.getElementById("status").readOnly = true;
	document.getElementById("highest_bid").readOnly = true;

	document.getElementById("client_name").disabled = true;
	document.getElementById("adrs1").disabled = true;
	document.getElementById("location").disabled = true;
	document.getElementById("eircode").disabled = true;
	document.getElementById("viewing_times").disabled = true;
	document.getElementById("price").disabled = true;
	document.getElementById("acres").disabled = true;
	document.getElementById("quotas").disabled = true;
	document.getElementById("buildings").disabled = true;
	document.getElementById("details").disabled = true;
	document.getElementById("notes").disabled = true;

	// Disable Save button and enable Amend button
	document.getElementById("saveBtn").disabled = true;
	document.getElementById("amendBtn").disabled = false;

	// Set amend mode to false and reset button text
	amendMode = false;
	document.getElementById("amendBtn").value = "Amend Details";
}

// When we unlock, we only unlock fields that should be editable once the user wants to amend the selected property
function unlock()
{
	document.getElementById("client_name").disabled = false;
	document.getElementById("adrs1").disabled = false;
	document.getElementById("location").disabled = false;
	document.getElementById("eircode").disabled = false;
	document.getElementById("viewing_times").disabled = false;
	document.getElementById("price").disabled = false;
	document.getElementById("acres").disabled = false;
	document.getElementById("quotas").disabled = false;
	document.getElementById("buildings").disabled = false;
	document.getElementById("details").disabled = false;
	document.getElementById("notes").disabled = false;

	// Enable Save button
	document.getElementById("saveBtn").disabled = false;

	// Set amend mode to true and change button text
	amendMode = true;
	document.getElementById("amendBtn").value = "View Details";

	// Set focus to the first editable field
	document.getElementById("adrs1").focus();
}

// Function populate() populates the textboxes when the desired land property is selected from the listbox
function populate()
{
	var sel;
	sel = document.getElementById("landList");

	// Checks if the user has selected something from the listbox
	if(sel.value != "")
	{
		var data;
		// Returns the selected item in the listbox by going to the index in the listbox
		data = sel.options[sel.selectedIndex];

		// Populate each element using the data attributes stored in the selected option
		document.getElementById("status").value = data.getAttribute("data-status") || "";
		document.getElementById("highest_bid").value = data.getAttribute("data-highestbid") || "";
		document.getElementById("adrs1").value = data.getAttribute("data-address") || "";
		document.getElementById("location").value = data.getAttribute("data-location") || "";
		document.getElementById("client_name").value = data.getAttribute("data-clientname") || "";
		document.getElementById("client_id").value = data.getAttribute("data-clientid") || "";
		document.getElementById("eircode").value = data.getAttribute("data-eircode") || "";
		document.getElementById("viewing_times").value = data.getAttribute("data-viewing") || "";
		document.getElementById("price").value = data.getAttribute("data-price") || "";
		document.getElementById("acres").value = data.getAttribute("data-acres") || "";
		document.getElementById("quotas").value = data.getAttribute("data-quotas") || "";
		document.getElementById("buildings").value = data.getAttribute("data-buildings") || "";
		document.getElementById("details").value = data.getAttribute("data-details") || "";
		document.getElementById("notes").value = data.getAttribute("data-notes") || "";

		// After populating the fields, lock them so the user starts in view mode
		toggleLock();
	}
	else
	{
		// If no property has been selected, clear all fields
		document.getElementById("status").value = "";
		document.getElementById("client_name").value = "";
		document.getElementById("highest_bid").value = "";
		document.getElementById("adrs1").value = "";
		document.getElementById("location").value = "";
		document.getElementById("eircode").value = "";
		document.getElementById("viewing_times").value = "";
		document.getElementById("price").value = "";
		document.getElementById("acres").value = "";
		document.getElementById("quotas").value = "";
		document.getElementById("buildings").value = "";
		document.getElementById("details").value = "";
		document.getElementById("notes").value = "";
		document.getElementById("client_id").value = "";

		// Keep the fields locked and disable the Amend button
		toggleLock();
		document.getElementById("amendBtn").disabled = true;
	}
}

// Wait until the page is fully loaded before running the script
window.addEventListener("DOMContentLoaded", function()
{
	// Run once when the page loads to lock all fields by default
	toggleLock();

	// Populate the fields if a property is already selected
	populate();

	// When the user selects a land property, call populate again
	document.getElementById("landList").addEventListener("change", populate);

	// Function for toggling between amend mode and view mode when the Amend button is clicked
	document.getElementById("amendBtn").addEventListener("click", function()
	{
		// If no property is selected, alert the user
		if(document.getElementById("landList").value == "")
		{
			alert("Please select a land property first.");
			return;
		}

		// If already in amend mode, lock the fields again
		if(amendMode)
		{
			toggleLock();
		}
		// Otherwise unlock the editable fields
		else
		{
			unlock();
		}
	});
});
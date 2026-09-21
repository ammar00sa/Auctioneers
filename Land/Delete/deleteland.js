//<!-- Name:                 AMMAR SALAH -->
//<!-- Student Number:       C00313510 -->
//<!-- Title:                JS file (Delete Land) -->
//<!-- Date:                 8 FEB 2026 -->
//<!-- Project Y2 2026 -->



// Function to populates the textboxes when the desired land property is selected from the listbox
function populate()
{
	// Selected land property is got by the element with id landList
	var sel = document.getElementById("landList");

	var data;
	// Returns the selected item in the listbox by going to the index in the listbox
	data = sel.options[sel.selectedIndex];

	// Checks if the user has selected something from the listbox
	if(sel.value != "")
	{
		// Populate each element using the data attributes stored in the selected option
		document.getElementById("status").value = data.getAttribute("data-status") || "";
		document.getElementById("adrs1").value = data.getAttribute("data-address") || "";
		document.getElementById("location").value = data.getAttribute("data-location") || "";
		document.getElementById("eircode").value = data.getAttribute("data-eircode") || "";
		document.getElementById("viewing_times").value = data.getAttribute("data-viewing") || "";
		document.getElementById("price").value = data.getAttribute("data-price") || "";
		document.getElementById("acres").value = data.getAttribute("data-acres") || "";
		document.getElementById("quotas").value = data.getAttribute("data-quotas") || "";
		document.getElementById("buildings").value = data.getAttribute("data-buildings") || "";
		document.getElementById("details").value = data.getAttribute("data-details") || "";
		document.getElementById("notes").value = data.getAttribute("data-notes") || "";
	}
}

// Function toggleLock() is called onload, locking all fields until the user selects a land property first
function toggleLock()
{
	document.title = "Delete Land Property";

	document.getElementById("status").disabled = true;
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

	document.querySelector("input[name='delete']").disabled = true;
	document.querySelector("input[type='reset']").disabled = true;
}

// When we unlock, we only unlock fields that should be editable, but for delete page the fields are view only,
// so we only unlock the buttons once a land property has been selected
function unlock()
{
	document.querySelector("input[name='delete']").disabled = false;
	document.querySelector("input[type='reset']").disabled = false;
}

// Function toggleFields() checks if a land property has been selected from the listbox
function toggleFields()
{
	// Selected land property is got by the element with id landList
	var sel = document.getElementById("landList");

	// If the user has selected a land property, populate the fields and unlock the buttons
	if(sel.value != "")
	{
		populate();
		unlock();
	}
	// Otherwise, clear the inputboxes and keep everything locked
	else
	{
		document.getElementById("status").value = "";
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

		toggleLock();
	}
}

// Function confirmCheck() prompts user to confirm if they want to delete the selected land property
function confirmCheck()
{
	var response;
	response = confirm("Are you sure you want to delete this land property?");

	// If user responds TRUE (yes), return true to continue deleting the record
	if(response)
	{
		return true;
	}
	// Otherwise, populate the inputboxes and lock the inputs, then return false
	else
	{
		populate();
		toggleLock();
		return false;
	}
}

window.addEventListener("DOMContentLoaded", function()
{
	// Run once when the page loads to lock all fields by default
	toggleLock();

	// When the user selects a land property, call toggleFields again
	document.getElementById("landList").addEventListener("change", toggleFields);
});
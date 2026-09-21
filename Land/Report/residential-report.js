//<!-- Name:                 AMMAR SALAH -->
//<!-- Student Number:       C00313510 -->
//<!-- Title:                JS file (Residential Property Report) -->
//<!-- Date:                 19 FEB 2026 -->
//<!-- Project Y2 2026 -->

window.addEventListener("DOMContentLoaded", function () {

  const clientBtn = document.getElementById("clientBtn");
  const radios = document.querySelectorAll(".rowSelect");

  // Disable client button until a property is selected
  clientBtn.disabled = true;

  // When user selects a row, enable button
  radios.forEach(function (r) {
    r.addEventListener("change", function () {
      clientBtn.disabled = false;

      // Store client id into hidden field for POST popup
      const clientID = r.getAttribute("data-clientid") || "";
      document.getElementById("clientid").value = clientID;
    });
  });

  // Open client details popup (POST form submit to new tab/window)
  clientBtn.addEventListener("click", function () {

    if (document.getElementById("clientid").value == "") {
      alert("Please select a property first.");
      return;
    }

    document.getElementById("clientForm").submit();
  });

});

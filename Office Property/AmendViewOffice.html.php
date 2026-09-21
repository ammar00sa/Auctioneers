<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amend/View Office</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <script>

    // Filling the form below with the data
        function populate(){
        var sel = document.getElementById("listOffice");
        var result;
        result = sel.options[sel.selectedIndex].value;

         // Stop if default option is selected
      if(result === 'default') return;

      var officeDetails = result.split('|');
            document.getElementById("display").innerHTML = "The details of the selected office are: " + result;
            document.getElementById("amendofficeid").value = officeDetails[0];
            document.getElementById("amendaddress").value = officeDetails[1];
            document.getElementById("amendeircode").value = officeDetails[2];
            document.getElementById("amendlocation").value = officeDetails[3];
            document.getElementById("showstatus").value = officeDetails[4];
            document.getElementById("amendaskingprice").value = officeDetails[5];
            document.getElementById("amendviewingtime").value = officeDetails[6];
            document.getElementById("amendinternet").value = officeDetails[7];
            document.getElementById("amendownershiptype").value = officeDetails[8];
            document.getElementById("amendreception").value = officeDetails[9];
            document.getElementById("amendarea").value = officeDetails[10];
            document.getElementById("amendfloor").value = officeDetails[11];
            document.getElementById("amendlayout").value = officeDetails[12];
            document.getElementById("amendtel").value = officeDetails[13];
            document.getElementById("amendaccess").value = officeDetails[14];
            document.getElementById("amendsecurity").value = officeDetails[15];
            document.getElementById("amendcanteen").value = officeDetails[16];
            document.getElementById("showhighestbid").value = officeDetails[17];
        }

        // toggle between Amend or View Details
        function toggleLock(){
            if(document.getElementById("amendViewbutton").value === "Amend Details"){
            document.getElementById("amendaddress").readOnly = false;
            document.getElementById("amendeircode").readOnly = false;
            document.getElementById("amendlocation").readOnly = false;
            document.getElementById("amendviewingtime").readOnly = false;
            document.getElementById("amendaskingprice").readOnly = false;
            document.getElementById("amendinternet").readOnly = false;
            document.getElementById("amendownershiptype").readOnly = false;
            document.getElementById("amendreception").readOnly = false;
            document.getElementById("amendarea").readOnly = false;
            document.getElementById("amendfloor").readOnly = false;
            document.getElementById("amendlayout").readOnly = false;
            document.getElementById("amendtel").readOnly = false;
            document.getElementById("amendaccess").readOnly = false;
            document.getElementById("amendsecurity").readOnly = false;
            document.getElementById("amendcanteen").readOnly = false;
            document.getElementById("amendViewbutton").value = "View Details";
            }
            else{
            document.getElementById("amendaddress").readOnly = true;
            document.getElementById("amendeircode").readOnly = true;
            document.getElementById("amendlocation").readOnly = true;
            document.getElementById("amendviewingtime").readOnly = true;
            document.getElementById("amendaskingprice").readOnly = true;
            document.getElementById("amendinternet").readOnly = true;
            document.getElementById("amendownershiptype").readOnly = true;
            document.getElementById("amendreception").readOnly = true;
            document.getElementById("amendarea").readOnly = true;
            document.getElementById("amendfloor").readOnly = true;
            document.getElementById("amendlayout").readOnly = true;
            document.getElementById("amendtel").readOnly = true;
            document.getElementById("amendaccess").readOnly = true;
            document.getElementById("amendsecurity").readOnly = true;
            document.getElementById("amendcanteen").readOnly = true;
            document.getElementById("amendViewbutton").value = "Amend Details";
            }
        }

        // Confirm if you want to save
        function confirmCheck(){
            var response;
            response = confirm('Are you sure want to save these changes?');
            if(response){
            document.getElementById("amendaddress").readOnly = false;
            document.getElementById("amendeircode").readOnly = false;
            document.getElementById("amendlocation").readOnly = false;
            document.getElementById("amendviewingtime").readOnly = false;
            document.getElementById("amendaskingprice").readOnly = false;
            document.getElementById("amendinternet").readOnly = false;
            document.getElementById("amendownershiptype").readOnly = false;
            document.getElementById("amendreception").readOnly = false;
            document.getElementById("amendarea").readOnly = false;
            document.getElementById("amendfloor").readOnly = false;
            document.getElementById("amendlayout").readOnly = false;
            document.getElementById("amendtel").readOnly = false;
            document.getElementById("amendaccess").readOnly = false;
            document.getElementById("amendsecurity").readOnly = false;
            document.getElementById("amendcanteen").readOnly = false;
                return true;
            }
            else{
                populate();
                toggleLock();
                return false;
            }
        }

        // AI check
  function filterOffices() {
    var filter = document.getElementById("filterStatus").value;
    var select = document.getElementById("listOffice");
    var options = select.options;

    for (var i = 0; i < options.length; i++) {
        var optionValue = options[i].value;
        var officeDetails = optionValue.split('|');
        var status = officeDetails[4]; // Status is index 4

        if (filter === 'all') {
            options[i].style.display = '';
        } else if (filter === 'unsold' && (status === 'For Sale' || status === 'Sale Agreed')) {
            options[i].style.display = '';
        } else if (filter === 'sold' && status === 'Sale Completed') {
            options[i].style.display = '';
        } else {
            options[i].style.display = 'none';
        }
    }

    // Reset the form when filter changes
    select.selectedIndex = 0;
    document.getElementById("amendofficeid").value = '';
    document.getElementById("amendaddress").value = '';
    document.getElementById("amendeircode").value = '';
    document.getElementById("amendlocation").value = '';
    document.getElementById("showstatus").value = '';
    document.getElementById("amendaskingprice").value = '';
    document.getElementById("amendviewingtime").value = '';
    document.getElementById("amendinternet").value = '';
    document.getElementById("amendownershiptype").value = '';
    document.getElementById("amendreception").value = '';
    document.getElementById("amendarea").value = '';
    document.getElementById("amendfloor").value = '';
    document.getElementById("amendlayout").value = '';
    document.getElementById("amendtel").value = '';
    document.getElementById("amendaccess").value = '';
    document.getElementById("amendsecurity").value = '';
    document.getElementById("amendcanteen").value = '';
    document.getElementById("showhighestbid").value = '';
}
  </script>
  <div class="card">

    <div class="content__top">
      <h2>Amend/View Office Property</h2>
      <h4>Please select an office property and then click the amend button if you wish to update</h4>
    </div>

    <form action="AmendViewOffice.php" method="post" name="myForm" onsubmit="return confirmCheck()">
      <div class="layout">
        <aside class="sidebar">

          <div class="brand-side">
              <img src="logo.png" alt="Logo" class="brand-side__logo"/>
          </div>

          <nav>
              <div class="side-title">Property Maintenance</div>
              <ul class="side-menu"> 
                   <li><a class="side-menu__link" href="https://c2p-auctioneers26.candept.com/Office/Add%20Office%20Property/AddOffice.html.php"><i class="fa-solid fa-building"></i><span>Add a New Office Property</span></a></li>
                            <li><a class="side-menu__link" href="https://c2p-auctioneers26.candept.com/Office/Delete%20Office%20Property/ShowOfficeDelete.html.php"><i class="fa-solid fa-trash"></i><span>Delete an Office Property</span></a></li>
                            <li><a class="side-menu__link" href="https://c2p-auctioneers26.candept.com/Office/AmendView%20Office%20Property/AmendViewOffice.html.php"><i class="fa-solid fa-pen-to-square"></i><span>Amend/View an Office Property</span></a></li>
                            <li class="danger"><a class="side-menu__link" href="https://c2p-auctioneers26.candept.com/Main%20Screens/home.html"><i class="fa-solid fa-house"></i><span>Exit</span></a></li>
              </ul> 
          </nav>
       </aside>

      <div class="office-grid">
          <div class="office-panel">
            <!-- Filter for Sold and Unsold properties -->
            <div class="inputbox">
                <label for="filterStatus">Filter by Status: </label>
                <select name="filterStatus" id="filterStatus" onchange="filterOffices()">
                    <option value="all">All Properties</option>
                    <option value="unsold">Unsold (For Sale / Sale Agreed)</option>
                    <option value="sold">Sold (Sale Completed)</option>
                </select>
            </div>
              <div class="inputbox">
                  <label for="listOffice"> <span class="required"></span></label>
                  <select name='listOffice' id='listOffice' onclick='populate()'>
                      <option value='default'>--Office List--</option>
                        <?php include "ListOffice.php"; ?>
                  </select>
              </div>
          </div>

          <div class="office-panel">
              <fieldset>
                <legend>Office Details</legend>
                <!-- Form to amend/view -->
                <p id="display"></p>
                <input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()">

                <div class="two-col">
                  <div class="col">
                    <div class="inputbox">
                      <label for="amendofficeid">Office ID: </label>
                      <input type="text" name="amendofficeid" id="amendofficeid" readOnly>
                    </div>
                    <div class="inputbox">
                      <label for="amendaddress">Address: </label>
                      <input type="text" name="amendaddress" id="amendaddress" readOnly>
                    </div>
                    <div class="inputbox">
                      <label for="amendeircode">Eircode: </label>
                      <input type="text" name="amendeircode" id="amendeircode" title="Enter Eircode" pattern="^[A-Za-z][0-9]{2}[A-Za-z0-9]{4}$" readOnly>
                    </div>
                    <div class="inputbox">
                      <label for="amendlocation">Location: </label>
                      <input type="text" name="amendlocation" id="amendlocation" title="Enter location..."  pattern="[A-Za-z\s\.,]+" readOnly>
                    </div>
                    <div class="inputbox">
                        <label for="amendfloor">Floor: </label>
                         <input type="number" name="amendfloor" id="amendfloor" title="Enter floor number..." readOnly min="1">
                    </div>
                    <div class="inputbox">
                      <label for="amendarea">Area (in square m²):  </label>
                      <input type="number" name="amendarea" id="amendarea" step="0.01" min="37" title="Enter area..." readOnly>
                    </div>
                    <div class="inputbox">
                      <label for="amendaskingprice">Asking Price: </label>
                      <input type="number" name="amendaskingprice" id="amendaskingprice" title="Enter asking price...." step="0.01" readOnly>
                    </div>
                    <div class="inputbox">
                      <label for="amendtel">Tel: </label>
                      <input type="text" id="amendtel" name="amendtel" title="Phone Number" pattern="[0-9\s\-\(\)]+"  readOnly>
                    </div>
					<div class="inputbox">
                      <label for="amendreception">Reception: </label>
                      <input type="text" id="amendreception" name="amendreception" readOnly>
                    </div>
					 <div class="inputbox">
                      <label for="showstatus">Status: </label>
                      <input type="text" id="showstatus" name="showstatus" readOnly>
                    </div> 
                  </div>
                  <div class="col">
                    <div class="inputbox">
                      <label for="amendlayout">Layout: </label>
                      <input type="text" id="amendlayout" name="amendlayout" title="Layout" readOnly>
                    </div>
                    <div class="inputbox">
                      <label for="amendinternet">Internet: </label>
                      <input type="text" name="amendinternet" id="amendinternet" readOnly title="Internet..">
                    </div>
                    <div class="inputbox">
                      <label for="amendaccess">Access: </label>
                      <input type="text" name="amendaccess" id="amendaccess" readOnly>
                    </div>
                    <div class="inputbox">
                      <label for="amendsecurity">Security: </label>
                      <input type="text" name="amendsecurity" id="amendsecurity" readOnly>
                    </div>
                    <div class="inputbox">
                      <label for="amendcanteen">Canteen: </label>
                      <input type="text" name="amendcanteen" id="amendcanteen" readOnly>
                    </div>
                    <div class="inputbox">
                      <label for="amendownershiptype">Ownership Type: </label>
                      <input type="text" name="amendownershiptype" id="amendownershiptype" readOnly title="Ownership">
                    </div>
                    <div class="inputbox">
                      <label for="amendviewingtime">Viewing Time: </label>
                      <input type="text" name="amendviewingtime" id="amendviewingtime" readOnly>
                    </div>
                    <div class="inputbox">
                      <label for="showhighestbid">Highest Bid: </label>
                      <input type="text" name="showhighestbid" id="showhighestbid" readOnly value="0">
                    </div>
                  </div>
                </div>
                  <div class="form-actions">
                  <input type="submit" value="Save Changes">
                  </div>
              </fieldset>
          </div>
      </div>
      </div>
    </form>
  </div>
</body>
</html>
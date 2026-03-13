<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Office Property</title>   
    <link rel="stylesheet" href="style.css">                                        
</head>
<body>
  <script>
    function populate(){
        var sel = document.getElementById("listOffice");
        var result;
        result = sel.options[sel.selectedIndex].value;

        // Stop if default option is selected
      if(result === 'default') return;

            var officeDetails = result.split('|');
            document.getElementById("display").innerHTML = "The details of the selected office are: " + result;
            document.getElementById("delofficeid").value = officeDetails[0];
            document.getElementById("deladdress").value = officeDetails[1];
            document.getElementById("deleircode").value = officeDetails[2];
            document.getElementById("dellocation").value = officeDetails[3];
            document.getElementById("delstatus").value = officeDetails[4];
            document.getElementById("delaskingprice").value = officeDetails[5];
            document.getElementById("delviewingtime").value = officeDetails[6];
            document.getElementById("delinternet").value = officeDetails[7];
            document.getElementById("delownershiptype").value = officeDetails[8];
            document.getElementById("delreception").value = officeDetails[9];
            document.getElementById("delarea").value = officeDetails[10];
            document.getElementById("delfloor").value = officeDetails[11];
            document.getElementById("dellayout").value = officeDetails[12];
            document.getElementById("deltel").value = officeDetails[13];
            document.getElementById("delaccess").value = officeDetails[14];
            document.getElementById("delsecurity").value = officeDetails[15];
            document.getElementById("delcanteen").value = officeDetails[16];
        }

      

        // Confirm if you want to save
        function confirmCheck(){
            var response;
            response = confirm('Are you sure want to delete the changes?');
            if(response){
            document.getElementById("delofficeid").readOnly = false;
            document.getElementById("deladdress").readOnly = false;
            document.getElementById("deleircode").readOnly = false;
            document.getElementById("dellocation").readOnly = false;
            document.getElementById("delviewingtime").readOnly = false;
            document.getElementById("delaskingprice").readOnly = false;
            document.getElementById("delinternet").readOnly = false;
            document.getElementById("delownershiptype").readOnly = false;
            document.getElementById("delreception").readOnly = false;
            document.getElementById("delarea").readOnly = false;
            document.getElementById("delfloor").readOnly = false;
            document.getElementById("dellayout").readOnly = false;
            document.getElementById("deltel").readOnly = false;
            document.getElementById("delaccess").readOnly = false;
            document.getElementById("delsecurity").readOnly = false;
            document.getElementById("delcanteen").readOnly = false;
                return true;
            }
            else{
                populate();
                return false;
            }
        }
  </script>
    <div class="card"> 

        <div class="content__top">
            <h2>Delete Office Property</h2>
            <h4>Please select a person and then click the delete button</h4>
        </div>

        <form action="DeleteOffice.php" method="post" onsubmit="confirmCheck()">
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
                        <div class="inputbox">
                            <label for="listOffice"> <span class="required"></span></label>
                            <select id="listOffice" name="listOffice" required onclick="populate()">
                              <option value="default">--Office List--</option>
                                <?php include "ListOffice.php"; ?>
                            </select>
                        </div>
                    </div>

                      <div class="office-panel">
                         <fieldset>
                            <legend>Office Details</legend>
                            <!-- Form to view -->
                            <p id="display"></p>

                            <div class="two-col">
                              <div class="col">
                                <div class="inputbox">
                      <label for="delofficeid">Office ID: </label>
                      <input type="text" name="delofficeid" id="delofficeid" readOnly>
                    </div>
                    <div class="inputbox">
                      <label for="deladdress">Address: </label>
                      <input type="text" name="deladdress" id="deladdress" readOnly>
                    </div>
                    <div class="inputbox">
                      <label for="deleircode">Eircode: </label>
                      <input type="text" name="deleircode" id="deleircode" title="Enter Eircode" pattern="^[A-Za-z][0-9]{2}[A-Za-z0-9]{4}$" readOnly>
                    </div>
                    <div class="inputbox">
                      <label for="dellocation">Location: </label>
                      <input type="text" name="dellocation" id="dellocation" title="Enter location..."  pattern="[A-Za-z\s\.,]+" readOnly>
                    </div>
                    <div class="inputbox">
                        <label for="delfloor">Floor: </label>
                         <input type="number" name="delfloor" id="delfloor" title="Enter floor number..." readOnly min="1">
                    </div>
                    <div class="inputbox">
                      <label for="delarea">Area: m²</label>
                      <input type="number" name="delarea" id="delarea" step="0.01" min="37" title="Enter area..." readOnly>
                    </div>
                    <div class="inputbox">
                      <label for="delaskingprice">Asking Price: </label>
                      <input type="number" name="delaskingprice" id="delaskingprice" title="Enter asking price...." step="0.01" readOnly>
                    </div>
                    <div class="inputbox">
                      <label for="deltel">Tel: </label>
                      <input type="text" id="deltel" name="deltel" title="Phone Number" pattern="[0-9\s\-\(\)]+"  readOnly>
                    </div>
					          <div class="inputbox">
                      <label for="delreception">Reception: </label>
                      <input type="text" id="delreception" name="delreception" readOnly>
                    </div>
					 <div class="inputbox">
                      <label for="delstatus">Status: </label>
                      <input type="text" id="delstatus" name="delreception" readOnly>
                    </div> 
          </div>
              <div class="col">
                      <div class="inputbox">
                      <label for="dellayout">Layout: </label>
                      <input type="text" id="dellayout" name="dellayout" title="Layout" readOnly>
                    </div>
                    <div class="inputbox">
                      <label for="delinternet">Internet: </label>
                      <input type="text" name="delinternet" id="delinternet" readOnly title="Internet..">
                    </div>
                    <div class="inputbox">
                      <label for="delaccess">Access: </label>
                      <input type="text" name="delaccess" id="delaccess" readOnly>
                    </div>
                    <div class="inputbox">
                      <label for="delsecurity">Security: </label>
                      <input type="text" name="delsecurity" id="delsecurity" readOnly>
                    </div>
                    <div class="inputbox">
                      <label for="delcanteen">Canteen: </label>
                      <input type="text" name="delcanteen" id="delcanteen" readOnly>
                    </div>
                    <div class="inputbox">
                      <label for="delownershiptype">Ownership Type: </label>
                      <input type="text" name="delownershiptype" id="delownershiptype" readOnly title="Ownership">
                    </div>
                    <div class="inputbox">
                      <label for="delviewingtime">Viewing Time: </label>
                      <input type="text" name="delviewingtime" id="delviewingtime" readOnly>
                    </div>
                              </div>
                            </div>

                            <div class="form-actions">
                            <input type="reset" name="cancel" value="Cancel">
                            <input type="submit" value="Delete Office Property" name="submit" onclick="confirmChange(event)">
                            </div>
                         </fieldset>
                    </div>
                </div>
            </div>
        </form>   
    </div>

    <!-- Message that confirms the record has been submitted -->
     <!-- <script>
        function confirmChange(e){
            let result = confirm("Are you sure (Y/N)?");
            if(!result){
                e.preventDefault();
            }
        }
    </script> -->

    <?php 
        session_destroy();
    ?>

</body>
</html>
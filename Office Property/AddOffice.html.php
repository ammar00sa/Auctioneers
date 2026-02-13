<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Office Property</title>   
    <link rel="stylesheet" href="style.css">                                        
</head>
<body>
    <div class="card"> 
        <div class="content__top">
            <h2>Add New Office Property</h2>
        </div>

        <form action="AddOffice.php" method="post">
            <div class="layout">
                <aside class="sidebar">
                    <div class="brand-side">
                        <img src="logo.png" alt="Logo" class="brand-side__logo"/>
                    </div>

                    <nav>
                        <div class="side-title">Property Maintenance</div>
                        <ul class="side-menu">
                            <li><a class="side-menu__link" href="property.html"><i class="fa-solid fa-house"></i><span>Add a New Residential Property</span></a></li>
                            <li><a class="side-menu__link" href="delete-residential.html"><i class="fa-solid fa-trash"></i><span>Delete a Residential Property</span></a></li>
                            <li><a class="side-menu__link" href="edit-residential.html"><i class="fa-solid fa-pen-to-square"></i><span>Amend/View a Residential Property</span></a></li>
                            
                            <div class="side-divider"></div>
                            
                            <li><a class="side-menu__link is-active" href="add-land.html"><i class="fa-solid fa-tree"></i><span>Add a New Land Property</span></a></li>
                            <li><a class="side-menu__link" href="delete-land.html"><i class="fa-solid fa-trash"></i><span>Delete a Land Property</span></a></li>
                            <li><a class="side-menu__link" href="edit-land.html"><i class="fa-solid fa-pen-to-square"></i><span>Amend/View a Land Property</span></a></li>
                            
                            <div class="side-divider"></div>
                            
                            <li><a class="side-menu__link" href="AddOffice.html.php"><i class="fa-solid fa-building"></i><span>Add a New Office Property</span></a></li>
                            <li><a class="side-menu__link" href="DeleteOffice.html.php"><i class="fa-solid fa-trash"></i><span>Delete an Office Property</span></a></li>
                            <li><a class="side-menu__link" href="AmendViewOffice.html.php"><i class="fa-solid fa-pen-to-square"></i><span>Amend/View an Office Property</span></a></li>
                            <li class="danger"><a class="side-menu__link" href="home.html"><i class="fa-solid fa-house"></i><span>Exit</span></a></li>
                        </ul>
                    </nav>
                </aside>

                <div class="office-grid">
                    <div class="office-panel">
                        <div class="inputbox">
                            <label for="listClientID"> <span class="required"></span></label>
                            <select id="listClientID" name="listClientID" required>
                                <?php include "ListClient.php"; ?>
                            </select>
                        </div>
                    </div>

                    <div class="office-panel">
                        <fieldset>
                            <legend>Office Details</legend>
                            <div class="two-col">
                                <div class="col">
                                    <div class="inputbox">
                                        <label for="address">Address: </label>
                                        <textarea name="address" id="address" rows="3" cols="20" placeholder="Enter full address..." required pattern="[A-Za-z0-9\s\.,]+" maxlength="500" title="Enter Address.."></textarea> <span style="color: red;">*</span>
                                    </div>
                                    <div class="inputbox">
                                        <label for="status">Status: </label>
                                        <select name="status" id="status" title="Enter Status...">
                                            <option value="">--Status--</option>
                                            <option value="Available">Available</option>
                                            <option value="NotAvailable">Not Available</option>
                                        </select><span style="color: red;">*</span>
                                    </div>
                                    <div class="inputbox">
                                        <label for="eircode">Eircode: </label>
                                        <input type="text" name="eircode" id="eircode" title="Enter Eircode" pattern="^[A-Za-z][0-9]{2}[A-Za-z0-9]{4}$" title="Eircode must be 7 characters" placeholder="A1245B8" required><span style="color: red;">*</span>
                                    </div>
                                    <div class="inputbox">
                                        <label for="location">Location: </label>
                                        <input type="text" name="location" id="location" title="Enter location..." required pattern="[A-Za-z\s\.,]+"><span style="color: red;">*</span>
                                    </div>
                                    <div class="inputbox">
                                        <label for="floor">Floor: </label>
                                        <input type="number" name="floor" id="floor" title="Enter floor number..." required placeholder="1,2,3.." min="1"><span style="color: red;">*</span>
                                    </div>
                                    <div class="inputbox">
                                        <label for="area">Area: </label>
                                        <input type="number" name="area" id="area" step="0.01" min="37" title="Enter area..." placeholder="Minimum of 37m²" required>m²<span style="color: red;">*</span>
                                    </div>
                                    <div class="inputbox">
                                        <label for="price">Asking Price: </label>
                                        <input type="number" name="price" id="price" title="Enter asking price...." placeholder="0.00" step="0.01"><span style="color: red;">*</span>
                                    </div>
                                    <div class="inputbox">
                                        <label for="tel">Tel: </label>
                                        <input type="text" id="tel" name="tel" title="Phone Number" pattern="[0-9\s\-\(\)]+" placeholder="(353) - 871262837" required><span class="required">*</span>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="inputbox">
                                        <label for="layout">Layout: </label>
                                        <input type="text" name="layout" id="layout" required title="Layout.." placeholder="e.g., large open area..."><span style="color: red;">*</span>
                                    </div>
                                    <div class="inputbox">
                                        <label for="internet">Internet: </label>
                                        <select name="internet" id="internet" required title="Enter internet...">
                                            <option value="">---Choose Internet---</option>
                                            <option value="wireless">Wireless</option>
                                            <option value="wired">Wired</option>
                                        </select><span style="color: red;">*</span>
                                    </div>
                                    <div class="inputbox">
                                        <label for="access">Access: </label>
                                        <select name="access" id="access" required title="Access....">
                                            <option value="">---Choose Access---</option>
                                            <option value="open">Open Access</option>
                                            <option value="closed">Closed Access</option>
                                        </select><span style="color: red;">*</span>
                                    </div>
                                    <div class="inputbox">
                                        <label for="reception">Reception facilities: </label>
                                        <select name="reception" id="reception" required title="Reception facilities....">
                                            <option value="">---Choose Reception Area---</option>
                                            <option value="receptionDesk">Reception Desk</option>
                                            <option value="receptionWaitingArea">Reception Waiting Area</option>
                                            <option value="receptionMeeting">Informal Meeting Area</option>
                                        </select><span style="color: red;">*</span>
                                    </div>
                                    <div class="inputbox">
                                        <label for="security">Type of security: </label>
                                        <select name="security" id="security" required title="Security....">
                                            <option value="">---Choose Security---</option>
                                            <option value="netwatch">Netwatch</option>
                                            <option value="Security Patrols">Security Patrols</option>
                                            <option value="access control">Access Control</option>
                                        </select><span style="color: red;">*</span>
                                    </div>
                                    <div class="inputbox">
                                        <label for="canteen">Canteen facilities: </label>
                                        <select name="canteen" id="canteen" required title="Canteen....">
                                            <option value="">--Choose Canteen Facilities--</option>
                                            <option value="free meal">Free Meal</option>
                                            <option value="hygiene">Hygiene Services</option>
                                            <option value="rest">Rest Facilities</option>
                                            <option value="water">Drinking Water</option>
                                        </select><span style="color: red">*</span>
                                    </div>
                                    <div class="inputbox">
                                        <label for="ownership">Type of ownership: </label>
                                        <select name="ownership" id="ownership" required title="Ownership...">
                                            <option value="">---Choose ownership---</option>
                                            <option value="freehold">Freehold</option>
                                            <option value="long lease">Long lease</option>
                                        </select><span style="color: red;">*</span>
                                    </div>
                                    <div class="inputbox">
                                        <label for="viewingtime">Viewing Times <span class="required">*</span></label>
                                        <select id="viewingtime" name="viewingtime" required title="Select Viewing Times...">
                                            <option value="">Select viewing time</option>
                                            <option value="monday">Monday (9am - 5pm)</option>
                                            <option value="tuesday">Tuesday (9am - 5pm)</option>
                                            <option value="wednesday">Wednesday (9am - 5pm)</option>
                                            <option value="thursday">Thursday (9am - 5pm)</option>
                                            <option value="friday">Friday (9am - 5pm)</option>
                                            <option value="weekend">Weekends (5pm - 8pm)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                            <input type="reset" name="cancel" value="Cancel">
                            <input type="submit" value="Add Office Property" name="submit" onclick="confirmChange(event)">
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </form>   
    </div>

    <script>
        function confirmChange(e){
            let result = confirm("Are you sure (Y/N)?");
            if(!result){
                e.preventDefault();
            }
        }
    </script>
</body>
</html>
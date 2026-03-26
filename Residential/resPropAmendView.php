<!-- Created by: Joseph Lalor
Date: 12/03/2026
Student Number: c00312883
Title: resPropAmendView.php
Purpose: A PHP file for amending a Residential Property record-->
<script>
// called after the page reloads to display the update confirmation message
function updated()
    {
        var address = "<?php echo $_POST['amendaddress']; ?>"; // address is injected from PHP into the script
        document.getElementById("updateMsg").style = "display; initial;"; // make the message field visible
        document.getElementById("updateMsg").value = "Record updated for " + address;
    }
</script>
<?php
include 'db.inc.php'; //include connection to database
// UPDATE query sets all editable fields on the matching residential record
$sql = "UPDATE Residential SET 
    Address = '$_POST[amendaddress]',
    AskingPrice = '$_POST[amendaskingprice]',
    Location = '$_POST[amendlocation]',
    ViewingTime = '$_POST[amendviewingtime]',
    Eircode = '$_POST[amendeircode]',
    NumBathrooms = '$_POST[amendbath]',
    NumBedrooms = '$_POST[amendbed]',
    Site = '$_POST[amendsite]',
    Notes = '$_POST[amendnotes]',
    Area = '$_POST[amendarea]',
    Type = '$_POST[amendtype]',
    HeatingType = '$_POST[amendheating]',
    NumLevels = '$_POST[amendlevels]',
    NumReception = '$_POST[amendrecept]',
    ClientID = '$_POST[amendclient]',
    Status = '$_POST[amendstatus]'
    WHERE ResidentialID = '$_POST[id]'"; // id identifies which record to update

if (!mysqli_query($con, $sql)) {
    echo "Error " . mysqli_error($con);
}
include 'resPropAmendView.html.php'; // reload the form so the user can continue viewing or amending
echo '<script>',
     'updated();', // call updated() after the page has loaded to show the confirmation message
     '</script>'
;
mysqli_close($con); //close database connection

?>
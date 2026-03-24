<!-- Created by: Joseph Lalor
Date: 12/03/2026
Student Number: c00312883
Title: resPropAmendView.php
Purpose: A PHP file for amending a Residential Property record-->
<script>
function updated()
    {
        var address = "<?php echo $_POST['amendaddress']; ?>";
        document.getElementById("updateMsg").style = "display; initial;";
        document.getElementById("updateMsg").value = "Record updated for " + address;
    }
</script>
<?php
include 'db.inc.php'; //include connection to database
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
    WHERE ResidentialID = '$_POST[id]'";

if (!mysqli_query($con, $sql)) {
    echo "Error " . mysqli_error($con);
}
include 'resPropAmendView.html.php';
echo '<script>',
     'updated();',
     '</script>'
;
mysqli_close($con); //close database connection

?>


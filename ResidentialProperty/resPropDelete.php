<!-- Created by: Joseph Lalor
Date: 24/03/2026
Student Number: c00312883
Title: resPropDelete.php
Purpose: A PHP file for deleting a Residential Property record from database-->
<script>
function updated()
    {
        var address = "<?php echo $_POST['address']; ?>";
        document.getElementById("updateMsg").style = "display; initial;";
        document.getElementById("updateMsg").value = "Record deleted for " + address;
    }
</script>
<?php
  include 'db.inc.php'; //include database connection

  //soft delete: set the Dflag to 1 instead of removing the record
  $sql = "UPDATE Residential SET DFlag = 1 WHERE ResidentialID = '$_POST[id]'";

  if (! mysqli_query($con,$sql )) //execute query and check for errors
  {
      echo "Error ".mysqli_error($con);
  }
include 'resPropDelete.html.php';
echo '<script>',
     'updated();',
     '</script>'
;
mysqli_close($con); //close database connection

?>
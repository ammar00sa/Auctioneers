<!-- Created by: Joseph Lalor
Date: 24/03/2026
Student Number: c00312883
Title: resPropDelete.php
Purpose: A PHP file for deleting a Residential Property record from database-->
<script>
// called after the page reloads to display the deletion confirmation message
function updated()
    {
        var address = "<?php echo $_POST['address']; ?>"; // address is injected from PHP into the script
        document.getElementById("updateMsg").style = "display; initial;"; // make the message field visible
        document.getElementById("updateMsg").value = "Record deleted for " + address;
    }
</script>
<?php
  include 'db.inc.php'; //include database connection

  // soft delete: sets DFlag to 1 rather than removing the row, preserving the record in the database
  $sql = "UPDATE Residential SET DFlag = 1 WHERE ResidentialID = '$_POST[id]'";

  if (! mysqli_query($con,$sql )) //execute query and check for errors
  {
      echo "Error ".mysqli_error($con);
  }
include 'resPropDelete.html.php'; // reload the delete page so the user can delete another property if needed
echo '<script>',
     'updated();', // call updated() after the page has loaded to show the confirmation message
     '</script>'
;
mysqli_close($con); //close database connection

?>
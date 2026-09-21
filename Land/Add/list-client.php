<!-- Name:                 AMMAR SALAH -->
<!-- Student Number:       C00313510 -->
<!-- Title:                Drop down Client list box php file -->
<!-- Date:                 8 FEB 2026 -->
<!-- Project Y2 2026 -->

<?php
    // Include database connection file
    include "db.inc.php";

    // Prepare the statement for the SELECT query
    $sql = "SELECT ClientID, Name FROM Client";

    // Error handling
    if(!$result = mysqli_query($con, $sql))
    {
        // Die kills rest of script
        die("Error loading clients: " . mysqli_error($con));
    }

    
    while($row = mysqli_fetch_array($result))
    {
        $ClientID = $row['ClientID'];
        $Name = $row['Name'];

        // Print each client in the listbox with their client id and name
        echo "<option value='$ClientID'>$ClientID - $Name</option>";
    }

    // Close connection
    mysqli_close($con);
?>

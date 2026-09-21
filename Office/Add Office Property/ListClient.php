<!-- Oyindamola Olaosun -->
<!-- C00313475 -->

<?php
    // Connects to the db file
    include "db.inc.php";

    // Selects all clients from the table
    $sql = "SELECT ClientID, Name FROM Client";
    // $sql = "SELECT ClientID, Name FROM Client WHERE DeletedFlag = 0";

    // Error Handling
    if (!$result = mysqli_query($con, $sql)) {
        die("Error in querying the database" . mysqli_error($con));
    }

    // listClientID
    // Using the mysqli_fetch_array()
    echo "<option value=''>---Client List----</option>";

    // mysqli_fetch_array($result) fetches a result row as an associative array
    while ($row = mysqli_fetch_array($result)) {
        $id   = $row['ClientID'];
        $name = $row['Name'];
        $text = "${id}. ${name}";
        echo "<option value='$text'>$id $name</option>";
    }

    echo "</select>";

    // Close the connection
    mysqli_close($con);
?>
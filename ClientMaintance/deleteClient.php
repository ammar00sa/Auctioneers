<html>
<body>

<?php
include 'db.inc.php';

date_default_timezone_set("UTC");




$sql = "SELECT * from Client";
$result = mysqli_query($con, $sql);

if (!mysqli_query($con,$sql))
{
    die ("An Error in the SQL Query: " . mysqli_error($con) );
}


while($row=mysqli_fetch_array($result))
    {

    $name = $row["Name"];

    echo "<tr>

    <td>$name</td>
    
    
    </tr>";



    }

mysqli_close($con);

?>



</body>
</html>
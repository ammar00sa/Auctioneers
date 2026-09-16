<!--

Name: Ismael Charaf Megrini 
Student Number: C00313241
Date: 2/26/2026
Purpose: Used to insert the data entered in the addClient.html file into the Clients table. 

-->

<html>
<body>

<?php
include 'db.inc.php'; // Connect to database

date_default_timezone_set("UTC");
echo "The details sent down are: <br>";

// Display the submitted client details
echo "Name is :" . $_POST['fname'] . "<br>";
echo "Eircode is :" . $_POST['eircode'] . "<br>";
echo "Phone number is :" . $_POST['phone'] . "<br>";
echo "Email address is :" . $_POST['email'] . "<br>";
echo "Client type is :" . $_POST['clientType'] . "<br>";
echo "The client Address is :" . $_POST['address'] . "<br>";

// Insert new client into database
$sql = "INSERT INTO Client (Name, Eircode, Phone, Email, ClientType, Address)
VALUES ('$_POST[fname]', '$_POST[eircode]', '$_POST[phone]','$_POST[email]', '$_POST[clientType]', '$_POST[address]' )";

if (!mysqli_query($con,$sql))
{
    // Show error if query fails
    die ("An Error in the SQL Query: " . mysqli_error($con) );
}

// Close database connection
mysqli_close($con);


?>
<form action = "addClient.html" method = "POST" > 
<br>
    <input type="submit" value = "Return to Insert Page"/> <!--Button that makes you return to the insert page--> 
</form>

</body>
</html>
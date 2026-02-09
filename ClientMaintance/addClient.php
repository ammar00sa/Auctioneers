<html>
<body>

<?php
include 'db.inc.php';

date_default_timezone_set("UTC");
echo "The details sent down are: <br>";

echo "Name is :" . $_POST['fname'] . "<br>";
echo "Eircode is :" . $_POST['eircode'] . "<br>";
echo "Phone number is :" . $_POST['phone'] . "<br>";
echo "Email address is :" . $_POST['email'] . "<br>";
echo "Client type is :" . $_POST['clientType'] . "<br>";
echo "The client Address is :" . $_POST['address'] . "<br>";


$sql = "INSERT INTO Client (Name, Eircode, Phone, Email, ClientType, Address)
VALUES ('$_POST[fname]', '$_POST[eircode]', '$_POST[phone]','$_POST[email]', '$_POST[clientType]', '$_POST[address]' )";

if (!mysqli_query($con,$sql))
{
    die ("An Error in the SQL Query: " . mysqli_error($con) );
}


mysqli_close($con);

?>
<form action = "addClient.html" method = "POST" >
<br>
    <input type="submit" value = "Return to Insert Page"/>
</form>

</body>
</html>
<html>
<?php
$con = mysqli_connect("localhost","root","","select_star");

if (!$con){ die('Could not connect: ' . mysqli_error()); }

mysqli_select_db($con,"select_star");

$username=$_POST['UserName'];
$FirstName= $_POST['PatientFName'];
$LastName= $_POST['PatientLName'];
$phone= $_POST['Phone'];
//$address= $_POST['mobileNo'];
//$address= $_POST['gender'];
//$address= $_POST['address'];
//$address= $_POST['pincode'];
//$address= $_POST['city'];
//$address= $_POST['emergency'];

 
$query  = "
UPDATE student
SET ID='$id',fname='$fname',lname='$lname',dob='$dob'
WHERE ID='$id'" ;

mysqli_query($con,$query);

echo " <p>Name - {$_POST['name']} </p> <br/> ";
echo " <p>Email - {$_POST['email']} </p> <br/>";
echo " <p>Phone number - {$_POST['phone']} </p> <br/>";
echo " <p>Address - {$_POST['address']} </p> <br/>";

echo "<a href='home.php'>Home</a><br/>";
?>
</html>


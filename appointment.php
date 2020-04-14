<?php
$con = mysqli_connect("localhost","root","","select_star");
if (!$con){
  die('Could not connect: ' . mysqli_error());
  }
mysqli_select_db($con,"select_star");

$patient_id= $_REQUEST['UserName'];
echo $patient_id;

$query = "SELECT * FROM patient p,patientemergency e where p.PatientID=e.PatientID and UserName='$patient_id'";
$result= mysqli_query($con,$query) or die (mysqli_error($con)); 
$row = mysqli_fetch_array($result);

if($row!= NULL)
{
?>
<html>

<center>

<h2>Fill in New Patient Details</h2>

<form action="appointmentsuccess.php" method="POST">
<table cellpadding=2 cellspacing=2 border="0">



</table>
</form>

</center>
</html>



</tr>

<?php
}
?>
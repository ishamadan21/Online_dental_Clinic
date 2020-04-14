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

<head>
	
<style type="text/css">

	body {
  margin: 0;
  font-family: Garamond;
  text-indent: right;
  background-image: url("bg4.jpg");
  background-size: 100%;
  background-opacity: 0.5;
}
.topnav {
  overflow: hidden;
  background-color: #000066;
}

.topnav a {
  float: right;
  color: #FFFFFF;
  text-align: right;
  padding: 20px 20px;
  text-decoration: none;
  font-size: 17px;
  font-weight: bold;

}

.topnav a:hover {
  background-color: #FFFFFF ;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

#logo{
  float: left;
  opacity: 0.75;
}


table{
	border-collapse: collapse;
	font-size: 20px;
	font-weight: bold;
	font-family: Garamond;
}

</style>



</head>
<body>

<div>
  <a href="homepage.html"><img id="logo" src="toothimage.jpg" height="60px" width="70px" style="padding-top: 15px;"></a>
  <h2 style="padding-top: 35px; font-family: Verdana; color: #003d66; padding-left: 10px">SelectStar Dental Clinic</h2>
</div>  


<header style="width: 100%">
  <div class="topnav" >
  <a href="homepage.html">Logout</a>
  <a href="contact.html">Contact</a>
  </header>

<center>

<h2>Fill in New Patient Details</h2>

<form action="edit_patient_success.php" method="POST">
<table cellpadding=2 cellspacing=2 border="0">
<input type="hidden" name="PatientID" value="<?php echo $row['PatientID']; ?>" >

<tr>
<th>Username of Patient</th>
<td><input name="UserName" type="email" value="<?php echo $row['UserName']; ?>"></td>
</tr>

<tr>
<th>Password of Patient</th>
<td><input name="Password" type="password" value="<?php echo $row['password']; ?>"></td>
</tr>

<tr>
<th>First Name of the patient</th>
<td><input name="PatientFName" type="text" value="<?php echo $row['PatientFName']; ?>"></td>
</tr>

<tr>
<th>Last Name of the patient</th>
<td><input name="PatientLName" type="text" value="<?php echo $row['PatientLName']; ?>"></td>
</tr>

<tr>
<th>Date Of Birth(YYYY-MM-DD)</th>
<td><input name="DOB" type="text" value="<?php echo $row['DOB']; ?>"></td>
</tr>

<tr>
<th>Mobile No</th>
<td><input name="Phone" type="text" value="<?php echo $row['Phone']; ?>"></td>
</tr>
<tr>
<th>Gender</th>
<td> <input type="radio" name ="gender" value="Male">Male
<input type="radio" name="gender" value="Female" required>Female
<input type="radio" name="gender" value="Other" required>Other</td>
</tr>
<tr>
<th>Address</th>
<td ><input name="Address1" type ="text"  value="<?php echo $row['Address1']; ?>"></td>
</tr>
<tr>
<th>City</th>
<td ><input name="City1" type ="text"  value="<?php echo $row['City1']; ?>"></td>
</tr>
<tr>
<th>State</th>
<td ><input name="State1" type ="text"  value="<?php echo $row['State1']; ?>"></td>
</tr>
<tr>
<th>Zip Code</th>
<td ><input name="Zip1"  value="<?php echo $row['Zip1']; ?>"></td>
</tr>
<tr>
<th>Emergency First Name</th>
<td ><input name="PatientEFName"  value="<?php echo $row['PatientEFName']; ?>"></td>
</tr>
<tr>
<th>Emergency Last Name</th>
<td ><input name="PatientELName"  value="<?php echo $row['PatientELName']; ?>"></td>
</tr>
<tr>
<th>Emergency Phone No.</th>
<td ><input name="EPhone"  value="<?php echo $row['EPhone']; ?>"></td>
</tr>

<tr>
<td><input type="submit" value="Update Patient" /></td>
<td><input type="Reset" value="Reset" /></td>

</tr>

<?php
}
?>


</form>

</center>
</body>
</html>
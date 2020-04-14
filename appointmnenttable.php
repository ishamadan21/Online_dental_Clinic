<!DOCTYPE html>
<html>
<head>
	<title></title>
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

	</style>
</head>
<body>
<div>
  <a href="homepage.html"><img id="logo" src="toothimage.jpg" height="60px" width="70px" style="padding-top: 15px;"></a>
  <h2 style="padding-top: 35px; font-family: Verdana; color: #003d66; padding-left: 10px">SelectStar Dental Clinic</h2>
</div>  


<header style="width: 100%">
  <div class="topnav" >
  <a href="contact.html">Contact</a>
  </header>



<?php
session_start();

// echo is used to output text with php


// storing the query in a variable called $query
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "select_star";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(!mysqli_select_db($conn,'select_star'))
{
	echo 'Database not selected';
}
  // Displaying Selected Value 
$selected = $_POST['select2'];
  echo $selected ;
  $query12 = "SELECT * from dentist where DentistFname = '$selected'";
 
$PatientD = $_POST['PatientD'];
$PatientT = $_POST['PatientT'];

$result= mysqli_query($conn,$query12) or die('Query failed: ' . mysqli_error($conn)); 
 $numresults= mysqli_query($conn,$query12);
 $numrows=mysqli_num_rows($numresults);
 
$pid = -1;
 if ($numrows > 0){
    
	while($row = mysqli_fetch_array($result))
 { 
	$pid = $row['DentistID'];
	ECHO '....';
	echo $pid;
	ECHO '....';
	
}
}
$PatientID=$_SESSION['PatientID'] ;
echo $PatientID;
$query14= "select * from appointment where PatientID='$PatientID' and AppointmentDate='$PatientD' and AppointmentTime = '$PatientT'";
$result1= mysqli_query($conn,$query14) or die('Query failed: ' . mysqli_error($conn)); 
 $numresults1= mysqli_query($conn,$query14);
 $numrows1=mysqli_num_rows($numresults1);
 if ($numrows1 == 0){

$query13 = "select * from appointment where DentistID='$pid' and AppointmentDate='$PatientD' and AppointmentTime = '$PatientT'";
$result2= mysqli_query($conn,$query13) or die('Query failed: ' . mysqli_error($conn)); 
 $numresults2= mysqli_query($conn,$query13);
 $numrows2=mysqli_num_rows($numresults2);
 
 if ($numrows2 == 0){
	 
	 
$query22 = "INSERT INTO appointment(AppointmentDate, AppointmentTime, PatientID , DentistID)
VALUES ('$PatientD','$PatientT','$PatientID', '$pid' )";
if(!mysqli_query($conn,$query22))
{
	echo 'Not inserted';
	header("Location: appoint.html");
}
else
{
	echo 'Inserted';
	header("Location: appointmentsuccess.php"); 
}
 }
 else{
	 echo '<h1 align="center">The slot has already booked with this Dentist.</h1> <br><h2 align="center"> Please book another Appointment <br> <a href="appoint.html" align="center">Here</a></h2>';
 }
 }
 else{
	 echo '<h1 align= "center">You already have an appointment on this date at the same time</h1><h2 align="center"> Please book another Appointment <br> <a href="appoint.html" align="center">Here</a></h2>';
 }
 


//$query1=("INSERT INTO patient(UserName,password,PatientFName,PatientLName,Phone,DOB,Address1,City1,State1,Zip1,Gender)
//VALUES ('$UserID','$Password','$FirstName','$LastName','$Mobile','$DOB','$Address','$State','$City','$Pincode','$Gender')");
//if(!mysqli_query($conn,$query1))
//{
	//echo 'Not inserted';
//}
//else
//{
	//echo 'Inserted'; 
//}



mysqli_close($conn);

echo "<br/>";


?>


</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <title>View Appointment</title>
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
  
  <a href="contact.html">Contact</a></div>
  <a href="appoint.html">Book another appointment</a></div>

  </header>

<h2 align="center">Appointment Confirmation Table</h2>


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

$PatientID=$_SESSION['PatientID'] ;

$query3= "select p.PatientFName,p.Phone,pe.PatientEFName,pe.PatientELName,pe.EPhone,d.DentistFName,d.Phone,d.Specialisation,a.AppointmentDate,a.AppointmentTime FROM appointment a, patient p,patientemergency pe,dentist d WHERE a.PatientID = p.PatientID and a.DentistID = d.DentistID and p.patientID = pe.PatientID and p.PatientID='$PatientID'";

$result= mysqli_query($conn,$query3) or die('Query failed: ' . mysqli_error($conn)); 
 $numresults= mysqli_query($conn,$query3);
 $numrows=mysqli_num_rows($numresults);

 if($numrows<1){
 	echo '<h1 align="center">No Appointment made</h1>';
  

 }
 else{
echo '<table align="center" cellpadding="5px" style="font-weight: bolder; text-align: center;" border="1">';
echo	"<tr>
		<td>Patient Name:</td>
		<td>Patient Phone No.:</td>
		<td>Patient Emergency Contact Name:</td>
		<td>Patient Emergency Contact No.:</td>
		<td>Dentist Name:</td>
		<td>Dentist No:</td>
		<td>Dentist Specialization:</td>
		<td>Appointment Date:</td>
		<td>Appointment Time:</td>
	</tr>";
  

 	while($row_prod = mysqli_fetch_array($numresults)){
 	echo "<tr>";
    echo "<td>".$row_prod['PatientFName']."</td>";
    echo "<td>".$row_prod['Phone']."</td>";
    echo "<td>".$row_prod['PatientEFName']."</td>";
    echo "<td>".$row_prod['EPhone']."</td>";
    echo "<td>".$row_prod['DentistFName']."</td>";
    echo "<td>".$row_prod['Phone']."</td>";
    echo "<td>".$row_prod['Specialisation']."</td>";
    echo "<td>".$row_prod['AppointmentDate']."</td>";
    echo "<td>".$row_prod['AppointmentTime']."</td>";
    //echo "<tr><td>Room No.: ".$row_prod['Phone']."</td></tr>";
    //echo "<tr><td>Location: ".$row_prod['Phone']."</td></tr>";
    echo "</tr></table>";

    

 }}

?>



</body>
</html>
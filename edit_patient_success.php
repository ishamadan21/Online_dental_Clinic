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
  <a href="contact.html">Contact</a>
  </header>

<?php
$con = mysqli_connect("localhost","root","","select_star");

if (!$con){ die('Could not connect: ' . mysqli_error()); }

mysqli_select_db($con,"select_star");


$UserName= $_POST['UserName'];
$Password= $_POST['Password'];
$FirstName= $_POST['PatientFName'];
$LastName=$_POST['PatientLName'];
$DOB=$_POST['DOB'];
$Phone=$_POST['Phone'];
$Address1= $_POST['Address1'];
$City1= $_POST['City1'];
$State1= $_POST['State1'];
$Zip1= $_POST['Zip1'];
$PatientEmergencyFirst = $_POST['PatientEFName'];
$PatientEmergencyLast = $_POST['PatientELName'];
$PatientEmergencyPhone = $_POST['EPhone'];


 
$query  = "
UPDATE patient 
SET UserName='$UserName',Password='$Password',PatientFName='$FirstName' , PatientLName='$LastName', DOB='$DOB', Phone='$Phone',
Address1='$Address1', City1='$City1', State1='$State1', Zip1='$Zip1'
WHERE UserName='$UserName'" ;
mysqli_query($con,$query);

$query12 = "SELECT * from patient where UserName = '$UserName'";

$result= mysqli_query($con,$query12) or die('Query failed: ' . mysqli_error($con)); 
 $numresults= mysqli_query($con,$query12);
 $numrows=mysqli_num_rows($numresults);
 $pid = -1;
 if ($numrows > 0){
    //echo ("<h3>anbvvebrbui match Found</h3>");
	while($row = mysqli_fetch_array($result))
 { 
	$pid = $row['PatientID'];
	$query2 = "Update patientemergency SET PatientEFName = '$PatientEmergencyFirst',PatientELName='$PatientEmergencyLast', EPhone='$PatientEmergencyPhone'  where PatientID = '$pid'";
}
}

if(!mysqli_query($con,$query2))
{
	echo 'not updated';
}
else
{
	echo "<h1>Successfully Updated</h1>"; 
}
echo "<a href='homepage.html'><br>Goto HomePage</a>";
?>
</body>
</html>


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

<h3><a href='addPatient2.html'>Add Patient</a></h3>;


<?php


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

$UserID = $_POST['UserName'];
$Password = $_POST['password'];
$FirstName = $_POST['PatientFName'];
$LastName = $_POST['PatientLName'];
$DOB = $_POST['DOB'];
$Mobile = $_POST['Phone'];
$Gender = $_POST['Gender'];
$Address = $_POST['Address1'];
$Pincode = $_POST['Zip1'];
$City = $_POST['City1'];
$State = $_POST['State1'];
$EmerFirst = $_POST['PatientEFName'];
$EmerLast = $_POST['PatientELName'];
$EmerMobile = $_POST['EPhone'];

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

$query22 = "INSERT INTO patient(UserName, password, PatientFName, PatientLName, Phone, DOB, Address1, City1, State1, Zip1, Gender) 
VALUES ('$UserID','$Password','$FirstName','$LastName','$Mobile','$DOB','$Address','$City','$State','$Pincode','$Gender')";

$result= mysqli_query($conn,$query22) or die('Query failed: ' . mysqli_error($conn)); 


$query12 = "SELECT * from patient where UserName = '$UserID'";



$result= mysqli_query($conn,$query12) or die('Query failed: ' . mysqli_error($conn)); 
 $numresults= mysqli_query($conn,$query12);
 $numrows=mysqli_num_rows($numresults);
 
$pid = -1;
 if ($numrows > 0){
    
	while($row = mysqli_fetch_array($result))
 { 
	$pid = $row['PatientID'];
}
}

echo "<br/>";
$query2 = ("Insert Into patientemergency(PatientID,PatientEFName,PatientELName,EPhone) VALUES ('$pid','$EmerFirst','$EmerLast','$EmerMobile')");
if(!mysqli_query($conn,$query2))
{
	echo 'Sorry ! Patient cannot be added';
}
else
{
	

echo '<h1>Patient added Successfully !</h2>';
echo "<h3><a href='homepage.html'>Logout</a></h3>";

}
//mysqli_query($conn,$query1);


// executing the query

//mysqli_query($conn,$query2);
echo "<br/>";
//echo $query; 

//closing the connection
mysqli_close($conn);

echo "<br/>";



?>

</body>
</html>
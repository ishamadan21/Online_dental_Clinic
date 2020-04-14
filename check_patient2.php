<?php
$con = mysqli_connect("localhost","root","","select_star");
if (!$con){ die('Could not connect: ' . mysqli_error()); }
mysqli_select_db($con,"select_star");

$searchtext=$_GET['searchtext'];

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



</style>

</head>
<body>
<div>
  <a href="homepage.html"><img id="logo" src="toothimage.jpg" height="60px" width="70px" style="padding-top: 15px;"></a>
  <h2 style="padding-top: 35px; font-family: Verdana; color: #003d66; padding-left: 10px">SelectStar Dental Clinic</h2>
</div>  


<header style="width: 100%">
  <div class="topnav" >
  <a href="manage_patient2.html">Back</a>
  <a href="contact.html">Contact</a>
  </header>
<form action="login_trial.php" method="POST">


<center>
<h2>Search Results</h2>

<?php

 $query = "SELECT * FROM patient p,patientemergency e where p.PatientID=e.PatientID AND p.UserName = '$searchtext'";
 $result= mysqli_query($con,$query) or die('Query failed: ' . mysqli_error($con)); 
 $numresults= mysqli_query($con,$query);
 $numrows=mysqli_num_rows($numresults);
 

 if ($numrows == 0){
    echo ("<h3>No match Found</h3>");
}
 	
 else	
 {	
?>
<table style="border: 3px solid black; font-weight: bolder;" cellpadding="5px" align="center">


<?php
while($row = mysqli_fetch_array($result))
 { 
 ?>
 


<tr >
  <td>Username:</td>
<td><?php echo $row['UserName']; ?></td></tr>

<tr>
  <td>First Name of Patient:</td>
<td><?php echo $row['PatientFName']; ?></td></tr>

<tr>
  <td>Last Name of Patient:</td>
<td><?php echo $row['PatientLName']; ?></td></tr>

<tr><td>Date of Birth:</td>
<td><?php echo $row['DOB']; ?></td></tr>

<tr><td>Mobile No.</td>
<td><?php echo $row['Phone']; ?></td></tr>

<tr><td>Gender:</td>
<td><?php echo $row['Gender']; ?></td></tr>

<tr><td>Address:</td>
<td><?php echo $row['Address1']; ?></td></tr>

<tr><td>ZipCode:</td>
<td><?php echo $row['Zip1'] ?></td></tr>

<tr><td>City:</td>
<td><?php echo $row['City1']; ?></td></tr>

<tr><td>State:</td>
<td><?php echo $row['State1']; ?></td></tr>

<tr><td>First Name of emergency contact</td>
<td><?php echo $row['PatientEFName']; ?></td></tr>

<tr><td>Last Name of emergency contact</td>
<td><?php echo $row['PatientELName']; ?></td></tr>

<tr><td>Phone number of emergency contact</td>
<td><?php echo $row['EPhone']; ?></td></tr>

<tr>
<td align="center"><a href="edit_patient2.php?UserName=<?php echo $row['UserName']; ?>"><b>Edit</b></a></td>
<td align="center"><a href="delete_patient.php?UserName=<?php echo $row['UserName']; ?>"><b>Delete</b></a></td>
</tr>
<?php 
  
   }  //end of while
   
 }  //end of else i.e match is found
 ?>
 </table>
</center>

</body>
</html>






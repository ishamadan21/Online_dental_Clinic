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

$patient_id= $_REQUEST['UserName'];
echo $patient_id;
 
$query  = "DELETE FROM patient
WHERE UserName= '$patient_id'" ;

mysqli_query($con,$query);
?>
<h1> Patient has been deleted ! </h1> <br/>

<a href='homepage.html'>Go to Home</a><br/>

</body>
</html>
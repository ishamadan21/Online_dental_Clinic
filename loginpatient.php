<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- CSS -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen, projection, tv" />
<!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="css/style-ie.css" media="screen, projection, tv" /><![endif]-->
<link rel="stylesheet" href="css/style-print.css" type="text/css" media="print" />

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

<title>Website name | Homepage</title>
</head>

<body>

<div id="main">

	<!-- Header -->
	<div id="header">
		<div id="header-in">
			<ul id="navigation">
				
		</ul>
		
		
			<br>
		<h2>Login</h2>
			<p>&nbsp;</p>
      
			<!-- Your slogan end -->
			<!-- Your slogan end -->

		<!-- Search form -->
		
		<!-- Search end -->		
		</div>
	</div>
	<!-- Header end -->
	
	<!-- Menu -->

	<?php
	if(!isset($_SESSION['logged']) && !isset($_REQUEST['login']))
	{
echo "Sorry, Please login to access this page";
exit;
}
		
	
$con = mysql_connect("localhost","root","");
if (!$con)
  {
	  echo "could not connect";
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("mat", $con);

$uname= $_GET["text1"];
$pass=$_GET["text2"];
$sql="SELECT * from registration WHERE username='$uname' and password='$pass'";
//echo $sql;
$qq="SELECT * from admin WHERE userID='$uname' and password='$pass'";
$rs2=mysql_query($qq);
$rs=mysql_query($sql);
if(mysql_num_rows($rs2)>0)
{

   header( 'Location: admin.php?login=login' ) ;
exit();

}
if(mysql_num_rows($rs)>0)
{
//session_start();

	$_SESSION['logged']="logged";
	$q=mysql_query("select * from registration where username='$uname'");
	$row = mysql_fetch_array($q);
	if(isset($_SESSION['logged']))
	{
	$uname=$row['username'];
	echo "<br><p align=left> Welcome! ". "<font size=3><i>". $row['username']. "</i></font></p>" . "<font size=4 color='#000000'>". "APPLICATION FORM </font>";
	echo "<br><p align=left> <font size=2 color=blue><a href=viewcard.php?userID=$uname>". "Print Your Admit Card" . "</a></font></p><br>";
echo "<center><div id=table><table background='images/logo_niit.jpg'>";
echo "<tr><td colspan=2><img align='middle' src='upload/". $uname.".jpg"."'></img>ADMIT CARD</td></tr>";
echo "<tr><th>Full Name of the candidate<hr color=orange></th><hr color=blue><br><th>". $row['cname']. "<br><hr color=orange></th>" .
"<tr><td>Date of Registration</td>". "<td>" .$row['reg_date']."</td>".
"<tr><td>Category</td>". "<td>" .$row['category']."</td>".
"<tr><td>Father's Name</td>". "<td>" .$row['faname']."</td>".
"<tr><td>Mother's Name</td>". "<td>" .$row['moname']."</td>".
"<tr><td>Date Of Birth</td>". "<td>" .$row['dob']."</td>".
"<tr><td>E-Mail id</td>". "<td>" .$row['email']."</td>".
"<tr><td>Mobile No.</td>". "<td>" .$row['mobile']."</td>".
"<tr><td>Gender</td>". "<td>" .$row['gender']."</td>".
"<tr><td>Address</td>". "<td>" .$row['address']."</td>".
"<tr><td>Pin Code</td>". "<td>" .$row['pin']."</td>".
"<tr><td>State/Province</td>". "<td>" .$row['state']."</td>".
"<tr><td>City</td>". "<td>" .$row['city']."</td>".
"<tr><td>Nationality</td>". "<td>" .$row['nationality']."</td>".
"<tr><td>Religion</td>". "<td>" .$row['religion']."</td>".
"<tr><td>Physical Disabilty</td>". "<td>" .$row['phydis']."</td>".
"<tr><td>Preferred City1</td>". "<td>" .$row['precity1']."</td>".
"<tr><td>Preferred City2</td>". "<td>" .$row['precity2']."</td>".
"<tr><td>Preferred City3</td>". "<td>" .$row['precity3']."</td>".
"<tr><td>Preferred Exam Date1</td>". "<td>" .$row['doe1']."</td>".
"<tr><td>Preferred Exam Date2</td>". "<td>" .$row['doe2']."</td>".
"<tr><td>Preferred Exam Date3</td>". "<td>" .$row['doe3']."</td>".
"<tr><td>10+2 Years</td>". "<td>" .$row['tenplustwo']."</td>".
"<tr><td>Bachelors Degree</td>". "<td>" .$row['bachdeg']."</td>".
"<tr><td>Graduation Percentage</td>". "<td>" .$row['graduper']."</td>".
"<tr><td>Year of Qualifying Exam</td>". "<td>" .$row['qualyear']."</td>".
"<tr><td>Qualifying Degree</td>". "<td>" .$row['qualdeg']."</td>".
"<tr><td>Qualifying University</td>". "<td>" .$row['qualuniv']."</td>";
echo "<br></div></table></center>";
  //echo $row['username'];
 //echo  $row['password'];
}
 else
  echo "Your session has been expired.Please login again";
 }
  else
  echo 'Sorry!!!.You are not a registered candidate';
  
?>
</div>
</body>
</html>
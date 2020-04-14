<?php
session_start();

if (true) 
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "select_star";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(!mysqli_select_db($con,'select_star'))
{
	echo 'Database not selected';
}
	$email = mysqli_real_escape_string($con, $_POST['username']);
	$pwd = mysqli_real_escape_string($con, $_POST['password']);

	$sql = "SELECT * FROM Patient WHERE UserName='$email'";
	$result = mysqli_query($con, $sql);
	$resultCheck = mysqli_num_rows($result);
		
	if ($resultCheck < 1) //if email-id not found
	{
		//echo "User not found";
			$sql = "SELECT * FROM admin WHERE username='$email'";
	$result = mysqli_query($con, $sql);
	$resultCheck = mysqli_num_rows($result);
		
	if ($resultCheck < 1) //if email-id not found
	{
		echo "User not found";
	}
	else 
	{
		if ($row = mysqli_fetch_assoc($result)) 
		{
			//De-hashing the password
			//$hashedPwdCheck = password_verify($pwd, $row['password']);
			if($pwd == $row['password']){
				//$_SESSION['PatientID'] = $row['PatientID'];
				//$_SESSION['username'] = $row['UserName'];
				//echo "User Set";
				
				//$_SESSION['address'] = $row['address'];
				header("Location: manage_patient2.html");
			}
			else {
				echo "User not set";
			}
			
		}
	}
	}
	else 
	{
		if ($row = mysqli_fetch_assoc($result)) 
		{
			//De-hashing the password
			//$hashedPwdCheck = password_verify($pwd, $row['password']);
			if($pwd == $row['password']){
				$_SESSION['PatientID'] = $row['PatientID'];
				$_SESSION['username'] = $row['UserName'];
				echo "User Set";
				
				//$_SESSION['address'] = $row['address'];
				header("Location: appoint.html");
			}
			else {
				echo "User not set";
			}
			
			//if ($hashedPwdCheck == false) 
			//{
			//	header("Location: ../login.php?login=pwderror");
				//exit();
			//} 
			//else if ($hashedPwdCheck == true) 
			//{
				
				//Log in the user here
				//$_SESSION['name'] = $row['name'];
				//$_SESSION['email'] = $row['email'];
				//$_SESSION['address'] = $row['address'];

			}
		}
	}
	else {
		echo "Hi";
	}
?>
<html>

<head>

<link rel = "stylesheet" href = "style.css">
<title>Title</title>

<script>
function reg_success()
{
document.getElementById('reg_div').innerHTML = '<br><br><br><br><br><br><br><div class = "reg_success">Registration Successful.<br>Please login to continue.</div>';
}
</script>

</head>

<body style = "margin: 0px; background-color: #B4EEB4">

<div class = "logindiv">

<div class = "logo">
<h1 class = "logo_text">Title</h1>
</div>

<?php
include 'login.php';
?>

</div>

<div id = "reg_div" class = "registerdiv">

<h1>Sign Up Here</h1>

<?php
include 'register.php';
?>

</div>

</html>


<?php

require 'database.php';
require 'core.php';

if(!loggedin())
{
	if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['pass_again']) && isset($_POST['dob']) && isset($_POST['sex']))
	{
		$fname = htmlentities($_POST['fname']);
		$lname = htmlentities($_POST['lname']);
		$email = htmlentities($_POST['email']);
		$pass = htmlentities($_POST['pass']);
		$pass_again = htmlentities($_POST['pass_again']);
		$dob = $_POST['dob'];
		$sex = $_POST['sex'];
		
		@session_start();
		$_SESSION['fname']=$fname;
		$_SESSION['lname']=$lname;
		$_SESSION['email']=$email;
		$_SESSION['dob']=$dob;
		
			if(strlen($pass)<6)
			{
				header('Refresh:0; url = index.php');
				echo "<script>window.alert('Password must be at least 6 characters long.');</script>";
			}	
			else if($pass != $pass_again)
			{
				header('Refresh:0; url = index.php');
				echo "<script>window.alert('Password does not match');</script>";
			}
			else if(!preg_match("/^[a-zA-Z]*$/",$fname) || !preg_match("/^[a-zA-Z ]*$/",$lname))
			{
				header('Refresh:0; url = index.php');
				echo "<script>window.alert('Name contains invalid characters.');</script>";
			}
			else
			{
				//echo $fname."<br>".$lname."<br>".$email."<br>".$dob."<br>".$sex;
				$pass_hash = md5($pass);
				$query = "SELECT `email` FROM `details` WHERE `email` = '$email'";
				$query_run = mysql_query($query);
				if(mysql_num_rows($query_run) >= 1)
					//echo "Email <b>$email</b> is already registered.";
					{
						header('Refresh:0; url = index.php');
						echo "<script>window.alert('$email is already registered.');</script>";
					}
				else
				{
					$a = 'a:1:{i:0;s:1:"0";}';
					$query = "INSERT INTO `details` VALUES('','".mysql_real_escape_string($fname)."','".mysql_real_escape_string($lname)."','".mysql_real_escape_string($email)."','".mysql_real_escape_string($pass_hash)."','".mysql_real_escape_string($dob)."','".mysql_real_escape_string($sex)."','$a','$a','1')";
					if (mysql_query($query))
					{
						//echo 'Registration successful. Please wait while you are being redirected to login page.'.'<br><br>';
						//header('Refresh: 3; url= index.php');
						echo "<script>reg_success();</script>";
					}
					else
						echo 'We are unable to process your request at this time please try after some time';
				}
			}
		
	}
}

?>
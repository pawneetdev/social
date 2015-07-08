 
 <head>
 <link rel = "stylesheet" href = "style.css">
 </head>
 
 <div style = "margin-right:30px"; align = "right">
 <form action = "index.php" method = "POST"><input align = "right" class = "button_other" type = "submit" href = "index.php" value = "Sign in"></form>
 </div><hr>
 
 <div class = "loginbox">
 <body background = "theme4.jpg" />
 <h1 style="font-size:50px; margin-left:10;">NEW USER</h1>
 
 <?php
 
 require 'core.php';
 require 'database.php';
 
 if(!loggedin())
 {

 if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['pass_again']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']))
	{
	$user = htmlentities($_POST['user']);
	$pass = htmlentities($_POST['pass']);
	$pass_again = htmlentities($_POST['pass_again']);
	$pass_hash = md5($pass);
	$fname = htmlentities($_POST['fname']);
	$lname = htmlentities($_POST['lname']);
	$email = htmlentities($_POST['email']);
	
	if(!empty($user) && !empty($pass) && !empty($pass_again) && !empty($fname) && !empty($lname) && !empty($email))
	{
	if (filter_var($email, FILTER_details_EMAIL))

		{
		if($pass != $pass_again)
			echo 'Password do not match'.'<br><br>';
		else
			{
			$query = "SELECT `user` FROM `details` WHERE `user` = '$user'";
			$query_run = mysql_query($query);
			$query1 = "SELECT `email` FROM `details` WHERE `email` = '$email'";
			$query_run1 = mysql_query($query1);
			if (mysql_num_rows($query_run) >= 1)
				echo "The username <b>$user</b> already exists.<br><br>";
			
			else if	(mysql_num_rows($query_run1) >= 1)
				echo "The email <b>$email</b> already exists.<br><br>";

			
			else 
				{
				$a = 'a:1:{i:0;s:1:"0";}';
				$query = "INSERT INTO `details` VALUES('','".mysql_real_escape_string($user)."','".mysql_real_escape_string($pass_hash)."','".mysql_real_escape_string($fname)."','".mysql_real_escape_string($lname)."','".mysql_real_escape_string($email)."','$a','$a','1')";  
				if (mysql_query($query))
					{
					echo 'Registration successful. Please wait while you are being redirected to login page.'.'<br><br>';
					header('Refresh: 3; url= index.php');
					}
				else
					echo 'We are unable to process your request at this time please try after some time';
				}
			}
		}
		else
		echo 'Invalid email'.'<br><br>';
	}
	}
 
 ?>

 <form action = "register.php" method = "POST">
 Username <br><input type = "text" size="20" name = "user" maxlength="15" value = <?php if (isset($_POST['user']) && !empty ($_POST['user'])) echo $user;?>>
 <?php if(isset($_POST['user']) && empty($_POST['user'])) echo '*field cannot be empty';?><br><br>
 Password <br><input type = "password" size="20" name = "pass" maxlength="10">
 <?php if(isset($_POST['pass']) && empty($_POST['pass'])) echo '*field cannot be empty';?><br><br>
 Password Again <br><input type = "password" size="20" name = "pass_again" maxlength="10" >
 <?php if(isset($_POST['pass_again']) && empty($_POST['pass_again'])) echo '*field cannot be empty';?><br><br>
 First Name <br><input type = "text" size="20" name = "fname" maxlength="15" value = <?php if (isset($_POST['fname']) && !empty ($_POST['fname'])) echo $fname;?>>
 <?php if(isset($_POST['fname']) && empty($_POST['fname'])) echo '*field cannot be empty';?><br><br>
 Last Name <br><input type = "text" size="20" name = "lname" maxlength="15" value = <?php if (isset($_POST['lname']) && !empty ($_POST['lname'])) echo $lname;?>>
 <?php if(isset($_POST['lname']) && empty($_POST['lname'])) echo '*field cannot be empty';?><br><br>
 E-mail <br><input type = "text" size="20" name = "email" maxlength="25" value = <?php if (isset($_POST['email']) && !empty ($_POST['email'])) echo $email;?>>
 <?php if(isset($_POST['email']) && empty($_POST['email'])) echo '*field cannot be empty';?><br><br>
 <input type = "submit" value = "Register" class = "button"></div>
 
 <?php
 
 }
 else if(loggedin())
 header('Location: logged_in.php');
 
 ?>
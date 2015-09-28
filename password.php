<body bgcolor = "#B4EEB4">

<?php
@session_start();
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
{
require 'database.php';
require 'header.php';

$id = $_SESSION['user_id'];

$query = "SELECT `pass` FROM `details` WHERE `id` = '$id' ";
$query_run = mysql_query($query);
$query_num_rows = mysql_num_rows($query_run);
$pass = mysql_result($query_run, 0, 'pass');

if(isset($_POST['old_pass']) && isset($_POST['pass']) && isset($_POST['pass_again']))
	{
	$old_pass1 = htmlentities($_POST['old_pass']);
	$pass1 = htmlentities($_POST['pass']);
	$pass_again1 = htmlentities($_POST['pass_again']);
	$pass_hash1 = md5($old_pass1);
	$pass_new = md5($pass1);
		
		if(!empty($old_pass1) && !empty($pass1) && !empty($pass_again1))
		{
		if($pass1 != $pass_again1)
			echo "<font style = 'clear: both; float: left; margin-left: 5px;'>Password does not match</font>";
		else if($pass_hash1 != $pass)
			echo "<font style = 'clear: both; float: left; margin-left: 5px;'>You have entered an incorrect password</font>";
		else
			{
				$query = "UPDATE  `details` SET `pass` = '$pass_new' WHERE  `details`.`id` = '$id'";
				mysql_query($query);
				echo "<font style = 'clear: both; float: left; margin-left: 5px;'>Password changed successfully. Please wait while you are being redirected to settings page.</font>";
				header('Refresh: 2; url= settings.php');;
			}
		}	

	}
?>

 <div style = "margin-left: 5px; margin-top: 30px;">
 <form action = "password.php" method = "POST">
 Current Password <br><input type = "password" size="20" name = "old_pass" maxlength="10">
 <?php if(isset($_POST['old_pass']) && empty($_POST['old_pass'])) echo '*field cannot be empty';?><br><br>
 Password <br><input type = "password" size="20" name = "pass" maxlength="10">
 <?php if(isset($_POST['pass']) && empty($_POST['pass'])) echo '*field cannot be empty';?><br><br>
 Password Again <br><input type = "password" size="20" name = "pass_again" maxlength="10" >
 <?php if(isset($_POST['pass_again']) && empty($_POST['pass_again'])) echo '*field cannot be empty';?><br><br>
 <input class = "button_other" type = "submit" value = "Submit">
 </form>
 </div>
 
<?php
}
else
header('Location: index.php');
?>
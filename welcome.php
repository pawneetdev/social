

<link rel = "stylesheet" href = "css/style.css">	
	<script>
// When the user clicks on div, open the popup
function myFunction() {
    var popup = document.getElementById('myPopup');
    popup.classList.toggle('show');
}
</script>

<?php

require 'database.php';

if (isset($_POST['email']) && isset($_POST['pass']))
{
	
	$email = htmlentities($_POST['email']);
	$pass = htmlentities($_POST['pass']);
	$pass_hash = md5($pass);
	
	session_start();
	$_SESSION['email']=$email;
	$_SESSION['pass']=$pass;
	
	if(!empty($email) && !empty($pass))
		{
			$query = "SELECT `id` FROM `details` WHERE `email` = '$email' AND `pass` = '$pass_hash'";
			if($query_run = mysql_query($query))
			{
				$query_num_rows = mysql_num_rows($query_run);	
			
				if($query_num_rows == 0){
					
  			echo "<script type='text/javascript'>alert('INVALID ACCOUNT');</script>";
			header("Refresh:0");
				}
				else if($query_num_rows == 1)
					{
						$user_id = mysql_result($query_run, 0, 'id');
						$_SESSION['user_id'] = $user_id;
						header('Location:logged_in.php');
					}
			}
		}
	else
		{
		header('Location: login_attempt.php');
		}
}

else
header('Location:index.php');
?>
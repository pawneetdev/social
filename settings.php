<head>
<link rel = "stylesheet" href = "style.css">
</head>

<body bgcolor = "#B4EEB4">

<?php
@session_start();
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
{
require 'database.php';
//require 'core.php';
require 'header.php';

$id = $_SESSION['user_id'];

$query = "SELECT `fname`, `lname`, `email`, `theme`  FROM `details` WHERE `id` = '$id' ";
$query_run = mysql_query($query);
while($query_row = mysql_fetch_assoc($query_run))
{
$fname = $query_row['fname'];
$lname = $query_row['lname'];
$email = $query_row['email'];
$theme = $query_row['theme'];
}

 if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['theme']))
	{
	$fname1 = htmlentities($_POST['fname']);
	$lname1 = htmlentities($_POST['lname']);
	$email1 = htmlentities($_POST['email']);
	$theme = $_POST['theme'];
	
	if(!empty($fname1) && !empty($lname1) && !empty($email1) && !empty($theme))
		{
		
				$query = "UPDATE  `details` SET `fname` =  '$fname1', `lname` =  '$lname1', `email` =  '$email1', `theme` = '$theme' WHERE  `details`.`id` = '$id'";
				mysql_query($query);
				echo "<font style = 'clear: both; float: left; margin-left: 5px;'>Updated successfully</font>";
				header('refresh:1');
		}	
	}
	
?>
 <div style = "margin-left: 5px; margin-top: 30px;">
 <form action = "password.php" method = "POST">
 <input class = "button_other" style = "width: 130px; float:left; margin-top: 10px; clear:both" type = "submit" value = "Change password" name = "pass_change"><br><br>
 
 <?php
 if(isset($_POST['pass_change']))
 header('Location: password.php');
 ?>
 
 </form>
 
 <form action = "settings.php" method = "POST">
 <label>First Name</label> <br><input type = "text" size="20" name = "fname" maxlength="15" value = <?php if(isset($_POST['fname'])) echo $fname1; else echo $fname;?>>
 <?php if(isset($_POST['fname']) && empty($_POST['fname'])) echo '*field cannot be empty';?><br><br>
 <label>Last Name</label> <br><input type = "text" size="20" name = "lname" maxlength="15" value = <?php if(isset($_POST['lname'])) echo $lname1; else echo $lname;?>>
 <?php if(isset($_POST['lname']) && empty($_POST['lname'])) echo '*field cannot be empty';?><br><br>
 <label>E-mail</label> <br><input type = "text" size="20" name = "email" maxlength="25" value = <?php  if(isset($_POST['email'])) echo $email1; else echo $email;?>>
 <?php if(isset($_POST['email']) && empty($_POST['email'])) echo '*field cannot be empty';?><br><br>
 <label>Themes</label><br>
 <table>
	<tr>
		<td> <label for = "theme1"><img src = "theme1.jpg" class = "theme" alt = "Theme 1"> </label></td>
		<td> <label for = "theme2"><img src = "theme2.jpg" class = "theme" alt = "Theme 2"> </label></td>
		<td> <label for = "theme3"><img src = "theme3.jpg" class = "theme" alt = "Theme 3"> </label></td>
		<td> <label for = "theme4"><img src = "theme4.jpg" class = "theme" alt = "Theme 4"> </label></td>
	<tr>
	<tr>
	<?php
	if($theme == 1)
		{
	?>
		<td style = "text-align: center"> <input id = "theme1" type = "radio" name = "theme" value = "1" checked> </td>
		<td style = "text-align: center"> <input id = "theme2" type = "radio" name = "theme" value = "2"> </td>
		<td style = "text-align: center"> <input id = "theme3" type = "radio" name = "theme" value = "3"> </td>
		<td style = "text-align: center"> <input id = "theme4" type = "radio" name = "theme" value = "4"> </td>
	<?php
		}
	else if($theme == 2)
		{
	?>
		<td style = "text-align: center"> <input id = "theme1" type = "radio" name = "theme" value = "1"> </td>
		<td style = "text-align: center"> <input id = "theme2" type = "radio" name = "theme" value = "2" checked> </td>
		<td style = "text-align: center"> <input id = "theme3" type = "radio" name = "theme" value = "3"> </td>
		<td style = "text-align: center"> <input id = "theme4" type = "radio" name = "theme" value = "4"> </td>
	<?php
		}
	else if($theme == 3)
		{
	?>
		<td style = "text-align: center"> <input id = "theme1" type = "radio" name = "theme" value = "1"> </td>
		<td style = "text-align: center"> <input id = "theme2" type = "radio" name = "theme" value = "2"> </td>
		<td style = "text-align: center"> <input id = "theme3" type = "radio" name = "theme" value = "3" checked> </td>
		<td style = "text-align: center"> <input id = "theme4" type = "radio" name = "theme" value = "4"> </td>
	<?php
		}
	else if($theme == 4)
		{
	?>
		<td style = "text-align: center"> <input id = "theme1" type = "radio" name = "theme" value = "1"> </td>
		<td style = "text-align: center"> <input id = "theme2" type = "radio" name = "theme" value = "2"> </td>
		<td style = "text-align: center"> <input id = "theme3" type = "radio" name = "theme" value = "3"> </td>
		<td style = "text-align: center"> <input id = "theme4" type = "radio" name = "theme" value = "4" checked> </td>
	<?php
		}
	?>
	</tr>
	</table><br>

	

 <input class = "button_other" style = "margin-left: 0px" type = "submit" value = "Submit">
 </form>
 </div>
 
 <?php
 }
 else
 header('Location: index.php');
 ?>
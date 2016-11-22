<html>

<head>

<link rel = "stylesheet" href = "css/style.css">
<title>Title</title>

</head>

<body style = "margin: 0px; background-color: #B4EEB4">

<div class = "logindiv">

<div class = "logo">
<h1 class = "logo_text">Title</h1>
</div>
</div>

<div class = "outer_login_attempt_div">
<br><br>
<div class = "login_attempt_div">
<span style = "font-size: 18px;"><br>Login</span><hr style = "height: 1px; border: 0px; border-top: 1px solid black; margin: 1em 0; padding: 0;">

<form action = "welcome.php" method = "POST"> 

<table style = "padding-left: 40px;">
<tr>

<td><?php
	session_start();
	if(isset($_SESSION['pass']) && isset($_SESSION['email']) && !empty($_SESSION['email']) && !empty($_SESSION['pass']))
		echo '<br><i><font style = "margin-left:40;">Invalid email-password combination.</font></i><br><br>';
	else if((isset($_SESSION['user']) && empty($_SESSION['user'])) || (isset($_SESSION['pass']) && empty($_SESSION['pass'])))
		echo '<br><i><font style = "margin-left:40;">*Field cannot be empty.</font></i><br><br>';
	else 
		echo "<br><br><br>";
	?></td>
	
</tr>

<tr>
<td>Email</td>
<td><input type = "text" name = "email" value = <?php @session_start(); if(isset($_SESSION['email']) && !empty($_SESSION['email'])) echo $_SESSION['email']; ?>></td>


<td>	<?php 

	@session_start();

	if(isset($_SESSION['email']) && empty($_SESSION['email']))
		echo '*';
		

	unset($_SESSION['email']);

	?></td>
</tr>

<tr>
<td>Password</td>
<td><input type ="password" name = "pass"></td>

	<td><?php 
	@session_start();
	if( isset($_SESSION['pass']) && empty($_SESSION['pass']))
		echo '*';

	unset($_SESSION['pass']);
	
	?></td>
</tr>

<tr>

<td style = "padding-top: 15px;"><input type = "submit" value = "Login" class = "button_other">
&nbsp;or<a class = "link" href = "index.php">&nbsp;Sign Up Here </a></td>
</form>
</tr>
</table>
</div>
</div>

<?php

@session_start();
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
header('Location:logged_in.php');

?>
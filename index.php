
<head>
<link rel = "stylesheet" href = "style.css">
</head>

<br><br><br><br><br><div class = "loginbox">
<h1 style="font-size:50px; margin-left:10">WELCOME</h1>
<form action = "welcome.php" method = "POST">
		
<br><br><font style ="margin-left:40"><label for = "user">Username</label> <input type = "text" style="width:135" name = "user" maxlength="20">

<br>
<font style ="margin-left:40"><label for = "pass">Password</label> <input type ="password" style="width:135" name = "pass" maxlength="10">


<br><br>
<input type = "submit" value = "Login" class = "button">
</form><br><br>

<a class = "link" href = "register.php"> &nbsp;&nbsp; Not a user? Register Here. </a></div>

<body background = "image.jpg"/>

<?php

@session_start();
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
header('Location:logged_in.php');

?>
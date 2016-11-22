<html>

<head>

<title>Social Media</title>
<link rel="stylesheet" type="text/css" href="css/cb_style.css">
<link rel = "stylesheet" href = "css/style.css">
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="chatbox.js"></script>
</head>

<?php

//require 'search.php';
require 'database.php';
require 'header.php';

?>

<body onbeforeunload="signInForm.signInButt.name='signOut';signInOut();" onload="hideShow('hide')"bgcolor = "#B4EEB4">
<body >
<h1 align = "center">Chat box</h1>
<div id = "contains" ;>
<form onsubmit="signInOut();return false" id="signInForm">
	<input id="userName" type="text">
	<input id="signInButt" name="signIn" type="submit" value="Sign in">
	<span id="signInName">User name</span>
	</form>

	<div id="chatBox"></div>
	<div id="usersOnLine"></div>
	<form onsubmit="sendMessage();return false" id="messageForm">
		<input id="message" type="text">
		<input id="send" type="submit" value="Send">
<div id="serverRes"></div></form>
<div>
</body>
</html>

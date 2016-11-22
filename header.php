<title>Social Media</title>
<head>
<link rel = "stylesheet" href = "css/style.css">
</head>

<?php

//require 'theme.php';
 require 'database.php';
 require 'core.php';

?>

<body style = 'margin:0px'>

<div class = "header">

<div class = "search">
<?php
include 'search.php';
?>
</div>

<div class = "menu">
<a class = 'link' href = 'logged_in.php'>Home</a>
<a class = 'link' href = 'friends.php'>Friends</a>
<a class = 'link' href = 'settings.php'>Settings</a>
<a class = 'link' href = 'chatbox.php'>Chat</a>
<a class = 'link' href = 'logout.php'>Logout</a>
</div>

</div> 
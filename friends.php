<head>
<link rel = "stylesheet" href = "css/style.css">
</head>

<body bgcolor = "#B4EEB4">

<?php

//require 'search.php';
require 'database.php';
require 'header.php';

if (loggedin())
	{
	$id= $_SESSION['user_id'];
	$query = "SELECT `friends` FROM `details` WHERE `id` = '$id'";
	$query_run = mysql_query($query);
	echo "<h3 style = 'margin-bottom:0px;'>Friends:</h3><br><br> ";
	
	while($rs = mysql_fetch_assoc($query_run))
	@$array = unserialize($rs['friends']);
	$i = 1;
	if(@$array[1] != 0)
			foreach($array as $element)
			{
			if($element>0)
			{
			$q = "SELECT `fname`, `lname`, `id`,'theme' FROM `details` WHERE `id` = $element";
			$qr = mysql_query($q);
			while($query_row = mysql_fetch_assoc($qr))
					{
					$fname = $query_row['fname'];
					$lname = $query_row['lname'];
					$id_user = $query_row['id'];
					$theme = $query_row['theme'];
					}
			echo '<a style = "margin-left: 0px;" class = "link" href = "users.php?id_sent='.$id_user.'">'.$i.'.) '.$fname.' '.$lname.'</a><br>';
			$i++;
			}
			}
			$i--;
			echo '<footer style = "position: absolute; left: 580; bottom: 50px"><b>You have '.$i.' friends</b></footer>';
			
			
			
	}
?>
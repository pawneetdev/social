<head>
<link rel = "stylesheet" href = "css/style.css">
</head>

<?php

//require 'search.php';
require 'database.php';
require 'header.php';

?>

<body bgcolor = "#B4EEB4">

<?php

if (loggedin())
	{
	$id= $_SESSION['user_id'];
	$query = "SELECT `fname` FROM `details` WHERE `id` = '$id'";
	if($query_run = mysql_query($query))
	{
	$name = mysql_result($query_run, 0, 'fname');
	echo "<br><b><font style = 'clear: both; float: right; margin-right:45%;' size = '5px'>Welcome $name!</font></b>";
	
	$query = "SELECT `friend request` FROM `details` WHERE `id` = '$id'";
			$query_run = mysql_query($query);
			echo "<br><br><h3 style = 'margin-bottom: 0px; margin-left:87.3%;'>Friend requests</h3><br>";
			
			while($rs = mysql_fetch_assoc($query_run))
			{
			@$array = unserialize($rs['friend request']);

			$i = 0;
			$e = array();  
			
			if(@$array[1] != 0)
			foreach($array as $element)
			{
			if($element>0)
			{
			$e[$i] = $element;
			$q = "SELECT `fname`, `lname` FROM `details` WHERE `id` = $element";
			$qr = mysql_query($q);
			while($query_row = mysql_fetch_assoc($qr))
					{
					$fname = $query_row['fname'];
					$lname = $query_row['lname'];
					}
			echo '<div class = "requestbox"><center><b><font style = "color: #008B00">'.$fname.' '.$lname.'</b><br><br>';
 			echo '<form><input class = "button_other" type = "submit" name = "a'."$e[$i]".'" value = "Accept">   <input class = "button_other" type = "submit" name = "d'."$e[$i]".'" value = "Decline"></form></div></center>';
			echo '<br>';
			$i++;
			}
			}
			else
			echo "<div style = 'float:right;margin-right:50px;' >No friend requests</div>";
			}		
	//header('refresh:7');
			
			
			if(isset($element) && !empty($element))
			{
			for($s=0; $s<count($e); $s++)
			if(isset($_GET['a'.$e[$s]]) && $_GET['a'.$e[$s]] == 'Accept')
			{
			
			$query_run = mysql_query("SELECT `friend request` FROM `details` WHERE `id` = '$id'");
			$a = array();
			while($query_row = mysql_fetch_assoc($query_run)) 
			@$a = unserialize($query_row['friend request']);
			$arr_len = count($a);
			for($i=0; $i<$arr_len; $i++)
			{
			if($a[$i] == $e[$s])
			for($x=$i; $x<$arr_len; $x++)
			$a[$x] = $a[$x+1];
			}
			array_splice($a, -1);
			$array_string = mysql_escape_string(serialize($a));
			mysql_query("UPDATE `details` SET `friend request` = '$array_string' WHERE `id` = $id");
			header('refresh:0; url =logged_in.php');
			
			$query_run = mysql_query("SELECT `friends` FROM `details` WHERE `id` = '$id'");
			$b = array();
			while($query_row = mysql_fetch_assoc($query_run)) 
			@$b = unserialize($query_row['friends']);
			@array_push($b, $e[$s]);
			$array_string = mysql_escape_string(serialize($b));
			mysql_query("UPDATE `details` SET `friends` = '$array_string' WHERE `id` = $id");
			
			$query_run1 = mysql_query("SELECT `friends` FROM `details` WHERE `id` = '$e[$s]'");
			$c = array();
			while($query_row = mysql_fetch_assoc($query_run1)) 
			@$c = unserialize($query_row['friends']);
			@array_push($c, $id);
			$array_string = mysql_escape_string(serialize($c));
			mysql_query("UPDATE `details` SET `friends` = '$array_string' WHERE `id` = $e[$s]");
			}
			
			for($s=0; $s<count($e); $s++)
			if(isset($_GET['d'.$e[$s]]) && $_GET['d'.$e[$s]] == 'Decline')
			{
			$query_run = mysql_query("SELECT `friend request` FROM `details` WHERE `id` = '$id'");
			$a = array();
			while($query_row = mysql_fetch_assoc($query_run)) 
			{
			@$a = unserialize($query_row['friend request']);
			}
			$arr_len = count($a);
			for($i=0; $i<$arr_len; $i++)
			{
			if($a[$i] == $e[$s])
			for($x=$i; $x<$arr_len; $x++)
			$a[$x] = $a[$x+1];
			}
			array_splice($a, -1);
			$array_string = mysql_escape_string(serialize($a));
			mysql_query("UPDATE `details` SET `friend request` = '$array_string' WHERE `id` = $id");
			header('refresh:0; url=logged_in.php');
			
			}
			}
	
	}
	
?>



<?php
}	
else 
	header('Location: index.php');

?>
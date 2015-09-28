<?php

//require 'search.php';
require 'database.php';
require 'header.php';

@session_start();
$id= $_SESSION['user_id'];
if(isset($_GET['id_sent']) && !empty($_GET['id_sent']))
$_SESSION['id_sent'] = $_GET['id_sent'];
$ids = $_SESSION['id_sent'];

$query_run = mysql_query("SELECT `friends` FROM `details` WHERE `id` = '$id'");
$c = array();
while($query_row = mysql_fetch_assoc($query_run)) 
@$c = unserialize($query_row['friends']);
foreach($c as $elem)
if($elem == $ids)
{
$fr = FALSE;
break;
}
else
$fr = TRUE;

if($id != $ids)
if($fr)
{

?>

<form action = "users.php" method = "GET">


<?php

if(isset($_GET['frequest']) && !empty($_GET['frequest']))
{
$query_run = mysql_query("SELECT `friend request` FROM `details` WHERE `id` = '$ids'");
$a = array();
while($query_row = mysql_fetch_assoc($query_run)) 
@$a = unserialize($query_row['friend request']);

foreach($a as $element)
if($element == $id)
{
$flag = 1; 
break;
}
else
$flag = 0;

if($flag != 1)
{
array_push($a, $id);
$array_string = mysql_escape_string(serialize($a));
mysql_query("UPDATE `details` SET `friend request` = '$array_string' WHERE `id` = $ids");
}

?>

<input class = "button_other" style = "width: 130px" type = "submit" value = "Friend request sent" name = "frequest">

<?php
}
else
{
?>

<input class = "button_other" style = "width: 130px" type = "submit" value = "Add as a friend" name = "frequest">

<?php
}
?>

</form>


<?php
}
if (loggedin())
	{	
		@session_start();
		if(isset($_GET['id_sent']) && !empty($_GET['id_sent']))
		$_SESSION['id_sent'] = $_GET['id_sent'];
		
		$ids = $_SESSION['id_sent'];
		
		$query = "SELECT `fname`, `lname`, `email` FROM `details` WHERE `id`='$ids'";
		$query_run = mysql_query($query);
			
			$query_row = mysql_fetch_assoc($query_run);
			
			echo '<b><center><font style = font-size:30px>'.$query_row['fname'].' '.$query_row['lname'].'<br>';
			echo $query_row['email'].'</b></center></font>';
			
			
	}
	
else 
	header('Location: index.php');

?>
<head>
<link rel = "stylesheet" href = "style.css">
</head>

<body bgcolor = "#B4EEB4">

<?php
		
		//require 'search.php';
		require 'header.php';
		//require 'database.php';
		
		@session_start();
		
		$id = $_SESSION['user_id'];
		if(isset($id) && !empty($id))
		{
		$search = $_GET['search'];
		if(isset($search) && !empty($search))
		{
		
		if(strlen($search)>=3)
		{
			$query = "SELECT `fname`, `lname`, `id` FROM `details` WHERE `fname` LIKE '%".mysql_real_escape_string($search)."%' OR `lname` LIKE '%".mysql_real_escape_string($search)."%'";
			$query_run = mysql_query($query);
			$query_num_rows = mysql_num_rows($query_run);
			if($query_num_rows>=1)
				{
				echo "<span style = 'clear: both; float: left; padding-left: 7px;'>$query_num_rows Results found:</span><br>";
				while($query_row = mysql_fetch_assoc($query_run))
					{
					$fname = $query_row['fname'];
					$lname = $query_row['lname'];
					$id_user = $query_row['id'];
					
					echo '<br><a class = "link_search" href = "users.php?id_sent='.$id_user.'">'.$fname.' '.$lname.'</a><br>';
					}	
					
				}
			else
				{
				echo "<font style = 'clear: both; float: left; margin-left: 5px;'>No results found.</font>";
				}
		}
		else
		{
			echo "<font style = 'clear: both; float: left; margin-left: 5px;'>Keyword must be more than 2 characters.</font>";
		}
		}
		
		else 
			echo "<font style = 'clear: both; float: left; margin-left: 5px;'>Please enter at least 3 characters.</font>";
		}
		
		else 
		header('Location: index.php');
?>
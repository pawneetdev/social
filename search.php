<head>
<link rel = "stylesheet" href = "style.css">
</head>

<?php
		
		@session_start();
		$id = $_SESSION['user_id'];
		if(isset($id) && !empty($id))
			{

?>

<form action = "search_result.php" method = "GET" style = "padding-top: 2px">
<input type = "text" name = "search" class = "search_bar" size = '100' Placeholder = "Find users here......">
<input class = "button_login" style = "height: 21; width:60;" type = "submit" value = "Search">
</form>

<?php
}
else
header('Location:index.php');
?>
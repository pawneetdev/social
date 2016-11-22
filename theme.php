<?php
 
 require 'database.php';
 require 'core.php';
 
 if (loggedin())
 {

 $id= $_SESSION['user_id'];
 $query_run = mysql_query("SELECT `theme` FROM `details` WHERE `id` = $id");
 $theme = mysql_result($query_run, 0, 'theme'); 
 
 if($theme == 1)
 echo "<body background = themes/theme1.jpg>";
 
 else if($theme == 2)
 echo "<body background = themes/theme2.jpg>";
 
 else if($theme == 3)
 echo "<body background = themes/theme3.jpg>";
 
 if($theme == 4)
 echo "<body background = themes/theme4.jpg>";
 
 }
 
 else
 header('Location:index.php');
 
 ?>
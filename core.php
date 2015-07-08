<?php

@session_start();

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
@$http_referer = $_SERVER['HTTP_REFERER'];

function loggedin()
{
	if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
		return true;
	else
		return false;
}

?>
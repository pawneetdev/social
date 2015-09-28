<?php

require 'core.php';

//if($http_referer == 'http://localhost/project/logged_in.php' || $http_referer =='http://120.56.229.254/project/logged_in.php' )
//{
session_destroy();
header('Location:'. $http_referer);
//}
if($http_referer == NULL)
header('Location:index.php');

?>
<?php

if(!@mysql_connect('localhost', 'root', '') || !@mysql_select_db('login'))
die(mysql_error());

?>
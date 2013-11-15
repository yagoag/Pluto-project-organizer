<?php
	ob_start();
	session_start();

	if(!isset($_SESSION['user']) AND !isset($_SESSION['password']))
		include_once "login.php";
	else
		include_once "show_groups.php";
?>
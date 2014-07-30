<?php
	session_start();

	if(!isset($_SESSION['user']) && !isset($_SESSION['password']))
		include_once "login.php";
	else
		header("Location: show_groups.php");
?>
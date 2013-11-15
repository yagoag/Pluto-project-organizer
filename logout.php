<?php
	ob_start();
	session_start();

	unset($_SESSION['username']);
	unset($_SESSION['password']);

	include "classes/Message.php";
	Message::show("Logout", "You have successfully logged out from your account.<br /><a href=\"index.php\">Login</a>");
?>
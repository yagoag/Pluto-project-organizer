<?php
	session_start();

	if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
		include_once "classes/Message.php";
		Message::show("No permission", "You don't have permission to access this page.<br />Please <a href=\"login.php\">log in</a> and try again.");
		die();
	}
?>
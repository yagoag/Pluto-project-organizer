<?php
	if($_POST['register']) {
		include_once "classes/File.php";
		include_once "classes/Member.php";
		include_once "classes/Message.php";

		$user = $_POST['username'];
		$pass = $_POST['password'];

		if(empty($user))
			Message::show("Failed to register", "Type a username.<br /><br /><a href=\"register.php\">Try again</a>.");
		elseif(empty($_POST['password']))
			Message::show("Failed to register", "Type a password.<br /><br /><a href=\"register.php\">Try again</a>.");
		else {
			$members = parse_ini_file("members.ini", true);
			if(array_key_exists($user, $members))
				Message::show("Failed to register", "The username you chose is already taken.<br /><br /><a href=\"register.php\">Try again with another username.</a>");
			else {
				$pass = md5($pass);
				$member = new Member($user, $pass);
				File::save_new_member($member);
				Message::show("Registered successfully", "You've been successfully registered in the website.<br /><br /><a href=\"login.php\">Click here to log in now.</a>");
			}
		}
	}
?>
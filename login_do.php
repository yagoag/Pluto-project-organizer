<?php
	session_start();

	if($_POST['login']) {
		$user = $_POST['username'];
		$pass = $_POST['password'];
		
		if(empty($user)) {
			include "classes/Message.php";
			Message::show("Failed to login", "Please, type a username.<br /><br /><a href=\"login.php\">Try again</a>.");
		} elseif(empty($pass)) {
			include "classes/Message.php";
			Message::show("Failed to login", "Please, type a password.<br /><br /><a href=\"login.php\">Try again</a>.");
		} else {
			$members = parse_ini_file("members.ini", true);

			if(array_key_exists($user, $members)) {
				$pass = md5($pass);
				
				if ($members[$user]['pass'] == $pass) {
					$_SESSION['username'] = $user;
					$_SESSION['password'] = $pass;
				
					header("Location: show_groups.php");
				}
			}

			include_once "classes/Message.php";
			Message::show("Failed to login", "Username and/or password do not match or do not exist.<br/><br /><a href=\"login.php\">Try again</a>.");
		}
	}
?>
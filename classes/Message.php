<?php
	class Message {
		// Show a general message
		public static function show($title, $message) {
			echo
				'<html>' . PHP_EOL .
				'	<head>' . PHP_EOL .
				'		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />' . PHP_EOL .
				'		<title>' . $title . ' - Pluto</title>' . PHP_EOL .
				'		<link href="style.css" media="all" rel="Stylesheet" type="text/css">' . PHP_EOL .
				'	</head>' . PHP_EOL .
				PHP_EOL .
				'	<body>' . PHP_EOL .
				'	<div id="login-container">' . PHP_EOL .
				'		<p class="title">' . $title . '</p>' . PHP_EOL .
				'		<div id="message">' . PHP_EOL .
				'			<p>' . $message . '</p>' . PHP_EOL .
				'		</div>' . PHP_EOL .
				'	</div>' . PHP_EOL .
				'	</body>' . PHP_EOL .
				'	</html>';
		}

		// Show a message for logged in users (includes header)
		public static function show_logged_in($name, $title, $message) {
			echo
				'<html>' . PHP_EOL .
				'	<head>' . PHP_EOL .
				'		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />' . PHP_EOL .
				'		<title>' . $title . ' - Pluto</title>' . PHP_EOL .
				'		<link href="style.css" media="all" rel="Stylesheet" type="text/css">' . PHP_EOL .
				'	</head>' . PHP_EOL .
				PHP_EOL .
				'	<body>' . PHP_EOL .
				'<div id="header">' . PHP_EOL .
				'	<div class="logo">' . PHP_EOL .
				'		<img src="images/logo-small.png" />' . PHP_EOL .
				'	</div>' . PHP_EOL .
				'	<div class="userinfo">' . PHP_EOL .
				'		<p class="username">' . $name . '</p>' . PHP_EOL .
				'		<p class="logout"><a href="logout.php">Logout</a></p>' . PHP_EOL .
				'	</div>' . PHP_EOL .
				'</div>' . PHP_EOL .
				'	<div id="login-container">' . PHP_EOL .
				'		<p class="title">' . $title . '</p>' . PHP_EOL .
				'		<div id="message">' . PHP_EOL .
				'			<p>' . $message . '</p>' . PHP_EOL .
				'		</div>' . PHP_EOL .
				'	</div>' . PHP_EOL .
				'	</body>' . PHP_EOL .
				'	</html>';
		}
	}
?>
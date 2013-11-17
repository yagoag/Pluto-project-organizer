<?php
	class Message {
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
	}
?>
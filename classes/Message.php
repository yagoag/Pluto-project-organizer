<?php
	class Message {
		public static function show($title, $message) {
			echo
				'<!DOCTYPE html>
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
						<title>' . $title . ' - Pluto</title>
						<link href="style.css" media="all" rel="Stylesheet" type="text/css">
					</head>

					<body>
					<div id="login-container">
						<p class="title">' . $title . '</p>
						<div id="login-form">
							<p>' . $message . '</p>
						</div>
					</div>
					</body>
					</html>';
		}
	}
?>
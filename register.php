<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login - Pluto</title>
<link href="style.css" media="all" rel="Stylesheet" type="text/css">
</head>

<body>
<div id="login-container">
	<p class="title">Register</p>

	<form id="login-form" name="register-form" method="post" action="register_do.php">
		<input type="text" name="username" placeholder="Username" class="textBox" />
		<input type="password" name="password" placeholder="Password" class="textBox" />
		
		<input type="submit" name="register" value="Register" class="button" />
	</form>

	<p><a href="index.php">Login with an existing account</a></p>
</div>
</body>
</html>
<?php
	include_once "protect.php";

	$name = $_SESSION['username'];
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>New Group - Pluto</title>
	<link href="style.css" media="all" rel="Stylesheet" type="text/css">
	<link rel="icon" type="image/x-icon" href="images/favicon.ico" />
</head>

<body>
<div id="header">
	<div class="logo">
		<a href="index.php"><img src="images/logo-small.png" /></a>
	</div>
	<div class="userinfo">
		<p class="username"><a href="show_groups.php"><?php echo $name; ?></a></p>
		<p class="logout"><a href="logout.php">Logout</a></p>
	</div>
</div>

<div id="login-container">
	<p class="title">New Group</p>

	<form id="login-form" name="create-group" method="post" action="create_group_do.php">
		<input type="text" name="group" placeholder="Group's Name" class="textBox" />
		
		<input type="submit" name="create" value="Create Group" class="button" />
	</form>

	<p><a href="show_groups.php">Go back to your groups</a></p>
</div>

</body>
</html>
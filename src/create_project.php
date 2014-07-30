<?php
	include_once "actions/protect.php";

	$name = $_SESSION['username'];
	$group = $_GET['group'];
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>New Project - Pluto</title>
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
		<p class="logout"><a href="actions/logout.php">Logout</a></p>
	</div>
	<div class="info">
		<p>Group: <?php echo $group; ?></p>
	</div>
</div>

<div id="login-container">
	<p class="title">New Project</p>

	<?php echo "<form id=\"login-form\" name=\"create-project\" method=\"post\" action=\"actions/create_project.php?group=" . $group . "\">"; ?>
		<input type="text" name="project" placeholder="Project's Name" class="textBox" />
		
		<input type="submit" name="create" value="Create Project" class="button" />
	</form>

	<p><?php echo "<a href=\"show_projects.php?group=" . $group . "\">"; ?>Go back to <?php echo $group; ?>'s Projects</a></p>
</div>

</body>
</html>
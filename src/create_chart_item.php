<?php
	include_once "actions/protect.php";

	$name = $_SESSION['username'];
	$group = $_GET['group'];
	$project = $_GET['project'];
	$act = $_GET['act'];
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>New Item - Pluto</title>
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
		<p>Project: <?php echo $project; ?></p>
	</div>
</div>

<div id="login-container">
	<p class="title">New Item</p>

	<?php echo "<form id=\"login-form\" name=\"create-item\" method=\"post\" action=\"actions/chart.php?project=" . $project . "&act=" . $act . "\">"; ?>
		<input type="text" name="item" placeholder="Item description" class="textBox" />
		
		<input type="submit" name="create" value="Create Item" class="button" />
	</form>

	<p><?php echo "<a href=\"show_chart.php?&group=" . $group . "&project=" . $project . "\">" ?>Go back to the project</a></p>
</div>

</body>
</html>
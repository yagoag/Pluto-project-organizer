<?php
	include_once "protect.php";
	include_once "classes/Project.php";

	$name = $_SESSION['username'];
	$group = $_GET['group'];
	$project = $_GET['project'];

	// Read content of projects.ini into an array
	$projects = parse_ini_file("projects.ini", true);

	// Create a Project object
	$project_obj = new Project($project, $group);

	// Add all the items of the project to it
	foreach ($projects[$project]['todo'] as $item)
		$project_obj->add_todo($item);

	foreach ($projects[$project]['doing'] as $item)
		$project_obj->add_doing($item);
	
	foreach ($projects[$project]['done'] as $item)
		$project_obj->add_done($item);
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $project ?> - Pluto</title>
	<link href="style.css" media="all" rel="Stylesheet" type="text/css">
</head>

<body>
<div id="header">
	<div class="logo">
		<img src="images/logo-small.png" />
	</div>
	<div class="userinfo">
		<p class="username"><?php echo $name; ?></p>
		<p class="logout"><a href="logout.php">Logout</a></p>
	</div>
	<div class="info">
		<p>Group: <?php echo $group; ?></p>
		<p>Project: <?php echo $project; ?></p>
	</div>
</div>

<div id="chart-container">
	<!-- ToDo -->
	<div id="todo">
		<div class="title"><?php echo "<a href=\"chart_do.php?project=\"" . $project . "&act=add_todo\">"; ?><input type="button" class="new-item" /></a> To Do</div>
		<ul>
			<?php $project_obj->print_todo(); ?>
		</ul>
	</div>

	<!-- Doing -->
	<div id="doing">
		<div class="title"><?php echo "<a href=\"chart_do.php?project=\"" . $project . "&act=add_doing\">"; ?><input type="button" class="new-item" /></a> Doing</div>
		<ul>
			<?php $project_obj->print_doing(); ?>
		</ul>
	</div>

	<!-- Done -->
	<div id="done">
		<div class="title"><?php echo "<a href=\"chart_do.php?project=\"" . $project . "&act=add_done\">"; ?><input type="button" class="new-item" /></a> Done</div>
		<ul>
			<?php $project_obj->print_done(); ?>
		</ul>
	</div>
</div>

</body>
</html>
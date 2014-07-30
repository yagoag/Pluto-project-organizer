<?php
	include_once "actions/protect.php";
	include_once "classes/Project.php";

	$name = $_SESSION['username'];
	$group = $_GET['group'];
	$project = $_GET['project'];

	// Read content of projects.ini into an array
	$projects = parse_ini_file("info/projects.php", true);

	// Create a Project object
	$project_obj = new Project($project, $group);

	// Add all the items of the project to it
	if (array_key_exists('todo', $projects[$project]))
		foreach ($projects[$project]['todo'] as $item)
			$project_obj->add_todo($item);

	if (array_key_exists('doing', $projects[$project]))
		foreach ($projects[$project]['doing'] as $item)
			$project_obj->add_doing($item);
	
	if (array_key_exists('done', $projects[$project]))
		foreach ($projects[$project]['done'] as $item)
			$project_obj->add_done($item);
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $project ?> - Pluto</title>
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
		<p>Group: <?php echo "<a href=\"show_projects.php?group=" . $group . "\">" . $group . "</a>"; ?></p>
		<p>Project: <?php echo $project; ?></p>
	</div>
</div>

<div id="chart-container">
	<!-- ToDo -->
	<div id="todo">
		<div class="title"><?php echo "<a href=\"create_chart_item.php?group=" . $group . "&project=" . $project . "&act=add_todo\">"; ?><input type="button" class="new-item" /></a> To Do</div>
		<ul>
			<?php $project_obj->print_todo(); ?>
		</ul>
	</div>

	<!-- Doing -->
	<div id="doing">
		<div class="title"><?php echo "<a href=\"create_chart_item.php?group=" . $group . "&project=" . $project . "&act=add_doing\">"; ?><input type="button" class="new-item" /></a> Doing</div>
		<ul>
			<?php $project_obj->print_doing(); ?>
		</ul>
	</div>

	<!-- Done -->
	<div id="done">
		<div class="title"><?php echo "<a href=\"create_chart_item.php?group=" . $group . "&project=" . $project . "&act=add_done\">"; ?><input type="button" class="new-item" /></a> Done</div>
		<ul>
			<?php $project_obj->print_done(); ?>
		</ul>
	</div>
</div>

</body>
</html>
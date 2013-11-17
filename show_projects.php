<?php
	include_once "protect.php";
	include_once "classes/ProjGroup.php";

	$name = $_SESSION['username'];
	$group = $_GET['group'];

	// Create a member object to access its functions
	$group_obj = new ProjGroup($group, $name);

	// Import members' info from file
	$groups = parse_ini_file("groups.ini", true);

	// Verify if member exists in file
	if (array_key_exists($group, $groups)) {
		$has_projects = true;

		// Add groups to the object
		foreach ($groups[$group]['projects'] as $project)
			$group_obj->add_project($project);
	} else
		$has_projects = false;

	print_r($group_obj);
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $group; ?>'s Projects - Pluto</title>
	<link href="style.css" media="all" rel="Stylesheet" type="text/css">
	<link rel="icon" type="image/x-icon" href="images/favicon.ico" />
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
	</div>
</div>

<div id="container">
	<div class="title"><?php echo $group; ?>'s Projects</div>
	<?php echo "<a href=\"create_project.php?group=" . $group . "\">"; ?><input class="button" type="button" value="New Project" /></a>
	<input class="button" type="button" value="Add Member" />
	
	<ul class="clear">
		<?php
			if ($has_projects)
				$group_obj->list_projects();
			else
				echo "<li>This group has no projects yet!</li>";
		?>
	</ul>
</div>

</body>
</html>
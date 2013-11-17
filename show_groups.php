<?php
	include_once "protect.php";
	include_once "classes/Member.php";

	$name = $_SESSION['username'];

	// Create a member object to access its functions
	$member = new Member($name, $_SESSION['password']);

	// Import members' info from file
	$members = parse_ini_file("members.ini", true);

	// Verify if member exists in file
	if (array_key_exists($name, $members))
		// Verify whether they have any groups
		if (array_key_exists('groups', $members[$name])) {
			// Sets $has_groups to true
			$has_groups = true;
			// Add their groups to the object
			foreach ($members[$name]['groups'] as $group)
				$member->add_group($group);
		} else
			// Sets $has_groups to false
			$has_groups = false;
	else
		// Member not (anymore) in the files, ends its (illegal) section
		header("Location: logout.php");
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $name; ?>'s Groups - Pluto</title>
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
</div>

<div id="container" class="clear">
	<div class="title">Your Groups</div>
	<a href="create_group.php"><input class="button" type="button" value="New Group" /></a>
	
	<ul class="clear">
		<?php
			if ($has_groups)
				$member->list_groups();
			else
				echo "<li>You have no groups yet!</li>";
		?>
	</ul>
</div>

</body>
</html>
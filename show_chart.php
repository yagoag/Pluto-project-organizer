<?php
	include_once "protect.php";
	$name = $_SESSION['username'];
	$group = $_GET['group'];
	$project = $_GET['project'];
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
		<div class="title">To Do</div>
		<ul>
			<li>An idea for a project will be carefully examined to determine whether
				or not it benefits the organization. During this phase, a decision
				making team will identify if the project can realistically be completed.
				<br /><input type="button" class="button-back" /> <input type="button" class="button-delete" /> <input type="button" class="button-next" />
			</li>
			<li>A project plan, project charter and/or project scope may be put in writing,
				outlining the work to be performed. During this phase, a team should
				prioritize the project, calculate a budget and schedule, and determine what
				resources are needed.
				<br /><input type="button" class="button-back" /> <input type="button" class="button-delete" /> <input type="button" class="button-next" />
			</li>
		</ul>
	</div>

	<!-- Doing -->
	<div id="doing">
		<div class="title">Doing</div>
		<ul>
			<li>Resources' tasks are distributed and teams are informed of responsibilities.
				This is a good time to bring up important project related information.
				<br /><input type="button" class="button-back" /> <input type="button" class="button-delete" /> <input type="button" class="button-next" />
			</li>
			<li>Project managers will compare project status and progress to the actual plan,
				as resources perform the scheduled work. During this phase, project managers
				may need to adjust schedules or do what is necessary to keep the project on
				track.
				<br /><input type="button" class="button-back" name="back_1" method="post" action="showChart.php" /> <input type="button" class="button-delete" /> <input type="button" class="button-next" />
			</li>
		</ul>
	</div>

	<!-- Done -->
	<div id="done">
		<div class="title">Done</div>
		<ul>
			<li>After project tasks are completed and the client has approved the outcome, an
				evaluation is necessary to highlight project success and/or learn from project
				history.
				<br /><input type="button" class="button-back" /> <input type="button" class="button-delete" /> <input type="button" class="button-next" />
			</li>
			<li>Projects and project management processes vary from industry to industry;
				however, these are more traditional elements of a project. The overarching
				goal is typically to offer a product, change a process or to solve a problem
				in order to benefit the organization.
				<br /><input type="button" class="button-back" /> <input type="button" class="button-delete" /> <input type="button" class="button-next" />
			</li>
		</ul>
	</div>
</div>

</body>
</html>
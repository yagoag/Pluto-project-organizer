<?php
	include_once "protect.php";
	$name = $_SESSION['username'];
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $name . "'s Groups"; ?>- Pluto</title>
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
		<p>Group: GroupName</p>
		<p>Project: ProjectName</p>
	</div>
</div>

<div id="chart-container">
	<ul>
		<li>grupo1</li>
		<li>grupo2</li>
	</ul>
</div>

</body>
</html>
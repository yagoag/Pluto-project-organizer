<?php
	// Test.php
	// Remove this file from the server after finished configuring it
	include "Project.php";

	echo "Project:<br />";
	$proj = new Project("CoolProject", "123");

	$item = "This is a todo item.";
	$proj->addToDo($item);
	$proj->addDoing("This is a doing item.");
	$proj->addDone("This is a done item.");
	$proj->printChart();

	$proj->dbgNameAndPass();

	$proj->delToDo(0);
	$proj->delDoing(0);
	$proj->delDone(0);
	$proj->printChart();

	$proj->addToDo("This was a ToDo item.");
	$proj->addDoing("This was a Doing item.");
	$proj->nowDoing(1);
	$proj->nowDone(1);
	$proj->printChart();
?>
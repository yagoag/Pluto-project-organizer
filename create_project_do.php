<?php
	include_once "protect.php";

	$name = $_SESSION['username'];
	$group = $_GET['group'];

	if($_POST['create']) {
		include_once "classes/Project.php";
		include_once "classes/FileManip.php";
		include_once "classes/Message.php";

		$project = $_POST['project'];

		if(empty($project))
			Message::show_logged_in($name, "Failed to Create", "Failed to create new project: Type in a name for the project.<br /><br /><a href=\"create_project.php\">Try again</a>.");
		else {
			// Import project's info from file
			$projects = parse_ini_file("projects.ini", true);

			// Verify if project already exists
			if (array_key_exists($project, $projects))
				Message::show_logged_in($name, "Failed to Create", "A project with this name alreay exists.<br /><br /><a href=\"create_project.php\">Try another name</a>.");
			else {
				// Create a Project objetc
				$project_obj = new Project($project, $group);

				// Add new project to projects.ini
				FileManip::save_new_project($project_obj);

				// Add new project to the group
				$groups = parse_ini_file("groups.ini", true);
				$groups[$group]['projects'][] = $project;
				FileManip::save_groups_ini($groups);

				// Show successfull creation message
				Message::show_logged_in($name, "Project Created", "Your project has been successfully created.<br /><br /><a href=\"show_projects.php?group=" . $group . "\">Click here to see " . $group . "'s projects.</a>");
			}
		}
	}
?>
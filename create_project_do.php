<?php
	include_once "protect.php";

	$name = $_SESSION['username'];

	if($_POST['create']) {
		include_once "classes/FileManip.php";
		include_once "classes/Message.php";

		$group = $_POST['group'];

		if(empty($group))
			Message::show_logged_in($name, "Failed to Create", "Failed to create new group: Type in a name for the group.<br /><br /><a href=\"create_group.php\">Try again</a>.");
		else {
			// Import members' info from file
			$members = parse_ini_file("members.ini", true);

			// Verify if member exists in file
			if (array_key_exists($name, $members)) {
				// Search for the name in the existing groups
				foreach ($members[$name]['groups'] as $existing_group)
					if ($existing_group == $group) {
						Message::show_logged_in($name, "Failed to Create", "A group with this name alreay exists.<br /><br /><a href=\"create_group.php\">Try another name</a>.");
						die();
					}

				// Create the group into groups.ini
				FileManip::save_new_group($group);

				// Add it to the creator's groups and save it into members.ini
				$members[$name]['groups'][] = $group;
				FileManip::save_members_ini($members);

				Message::show_logged_in($name, "Group Created", "Your group has been successfully created.<br /><br /><a href=\"show_groups.php\">Click here to see your groups.</a>");
			} else
				// Member not (anymore) in the files, ends its (illegal) section
				header("Location: logout.php");
		}
	}
?>
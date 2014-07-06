<?php
	include_once "protect.php";
	include_once "classes/Message.php";

	$name = $_SESSION['username'];


	if ($_POST['add']) {
		$member = $_POST['member'];
		$group = $_GET['group'];

		// Import mebers from file
		$members = parse_ini_file("members.php", true);

		// Checks if member exists
		if (array_key_exists($member, $members)) {
			// Check if member is already in the group
			if (array_key_exists('groups', $members[$member]))
				foreach ($members[$member]['groups'] as $existing_group)
					if ($existing_group == $group) {
						// Show error
						Message::show_logged_in($name, "Member not added", "The member couldn't be added because they are already in the group.<br /><br /><a href=\"add_member.php?group=" . $group . "\">Try again</a>");
						die();
					}

			// Add group to the member
			include_once "classes/FileManip.php";
			$members[$member]['groups'][] = $group;
			FileManip::save_members_ini($members);

			// Show success message
			Message::show_logged_in($name, "New member added", "The member was successfully added to the group.<br /><br /><a href=\"show_projects.php?group=" . $group . "\">Go back to " . $group . "'s projects</a>");
		} else
			// Show error
			Message::show_logged_in($name, "Member not added", "The member typed doesn't exist.<br /><br /><a href=\"add_member.php?group=" . $group . "\">Try again</a>");
	}
?>
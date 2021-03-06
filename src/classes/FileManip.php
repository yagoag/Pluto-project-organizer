<?php
	// FileManip.php

	include_once "Member.php";
	include_once "Project.php";

	class FileManip {
		//
		// PRIVATE METHODS
		//

		// Save content to the end of a file
		private static function add_to_file($directory, $info) {
			$fw = fopen($directory, "a");

            $info = "; <?php die(); '" . PHP_EOL . $info . PHP_EOL . ";' ?>"; // Should make file unreadable to outsiders
			fwrite($fw, $info . PHP_EOL);

			fclose($fw);
		}

		// Save a file (overwrites previous content)
		private static function save_file($directory, $info) {
			$fw = fopen($directory, "w");

			$info = "; <?php die(); '" . PHP_EOL . $info . PHP_EOL . ";' ?>"; // Should make file unreadable to outsiders
            fwrite($fw, $info);

			fclose($fw);
		}

		//
		// PUBLIC METHODS
		//

		// Save member array to INI
		public static function save_members_ini($members) {
			$contents = "";

			foreach ($members as $member => $item) {
				$contents .= "[" . $member . "]" . PHP_EOL . "pass = \"" . $item['pass'] . "\"" . PHP_EOL;
				if (array_key_exists('groups', $item))
					foreach($item['groups'] as $group)
						$contents .= "groups[] = \"" . $group . "\"" . PHP_EOL;
				$contents .= PHP_EOL;
			}

			self::save_file("../info/members.php", $contents);
		}

		// Save projects array to INI
		public static function save_projects_ini($projects) {
			$contents = "";

			foreach ($projects as $project => $item) {
				$contents .= "[" . $project . "]" . PHP_EOL . "group = \"" . $item['group'] . "\"" . PHP_EOL;

				if (array_key_exists('todo', $item))
					foreach($item['todo'] as $todo)
						$contents .= "todo[] = \"" . $todo . "\"" . PHP_EOL;

				if (array_key_exists('doing', $item))
					foreach($item['doing'] as $doing)
						$contents .= "doing[] = \"" . $doing . "\"" . PHP_EOL;

				if (array_key_exists('done', $item))
					foreach($item['done'] as $done)
						$contents .= "done[] = \"" . $done . "\"" . PHP_EOL;

				$contents .= PHP_EOL;
			}

			self::save_file("../info/projects.php", $contents);
		}

		// Save groups array to INI
		public static function save_groups_ini($groups) {
			$contents = "";

			foreach ($groups as $group => $array) {
				$contents .= "[" . $group . "]" . PHP_EOL;
				foreach($array as $identifier => $item)
					foreach($item as $i)
						$contents .= $identifier . "[] = \"" . $i . "\"" . PHP_EOL;
				$contents .= PHP_EOL;
			}

			self::save_file("../info/groups.php", $contents);
		}

		// Save three-level array to INI (converts from array => array => array to file => section => array)
		public static function save_array_ini($name, $array) {
			$contents = "";

			foreach ($array as $section => $subarray) {
				$contents .= "[" . $section . "]" . PHP_EOL;
				foreach($subarray as $identifier => $item)
					foreach($item as $i)
						$contents .= $identifier . "[] = \"" . $i . "\"" . PHP_EOL;
				$contents .= PHP_EOL;
			}

			self::save_file("../info/" . $name . ".php", $contents);
		}

		// Save a new member
		public static function save_new_member($member) {
			$name = $member->get_name();
			$pass = $member->get_password();

			$info = "[" . $name . "]" . PHP_EOL . "pass = \"" . $pass . "\"" . PHP_EOL . PHP_EOL;

			self::add_to_file("../info/members.php", $info);
		}

		// Save a new group
		public static function save_new_group($group) {
			$info = "[" . $group . "]" . PHP_EOL . PHP_EOL;

			self::add_to_file("../info/groups.php", $info);
		}

		// Save a new project
		public static function save_new_project($project) {
			$name = $project->get_name();
			$group = $project->get_group();

			$info = "[" . $name . "]" . PHP_EOL . "group=\"" . $group . "\"" . PHP_EOL . PHP_EOL;

			self::add_to_file("../info/projects.php", $info);
		}
	}
?>
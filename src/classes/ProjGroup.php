<?php
	include_once "Group.php";
	include_once "Member.php";

	class ProjGroup extends Group {
		private $projects = array();
		
		// Constructor
		public function __construct($name, $member) {
			parent::__construct($name, $member);
		}

		// Add a project to the group
		public function add_project($project) {
			$this->projects[] = $project;
		}

		// List projects of the group
		public function list_projects() {
			foreach ($this->projects as $project)
				echo "<li><a href=\"show_chart.php?group=" . $this->get_name() . "&project=" . $project . "\">" . $project . "</a></li>" . PHP_EOL;
		}
	}
?>
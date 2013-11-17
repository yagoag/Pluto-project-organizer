<?php
	include_once "ProjGroup.php";

	class Member {
		private $name;
		private $password;
		private $groups = array();
		
		// Constructor
		public function __construct($name, $password) {
			$this->name = $name;
			$this->password = $password;
		}
		
		// Getters
		public function get_name() {
			return $this->name;
		}

		public function get_password() {
			return $this->password;
		}

		// Create a new group
		public function create_group($name) {
			
		}
		
		// Add new group to member
		public function add_group($group_name) {
			$this->groups[] = $group_name;
		}

		// listGroups function
		public function list_groups() {
			foreach($this->groups as $group)
				echo "<li><a href=\"show_projects.php?group=" . $group . "\">" . $group . "</a></li>" . PHP_EOL;
		}	
	}
?>
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

		// createGroup function
		public function create_group($name) {
			
		}
		// addGroup function
		public function add_group($groupName) {
			$this->groups[] = $groupName;
		}

		// listGroups function
		public function list_groups($members) {
			if (array_key_exists('groups', $members[$name]))
					foreach($members[$name]['groups'] as $group)
						echo $group;
		}	
	}
?>
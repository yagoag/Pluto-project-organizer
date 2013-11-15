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
		public function createGroup($name) {
			
		}
		// addGroup function
		public function addGroup($groupName) {
			$this->groups[] = $groupName;
		}
	}
?>
<?php
	include "ProjGroup.php";

	class Member {
		private $name;
		private $groups = array();
		
		// Constructor
		public function __construct($name) {
			
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
<?php
	class Group {
		private $name;
		private $members = array();
		
		// Constructor
		public function __contruct($name, $member) {
			$this->name = $name;
			$this->members[] = $member;
		}
		
		// Add a member to a group
		public function add_member($member) {
			$this->members[] = $member;
		}
	}
?>
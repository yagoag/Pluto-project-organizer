<?php
	class Group {
		private $name;
		private $members = array();
		
		// Constructor
		public function __construct($name, $member) {
			$this->name = $name;
			$this->members[] = $member;
		}
		
		// Add a member to a group
		public function add_member($member) {
			$this->members[] = $member;
		}

		// Name getter
		public function get_name() {
			return $this->name;
		}
	}
?>
<?php
	include "Group.php";
	include "Member.php";

	class ProjGroup extends Group {
		private $name;
		private $members = array();
		private $projects = array();
		private static $groups = array();
		
		// Constructor
		public function __contruct($name, $member) {
			$this->name = $name;
			$this->members[] = $member;
			$groups[] = $this;
		}
		
		// addMember function
		/public function addMember($member) {
			$this->members[] = $member;
			$member.addCourse($this->name);
		}
	}
?>
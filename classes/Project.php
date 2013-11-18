<?php
	include_once "FileManip.php";

	class Project {
		// Class Variables
		private $name;
		private $group;
		private $todo = array();
		private $doing = array();
		private $done = array();

		// Constructor
		public function __construct($name, $group) {
			$this->name = $name;
			$this->group = $group;
		}

		// Getters
		public function get_name() {
			return $this->name;
		}

		public function get_group() {
			return $this->group;
		}

		public function get_todo_array() {
			return $this->todo;
		}

		public function get_doing_array() {
			return $this->doing;
		}

		public function get_done_array() {
			return $this->done;
		}

		// Add items
		public function add_todo($item) {
			$this->todo[] = $item;
			//FileManip::saveFile();
		}
		public function add_doing($item) {
			$this->doing[] = $item;
			//FileManip::saveFile($this->name . "/doing.txt", $item);
		}
		public function add_done($item) {
			$this->done[] = $item;
			//FileManip::saveFile($this->name . "/done.txt", $item);
		}

		// Transitions
		// ToDo -> Doing
		public function todo_to_doing($position) {
			$this->doing[] = $this->todo[$position];
			unset($this->todo[$position]);
			//$this->todo = array_values($this->todo);
		}
		// Doing -> Done
		public function doing_to_done($position) {
			$this->done[] = $this->doing[$position];
			unset($this->doing[$position]);
			//$this->doing = array_values($this->doing);
		}
		// Doing -> ToDo
		public function doing_to_todo($position) {
			$this->todo[] = $this->doing[$position];
			unset($this->doing[$position]);
			//$this->todo = array_values($this->todo);
		}
		// Done -> Doing
		public function done_to_doing($position) {
			$this->doing[] = $this->done[$position];
			unset($this->done[$position]);
			//$this->doing = array_values($this->doing);
		}

		// Deleters
		public function del_todo($position) {
			unset($this->todo[$position]);
			//$this->todo = array_values($this->todo);
		}
		public function del_doing($position) {
			unset($this->doing[$position]);
			//$this->doing = array_values($this->doing);
		}
		public function del_done($position) {
			unset($this->done[$position]);
			//$this->done = array_values($this->done);
		}

		// Print the todo list
		public function print_todo() {
			foreach ($this->todo as $id => $item) {
				echo "<li>" . $item . PHP_EOL .
					 "<br /><a href=\"chart_do.php?project=" . $this->name . "&act=del_todo&id=" . $id . "\"><input type=\"button\" class=\"button-delete\" /></a> <a href=\"chart_do.php?project=" . $this->name . "&act=todo_to_doing&id=" . $id . "\"><input type=\"button\" class=\"button-next\" /></a></li>";
			}
		}

		// Print the doing list
		public function print_doing() {
			foreach ($this->doing as $id => $item) {
				echo "<li>" . $item . PHP_EOL .
					 "<br /><a href=\"chart_do.php?project=" . $this->name . "&act=doing_to_todo&id=" . $id . "\"><input type=\"button\" class=\"button-back\" /></a> <a href=\"chart_do.php?project=" . $this->name . "&act=del_doing&id=" . $id . "\"><input type=\"button\" class=\"button-delete\" /></a> <a href=\"chart_do.php?project=" . $this->name . "&act=doing_to_done&id=" . $id . "\"><input type=\"button\" class=\"button-next\" /></a></li>";
			}
		}

		// Print the done list
		public function print_done() {
			foreach ($this->done as $id => $item) {
				echo "<li>" . $item . PHP_EOL .
					 "<br /><a href=\"chart_do.php?project=" . $this->name . "&act=done_to_doing&id=" . $id . "\"><input type=\"button\" class=\"button-back\" /></a> <a href=\"chart_do.php?project=" . $this->name . "&act=del_done&id=" . $id . "\"><input type=\"button\" class=\"button-delete\" /></a></li>";
			}
		}
	}
?>
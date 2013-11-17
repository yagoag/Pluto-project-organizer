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
			FileManip::saveFile();
		}
		public function add_doing($item) {
			$this->doing[] = $item;
			FileManip::saveFile($this->name . "/doing.txt", $item);
		}
		public function add_done($item) {
			$this->done[] = $item;
			FileManip::saveFile($this->name . "/done.txt", $item);
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

		// Print the project status chart
		public function print_chart() {
			echo	"<div id=\"chart-container\">" . PHP_EOL .
					"	<div id=\"todo\">" . PHP_EOL .
					"		<div class=\"title\">To Do</div>" . PHP_EOL .
					"		<ul>" . PHP_EOL;
			foreach ($this->todo as $item) {
				echo	"			<li>" . $item . "</li>" .
						"<br /><input type=\"button\" class=\"button-delete\" /> <input type=\"button\" class=\"button-next\" />";
			}
			foreach ($this->doing as $item) {
				echo "<li>" . $item . "</li>";
			}
			foreach ($this->done as $item) {
				echo "<li>" . $item . "</li>";
			}
		}
	}
?>
<?php
	class Projects {
		// Class Variables
		private $name;
		private $password;
		private $todo = array();
		private $doing = array();
		private $done = array();

		// Constructor
		public function __construct($name, $pass) {
			$this->name = $name;
			$this->password = $pass;
		}

		// Add items
		public function addToDo($item) {
			$this->todo[] = $item;
		}
		public function addDoing($item) {
			$this->doing[] = $item;
		}
		public function addDone($item) {
			$this->done[] = $item;
		}

		// Transitions
		// ToDo -> Doing
		public function nowDoing($position) {
			$this->doing[] = $this->todo[$position];
			unset($this->todo[$position]);
		}
		// Doing -> Done
		public function nowDone($position) {
			$this->done[] = $this->doing[$position];
			unset($this->doing[$position]);
		}

		// Deleters
		public function delToDo($position) {
			unset($this->todo[$position]);
		}
		public function delDoing($position) {
			unset($this->doing[$position]);
		}
		public function delDone($position) {
			unset($this->done[$position]);
		}

		// Print the project status chart
		public function printChart() {
			echo "<table>
				  <tr><th>ToDo</th>
				      <th>Doing</th>
				      <th>Done</th>
				  </tr>
				  <tr><td><ul>";
			foreach ($this->todo as $item) {
				echo "<li>" . $item . "</li>";
			}
			echo "</ul></td><td><ul>";
			foreach ($this->doing as $item) {
				echo "<li>" . $item . "</li>";
			}
			echo "</ul></td><td><ul>";
			foreach ($this->done as $item) {
				echo "<li>" . $item . "</li>";
			}
			echo "</ul></td><td></tr></table>";
		}
	}
?>
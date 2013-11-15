<?php
	include_once "File.php";

	class Project {
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
			$dir = "/" . $name;
			//if (!is_dir($dir))
			//	mkdir($dir);
			//File::saveFile("pass.txt", $pass);
		}

		// Debugging functions
		public function dbgNameAndPass() {
			echo $this->name . "<br />" . $this->password;
		}

		// Add items
		public function addToDo($item) {
			$this->todo[] = $item;
			File::saveFile($this->name . "/todo.txt", $item);
		}
		public function addDoing($item) {
			$this->doing[] = $item;
			File::saveFile($this->name . "/doing.txt", $item);
		}
		public function addDone($item) {
			$this->done[] = $item;
			File::saveFile($this->name . "/done.txt", $item);
		}

		// Transitions
		// ToDo -> Doing
		public function nowDoing($position) {
			$this->doing[] = $this->todo[$position];
			unset($this->todo[$position]);
			$this->todo = array_values($this->todo);
		}
		// Doing -> Done
		public function nowDone($position) {
			$this->done[] = $this->doing[$position];
			unset($this->doing[$position]);
			$this->doing = array_values($this->doing);
		}

		// Deleters
		public function delToDo($position) {
			unset($this->todo[$position]);
			$this->todo = array_values($this->todo);
		}
		public function delDoing($position) {
			unset($this->doing[$position]);
			$this->doing = array_values($this->doing);
		}
		public function delDone($position) {
			unset($this->done[$position]);
			$this->done = array_values($this->done);
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
			//echo readList("/" . $this->name . "/" . "todo.txt");
			echo "</ul></td><td><ul>";
			foreach ($this->doing as $item) {
				echo "<li>" . $item . "</li>";
			}
			//echo readList("/" . $this->name . "/" . "doing.txt");
			echo "</ul></td><td><ul>";
			//foreach ($this->done as $item) {
			//	echo "<li>" . $item . "</li>";
			//}
			$dir = $this->name . "/done.txt"
			echo readList( $dir);
			echo "</ul></td><td></tr></table>";
		}
	}
?>
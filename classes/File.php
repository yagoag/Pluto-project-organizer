<?php
// File.php
	include_once "Member.php";

	class File {
		// Save a member
		public static function save_member($member) {
			$fw = fopen("members.ini", "a");

			$name = $member->get_name();
			$pass = $member->get_password();

			$info = "[" . $name . "]\r\n" .
			        "pass = \"" . $pass . "\"\r\n" .
			         ";end-" . $name . "\r\n";

			fwrite($fw, $info);

			fclose($fw);
		}

		// Save files
		public static function saveFile($directory, $info) {
			$fw = fopen($directory, "a");

			fwrite($fw, $info . "\r\n");

			fclose($fw);
		}
		// Read files
		public static function readFile($directory) {
			$fr = fopen($directory, "r");

			$info = fgets($fr);

			fclose($fr);

			return $info;
		}

		// Read and return lists
		public static function readList($directory) {
			$fr = fopen($directory, "r");

			$info = "";
			while (!feof($fr)) {
				$info = $info . "<li>" . fgets($fr) . "</li>";
			}

			fclose($fr);

			return $info;
		}

		// Read the content of the file and put it in an array
		public static function readPutArray($directory, $list) {
 			$fd = fopen ($directory, "r");

 			while (!feof ($fd))
 				$buffer = fgets($fd, 4096);
 				$list[] = $buffer;
 			fclose ($fd);
 		}
	}
?>
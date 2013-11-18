<?php
	include_once "classes/FileManip.php";
       
	// initializing variables
    $act = $_GET['act'];
    $project = $_GET['project'];
    
    if (isset($_GET['id']))
        $id = $_GET['id'];
        
    if (isset($_POST['item']))
        $item = $_POST['item'];
	
	// get projects array
    $projects = parse_ini_file("projects.ini", true);

	switch ($act) {
		// add functions
		// add new todo item
		case 'add_todo':
			$projects[$project]['todo'][] = $item;
			break;
		// add new doing item
		case 'add_doing':
			$projects[$project]['doing'][] = $item;
			break;
		// add new done item
		case 'add_done':
			$projects[$project]['done'][] = $item;
			break;

		// transition functions
		// todo -> doing
		case 'todo_to_doing':
			$projects[$project]['doing'][] = $projects[$project]['todo'][$id];
			unset($projects[$project]['todo'][$id]);
			break;
		// doing -> done
		case 'doing_to_done':
			$projects[$project]['done'][] = $projects[$project]['doing'][$id];
			unset($projects[$project]['doing'][$id]);
			break;
		// todo <- doing 
		case 'doing_to_todo':
			$projects[$project]['todo'][] = $projects[$project]['doing'][$id];
			unset($projects[$project]['doing'][$id]);
			break;
		// doing <- done
		case 'done_to_doing':
			$projects[$project]['doing'][] = $projects[$project]['done'][$id];
			unset($projects[$project]['done'][$id]);
			break;

		// delete functions
		// delete todo item 
		case 'del_todo':
			unset($projects[$project]['todo'][$id]);
			break;
		// delete doing item
		case 'del_doing':
			unset($projects[$project]['doing'][$id]);
			break;
		// delete done item
		case 'del_done':
			unset($projects[$project]['done'][$id]);
			break;
		// default case
		default:
			include_once 'classes/Message.php';
			$name = $_SESSION['username'];
			$title = "Invalid option!";
			$message = "The selected option does not exist, please select an option validates.";
			// call message function to show the error
			Message::show_logged_in($name, $title, $message);
		break;
	}

	// saving changes in projects
	FileManip::save_projects_ini($projects);

	// page redirection
	header("Location: show_chart.php?group=" . $group . "&project=" . $project);
?>
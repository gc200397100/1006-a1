<!DOCTYPE>
<html lang="en-ca">
	<head>
		<meta charset="utf-8" />
		<title>To-Do List Saved</title>
		<meta title="author" content="Emma Mann" />
		<link href="style.css" rel="stylesheet" />
	</head>
	<body>
<?php
	// Create database variables
	$servername = "localhost";
	$username = "root";
	$password = "mysql";
	$dbname = "comp-1006";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Store the user inputs in variables
	$taskName = $_POST['task-name'];
	$taskArea = $_POST['subject'];
	$assignTo = $_POST['assign'];
	$deadline = $_POST['deadline'];
	$complete = true;//create variable indicating if form is complete or not

	// Check each user input & show any error messages
	if (empty($taskName)){
		$complete = false;
	}

	if (empty($taskArea)){
		$complete = false;
	}

	if (empty($assignTo)){
		$complete = false;
	}

	if (empty($deadline)){
		$complete = false;
	}

	// Check if there any errors, if not connect
	if ($complete == true) {
		$conn = new mysqli($servername, $username, $password, $dbname);
		$sql = "INSERT INTO toDo (tdTask, tdSubject, tdPplID, tdDue) VALUES('$taskName', '$taskArea', '$assignTo', '$deadline')";

		//execute the save
		if($conn->query($sql) == TRUE) {
			echo '<h1>New record created successfully.<h1>';
		}
		else {
			echo '<h1>Error: '.$sql.'<h1>'.$conn->error;
		}
		$conn->close();

		//disconnect
		$conn = null;

		//display a confirmation message
		echo '<h3>The task has been assigned.</h3>';
	}
?>
	</body>
</html>

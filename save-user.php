<!DOCTYPE>
<html lang="en-ca">
	<head>
		<meta charset="utf-8" />
		<title>New User Saved</title>
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
		$fname = $_POST['first-name'];
		$lname = $_POST['last-name'];
		$complete = true;//create variable indicating if form is complete or not

		// Check each user input & show any error messages
		if (empty($fname)){
			$complete = false;
		}

		if (empty($lname)){
			$complete = false;
		}

		// Check if there any errors, if not connect
		if ($complete == true) {
			$conn = new mysqli($servername, $username, $password, $dbname);
			$sql = "INSERT INTO people (pplFName, pplLName) VALUES('$fname', '$lname')";

			//execute the save
			if($conn->query($sql) == TRUE) {
				echo '<h1>New record created successfully. </h1>';
			}
			else {
				echo '<h1>Error: '.$sql.'</h1>'.$conn->error;
			}
			$conn->close();

			//disconnect
			$conn = null;

			//display a confirmation message
			echo '<h3>The new user was saved.</h3>';
		}
		?>
	</body>
</html>

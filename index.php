<!DOCTYPE html>
<html lang="en-ca">
	<head>
		<meta charset="utf-8" />
		<title>To-Do List</title>
		<meta title="author" content="Emma Mann" />
		<link href="style.css" rel="stylesheet" />
	</head>
	<body>
		<!--Display current to do list-->
<?php
	// Create your variables

	// Create database variables
	$servername = "localhost";
	$username = "root";
	$password = "mysql";
	$dbname = "comp-1006";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die ("connection failed: " . $conn->connect_error);
	}

	//Set up the SQL
	$sql = "SELECT * FROM toDo INNER JOIN people ON toDo.tdPplID=people.pplID ORDER BY toDo.tdID";

	//Execute the SQL command in the db; store the whole dataset in a $result variable
	$result = mysqli_query($conn, $sql);

	echo '<h1>To Do List</h1>';
	echo '<table border="1">
					<th></th>
					<th>Task Name</th>
					<th>Task Area</th>
					<th>Assigned To</th>
					<th>Deadline</th>';

	//Loop through the collection of data
	while ($row = mysqli_fetch_array($result)) {
		echo '
			<tr>
				<td>'.$row['tdID'].'</td>
				<td>'.$row['tdTask'].'</td>
				<td>'.$row['tdSubject'].'</td>
				<td>'.$row['pplFName'].' '.$row['pplLName'].'</td>
				<td>'.$row['tdDue'].'</td>
			</tr>';
		}
		echo '</table>';

?>
		<!--Form for user to add to existing to do list-->
		<div id="forms">
			<form method="post" action="save-to-do.php">
				<fieldset>
					<legend>Add Item</legend>
				<div>
					<label for="task-name">Task Name</label>
					<input type="text" name="task-name" id="task-name" size="20" placeholder="Task Name"required />
				</div>
				<div>
					<label for="subject">Task Area</label>
					<select value="select" name="subject" id="subject" required />
						<option value="" selected disabled hidden>--Select--</option>
					<!--Populate dropdown menu from the subject table-->
<?php
	$sql = mysqli_query($conn, "SELECT * FROM subject");
	while ($row = $sql->fetch_assoc()){
		echo '<option value="'.$row['sbjctName'].'">'.$row['sbjctName'].'</option>';
	}
?>
					</select>
				</div>
				<div>
					<label for="assign">Assign To</label>
					<select name="assign" id="assign" required />
						<option value="" selected disabled hidden>--Select--</option>
					<!--Populate from people table, include first name, last name, and ID#-->
<?php
	$sql = mysqli_query($conn, "SELECT * FROM people");
	while ($row = $sql->fetch_assoc()){
	echo '<option value="'.$row['pplID'].'">'.$row['pplID'].'-'.$row['pplFName'].' '.$row['pplLName'].'</option>';
	}

	//disconnect from the db
	mysqli_close($conn);
?>
					</select>
				</div>
				<div>
					<label for="deadline">Deadline</label>
					<input type="date" name="deadline" id="deadline" required />
				</div>
				<button type="submit">Create</button>
				<button type="reset">Clear Form</button>
				</fieldset>
			</form>

			<!--Form for adding new people to database-->
			<form method="post" action="save-user.php">
				<fieldset>
					<legend>Add New Member</legend>
					<div>
						<label for="first-name">First Name</label>
						<input type="text" name="first-name" id="first-name" size="20" placeholder="First Name"required />
					</div>
					<div>
						<label for="last-name">Last Name</label>
						<input type="text" name="last-name" id="last-name" size="20" placeholder="Last Name" required />
					</div>
					<button type="submit">Create</button>
					<button type="reset">Clear Form</button>
				</fieldset>

			</form>
		</div><!--Close forms div-->
	</body>
</html

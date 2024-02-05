<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Page</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="About the site"/>
	<meta name="author" content="Author name"/>

	<!-- core CSS -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		section {
			margin-top: -40px;
		}

		/* Add background image */
		body {
			background-image: url('dried-flowers-notebook.jpg'); /* Replace with your image filename */
			background-size: cover;
			background-repeat: no-repeat;
		}

		body {
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100vh;
			margin: 0;
			padding: 0;
		}

		.scrollable-container {
			height: 400px;
			width: 80%;
			overflow-y: scroll;
			border: 2px solid black; /* Added thicker border */
			padding: 10px;
		}

		.search-box {
			margin-bottom: 10px;
		}

		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			border: 1px solid black;
			padding: 8px;
			text-align: left;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand active">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="test.php">HOME</a></li>
			<li><a href="Book (2).php">BOOKS</a></li>
			<li><a href="adprofile.php">PROFILE</a></li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<li><a href="Admin_login.php"><span class="glyphicon glyphicon-log-in"> LOGOUT</span></a></li>
			<li><a href="add book.php" style="margin-left: 20px;" class="right-buttons">ADD BOOKS</a></li>
			<li><a href="add vendor.php" style="margin-left: 20px;" class="right-buttons">ADD VENDORS</a> </li>
		</ul>
	</div>
	</nav>
	<h1>Feedbacks</h1>
	<div class="scrollable-container">
		<table>
			<tr>
				<th>Feedback ID</th>
				<th>User ID</th>
				<th>Feedback</th>
			</tr>
			<?php
			// Include the database connection file
			require_once('PhpConnect.php');

			// Fetch member information from the database
			$query = "SELECT * FROM Feedback";
			$result = mysqli_query($conn, $query);

			// Display the data in a table
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $row['Feedback_ID'] . "</td>";
				echo "<td>" . $row['User_ID'] . "</td>";
				echo "<td>" . $row['Feedback'] . "</td>";
				echo "</tr>";
			}
			?>
		</table>
	</div>
</body>
</html>

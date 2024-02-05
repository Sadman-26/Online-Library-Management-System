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
			background-image: url('book_line.jpg'); /* Replace with your image filename */
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
			background-color: rgba(255, 255, 255, 0.6);
		}

		 .search-container {
            display: flex;
            justify-content: center;
            margin-top: 10px;
			margin-bottom: 5px; /* Add margin to create space between search bar and questions */
        }

        .search-bar {
            padding: 12px;
            border: 2px solid #ccc;
            border-radius: 30px;
            width: 70%;
            max-width: 400px;
            font-size: 16px;
            outline: none;
			margin-right: 10px;
			
        }

        .search-button {
            padding: 12px 24px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .search-button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
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
	<h1>Admin Panel</h1>
	<div class="scrollable-container">
		<table>
			<tr>
				<th>Name</th>
				<th>Member ID</th>
				<th>Student ID</th>
				<th>No of Books</th>
				<th>Admin Username</th>
				<th>Email</th>
				<th>Phone</th>
			</tr>
			<?php
			// Include the database connection file
			require_once('PhpConnect.php');

			// Fetch member information from the database
			$query = "SELECT m.Member_ID, m.Student_ID, m.No_of_Books, m.Admin_username, s.Email, s.Phone, s.First_name, s.Last_name
					  FROM member m
					  JOIN student s ON m.Student_ID = s.ID";
			$result = mysqli_query($conn, $query);

			// Display the data in a table
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $row['First_name'] . " " . $row['Last_name'] . "</td>";
				echo "<td>" . $row['Member_ID'] . "</td>";
				echo "<td>" . $row['Student_ID'] . "</td>";
				echo "<td>" . $row['No_of_Books'] . "</td>";
				echo "<td>" . $row['Admin_username'] . "</td>";
				echo "<td>" . $row['Email'] . "</td>";
				echo "<td>" . $row['Phone'] . "</td>";
				echo "</tr>";
			}
			?>
		</table>
	</div>
</body>
</html>

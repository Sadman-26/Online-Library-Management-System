<!DOCTYPE html>
<html>
<head>
    <title>Library Index</title>
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
            background-image: url('open.jpg'); /* Replace with your image filename */
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style> 
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }
        .faded-box {
            background-color: rgba(255, 255, 255, 0.8);
            border: 2px ;
            padding: 10px;
            width: 100%;
            max-height: 400px;
            overflow-y: scroll;
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
            <ul class="nav navbar-nav navbar-right">
                <li><a href="profile3.php"><span class="glyphicon glyphicon-user"> Profile </span></a></li>
            </ul>
        </div>
    </nav>
	<div class="container">
	<h1 style="text-align: center;">Library Index</h1>
		<div class="search-container">
            <form method="GET" style="display: flex; align-items: center;">
			<input type="text" id="search" name="search" class="search-bar" placeholder="Search by Book ID, ISBN, Title, or Author...">
			<button class="search-button" type="submit">Search</button>
			</form>

        </div>

	<div class="scrollable-container">
    <div class="scrollable-box">
	<div class="faded-box">

        <?php
        require_once('PhpConnect.php'); // Include your database connection code
		
		// inside profile

        $sql = "SELECT Book_ID, ISBN, Title, Author, Genre, IF(member_ID IS NULL, 'Available', 'Not Available') AS Availability
                FROM book";
        
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql .= " WHERE Book_ID LIKE '%$search%' OR ISBN LIKE '%$search%' OR Title LIKE '%$search%' OR Author LIKE '%$search%' OR Genre LIKE '%$search%'";
        }
        
        $sql .= " ORDER BY ISBN";
        
        $result = $conn->query($sql);
		

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Book ID</th><th>ISBN</th><th>Title</th><th>Author</th><th>Genre</th><th>Availability</th><th>Action</th></tr>";
            while($row = $result->fetch_assoc()) {
				$bookId = $row['Book_ID'];
				$title = $row['Title'];
				//session_start();
				//$avl = $row['Availability'];
				//$_SESSION['avl'] = $avl;
                echo "<tr>";
                echo "<td>{$row['Book_ID']}</td><td>{$row['ISBN']}</td><td><a href='clickable book.php?book_id=$bookId'>$title</a></td><td>{$row['Author']}</td><td>{$row['Genre']}</td><td>{$row['Availability']}</td>";
                if ($row['Availability'] == 'Available') {
                    echo "<td><a href='book_cart.php?book_id={$row['Book_ID']}&title={$row['Title']}'>Add Book</a></td>";
					
                } else {
                    echo "<td></td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No records found.";
        }

        $conn->close();
        ?>
    </div>
</div>

</body>
</html>

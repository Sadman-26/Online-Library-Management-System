<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
        /* Your CSS styles here */
		.star {
    font-size: 20px; /* Adjust size as needed */
    color: gold; /* Color for the star */
}
		.reviews-dropdown {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }
		.arrow {
            margin-right: 5px;
        }
		.separator {
            border-top: 1px solid #ccc;
            margin-top: 10px;
            padding-top: 10px;
        }
        .reviews-content {
            display: none;
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
		body {
            margin: 0;
            padding: 0;
            background-image: url('paper.jpg'); /* Replace with your image filename */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
			font-family: Times New Roman, Serif Typeface;
        }
		/* Navigation bar styles */
        .navbar {
            overflow: hidden;
            background-color: #333;
			z-index: 1000;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
		.navbar-right {
		float: right;
		}
    </style>
    <script>
        function toggleReviews() {
            var content = document.getElementById("reviews-content");
            if (content.style.display === "none") {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        }
    </script>

    </style>
</head>
<body>
    <div class="navbar">
	<a href="">Online Library Management System</a>
    <div class="navbar-right">
    <a href="Member Login.php">Student Login</a>
    <a href="Admin_login.php">Admin Login</a>
    <a href="Member Signup (working).php">Student Signup</a>
</div>
    <a href="help desk.php">FAQ</a>
</div>
<?php
require_once('PhpConnect.php');

// this is for books(1).php

session_start();

if (isset($_GET['book_id']) && !empty($_GET['book_id'])) {
    $bookId = $_GET['book_id'];
    $sql = "SELECT * FROM book WHERE Book_ID = '$bookId'";
    $result = mysqli_query($conn, $sql);
	$a = 'Available';
	$n = 'Not Available';
    // Fetch book details
    if (mysqli_num_rows($result) != 0) {
        $row = mysqli_fetch_array($result);
        $title = mysqli_real_escape_string($conn, $row['Title']); // Escape title for safe use in SQL
        
        echo "<h1>Title: {$row['Title']}</h1><br>";
        echo "Author: {$row['Author']}<br>";
        
        // Check if there are ratings available
        $sql2 = "SELECT AVG(br.Rating) AS AverageRating
                FROM book_review br
                WHERE br.Title = '$title'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($result2);
		
		$sql3 = "SELECT Book_ID,
				CASE WHEN member_ID IS NULL THEN '$a' ELSE '$n' END AS Availability
                FROM book
                WHERE Book_ID = '$bookId'";
		$result3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_array($result3);
		$available = $row3['Availability'];
				
        
        if ($row2['AverageRating']) {
            $avgRating = round($row2['AverageRating'], 1);
            echo "Ratings: $avgRating ";
            // Convert average rating to stars
            $starRating = '';
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $avgRating) {
                    $starRating .= '<span class="star">&#9733;</span>'; // Filled star
                } else {
                    $starRating .= '<span class="star">&#9734;</span>'; // Empty star
                }
            }
            echo "$starRating<br>";
        } else {
            echo "No ratings available<br>";
        }

        echo "Genre: {$row['Genre']}<br>";
        echo "Edition: {$row['Edition']}<br>";
        echo "Description: " . htmlspecialchars($row['Description']) . "<br>";
		echo "Availability Status: $available<br>";

        // Display reviews dropdown
        echo '<div class="reviews-dropdown" onclick="toggleReviews()">';
        echo '<span class="arrow">&#9660;</span> Reviews';
        echo '</div>';
        echo '<div id="reviews-content" class="reviews-content">';
        
        // Query to retrieve reviews
        $sql_reviews = "SELECT * FROM book_review WHERE Title = '$title'";
        $result_reviews = mysqli_query($conn, $sql_reviews);

        if (mysqli_num_rows($result_reviews) > 0) {
            while ($row_review = mysqli_fetch_array($result_reviews)) {
                echo "<p>{$row_review['Review']}</p>";
                echo '<div class="separator"></div>'; // Add separator line
            }
        } else {
            echo "No reviews available.";
        }

        echo '</div>';
        
    } else {
        echo "Book not found.";
    }
} else {
    echo "Invalid book ID.";
}

$conn->close();
?>
</body>
</html>
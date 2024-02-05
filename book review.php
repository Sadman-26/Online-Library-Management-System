<?php
require_once('PhpConnect.php');

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: profile3.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$reviewSubmitted = false; // Initialize the variable
$submissionError = false; // Initialize the variable for submission error

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $rev = $_POST["review"];
    $review = mysqli_real_escape_string($conn, $rev); // Escape title for safe use in SQL
    $rating = $_POST["ratingValue"]; // This will be a decimal value
    //echo "Rating value received: " . $rating; 

    // Check if the book title exists in the book table
    $checkTitleQuery = "SELECT title FROM book WHERE title = '$title'";
    $titleExists = mysqli_query($conn, $checkTitleQuery);
    if (mysqli_num_rows($titleExists) != 0) {

        $sql = "INSERT INTO book_review (title, review, rating) VALUES ('$title', '$review', '$rating')";

        if (mysqli_query($conn, $sql)) {
            $reviewSubmitted = true; // Set the variable to true on successful submission
        } else {
            $submissionError = true; // Set the variable to true on submission error
        }
    } else {
        $submissionError = true; // Set the variable to true for title not found error
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Book Review</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="About the site"/>
    <meta name="author" content="Author name"/>

    <!-- Core CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <style>
        /* Add custom styles here */
        body {
            padding-top: 70px;
            background-color: #f7f7f7;
        }
        /* Add background image */
        body {
            background-image: url('brown.jpg'); /* Replace with your image filename */
            background-size: cover;
            background-repeat: no-repeat;
        }
        .navbar {
            background-color: #333;
            border: none;
            border-radius: 0;
            margin-bottom: 0;
        }
        
        .navbar-brand {
            color: #fff;
        }
        
        .navbar-inverse .navbar-nav > li > a {
            color: #fff;
        }
        
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .feedback-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
			margin-top: -30px;
        }
        
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            resize: vertical;
        }
        
        input[type="submit"] {
            display: block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .star {
            font-size: 24px;
            cursor: pointer;
            color: gray;
        }
    </style>
    <script>
        let selectedRating = 0; // Default value

        function updateRating(rating) {
            selectedRating = rating;
            updateStarColors();
        }

        function updateStarColors() {
            const stars = document.getElementsByClassName("star");
            for (let i = 0; i < stars.length; i++) {
                if (i < selectedRating) {
                    stars[i].style.color = "gold";
                } else {
                    stars[i].style.color = "gray";
                }
            }

            // Convert selectedRating to a decimal value between 0 and 1
            const decimalRating = selectedRating / 1; // Assuming a 5-star system
            document.getElementById("selectedRating").value = decimalRating;
        }
    </script>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand active">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="profile3.php"><span class="glyphicon glyphicon-user"> PROFILE </span></a></li>
            </ul>
        </div>
    </nav>
    <br><br><br>
    <div class="container">
    <div class="feedback-form">
        <h1>Submit Book Review</h1>
        <?php if ($reviewSubmitted): ?>
            <p>Thank you for your review!</p>
        <?php endif; ?>
        <?php if ($submissionError): ?>
            <p>Error submitting your review.</p>
        <?php endif; ?>
        <form action="" method="post">
            <textarea name="title" rows="1" placeholder="Book Title"></textarea><br>
            <textarea name="review" rows="5" placeholder="Enter your review here"></textarea><br>
            <div>
                <span>Rating: </span>
                <span>
                    <span class="star" onclick="updateRating(1)">☆</span>
                    <span class="star" onclick="updateRating(2)">☆</span>
                    <span class="star" onclick="updateRating(3)">☆</span>
                    <span class="star" onclick="updateRating(4)">☆</span>
                    <span class="star" onclick="updateRating(5)">☆</span>
                </span>
            </div>
            <input type="hidden" id="selectedRating" name="ratingValue" value="">
            <input type="submit" value="Submit">
        </form>
        <script>
            updateStarColors(); // Initialize star colors based on default rating
        </script>
    </div>
</div>
</body>
</html>

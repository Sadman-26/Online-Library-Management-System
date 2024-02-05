<?php
// Include the database connection file
require_once('PhpConnect.php');

session_start(); // Start the session

if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: profile3.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$feedbackSubmitted = false;
$errorMsg = "";

function generateRandomCode2() {
		$randomNumber = mt_rand(0, 9999999);
		$paddedNumber = str_pad($randomNumber, 5, '0', STR_PAD_LEFT);
		$code =$paddedNumber;
		return $code;
	}
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fdbk = $_POST["feedback"];
    $feedback = mysqli_real_escape_string($conn, $fdbk);

    // Generate a unique feedback ID
    $maxAttempts = 10; // Limit the number of attempts to avoid infinite loop
    $feedbackID = null;

    for ($i = 0; $i < $maxAttempts; $i++) {
        $feedbackID = generateRandomCode2(); // Assuming generateRandomCode2() returns a 7-digit number
        
        $checkUniqueSql = "SELECT feedback_id FROM feedback WHERE feedback_id = '$feedbackID'";
        $checkResult = mysqli_query($conn, $checkUniqueSql);
        
        if (mysqli_num_rows($checkResult) === 0) {
            break; // Exit the loop if the feedback ID is unique
        }
    }

    if ($feedbackID !== null) {
        $sql = "INSERT INTO feedback (feedback_id, feedback, user_id) VALUES ('$feedbackID', '$feedback', '$user_id')";

        if (mysqli_query($conn, $sql)) {
            $feedbackSubmitted = true;
        } else {
            $errorMsg = "Error submitting your feedback.";
        }
    } else {
        $errorMsg = "Error generating a unique feedback ID.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback Page</title>
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
            background-image: url('tear.jpeg'); /* Replace with your image filename */
            background-size: cover;
            background-repeat: no-repeat;
			max-width:100%
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
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
			margin-top: 80px;
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
    </style>
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
    
    <div class="container">
        <div class="feedback-form">
            <h1>Submit Feedback</h1>
            <?php if ($feedbackSubmitted): ?>
                <p>Thank you for your feedback!</p>
            <?php endif; ?>
            <?php if (!empty($errorMsg)): ?>
                <p class="error-msg"><?php echo $errorMsg; ?></p>
            <?php endif; ?>
            <form action="" method="post">
                <textarea name="feedback" rows="5" placeholder="Enter your feedback here"></textarea><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>

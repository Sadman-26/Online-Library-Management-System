	<?php
	// Start the session
	session_start();


	/* Check if the user is logged in
	if (!isset($_SESSION['user_id'])) {
		// Redirect to the sign-in page if not logged in
		header("Location: signin.php");
		exit;*/
	//}

	// Assuming you have a database connection established
	require_once('PhpConnect.php');
	if (isset($_SESSION['user_id'])) {
		// Fetch student's data based on the stored user_id session variable
	$user_id = $_SESSION['user_id'];

	//$sql = "SELECT * FROM Member WHERE User_ID = '$user_id'";
	$sql = "SELECT student.first_name, student.last_name, student.email, student.phone, member.member_id, member.no_of_books, member.admin_username FROM student INNER JOIN member ON student.id = member.student_id WHERE User_ID = '$user_id'";
	$result = mysqli_query($conn, $sql);
	
	


	if (mysqli_num_rows($result) != 0) {
		$student_data = mysqli_fetch_array($result);
		$name = $student_data[0]." ".$student_data[1];
		$mail = $student_data[2];
		$phn=$student_data[3];
		$memid=$student_data[4];
		$nob=$student_data[5];
		$adusr=$student_data[6];
		
		
		
		
		
	} else {
		echo "Student data not found.";
	}
	}else {
		header ("Location: Member Login.php");
	}
		

	
	?>

<?php

   $getMemberIDQuery = "SELECT Member_ID FROM Member WHERE User_ID = '$user_id'";
    $memberIDResult = mysqli_query($conn, $getMemberIDQuery);
	
	   if (mysqli_num_rows($memberIDResult) > 0) {
        $memberIDData = mysqli_fetch_assoc($memberIDResult);
        $memid = $memberIDData['Member_ID'];

        // Update the fine for rows with Member_ID = $memid
        $updateFineQuery = "UPDATE Book SET Fine = 
            CASE WHEN DATEDIFF(CURDATE(), Return_date) > 0 
                 THEN 10 + DATEDIFF(CURDATE(), Return_date)
                 ELSE 0
            END
            WHERE Member_ID = '$memid'";
        
        mysqli_query($conn, $updateFineQuery);
    } else {
        echo "Member data not found.";
    }
	
	$fineq="SELECT sum(Fine) from Book where Member_ID='$memid'";
	$tfine=mysqli_query($conn, $fineq);
	$finerow= mysqli_fetch_array($tfine);
	$totalfine=$finerow[0];
	$setfine="Update Member set Total_fine='$totalfine'";
	$setfine2=mysqli_query($conn, $setfine);
	
?>	

<!DOCTYPE html> 
<html>
<head>
    <title>Student Profile</title>
	  <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="description" content="About the site"/>
      <meta name="author" content="Author name"/>
    
      <!-- core CSS -->
        <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <style type="text/css">
        section {
            margin-top: -20px;
        }

        /* Add background image */
        body {
            background-image: url('coffee.jpg'); /* Replace with your image filename */
            background-size: cover;
            background-repeat: no-repeat;
        }
		.faded-box {
            background-color: rgba(255, 255, 255, 0.6);
            border: 2px ;
            padding: 10px;
            width: 50%;
            max-height: 400px;
        }
    </style>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>	
</head>
<body>
	<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand active">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
            </div>
            <ul class="nav navbar-nav">
            <li><a href="test.php">HOME</a></li>
			<li><a href="Books (1).php">BOOKS</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li>
			<li><a href="help desk.php">FAQ</a></li?
			<!-- Link to the feedback page -->
			</ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="slogout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
				<li><a href="book list.php?user_id=<?php echo $user_id; ?>" style="margin-left: 20px;" class="right-buttons">Books List</a></li> <!-- Add this line for the Books page -->
<?php
			// Fetch the Total_Fine for the logged-in student
			$getFineQuery = "SELECT Total_Fine FROM Member WHERE User_ID = '$user_id'";
			$fineResult = mysqli_query($conn, $getFineQuery);
			
			if (mysqli_num_rows($fineResult) == 1) {
				$fineData = mysqli_fetch_assoc($fineResult);
				$totalFine = $fineData['Total_Fine'];
				
				// Check if there's a fine pending
				if ($totalFine > 0) {
					// Show the "Add Books" button with a disabled attribute
					echo '<li><a href="javascript:void(0);" style="margin-left: 20px;" class="right-buttons disabled" data-toggle="tooltip" data-placement="bottom" title="Pay Fine to Add Books">Add Books</a></li>';
				} else {
					// Show the functional "Add Books" button
					echo '<li><a href="Book add button.php?clear=1&user_id=' . $user_id . '" style="margin-left: 20px;" class="right-buttons">Add Books</a></li>';
				}
			}
			?>
				<li><a href="book review.php" style="margin-left: 20px;" class="right-buttons">Review Book</a> </li>
            </ul>
        </div>
    </nav>
	<div class="faded-box">
    <h1>Student Profile</h1>
	
	
        <label for="student_name">Name:</label>
		<span><?php echo $name; ?></span><br>
		<label for="User_id">User ID:</label>
		<span><?php echo $user_id; ?></span><br>
		<label for="mail">E-mail:</label>
		<span><?php echo $mail; ?></span><br>
		<label for="phn">Phone:</label>
		<span><?php echo $phn; ?></span><br>
		<label for="Member ID">Member ID:</label>
		<span><?php echo $memid; ?></span><br>
		<label for="No. of Books">No. of Books:</label>
		<span><?php echo $nob; ?></span><br>
		 <label for="Admin Username">Admin:</label>
		<span><?php echo $adusr; ?></span><br>
		



        <!-- Add more fields here -->

<?php

   $getMemberIDQuery = "SELECT Member_ID FROM Member WHERE User_ID = '$user_id'";
    $memberIDResult = mysqli_query($conn, $getMemberIDQuery);
	
	   if (mysqli_num_rows($memberIDResult) > 0) {
        $memberIDData = mysqli_fetch_assoc($memberIDResult);
        $memid = $memberIDData['Member_ID'];

        // Update the fine for rows with Member_ID = $memid
        $updateFineQuery = "UPDATE Book SET Fine = 
            CASE WHEN DATEDIFF(CURDATE(), Return_date) > 0 
                 THEN 10 + DATEDIFF(CURDATE(), Return_date)
                 ELSE 0
            END
            WHERE Member_ID = '$memid'";
        
        mysqli_query($conn, $updateFineQuery);
    } else {
        echo "Member data not found.";
    }
	
	$fineq="SELECT sum(Fine) from Book where Member_ID='$memid'";
	$tfine=mysqli_query($conn, $fineq);
	$finerow= mysqli_fetch_array($tfine);
	$totalfine=$finerow[0];
	$setfine="Update Member set Total_fine='$totalfine'";
	$setfine2=mysqli_query($conn, $setfine);
	
	echo "Total Fine: '$totalfine'";
	
if ($totalfine > 0) {
    echo '<form action="payfine.php" method="post">
        <input type="hidden" name="uid" value="' . $user_id . '">
        <input type="submit" value="Pay Fine">
    </form>';
}



?>



 <form action="supdate.php" method="post">
        <input type="hidden" name="uid" value="<?php echo $user_id; ?>">
        <input type="submit" value="Change Password">
    </form>
	</div>
</body>
</html>




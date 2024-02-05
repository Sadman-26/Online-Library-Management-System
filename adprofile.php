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
	$sql = "SELECT admin.user_name, admin.Name, admin.Phone_No, admin.Email from admin WHERE User_ID = '$user_id'";
	$result = mysqli_query($conn, $sql);
	
	


	if (mysqli_num_rows($result) != 0) {
		$ad_data = mysqli_fetch_array($result);
		$usrname = $ad_data[0];
		$mail = $ad_data[3];
		$phn=$ad_data[2];
		$name=$ad_data[1];

		
		
		
		
	} else {
		echo "Admin data not found.";
	}
	}else {
		echo "Hoy nai";
	}
		

	
	?>	
<!DOCTYPE html> 
<html>
<head>

    <title>Admin Profile</title>
	  <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="description" content="About the site"/>
      <meta name="author" content="Author name"/>
      <title> Home Page </title>
    
      <!-- core CSS -->
        <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <style type="text/css">
	    <style type="text/css">
        section {
            margin-top: 10px;
        }

        /* Add background image */
        body {
            background-image: url('book_openside.jpg'); /* Replace with your image filename */
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>   
</head>
<body>
	<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand active">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="test.php">HOME</a></li>
                <li><a href="Book (2).php">BOOKS</a></li>
				<li><a href="mem view.php">MEMBERS</a> </li>
				<li><a href="vendor view.php">VENDORS</a> </li>
				<li><a href="fview.php">FEEDBACK</a> </li>
                
            </ul>

            <ul class="nav navbar-nav navbar-right">
                
				<li><a href="payment.php?username=<?php echo $usrname; ?>" style="margin-left: 20px;" class="right-buttons">PAYMENT</a></li>
				<li><a href="adreturn.php?uid=<?php echo $user_id; ?>" style="margin-left: 20px;" class="right-buttons">RETURN BOOKS</a></li>
				<li><a href="add book.php" style="margin-left: 20px;" class="right-buttons">ADD BOOKS</a></li> 
				<li><a href="add vendor.php" style="margin-left: 20px;" class="right-buttons">ADD VENDORS</a> </li>
				<li><a href="alogout.php"><span class="glyphicon glyphicon-log-in"> LOGOUT</span></a></li>
            </ul>
        </div>
    </nav>
    <section id="header">
        <div class="col-md-2" style="font-size: 30px;color:#F2674A;text-decoration: underline;">Admin Profile</div> 
    </section>
	<br><br><br>


	
        <label for="student_name">Name:</label>
		<span><?php echo $name; ?></span><br>
		<label for="User_id">User ID:</label>
		<span><?php echo $user_id; ?></span><br>
		<label for="mail">E-mail:</label>
		<span><?php echo $mail; ?></span><br>
		<label for="Phone Number">Phone Number:</label>
		<span><?php echo $phn; ?></span><br>

		



        <!-- Add more fields here -->
    <form action="adupdate.php" method="post">
        <input type="hidden" name="uid" value="<?php echo $user_id; ?>">
        <input type="submit" value="Update">
    </form>
</body>
</html>




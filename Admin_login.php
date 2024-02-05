<?php
// first of all, we need to connect to the database
require_once('PhpConnect.php');

// Initialize a variable to track login status
$loginStatus = "";

// we need to check if the input in the form textfields are not empty
if(isset($_POST['auid']) && isset($_POST['apass'])){
	// write the query to check if this username and password exists in our database
	$u = $_POST['auid'];
	$p = $_POST['apass'];
	//$sql = "SELECT * FROM Authentication WHERE User_ID = '$u' AND password = '$p'";
	$sql="SELECT * FROM Admin WHERE User_ID = '$u'";

	
	//Execute the query 
	$result = mysqli_query($conn, $sql);
	
	//check if it returns an empty set
	if (mysqli_num_rows($result) != 0) {
        // Fetch the user's data
        $user_data = mysqli_fetch_array($result);
		// Fetch the hashed password from the database
        $storedHashedPassword = $user_data['Password'];
		if (strlen($storedHashedPassword) == 8) {
			session_start();
			$_SESSION['user_id'] = $user_data['User_ID'];
			// Redirect to the user profile page
			header("Location: adprofile.php");
			exit;
		}
        // Verify the entered password against the stored hashed password
        elseif (password_verify($p, $storedHashedPassword)) {
            // Passwords match, admin is authenticated
        // Store user ID in a session variable
			session_start();
			$_SESSION['user_id'] = $user_data['User_ID'];
			// Redirect to the user profile page
			header("Location: adprofile.php");
			exit;
	}
	else {
            $loginStatus = "Invalid Password";
		}
    } else {
         $loginStatus = "Invalid User_ID";
    }
}
?>

<html lang="en">
  <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="description" content="About the site"/>
      <meta name="author" content="Author name"/>
      <title> Admin Login </title>
    
      <!-- core CSS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        /* Style for the main background image */
        body {
            margin: 0;
            padding: 0;
            background-image: url('books5.jpg'); /* Replace with your image filename */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Times New Roman, Serif Typeface;
        }

        /* Navigation bar styles */
        .navbar {
            overflow: hidden;
            background-color: #333;
			z-index: 1200;
			
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 20px 22px;
            text-decoration: none;
			font-size: 20px;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
		.navbar-right {
		float: right;
		}

        /* Style for the login form */
        .form_design {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            border: 2px solid #ccc;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            margin: auto;
            width: 25%;
            margin-top: 1vh;
        }

        .form_design input[type="text"],
        .form_design input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            box-sizing: border-box;
            font-size: 18px;
        }

        .form_design input[type="submit"] {
            background-color: #F2674A;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        .form_design input[type="submit"]:hover {
            background-color: #E95733;
        }
    </style>  
  </head>

  <body> 
      <div class="navbar">
  <a href="">Online Library Management System</a>
	<a href="test.php">Home</a>
    <a href="Books.php">Our Bookshelf</a>
    <a href="help desk.php">FAQ</a>
	</div>
    </nav>
    <!-- following section is used for creating the menubar in the webpage -->
	<section id="header">
		<div class="row">  
			<br><br><br><br><br><br>
			<div class="col-md-12" style="font-size: 30px;color:black; text-align: center;"> Admin Login </div>
		</div>
	</section>
	
	<section id = "section1">
		<br>
		
		<form action="Admin_login.php" class="form_design" method="post">
			User_ID: <input type="text" name="auid"> <br/>
			Password: <input type="password" name="apass"> <br/> <br/>
			<input type="submit" value="Sign In"><br>
			<a style="color:black;" href="adforget.php">Forgot password?</a>
		</form>
		<!-- Display login status message if set -->


	
	<!----- Footer ----->
	<section id="footer"> 
<script>
    <?php if (!empty($loginStatus)): ?>
    // Show the login status message as a JavaScript alert
    window.onload = function() {
        alert("<?php echo $loginStatus; ?>");
    };
    <?php endif; ?>
</script>
	</section>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/wow.min.js"></script>
  </body> 
</html>


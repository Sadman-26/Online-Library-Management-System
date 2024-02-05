<!DOCTYPE html>
<html>
<head>

  <title>Student Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

   <style type="text/css">
        /* Style for the main background image */
        body {
            margin: 0;
            padding: 0;
            background-image: url('books4.jpeg'); /* Replace with your image filename */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }

        /* Style for the navigation bar */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
            background-color: #333;
        }

        /* Style for the navigation links */
        .navbar a {
            color: white;
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
    <!-- following section is used for creating the menubar in the webpage -->
	<nav class="navbar navbar-inverse">
      <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand active">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="test.php">HOME</a></li>
            <li><a href="Books.php">BOOKS</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">

            <li><a href="Member Login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li> 
            <!-- <li><a href="student_login.html"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li> -->
            <!--<li><a href="Member Signup (working).php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li> --> 
          </ul>

      </div>
    </nav>
	<section id="header">
		<div class="row">  
		    <br><br><br>
			<div class="col-md-12" style= "text-align: center; font-size: 30px;color:#F2674A; text-align: center;"> Student Signup </div>
		</div>
	</section>
	
	<section id = "section1">
	<br>
		<form action="Signup Process.php" class="form_design" method="post">
			Student_ID: <input type="text" name="stid"> <br/>
			Password: <input type="password" name="pass1"> <br/> <br/>
			<input type="submit" value="Sign Up">
		</form>
	</section>

	
	<!----- Footer ----->
	<section id="footer"> 
	
	</section>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/wow.min.js"></script>
  </body> 
</html>
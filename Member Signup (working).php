<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
        /* Style for the main background image */
        body {
            margin: 0;
            padding: 0;
            background-image: url('book_mid2.jpg'); /* Replace with your image filename */
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

<header>
        <div class="navbar">
  <a href="">Online Library Management System</a>
    <div class="navbar-right">
    <a href="Member Login.php">SignIn</a>
</div>
	<a href="test.php">Home</a>
    <a href="Books.php">Our Bookshelf</a>
    <a href="help desk.php">FAQ</a>
</div>
    </header>

<section>
    <div class="reg_img">
        <div class="box2">
            <h1 style="text-align: center; font-size: 35px; color:white;"> Library Management System</h1>
            <h1 style="text-align: center; font-size: 25px;color:white;">Student Registration Form</h1>
            <form name="Registration" action="" method="">
                <!-- Your existing form content -->
            </form>
        </div>
    </div>
</section>

<section id="section1">
    <h4 style="text-align: center; font-weight:bolder;color:white;">To Signup, Enter Student_ID</h4>
    <form action="TNX and PDF generator.php" class="form_design" method="post">
        Student_ID: <input type="text" name="sid"> <br/>
        <input type="submit" value="Download">
    </form>
</section>

<div class="input-section">
    <h4 style="text-align: center; font-weight:bolder;">If you've already paid, Enter Transaction ID:</h4>
    <form action="Signup Page redirect.php" class="form_design" method="post">
        Transaction_ID: <input type="text" name="txid"> <br/>
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>

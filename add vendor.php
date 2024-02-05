<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="About the site"/>
    <meta name="author" content="Author name"/>
    <title> Add Vendors </title>
    
      <!-- core CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <style type="text/css">
        section {
            margin-top: -10px;
        }

        /* Add background image */
        body {
            background-image: url('book_mid.jpg'); /* Replace with your image filename */
            background-size: cover;
            background-repeat: no-repeat;
        }
		.faded-box {			
			display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            border: 2px solid #ccc;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            margin: auto;
            width: 30%;
            margin-top: 30vh;
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
            </ul>

            <ul class="nav navbar-nav navbar-right">
				<li><a href="adprofile.php" style="margin-left: 20px;">PROFILE</a> </li>
				<li><a href="add book.php" style="margin-left: 20px;" class="right-buttons">ADD BOOKS</a> </li>
            </ul>
        </div>
    </nav>  
    <!-- following section is used for creating the menubar in the webpage -->

	<section id = "section1">
	<div class="faded-box">
	<div style="font-size: 30px;color:#F2674A;"> New Vendors Details </div>
		<br>
		<form action="vendor.php" method="post">
			Vendor Code: <input type="text" name="vcode"><br><br>
			Vendor Name: <input type="text" name="vname"><br><br>
			Contact No: <input type="text" name="cono"><br><br><br>
			
        <input type="submit" value="Add">
		</form></div>
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


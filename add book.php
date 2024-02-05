<html lang="en">
  <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="description" content="About the site"/>
      <meta name="author" content="Author name"/>
      <title> Add Books </title>
    
      <!-- core CSS -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <style type="text/css">
        
		section {
            margin-top: -10px;
        }

        /* Add background image */
        body {
            background-image: url('book_line.jpg'); /* Replace with your image filename */
            background-size: cover;
            background-repeat: no-repeat;
			font-family: Times New Roman, Serif Typeface;
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
            width: 40%;
            margin-top: 10vh;
        }
		/* Navigation bar styles */
        .navbar {
            overflow: hidden;
            background-color: #333;
			z-index: 1200;
			margin-top: -1vh;
			
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
    </style>  
  </head>

  <body>
	<div class="navbar">
  <a href="">Online Library Management System</a>
    <div class="navbar-right">
    <a href="adprofile.php">Profile</a>
</div>
	
</div> 
    <!-- following section is used for creating the menubar in the webpage -->
	<section id = "section1">
	<div class="faded-box">
	<div style="font-size: 30px;color:#F2674A;"> Add Books </div>
		<br>
		
		<form action="insert book.php" method="post">
			ISBN: <input type="text" name="isbn"><br><br>
			Title: <input type="text" name="title"><br><br>
			Author: <input type="text" name="author"><br><br>
			Edition: <input type="text" name="edition"><br><br>
			Genre: <input type="text" name="genre"><br><br>
			Price: <input type="text" name="price"><br><br>
			Vendor Code: <input type="text" name="vcode"><br><br>
			Publisher ID: <input type="text" name="publisher_id"><br><br>
			Admin Username: <input type="text" name="admin_username"><br><br><br>
			Description: <textarea name="desc" rows="5" cols="50"></textarea><br><br>
        <input type="submit" value="Add">
		</form>
		</div>
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


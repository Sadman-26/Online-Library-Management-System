<!DOCTYPE html>
<html>
<head>
    <title>Online Library Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style type="text/css">
        /* Your existing styles */

        /* Add styles for the navigation bar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000; /* Ensure it's above other content */
        }

        nav li {
            display: inline-block;
            line-height: 80px;
        }

        /* Add styles for slideshow container */
		
        .slideshow-container {
            width: 100%;
            height: 50vh; /* Half of the viewport height */
            overflow: hidden;
            position: relative;
        }

        /* Add styles for slideshow images */
        .mySlides {
            display: none;
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Add styles for logo container */
        .logo-container {
            text-align: center;
        }

        .logo-image {
            max-width: 150px;
            height: auto;
            display: inline-block;
        }

        /* Other styles for content */
        .content {
            padding: 20px;
            text-align: center;
        }

        /* Add padding to body to make space for navigation bar */
        section {
            margin-top: -20px;
        }
    </style>
	<style type="text/css">
       
        /* Add background image */
        body {
            background-color: lightyellow;
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
        
            <ul class="nav navbar-nav navbar-right">
				<li><a href="Books.php" style="margin-left: 20px;" class="right-buttons">BOOKS</a></li> 
                <li><a href="Member Login.php"><span class="glyphicon glyphicon-log-in"> Student Login</span></a></li>
                <li><a href="Admin_login.php"><span class="glyphicon glyphicon-log-in">Admin Login</a></li> 

            </ul>
        </div>
    </nav>

    <div class="slideshow-container">
        <img class="mySlides" src="books1.jpeg">
        <img class="mySlides" src="books5.jpg">
        <img class="mySlides" src="books3.jpeg">
        <img class="mySlides" src="books4.jpeg">
    </div>

    <div class="content">
        <h1 style="font-size: 55px; color: black; font-weight: bold;">Welcome to the Library</h1><br>
        <div class="logo-container">
            <img class="logo-image" src="2.png" alt="Logo">
        </div>
        <h1 style="font-size: 15px; color: black; font-weight: bold;">Opens at: 09:00 </h1>
        <h1 style="font-size: 15px; color: black; font-weight: bold;">Closes at: 15:00 </h1>
        <p style="color:black; font-weight: bold;text-align: center; font-size: 25">
            <br>
            Email: Online.library@gmail.com <br><br>
            Mobile: +880171*******
        </p>
    </div>

    <script type="text/javascript">
        var a = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");

            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }

            a++;
            if (a > x.length) {
                a = 1;
            }
            x[a - 1].style.display = "block";
            setTimeout(carousel, 5000);
        }
    </script>
</body>
</html>

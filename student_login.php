<!DOCTYPE html>
<html>
<head>

  <title>Student Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  
  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
  </style>
    <style type="text/css">
        section {
            margin-top: -20px;
        }

        /* Add background image */
        body {
            background-image: url('books5.jpg'); /* Replace with your image filename */
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
            <li><a href="index.php">HOME</a></li>
            <li><a href="">BOOKS</a></li>
            <li><a href="">FEEDBACK</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">

<!--             <li><a href="student_login.html"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
            <li><a href="student_login.html"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li> -->
            <li><a href="Member Signup (working).php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
          </ul>

      </div>
    </nav>

<section>
  <div class="log_img">
   <br>
    <div class="box1">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Library Management System</h1>
        <h1 style="text-align: center; font-size: 25px;">User Login Form</h1><br>
      <form  name="login" action="" method="">
        
        <div class="login">
          <input class="form-control" type="text" name="Student_ID" placeholder="Student_ID" required=""> <br>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
          <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px"> 
        </div>
      
      <p style="color: white; padding-left: 15px;">
        <br><br>
        <a style="color:white;" href="">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        New to this website?<a style="color: white;" href="Member Signup (working).php">Sign Up</a>
      </p>
    </form>
    </div>
  </div>
</section>

</body>
</html>
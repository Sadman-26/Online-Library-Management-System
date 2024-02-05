<?php
require_once('PhpConnect.php');

$u = "";
if (isset($_POST['uid'])) {
    $u = $_POST['uid'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['npass'])) {
        $p = $_POST['npass'];
        if (strlen($p) >= 8) {
			// Hash the password
        $hashedPassword = password_hash($p, PASSWORD_DEFAULT);
            // Assuming $conn is your established database connection
            $psql = "UPDATE Member SET Password = ? WHERE User_ID = ?";
            $pstmt = mysqli_prepare($conn, $psql);
            mysqli_stmt_bind_param($pstmt, "ss", $hashedPassword, $u);
            $presult = mysqli_stmt_execute($pstmt);

            $psql2 = "UPDATE Authentication SET Password = ? WHERE User_ID = ?";
            $pstmt2 = mysqli_prepare($conn, $psql2);
            mysqli_stmt_bind_param($pstmt2, "ss", $hashPassword, $u);
            $presult2 = mysqli_stmt_execute($pstmt2);

            if ($presult && $presult2) {
                echo "Password Successfully Changed<br>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            mysqli_stmt_close($pstmt);
            mysqli_stmt_close($pstmt2);
        } else {
            echo "Password must be at least 8 characters<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="About the site"/>
	<meta name="author" content="Author name"/>

	<!-- core CSS -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
	<br><br><br>
    <form action="supdate.php" method="post">
        <label for="input3">Change Password:</label>
        <input type="password" name="npass">
        <input type="hidden" name="uid" value="<?php echo $u; ?>">
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

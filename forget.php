<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = $_POST['user_id'];
    $memid = $_POST['member_id'];
    $e = $_POST['email'];

    if (empty($u) || empty($memid) || empty($e)) {
        $errorMessage = "All fields are required.";
    } else {
        // Connect to your database using PhpConnect.php or your database connection logic
        require_once('PhpConnect.php');

        // Check if the user exists
        $query = "SELECT * FROM Member WHERE User_ID = '$u' AND Member_ID = '$memid'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Check if the email exists in the Student table
            $emailQuery = "SELECT * FROM Student WHERE Email = '$e'";
            $emailResult = mysqli_query($conn, $emailQuery);

            if (mysqli_num_rows($emailResult) > 0) {
                // Generate a random 8-digit password
                $p = rand(10000000, 99999999);

                // Update Authentication table
                $updateAuthQuery = "UPDATE Authentication SET password = '$p' WHERE User_ID = '$u'";
                mysqli_query($conn, $updateAuthQuery);

                // Update Member table
                $updateMemberQuery = "UPDATE Member SET password = '$p' WHERE User_ID = '$u'";
                mysqli_query($conn, $updateMemberQuery);

                $successMessage = "Password reset successful.A new Password has been sent to your Email.Please Change Password immediately after login";

            } else {
                $errorMessage = "Email not found in the Student table.";
            }
        } else {
            $errorMessage = "User not found or incorrect Member ID.";
        }

        // Close the database connection
        mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">

        </div>
        </ul>
    </div>
</nav>
    <title>Password Reset</title>
</head>
<body>
    <div style="text-align: center; margin-top: 100px;">
        <h1 style="font-size: 24px;">Reset Password</h1>
        <form method="POST">
            <input type="text" name="user_id" placeholder="Enter User_ID"><br><br>
            <input type="text" name="member_id" placeholder="Enter Member_ID"><br><br>
            <input type="email" name="email" placeholder="Enter Email"><br><br>
            <input type="submit" value="Submit">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($errorMessage)) {
                echo "<p style='color: red;'>$errorMessage</p>";
            }
            if (isset($successMessage)) {
                echo "<p style='color: green;'>$successMessage</p>";
            }
        }
        ?>
    </div>
</body>
</html>


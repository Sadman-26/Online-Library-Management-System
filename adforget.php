<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = $_POST['user_id'];
    $un = $_POST['username'];
    $e = $_POST['email'];

    if (empty($u) || empty($un) || empty($e)) {
        $errorMessage = "All fields are required.";
    } else {
        // Connect to your database using PhpConnect.php or your database connection logic
        require_once('PhpConnect.php');

        // Check if the user exists
        $query = "SELECT * FROM Admin WHERE User_ID = '$u' AND User_name = '$un'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Check if the email exists in the Student table
            $emailQuery = "SELECT * FROM admin WHERE Email = '$e'";
            $emailResult = mysqli_query($conn, $emailQuery);

            if (mysqli_num_rows($emailResult) > 0) {
                // Generate a random 8-digit password
                $p = rand(10000000, 99999999);

                // Update Authentication table
                $updateAuthQuery = "UPDATE Authentication SET password = '$p' WHERE User_ID = '$u'";
                mysqli_query($conn, $updateAuthQuery);

                // Update Member table
                $updateMemberQuery = "UPDATE admin SET password = '$p' WHERE User_ID = '$u'";
                mysqli_query($conn, $updateMemberQuery);

                $successMessage = "Password reset successful.\nA new Password has been sent to your Email.\nPlease Change Password Immediately after loggin in";

            } else {
                $errorMessage = "Email not found in the Admin table.";
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
    <title>Password Reset</title>
</head>
<body>
    <div style="text-align: center; margin-top: 100px;">
        <h1 style="font-size: 24px;">Reset Password</h1>
        <form method="POST">
            <input type="text" name="user_id" placeholder="Enter User_ID"><br><br>
            <input type="text" name="username" placeholder="User Name"><br><br>
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


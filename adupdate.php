<?php
require_once('PhpConnect.php');

$u = "";
if (isset($_POST['uid'])) {
    $u = $_POST['uid'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['nmail'])) {
        $mail = $_POST['nmail'];
        $msql = "UPDATE admin SET Email = '$mail' WHERE User_ID = '$u'";
        $mresult = mysqli_query($conn, $msql);
        if ($mresult) {
            echo "Email Successfully Changed<br>";
        }
    }

    if (!empty($_POST['nphn'])) {
        $phn = $_POST['nphn'];
        $phnsql = "UPDATE admin SET Phone_No = '$phn' WHERE User_ID = '$u'";
        $phnresult = mysqli_query($conn, $phnsql);
        if ($phnresult) {
            echo "Phone Successfully Changed<br>";
        }
    }

    if (!empty($_POST['npass'])) {
        $p = $_POST['npass'];
        if (strlen($p) >= 8) {
			$hashp=password_hash($p, PASSWORD_DEFAULT);
            $psql = "UPDATE admin SET Password = '$hashp' WHERE User_ID = '$u'";
            $presult = mysqli_query($conn, $psql);
            $psql2 = "UPDATE Authentication SET Password = '$hashp' WHERE User_ID = '$u'";
            $presult2 = mysqli_query($conn, $psql2);
            if ($presult && $presult2) {
                echo "Password Successfully Changed<br>";
            }
        } else {
            echo "Password must be at least 8 characters<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Update</title>
</head>
<body>
    <form action="adupdate.php" method="post">
        <label for="input1">Change Email:</label>
        <input type="text" name="nmail">
        <br>
        <input type="hidden" name="uid" value ="<?php echo $u ?>">
        <br>
        <label for="input2">Change Phone:</label>
        <input type="text" name="nphn">
        <br>
        <label for="input3">Change Password:</label>
        <input type="password" name="npass">
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

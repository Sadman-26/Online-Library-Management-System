<?php
// first of all, we need to connect to the database
require_once('PhpConnect.php');

// we need to check if the input in the form textfields are not empty
if(isset($_POST['uid'])){
	// write the query to check if this username and password exists in our database
	$u = $_POST['uid'];
}
	//$sql = "SELECT * FROM Authentication WHERE User_ID = '$u' AND password = '$p'";
	

?>



<!DOCTYPE html>
<html>
<head>
    <title>New Page</title>
</head>
<body>
    <form action="update.php" method="post">
        <label for="input1">Change Email:</label>
        <input type="text" name="nmail">
        <br>
        <input type="hidden" name="uid" value ="<?php echo "$u"?>">
        <br>
        <label for="input2">Change Phone:</label>
        <input type="text" name="nphn">
        <br>
        <label for="input3">Change Password:</label>
        <input type="text" name="npass">
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
// first of all, we need to connect to the database
require_once('PhpConnect.php');


// we need to check if the input in the form textfields are not empty
if(isset($_POST['nmail'])&&(strlen($_POST['nmail'])>1)){
	// write the query to check if this username and password exists in our database
	$mail = $_POST['nmail'];
	$msql="Update admin set Email ='$mail' where User_ID='$u'";
	$mresult=mysqli_query($conn, $msql);
	echo "Email Successfullly Changed \n";
	}
if(isset($_POST['nphn'])&&(strlen($_POST['nphn'])>1)){
	$phn=$_POST['nphn'];
	$phnsql="Update admin set Phone_No ='$phn' where User_ID='$u'";
	$phnresult=mysqli_query($conn, $phnsql);
	echo "\nSuccessful";
}
if(isset($_POST['npass']) &&(strlen($_POST['npass'])>1) ){
	if (strlen($_POST['npass'])>=8){
		$p=$_POST['npass'];
	$psql="Update admin set Password ='$p' where User_ID='$u'";
	$presult=mysqli_query($conn, $psql);
	$psql2="Update Authentication set Password ='$p' Where User_ID='$u'";
	$presult2=mysqli_query($conn, $psql2);
	echo "\nSuccessful";
	}else{
		echo "Password Must be at least 8 characters";
		
	}
}
?>

<?php
// first of all, we need to connect to the database
require_once('PhpConnect.php');

// we need to check if the input in the form textfields are not empty
if(isset($_POST['stid']) && isset($_POST['pass1'])){
	if (strlen($_POST['pass1'])>=8){
	// write the query to check if this username and password exists in our database
	$stid = $_POST['stid'];
	$p = $_POST['pass1'];
	$sql = "SELECT * FROM Member WHERE Student_ID = '$stid'";
	
	//Execute the query 
	$result = mysqli_query($conn, $sql);
	
	//check if it returns an empty set
	if(mysqli_num_rows($result) !=0 ){
	
echo "<script>
    window.onload = function() {
        alert('Member Already Exists');
        window.location.href = 'Actual Signup Page.php';
    }
</script>";
	}
	else{
		
		// Hash the password
        $hashedPassword = password_hash($p, PASSWORD_DEFAULT);
		
	function generateRandomCode1() {
		$randomNumber = mt_rand(0, 999);
		$paddedNumber = str_pad($randomNumber, 3, '0', STR_PAD_LEFT);
		$code = 'M' . $paddedNumber;
		return $code;
		
		
		
}
		// Generate a unique code
		$uid = generateRandomCode1();
		$codeExists = true;
		while ($codeExists) {
		$checkCodeQuery = "SELECT * from Authentication WHERE User_ID = '$uid'";
		$result = $conn->query($checkCodeQuery);

		if ($result->num_rows === 0) {
			$codeExists = false;
		} else {
			$uid = generateRandomCode1();
		}
		}
	function generateRandomCode2() {
		$randomNumber = mt_rand(0, 99999);
		$paddedNumber = str_pad($randomNumber, 5, '0', STR_PAD_LEFT);
		$code =$paddedNumber;
		return $code;
	}
			// Generate a unique code
	$otp = generateRandomCode2();
	$codeExists = true;
	

	while ($codeExists) {
		$checkCodeQuery = "SELECT * from Authentication WHERE OTP = '$otp' ";
		$result = $conn->query($checkCodeQuery);

		if ($result->num_rows === 0) {
			$codeExists = false;
		} else {
			$otp = generateRandomCode2();
		}	
	}
		
	$a="INSERT INTO Authentication VALUES ('$uid','$hashedPassword','$otp')";
	$result3=mysqli_query($conn, $a);
	
	function generateRandomCode3() {
		$randomNumber = mt_rand(0, 9999999);
		$paddedNumber = str_pad($randomNumber, 7, '0', STR_PAD_LEFT);
		$code =$paddedNumber;
		return $code;
	}
		
			// Generate a unique code
	$memid = generateRandomCode3();
	$codeExists = true;

	while ($codeExists) {
		$checkCodeQuery = "SELECT * from Member WHERE Member_ID = '$memid' ";
		$result = $conn->query($checkCodeQuery);

		if ($result->num_rows === 0) {
			$codeExists = false;
		} else {
			$memid = generateRandomCode3();
		}
	}
		
	$adsql="SELECT User_name from admin order by rand() Limit 1";
	$add = mysqli_query($conn, $adsql);
	$arr=mysqli_fetch_array($add);
	$adusr=$arr[0];

	$sql69="INSERT INTO Member VALUES ('$memid','$stid','$hashedPassword',0,'$adusr','$uid',0)";
	$result69= mysqli_query($conn, $sql69);
	
	$sql70="SELECT Transaction_ID FROM Payment WHERE Student_ID ='$stid'";
	$result70=mysqli_query($conn, $sql70);
	if(mysqli_num_rows($result70) !=0 ){
	
	$arr70=mysqli_fetch_array($result70);
	$tx=$arr70[0];
	$sql79="INSERT INTO Student_Signup VALUES ('$stid','$memid','$tx')";
	$result79=mysqli_query($conn, $sql79);
	
	    session_start();
        $_SESSION['user_id'] = $uid;

        // Redirect to the user profile page
        header("Location: profile3.php");
        exit;
	
	
	}else {
		//echo "Processing Error: Please Sign up using Student_ID on the previous page";
		echo "<script>
    window.onload = function() {
        alert('Processing Error: Please Sign up using Student_ID on the previous page');
        window.location.href = 'Actual Signup Page.php';
    }
</script>";
		
		

		
	}
	
	
	
	}
		//header("Location: profile3.php");
	}else{
		echo "<script>
    window.onload = function() {
        alert('Processing Error: Password must be at least 8 characters');
        window.location.href = 'Actual Signup Page.php';
    }
</script>";
	}
	
}


?>

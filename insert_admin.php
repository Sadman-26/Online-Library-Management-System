<?php
// first of all, we need to connect to the database
require_once('PhpConnect.php');

// we need to check if the input in the form textfields are not empty
if(isset($_POST['uname']) && isset($_POST['aname']) && isset($_POST['aphone']) && isset($_POST['apass']) && isset($_POST['amail'])){
	// write the query to check if this username and password exists in our database
	$p = $_POST['uname'];
	$c = $_POST['aname'];
	$a = $_POST['aphone'];
	$q = $_POST['apass'];
	$e = $_POST['amail'];
	
	function generateRandomCode1() {
		$randomNumber = mt_rand(0, 999);
		$paddedNumber = str_pad($randomNumber, 3, '0', STR_PAD_LEFT);
		$code = 'A' . $paddedNumber;
		return $code;
		
		
		
}
	// Generate a unique code
	$uniqueCode = generateRandomCode1();
	$codeExists = true;

	while ($codeExists) {
		$checkCodeQuery = "SELECT * from Authentication WHERE User_ID = '$uniqueCode'";
		$result = $conn->query($checkCodeQuery);

		if ($result->num_rows === 0) {
			$codeExists = false;
		} else {
			$uniqueCode = generateRandomCode1();
		}
		
	function generateRandomCode2() {
		$randomNumber = mt_rand(0, 99999);
		$paddedNumber = str_pad($randomNumber, 5, '0', STR_PAD_LEFT);
		$code =$paddedNumber;
		return $code;
	}
		
		
		
}
	// Generate a unique code
	$uniqueCode2 = generateRandomCode2();
	$codeExists = true;

	while ($codeExists) {
		$checkCodeQuery = "SELECT * from Authentication WHERE OTP = '$uniqueCode2' ";
		$result = $conn->query($checkCodeQuery);

		if ($result->num_rows === 0) {
			$codeExists = false;
		} else {
			$uniqueCode = generateRandomCode2();
		}	
	
	$sql1= "INSERT INTO Authentication Values ('$uniqueCode', '$q' ,'$uniqueCode2') ";
	$result1 = mysqli_query($conn, $sql1);
}

	
	$sql = " INSERT INTO admin VALUES( '$p', '$uniqueCode', '$c', '$a', '$q', '$e') ";
	
	//Execute the query 
	$result = mysqli_query($conn, $sql);
	
	//check if this insertion is happening in the database
	if(mysqli_affected_rows($conn)){
	
		echo "Inserted Successfully";
		//header("Location: show_students.php");
	}
	else{
		echo "Insertion Failed";
		//header("Location: add_student.php");
	}
	
}


?>
<?php
// first of all, we need to connect to the database
require_once('PhpConnect.php');

// we need to check if the input in the form textfields are not empty
if(isset($_POST['txid'])){
	// write the query to check if this username and password exists in our database
	$txid = $_POST['txid'];
	$sql = "SELECT * FROM Payment WHERE Transaction_ID = '$txid'";
	
	//Execute the query 
	$result = mysqli_query($conn, $sql);
	
	//check if it returns an empty set
	if(mysqli_num_rows($result) !=0 ){
		$sql1="SELECT * FROM Payment WHERE Transaction_ID = '$txid' and Payment_status=1";
		$result1 = mysqli_query($conn, $sql1);
		if(mysqli_num_rows($result1) !=0 ){
			header("Location: Actual Signup Page.php");
		}
		else{
			echo"Payment has not been made";
		}
	

		
	}
	else{
		echo "Transaction_ID doesn't exist";

	}
	
}


?>

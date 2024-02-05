<?php
require_once('PhpConnect.php');
// Check if book_ids parameter is passed through GET method
if(isset($_GET['book_ids'])) {
	$b=explode(',', $_GET['book_ids']);
    // Get the array of book IDs from the GET parameter and sanitize it
	foreach($b as $i) {
		$updateIssueDateQuery = "UPDATE Book SET Issue_Date = NULL WHERE Book_ID = '$i'";
		mysqli_query($conn, $updateIssueDateQuery);
		header("Location: profile3.php");
	}
}
?>


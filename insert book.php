<?php
require_once('PhpConnect.php');

if (
    !empty($_POST['isbn']) &&
    !empty($_POST['title']) &&
    !empty($_POST['author']) &&
    !empty($_POST['edition']) &&
    !empty($_POST['genre']) &&
    !empty($_POST['price']) &&
    !empty($_POST['vcode']) &&
    !empty($_POST['publisher_id']) &&
    !empty($_POST['admin_username']) &&
	!empty($_POST['desc'])
	
) {
    $is = $_POST['isbn'];
	$isbn = mysqli_real_escape_string($conn, $is);
    $tle = $_POST['title'];
	$title = mysqli_real_escape_string($conn, $tle);
    $ath = $_POST['author'];
	$author = mysqli_real_escape_string($conn, $ath);
    $ed = $_POST['edition'];
	$edition = mysqli_real_escape_string($conn, $ed);
    $gen = $_POST['genre'];
	$genre = mysqli_real_escape_string($conn, $gen);
    $price = $_POST['price'];
    $vc = $_POST['vcode'];
	$vendor_code = mysqli_real_escape_string($conn, $vc);
    $pid = $_POST['publisher_id'];
	$publisher_id = mysqli_real_escape_string($conn, $pid);
    $au = $_POST['admin_username'];
	$admin_username = mysqli_real_escape_string($conn, $au);
	$des=$_POST['desc'];
	$d=mysqli_real_escape_string($conn, $des);
	$date=date("Y-m-d");

	function generateRandomCode() {
    $prefix = 'B';
    $uniqid = uniqid($prefix, true); // Generate a unique ID
    
    // Remove the prefix and any special characters from the unique ID
    $code = preg_replace("/[^A-Za-z0-9]/", '', $uniqid);
	$code = substr($code, 0, 8);
    
    return $code;
}
        $book_id = generateRandomCode();


    $sql = "SELECT * FROM Book WHERE Book_ID = '$book_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 0) {
        // The Book_ID is unique, proceed with insertion
        $sql2 = "INSERT INTO book (book_id, isbn, title, author, edition, genre, description, publisher_id, admin_username, Entry_date)
                 VALUES ('$book_id', '$isbn', '$title', '$author', '$edition', '$genre', '$d', '$publisher_id', '$admin_username','$date')";
        $result2 = mysqli_query($conn, $sql2);

        if ($result2) {
            // Insert into Sales table
            $sql4 = "INSERT INTO Sales VALUES ('$book_id','$isbn','$vendor_code','$price')";
            $insrt = mysqli_query($conn, $sql4);

            // Update book_copy table
            $sql5 = "SELECT MAX(Copy_No) AS max_copy FROM book_copy WHERE ISBN = '$isbn'";
            $result5 = mysqli_query($conn, $sql5);

            if (mysqli_num_rows($result5) != 0) {
                $copy_data = mysqli_fetch_array($result5);
                $total = $copy_data['max_copy'];
                $next_copy_no = $total + 1;
            } else {
                $next_copy_no = 1;
            }

            $sql6 = "INSERT INTO book_copy (Book_ID, ISBN, Status, Copy_No, Location) 
                     VALUES ('$book_id', '$isbn', 1, '$next_copy_no', '$genre')";
            $insrt2 = mysqli_query($conn, $sql6);

            echo "<script>
    window.onload = function() {
        alert('Success');
        window.location.href = 'adprofile.php';
    }
</script>";
        } else {
            echo "Error adding book: " . mysqli_error($conn);
        }
    } else {
        echo "Book ID '$book_id' already exists. Please provide a unique Book ID.";
    }
} else {
    echo "<script>
    window.onload = function() {
        alert('Please fill out all the required fields');
        window.location.href = 'add book.php';
    }
</script>";
}
?>

<?php
require_once('PhpConnect.php'); 

if (isset($_GET['book_id']) && !empty($_GET['book_id'])) {
    $bookId = $_GET['book_id'];
    
    // need proper authorization and validation here before proceeding with the deletion
    
    $sql = "DELETE FROM book WHERE Book_ID = '$bookId'";
    
    if ($conn->query($sql) === TRUE) {
        	echo "<script>
    window.onload = function() {
        alert('Book Successfully Deleted');
        window.location.href = 'Book (2).php';
    }
</script>";
    } else {
        echo "Error deleting book: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>

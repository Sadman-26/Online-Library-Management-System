<?php
session_start();

if (isset($_GET['book_id']) && isset($_GET['title'])) {
    $bookId = $_GET['book_id'];
    $title = $_GET['title'];

    // Store the book information in a session array
    if (!isset($_SESSION['added_books'])) {
        $_SESSION['added_books'] = [];
    }

    $_SESSION['added_books'][] = ['book_id' => $bookId, 'title' => $title];

    // Redirect back to the previous page
    header("Location: Book add button.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>

<h1>Add Book</h1>

<?php
if (isset($bookId) && isset($title)) {
    echo "<p>Book added: ID - $bookId, Title - $title</p>";
} else {
    echo "<p>No book selected for adding.</p>";
}
?>

<p><a href="Book add button.php">Go back</a></p>

</body>
</html>

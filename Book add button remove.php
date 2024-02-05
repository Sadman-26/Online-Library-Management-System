<?php
session_start();

if (isset($_GET['index'])) {
    $index = $_GET['index'];

    if (isset($_SESSION['added_books'][$index])) {
        unset($_SESSION['added_books'][$index]);
        $_SESSION['added_books'] = array_values($_SESSION['added_books']);
    }
}

header("Location: Book add button.php");
exit();
?>

<?php
session_start();

unset($_SESSION['added_books']);

header("Location: Book add button.php");
exit();
?>

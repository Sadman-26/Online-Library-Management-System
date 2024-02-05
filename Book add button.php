<?php
require_once('PhpConnect.php');
session_start();
if (isset($_GET['user_id'])) {
    $u = $_GET['user_id'];
}
if (isset($_SESSION['user_id'])) {
    $u = $_SESSION['user_id'];
}

// Handle clearing the added books list
if (isset($_GET['clear']) && $_GET['clear'] == 1) {
    $_SESSION['added_books'] = [];
}

$addedBooks = $_SESSION['added_books'] ?? [];
$arr = []; // Initialize an array to store book IDs

foreach ($addedBooks as $book) {
    $arr[] = $book['book_id']; // Store each book_id in the $arr array
}

$_SESSION['book_ids_to_insert'] = $arr; // Store $arr in a session variable

// Retrieve the five most recently added books with titles and IDs from the MySQL database
// Assuming you have a MySQL connection established and configured
$recentlyAddedBooksQuery = "SELECT book_id, title FROM Book ORDER BY entry_date DESC LIMIT 5";
$recentlyAddedBooksResult = mysqli_query($conn, $recentlyAddedBooksQuery);
$recentlyAddedBooks = [];
while ($row = mysqli_fetch_assoc($recentlyAddedBooksResult)) {
    $recentlyAddedBooks[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Borrow Window</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Your CSS styles here */
        .scrollable-box {
            border: 2px solid black;
            padding: 10px;
            max-height: 200px;
            overflow-y: scroll;
            margin-bottom: 10px;
			background-color: rgba(255, 255, 255, 0.6);
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .recently-added-books {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            margin-top: 430px; /* Increase this value to create more vertical space */
        }

        .book-title {
            font-size: 18px; /* Increase or decrease this value as needed */
            cursor: pointer; /* Add cursor style to indicate clickability */
        }
		.faded-box {
            background-color: rgba(255, 255, 255, 0.6);
            border: 2px ;
            padding: 10px;
            width: 100%;
            max-height: 600px;
            
        }
    </style>
    <style type="text/css">
        section {
            margin-top: -20px;
        }

        /* Add background image */
        body {
            background-image: url('openbook.jpg'); /* Replace with your image filename */
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand active">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="profile3.php"><span class="glyphicon glyphicon-user"> Profile </span></a></li>
        </ul>
    </div>
</nav>

<h1 class="faded-box">Borrow Option</h1>

<table class="faded-box">
    <tr>
        <td><a href="Books (1).php?add=123&user_id=<?php echo $u; ?>" >Add Book</a></td>
    </tr>
</table>

<h1 class="faded-box">Added Books</h1>
<div class="scrollable-box">
    <table>
        <tr>
            <th style="width: 20%;">Book ID</th>
            <th style="width: 60%;">Title</th>
            <th style="width: 20%;">Action</th>
        </tr>
        <?php
        foreach ($addedBooks as $index => $book) {
            echo "<tr>";
            echo "<td>{$book['book_id']}</td><td>{$book['title']}</td>";
            echo "<td><a href='Book add button remove.php?index=$index'>Drop</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

<form action="BookMemInsert.php" method="post">
    <input type="hidden" name="user_id" value="<?php echo $u; ?>">
    <input type="hidden" name="book_ids" value="<?php echo implode(',', $arr); ?>">
    <button type="submit">Confirm</button><br>
</form>

<form action="Book add button clear.php" method="post">
    <br><button type="submit">Clear List</button>
</form>

<script>
    // JavaScript/jQuery code to create the fading effect for book titles
    $(document).ready(function () {
        var titles = <?php echo json_encode($recentlyAddedBooks); ?>;
        var currentIndex = 0;

        function fadeInTitle() {
            $('#book-fader').fadeOut(1000, function () {
                $(this).html("<a href='clickable book.php?book_id=" + titles[currentIndex].book_id + "'>" + titles[currentIndex].title + "</a>");
                $(this).fadeIn(1000);
                currentIndex = (currentIndex + 1) % titles.length;
                setTimeout(fadeInTitle, 3000); // Show each title for 3 seconds
            });
        }

        fadeInTitle();
    });
</script>
<section class="recently-added-books">
    <h4>Recently Added Books</h4>
    <div id="book-fader">
        <?php foreach ($recentlyAddedBooks as $book): ?>
            <div class="book-title"><a href="clickable book.php?book_id=<?php echo $book['book_id']; ?>"><?php echo $book['title']; ?></a></div>
        <?php endforeach; ?>
    </div>
</section>
</body>
</html>

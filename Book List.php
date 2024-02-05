
<?php
session_start();


// Check if the user_id parameter is passed through GET method
if(isset($_GET['user_id'])) {
    // Get the user_id from the GET parameter and set it to $u
    $u = $_GET['user_id'];

    // Assume you have a database connection established
    require_once('PhpConnect.php');

    // Get the Member_ID using the provided User_ID
    $getMemberIDQuery = "SELECT Member_ID FROM Member WHERE User_ID = '$u'";
    $memberIDResult = mysqli_query($conn, $getMemberIDQuery);
    
    if (mysqli_num_rows($memberIDResult) > 0) {
        $memberIDData = mysqli_fetch_assoc($memberIDResult);
        $memid = $memberIDData['Member_ID'];

        // Update the fine for rows with Member_ID = $memid
        $updateFineQuery = "UPDATE Book SET Fine = 
            CASE WHEN DATEDIFF(CURDATE(), Return_date) > 0 
                 THEN 10 + DATEDIFF(CURDATE(), Return_date)
                 ELSE 0
            END
            WHERE Member_ID = '$memid'";
        
        mysqli_query($conn, $updateFineQuery);
    } else {
        echo "Member data not found.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Book List</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- ... (your head content) ... -->
    <style>
        .box-table {
            border-collapse: collapse;
            width: 100%;
        }

        .box-table th, .box-table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .box-table th {
            background-color: #f2f2f2;
        }

        .box-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
		.disable-click {
        pointer-events: none;
        background-color: lightgray;
    }
	/* Add background image */
        body {
            background-image: url('open.jpg'); /* Replace with your image filename */
            background-size: cover;
            background-repeat: no-repeat;
        }
		.faded-box {
            background-color: rgba(255, 255, 255, 0.6);
            border: 2px ;
            padding: 10px;
            width: 100%;
            max-height: 600px;
            
        }
		.faded-box 2{
            background-color: rgba(255, 255, 255, 0.6);
            border: 1px ;
            padding: 5px;
            width: 100%;
            max-height: 200px;
            
        }
    </style>
</head>
<body>
    <!-- ... (your navigation bar code) ... -->
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
    <div class="container">
	<div class="faded-box">
        <h2>Books in Possession</h2>
        <div class="box-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>User_ID</th>
                        <th>Member_ID</th>
                        <th>Book_ID</th>
                        <th>Title</th>
                        <th>Issue_Date</th>
                        <th>Return_date</th>
                        <th>Fine</th>
						<th>Return</th>
                    </tr>
                </thead>
                <tbody>
              <?php
                // Get the required book information for display
                $getBookInfoQuery = "SELECT Member.User_ID, Book.Member_ID, Book.Book_ID, Book.Title, Book.Issue_Date, Book.Return_date, Book.Fine
                                     FROM Book
                                     INNER JOIN Member ON Book.Member_ID = Member.Member_ID
                                     WHERE Book.Member_ID = '$memid'";
                
                $bookInfoResult = mysqli_query($conn, $getBookInfoQuery);
                $totalFine = 0;
                
                while ($row = mysqli_fetch_assoc($bookInfoResult)) {
                    echo "<tr>";
                    echo "<td>" . $row['User_ID'] . "</td>";
                    echo "<td>" . $row['Member_ID'] . "</td>";
                    echo "<td>" . $row['Book_ID'] . "</td>";
                    echo "<td>" . $row['Title'] . "</td>";
                    echo "<td>" . $row['Issue_Date'] . "</td>";
                    echo "<td>" . $row['Return_date'] . "</td>";
                    echo "<td>" . $row['Fine'] . "</td>";
					echo "<td><button class='return-button' data-book-id='" . $row['Book_ID'] . "' data-title='" . $row['Title'] . "'>Return</button></td>";
                    echo "</tr>";
                    
                    $totalFine += $row['Fine'];
                }
				
				$fineupdate="Update Member set Total_fine='$totalFine' Where Member_ID='$memid'";
				$fineresult = mysqli_query($conn, $fineupdate);
				
                ?>
            </tbody>
        </table>
		<button id="confirm-return">Confirm Return</button>

        <p>Total Fine: <?php echo $totalFine; ?></p>
		</div>
    </div><br><br><br>
 <div class="container">
	<div class="faded-box 2">
        <div class="box-table">
            <h2>All Borrowed Books</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Book_ID</th>
                        <th>Title</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Get the borrowed book information for display
                    $getBorrowedBooksQuery = "SELECT Borrowed.Book_ID, Book.Title
                                             FROM Borrowed
                                             INNER JOIN Book ON Borrowed.Book_ID = Book.Book_ID
                                             WHERE Borrowed.Member_ID = '$memid'";
                    
                    $borrowedBooksResult = mysqli_query($conn, $getBorrowedBooksQuery);
                    
                    while ($borrowedRow = mysqli_fetch_assoc($borrowedBooksResult)) {
                        echo "<tr>";
                        echo "<td>" . $borrowedRow['Book_ID'] . "</td>";
                        echo "<td>" . $borrowedRow['Title'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
			
			<div id="book-ids-output"></div>

<script>
    const returnButtons = document.querySelectorAll('.return-button');
    const confirmReturnButton = document.getElementById('confirm-return');
    const savedBooks = [];

    returnButtons.forEach(button => {
        const fine = parseInt(button.parentElement.previousElementSibling.textContent);
        
        if (fine > 0) {
            button.disabled = true;
            button.classList.add('disable-click');
        }

        button.addEventListener('click', () => {
            const bookId = button.getAttribute('data-book-id');
            const title = button.getAttribute('data-title');
            savedBooks.push({ bookId, title });

            button.disabled = true;
            button.classList.add('disable-click');
        });
    });

    confirmReturnButton.addEventListener('click', () => {
        if (savedBooks.length === 0) {
            alert('Click on the return button first.');
        } else {
            const bookIds = savedBooks.map(book => book.bookId);
            const bookIdsOutput = document.getElementById('book-ids-output');
            bookIdsOutput.textContent = 'Book IDs: ' + bookIds.join(', ');
            window.location.href = `return.php?book_ids=${bookIds.join(',')}`;
        }
    });
</script>


</html>
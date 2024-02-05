<?php
    // Start the session
    session_start();

    // Assuming you have a database connection established
    require_once('PhpConnect.php');

    // Check if the username is passed as a GET variable
    if (isset($_GET['username'])) {
        $usrn = $_GET['username'];
    } else {
        // Handle the case when username is not provided
        echo "Username not provided.";
        exit;
    }

    // Fetch payments with Payment_status = 0 from the Payment table
    $sql = "SELECT * FROM Payment WHERE Payment_status = 0";
    $result = mysqli_query($conn, $sql);
	$sql1 = "SELECT Book_ID, Member_ID, Fine FROM Book WHERE Fine>0 AND admin_username='$usrn'";
    $result1 = mysqli_query($conn, $sql1);

    // Update payment status when "Confirm Payment" button is clicked
    if (isset($_POST['confirm_payment'])) {
        $transaction_id = $_POST['transaction_id'];
        $update_sql = "UPDATE Payment SET Payment_status = 1 WHERE Transaction_ID = '$transaction_id'";
        mysqli_query($conn, $update_sql);
    }
	    if (isset($_POST['clear_fine'])) {
        $b = $_POST['book_id'];
        $update_sql = "UPDATE Book SET Fine = 0, Return_date= DATE_ADD(CURDATE(), INTERVAL 1 DAY) WHERE Book_id = '$b'";
        mysqli_query($conn, $update_sql);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Add your meta tags and CSS links here -->

    <!-- Updated styles for the search bar and button -->
    <style>
	 /* Your CSS styles go here */
        body {
            background-image: url('dhanershish.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        /* Additional styles for centering content */
        .container {
    max-width: 1200px; /* Adjust the maximum width as needed */
    margin: 0 auto; /* Center the container horizontally */
    padding: 20px; /* Add padding inside the container */
    background-color: rgba(255, 255, 255, 0.6); /* Background color for the container */
    border-radius: 10px; /* Add rounded corners to the container */
}

        .search-button {
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .search-button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Styles for the tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px; /* Add margin between tables */
        }

        th, td {
            text-align: center;
            padding: 10px;
        }

        /* Style for the scrollable box */
        .scrollable-box {
            max-height: 300px;
            overflow: auto;
            border: 1px solid #ccc;
            padding: 10px;
        }

        /* Style for the faded box */
        .faded-box {
            background-color: rgba(255, 255, 255, 0.6);
            border: 2px;
            padding: 10px;
            max-width: 100%;
            max-height: 800px;
        }

        .content-container {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.6); /* Semi-transparent white background */
            color: black;
            margin-top: 150px; /* Add margin-top to create space */
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
            <li><a href="adprofile.php"><span class="glyphicon glyphicon-user"> Profile </span></a></li>
        </ul>
    </div>
	</nav>
    <!-- Add the search bar at the top -->
    <div style="text-align: center; margin-top: 10px;">
        
    </div>

    <!-- Add the scrollable box table with payment data -->
    <div class="container">
    <!-- Left side table -->
    <div class="faded-box">
        <div class="scrollable-box">
            <h2>Sign Up Payment</h2>
            <form method="get">
                <input type="hidden" name="username" value="<?php echo $usrn; ?>">
                <input class="search-bar" type="text" name="search_query" placeholder="Search Transaction IDs or Student IDs">
                <button class="search-button" type="submit">Search</button>
            </form>
            <table>
                <tr>
                    <th>Transaction_ID</th>
                    <th>Payment Status</th>
                    <th>Student_ID</th>
                    <th>Action</th>
                </tr>
                <!-- Display rows for the first table -->
                <?php
                if (isset($_GET['search_query'])) {
                    $searchQuery = $_GET['search_query'];
                    $filteredSql = "SELECT * FROM Payment WHERE (Transaction_ID LIKE '%$searchQuery%' OR Student_ID LIKE '%$searchQuery%') AND Payment_Status=0";
                    $filteredResult = mysqli_query($conn, $filteredSql);
                    while ($filteredRow = mysqli_fetch_assoc($filteredResult)) {
                        echo "<tr>";
                        echo "<td>" . $filteredRow['Transaction_ID'] . "</td>";
                        echo "<td>" . $filteredRow['Payment_Status'] . "</td>";
                        echo "<td>" . $filteredRow['Student_ID'] . "</td>";
                        echo "<td>";
                        echo "<form method='post'>";
                        echo "<input type='hidden' name='transaction_id' value='" . $filteredRow['Transaction_ID'] . "'>";
                        echo "<button type='submit' name='confirm_payment'>Confirm Payment</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Display all rows when no search query is present
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['Transaction_ID'] . "</td>";
                        echo "<td>" . $row['Payment_Status'] . "</td>";
                        echo "<td>" . $row['Student_ID'] . "</td>";
                        echo "<td>";
                        echo "<form method='post'>";
                        echo "<input type='hidden' name='transaction_id' value='" . $row['Transaction_ID'] . "'>";
                        echo "<button type='submit' name='confirm_payment'>Confirm Payment</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }

                ?>
            </table>
        </div>
    </div>
			
        

		<div class="content-container">
        <div class="scrollable-box">
            <div class="faded-box">
                <h2>Fine Payment</h2>
                <form method="get">
                    <input type="hidden" name="username" value="<?php echo $usrn; ?>">
                    <input class="search-bar" type="text" name="search_query_fine" placeholder="Search Book IDs or Member IDs">
                    <button class="search-button" type="submit">Search</button>
                </form>
                <table>
                    <tr>
                        <th>Book_ID</th>
                        <th>Member_ID</th>
                        <th>Fine</th>
                        <th>Action</th>
                    </tr>
                    <!-- Display rows for the second table -->
                     <?php
                if (isset($_GET['search_query_fine'])) {
                    $searchQueryFine = $_GET['search_query_fine'];
                    $filteredSqlFine = "SELECT Book_ID, Member_ID, Fine FROM Book WHERE (Book_ID LIKE '%$searchQueryFine%' OR Member_ID LIKE '%$searchQueryFine%') AND admin_username = '$usrn' AND Fine>0";
                    $filteredResultFine = mysqli_query($conn, $filteredSqlFine);
                    while ($filteredRowFine = mysqli_fetch_assoc($filteredResultFine)) {
                        echo "<tr>";
                        echo "<td>" . $filteredRowFine['Book_ID'] . "</td>";
                        echo "<td>" . $filteredRowFine['Member_ID'] . "</td>";
                        echo "<td>" . $filteredRowFine['Fine'] . "</td>";
                        echo "<td>";
                        echo "<form method='post'>";
                        echo "<input type='hidden' name='book_id' value='" . $filteredRowFine['Book_ID'] . "'>";
                        echo "<button type='submit' name='clear_fine'>Clear Fine</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Display rows from Book table with admin_username = $usrn
                    //$fineSql = "SELECT Book_ID, Member_ID, Fine FROM Book WHERE admin_username = '$usrn'";
                    //$fineResult = mysqli_query($conn, $fineSql);
                    while ($fineRow = mysqli_fetch_assoc($result1)) {
                        echo "<tr>";
                        echo "<td>" . $fineRow['Book_ID'] . "</td>";
                        echo "<td>" . $fineRow['Member_ID'] . "</td>";
                        echo "<td>" . $fineRow['Fine'] . "</td>";
                        echo "<td>";
                        echo "<form method='post'>";
                        echo "<input type='hidden' name='book_id' value='" . $fineRow['Book_ID'] . "'>";
                        echo "<button type='submit' name='clear_fine'>Clear Fine</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                ?>
                </table>
            </div>
        </div>
    </div>
</div>
	
    <!-- ... (other HTML code) ... -->
</body>
</html>
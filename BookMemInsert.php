<?php
require_once('PhpConnect.php'); // Include your database connection file
require_once('tcpdf/tcpdf.php');

if (isset($_POST['user_id']) && isset($_POST['book_ids'])) {
    $u = $_POST['user_id'];
    $b = $_POST['book_ids'];
    $sql = "SELECT Member_ID FROM Member WHERE User_ID = '$u'";
    $delimiter = ",";
    $arr = explode($delimiter, $b);
}

// Fetch Member_ID from the database
$sql = "SELECT Member_ID FROM Member WHERE User_ID = '$u'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_array($result);
    $memid = $row['Member_ID'];
    mysqli_free_result($result);
    $issue = date("Y-m-d");
    $return = date("Y-m-d", strtotime("+7 days", strtotime($issue)));
}
foreach ($arr as $i) {
    $ids = $i;
$insert="Update Book Set Member_ID='$memid', Issue_date='$issue', Return_date='$return', Fine=0 Where book_id='$ids'";
$resultin=mysqli_query($conn, $insert);
$check="SELECT * FROM borrowed WHERE member_Id = '$memid' AND book_id = '$ids'";
$checkrl=mysqli_query($conn, $check);
if (mysqli_num_rows($checkrl) == 0) {
	$borrow="Insert Into borrowed Values ('$memid','$ids')";
	$borrowrl=mysqli_query($conn, $borrow);
}
}



// Create an HTML table
$html = '<table border="1" align="center">
            <tr>
                <th style="text-align:center;">Book ID</th>
                <th style="text-align:center;">Title</th>
                <th style="text-align:center;">Issue Date</th>
                <th style="text-align:center;">Return Date</th>
            </tr>';

foreach ($arr as $i) {
    $id = $i;
    $title = "";
    $issueDate = "";
    $returnDate = "";

    $query = "SELECT title, Issue_date, Return_date FROM Book WHERE book_ID = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row["title"];
        $issueDate = $row["Issue_date"];
        $returnDate = $row["Return_date"];
    }

    // Add a row to the HTML table
    $html .= '<tr>
                <td style="text-align:center;">' . $id . '</td>
                <td style="text-align:center;">' . $title . '</td>
                <td style="text-align:center;">' . $issueDate . '</td>
                <td style="text-align:center;">' . $returnDate . '</td>
            </tr>';
}

$html .= '</table>';

// Create a new TCPDF instance
$pdf = new TCPDF();

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Write content to the PDF
$pdf->Cell(0, 10, "Book List", 0, 1, 'C');
$pdf->SetFont('times', 'I', 10);
$pdf->Cell(0, 10, "(Bring this receipt to collect Books)", 0, 1, 'C');
$pdf->Cell(10);


// Output the HTML table as PDF
$pdf->writeHTML($html, true, false, false, false, '');

$pdfGenerated = true; // PDF was generated
if ($pdfGenerated) {
    $pdf->Output('BookList.pdf', 'I');
}
?>

<?php
require_once('tcpdf/tcpdf.php');
require_once('PhpConnect.php'); // Include your database connection file

// Assuming you've received the POST variable 'uid' and sanitized it properly
$u = $_POST['uid'];

// Fetch Member_ID and Total_Fine from the database
$sql = "SELECT Member_ID, Total_Fine FROM Member WHERE User_ID = '$u'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $memid = $row['Member_ID'];
    $totalfine = $row['Total_Fine'];

    // Initialize a new TCPDF instance
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', 'B', 18);

    // Output "Fine Receipt" at the top center
    $pdf->Cell(0, 10, 'Fine Receipt', 0, 1, 'C');

    // Set smaller font for the message
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, '(Bring this slip for Fine payment)', 0, 1, 'C');

    // Fetch Book_ID, Title, and Fine for rows with Fine > 0
    $bookQuery = "SELECT Book_ID, Title, Fine FROM Book WHERE Member_ID = '$memid' AND Fine > 0";
    $bookResult = mysqli_query($conn, $bookQuery);

    // Display details in a table format
    $pdf->SetFont('helvetica', '', 12);
    $html = '<table border="1" align="center">
                <tr>
                    <th style="text-align:center;">Book ID</th>
                    <th style="text-align:center;">Title</th>
                    <th style="text-align:center;">Fine</th>
                </tr>';
    
    while ($bookRow = mysqli_fetch_assoc($bookResult)) {
        $html .= '<tr>
                    <td style="text-align:center;">' . $bookRow['Book_ID'] . '</td>
                    <td style="text-align:center;">' . $bookRow['Title'] . '</td>
                    <td style="text-align:center;">' . $bookRow['Fine'] . '</td>
                </tr>';
    }
    
    $html .= '</table>';

    // Output the table in HTML format
    $pdf->writeHTML($html);

    // Display total fine to be paid
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 10, "Total Fine to be Paid: $totalfine", 0, 1, 'C');

    // Close and output the PDF
    $pdf->Output('fine_receipt.pdf', 'D'); // 'D' means the PDF will be downloaded

} else {
    echo "Member data not found.";
}
?>

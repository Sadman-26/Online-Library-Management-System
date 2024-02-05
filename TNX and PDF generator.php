<?php
// first of all, we need to connect to the database
require_once('PhpConnect.php');
require_once('tcpdf/tcpdf.php');

// We're moving the PDF generation code outside of the HTML section
$pdfGenerated = false; // Variable to track whether the PDF was generated

// We need to check if the input in the form text fields are not empty
if (isset($_POST['sid'])) {
    // write the query to check if this username and password exists in our database
    $u = $_POST['sid'];
    //$sql = "SELECT * FROM Authentication WHERE User_ID = '$u' AND password = '$p'";
    $sql = "SELECT * FROM Student WHERE ID = '$u'";
	$sql2="SELECT First_Name FROM Student WHERE ID = '$u'";
	$sql3="SELECT Last_Name FROM Student WHERE ID = '$u'";
	$sql4="SELECT * FROM Member WHERE Student_ID = '$u'";
	$sql5="SELECT * FROM Payment WHERE Student_ID = '$u'";


	
	
    // Execute the query 

    $result = mysqli_query($conn, $sql);
	$result1= mysqli_query($conn, $sql4);
	$paycheck= mysqli_query($conn, $sql5);

    
    // Check if it returns a non-empty result
    if (mysqli_num_rows($result) != 0) {
		if (mysqli_num_rows($result1) != 0){
			echo "Student is already a Member";
        
    }
	else {
		if (mysqli_num_rows($paycheck) != 0) {
			$sql6="SELECT Payment_status FROM Payment WHERE Student_ID = '$u'";
			$a=mysqli_query($conn, $sql6);
			$payfetcher=mysqli_fetch_array($a);
			$flag=$payfetcher[0];
			
			if ($flag != 0){
				echo "Payment has been made. Enter Transaction_ID";
			}
			else {
				//echo "Please pay the Signup fee to Continue";
				$sql7="SELECT Transaction_ID FROM Payment WHERE Student_ID = '$u'";
				$a1 = mysqli_query($conn, $sql7);
				$tx1= mysqli_fetch_array($a1);
				$tx=$tx1[0];
				
		$result2=mysqli_query($conn, $sql2);
		$result3=mysqli_query($conn, $sql3);
		$row=mysqli_fetch_array($result2);
		$row2=mysqli_fetch_array($result3);
		$fname=$row[0];
		$lname=$row2[0];
		$today = date("d-m-Y");
		
		
		$pdf = new TCPDF();

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('times', 'BI', 20);

        // Write content to the PDF
        $pdf->Cell(0, 10, "Student Payment Slip", 0, 1, 'C');
		$pdf->SetFont('times', 'I', 10);
		$pdf->Cell(0, 10, "(This deposit slip will only be allowed for CASH)", 0, 1, 'C');
		$pdf->SetFont('times', 10);
		$pdf->Cell(0, 10, "Date: $today", 0, 1, 'L');
		$pdf->SetFont('times', 12);
		$pdf->Cell(0, 10, "Student_ID: $u", 0, 1, 'L');
		$pdf->Cell(0, 10, "Name: $fname $lname", 0, 1, 'L');
		$pdf->Cell(0, 10, "Transaction ID: $tx", 0, 1, 'L');
		$pdf->Cell(0, 10, "Amount to be Paid: TK. 100", 0, 1, 'L');
		
		
		


        $pdfGenerated = true; // PDF was generated
		if ($pdfGenerated) {
        $pdf->Output('Payslip.pdf', 'I');
		
		}
				
				
			}
				
		
		
		}
		else {
		$result2=mysqli_query($conn, $sql2);
		$result3=mysqli_query($conn, $sql3);
		$row=mysqli_fetch_array($result2);
		$row2=mysqli_fetch_array($result3);
		$fname=$row[0];
		$lname=$row2[0];
		$today = date("d-m-Y");
		
		function generateRandomCode($length = 10) {
            $prefix = 'TX';
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $code = $prefix;

            for ($i = 0; $i < $length; $i++) {
                $randomIndex = mt_rand(0, strlen($characters) - 1);
                $code .= $characters[$randomIndex];
            }

            return $code;
        }

        $randomCode = generateRandomCode();
        $pdf = new TCPDF();

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('times', 'BI', 20);

        // Write content to the PDF
        $pdf->Cell(0, 10, "Student Payment Slip", 0, 1, 'C');
		$pdf->SetFont('times', 'I', 10);
		$pdf->Cell(0, 10, "(This deposit slip will only be allowed for CASH)", 0, 1, 'C');
		$pdf->SetFont('times', 10);
		$pdf->Cell(0, 10, "Date: $today", 0, 1, 'L');
		$pdf->SetFont('times', 12);
		$pdf->Cell(0, 10, "Student_ID: $u", 0, 1, 'L');
		$pdf->Cell(0, 10, "Name: $fname $lname", 0, 1, 'L');
		$pdf->Cell(0, 10, "Transaction ID: $randomCode", 0, 1, 'L');
		$pdf->Cell(0, 10, "Amount to be Paid: TK. 100", 0, 1, 'L');
		
		
		


        $pdfGenerated = true; // PDF was generated
		if ($pdfGenerated) {
        $pdf->Output('Payslip.pdf', 'I');
		
		}
		$sql8="INSERT INTO Payment Values ('$randomCode',0,'$u')";
		$insrt=mysqli_query($conn, $sql8);
		}
	}
    } else {
        echo "Not a Valid Student ID";
    }
}

// Output HTML below
?>
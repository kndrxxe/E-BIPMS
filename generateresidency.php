<?php
session_start();
error_reporting(0);

include 'conn.php';
if (isset($_SESSION['uid']) && isset($_SESSION['user']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {
	if (time() - $_SESSION['login_time_stamp'] > 600) {
		session_unset();
		session_destroy();
		header("Location: userlogin.php");
	} else {
		$_SESSION['login_time_stamp'] = time();
	}
} else {
	header('location: index.php');
}

require('fpdf/fpdf.php');

$id = $_GET['id'];
$query = "SELECT * FROM indigency WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id); // "i" indicates that $id is an integer

if ($stmt->execute()) {
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    class BarangayClearancePDF extends FPDF
    {
        // Page header
        function Header()
        {
            // Logo
            $this->Image('kanlurangbukal.png', 22, 10, 25);
            $this->Image('kanlurangbukal-opacity.png', 13, 60, 190, 190); // A4 size
            // Arial bold 12
            $this->SetFont('Arial', 'B', 12);
            // Title
            $this->Cell(0, 15, 'Republic of the Philippines', 0, 1, 'C');
            $this->Ln(-10);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(0, 15, 'Province of Laguna', 0, 1, 'C');
            $this->Ln(-10);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(0, 15, 'Municipality of Liliw', 0, 1, 'C');
            $this->Ln(-5);
            $this->SetTextColor(255, 192, 0);
            $this->SetFont('Arial', 'B', 15);
            $this->Cell(0, 15, 'BARANGAY KANLURANG BUKAL', 0, 1, 'C');
            $this->SetFont('BrushScriptRegularSWFTE', '', 20);
            $this->Ln(-8);
            $this->SetTextColor(0, 0, 0);
            $this->Cell(0, 15, 'Office of the Sangguniang Barangay', 0, 1, 'C');
        }

        // Generate the Barangay Clearance
        function generateClearance($data)
        {
            // Content
            $this->SetFont('Arial', '', 12);

            // Clearance details
            $this->SetFont('Arial', 'B', 23);
            $this->SetXY(10, 43);
            $this->MultiCell(0, 30, 'CERTIFICATE OF RESIDENCY', 0, 'C');
            $this->SetFont('Arial', '', 12);
            $this->SetXY(40, 80);
            $this->Cell(70, 0, "This is to certify that MR./MRS./MS. _____________________________________,", 0, 'J');
            $this->SetXY(110, 79);
            $this->SetFont('Arial', 'B', 12);
            $this->MultiCell(80, 0, strtoupper($data["firstname"] . " " . $data["middlename"] . " " . $data["lastname"]), 0, 'C');
            $this->SetFont('Arial', '', 12);
            $this->SetXY(20, 85);
            $this->MultiCell(0, 8, 'a resident of _______________,', 0, 'J');
            $this->SetXY(26, 88);
            $this->SetFont('Arial', 'B', 12);
            $this->MultiCell(80, 0, strtoupper($data["purok"]), 0, 'C');
            $this->SetXY(20, 95);
            $this->SetFont('Arial', '', 12);
            $this->MultiCell(0, 8, 'to be a person of good moral character and a law-abiding citizen.', 0, 'J');
            $this->SetXY(83, 85);
            $this->SetFont('Arial', 'B', 12);
            $this->MultiCell(0, 8, 'Barangay Kanlurang Bukal Liliw, Laguna', 0, 'J');
            $this->SetXY(166.5, 85);
            $this->SetFont('Arial', '', 12);
            $this->MultiCell(0, 8, 'is known to me', 0, 'J');
            $this->SetXY(40, 110);
            $this->SetFont('Arial', '', 12);
            $this->Cell(70, 0, "Issued this ______ day of ________________", 0, 'J');
            $this->SetXY(20, 120);
            $this->SetFont('Arial', '', 12);
            $this->Cell(70, 0, "Kanlurang Bukal Liliw, Laguna.", 0, 'J');
            $this->SetXY(140, 110);
            $this->SetFont('Arial', '', 12);
            $this->Cell(70, 0, "at the Office of the Barangay", 0, 'J');
            $this->SetXY(171, 125);
            $this->SetFont('Arial', '', 12);
            $this->Cell(70, 0, "", 0, 'J');
            $this->SetXY(80, 109);
            $this->SetFont('Arial', 'B', 15);
            $this->MultiCell(80, 0, strtoupper($data["purpose"]), 0, 'J');
            function ordinal($number)
            {
                $ends = ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'];
                if ((($number % 100) >= 11) && (($number % 100) <= 13))
                    return $number . 'th';
                else
                    return $number . $ends[$number % 10];
            }
            $this->SetFont('Arial', 'B', 12);
            $this->SetXY(65, 108.5);
            $dayOfIssuance = date('j', strtotime($data["issue_date"]));
            $this->Cell(70, 0, ordinal($dayOfIssuance), 0, 'J');
            $this->SetFont('Arial', 'B', 12);
            $this->SetXY(98.5, 108.5);
            $monthOfIssuance = date('F', strtotime($data["issue_date"]));
            $this->Cell(70, 0, $monthOfIssuance, 0, 'J');
            $this->SetFont('Arial', 'B', 12);
            $this->SetXY(129, 110);
            $yearOfIssuance = date('Y', strtotime($data["issue_date"]));
            $this->Cell(70, 0, $yearOfIssuance, 0, 'J');
            $this->SetFont('Arial', 'BU', 15);
            $this->SetXY(75, 170);
            $this->Cell(0, 8, 'HON. HENRY O. DULLER', 0, '');
            $this->SetFont('Arial', '', 12);
            $this->SetXY(85, 177);
            $this->Cell(0, 8, 'PUNONG BARANGAY', 0, 'J');
            $this->SetFont('Arial', 'B', 12);
            $this->SetXY(118.5, 210);
            $this->Cell(0, 8, '<<NOT VALID WITHOUT DRY SEAL>>', 0, 'J');


            // Output PDF
            $this->Output();
        }
    }
}

// Usage example
$pdf = new BarangayClearancePDF('P', 'mm', 'Letter');
$title = $data["firstname"] . " " . $data["lastname"] . " | " . " Certificate of Residency";
$pdf->SetTitle($title);
$pdf->AddFont('BrushScriptRegularSWFTE', '', 'brtswfte.php');
$pdf->AliasNbPages();
$pdf->AddPage();

// Generate the Barangay Clearance with sample data
$pdf->generateClearance($data);
<?php
session_start();
error_reporting(0);

include 'conn.php';
if (isset($_SESSION['user'])) {
} else {
    header('location: login.php');
}

require('fpdf/fpdf.php');

$id = $_GET['id'];
$query = "SELECT * FROM documents WHERE id=?";
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
            $this->SetFont('Arial', '', 12);
            $this->Cell(0, 15, 'Province of Laguna', 0, 1, 'C');
            $this->Ln(-10);
            $this->SetFont('Arial', '', 12);
            $this->Cell(0, 15, 'Municipality of Liliw', 0, 1, 'C');
            $this->Ln(-5);
            $this->SetTextColor(255, 192, 0);
            $this->SetFont('Arial', 'B', 15);
            $this->Cell(0, 15, 'BARANGAY KANLURAN BUKAL', 0, 1, 'C');
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

            // Box for officials
            $this->Ln(20);
            $this->Rect(3, 52, 64, 212, 'D');

            // Officials t itle
            $this->SetFont('Arial', 'B', 12);
            $this->SetXY(15, 45);
            $this->Ln(12);
            $this->Cell(50, 0, 'SANGGUNIANG BARANGAY', 0, 1, 'C');
            $this->SetXY(15, 45);
            $this->Ln(18);
            $this->Cell(50, 0, '2023 - 2025', 0, 1, 'C');
            $this->Ln(9);
            $this->SetFont('Arial', 'B', 13);
            $this->Cell(50, 0, 'HON. HENRY O. DULLER', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'PUNONG BARANGAY', 0, 1, 'C');
            $this->Ln(12);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'HON. RONALD B. BRITILLER', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'KAGAWAD', 0, 1, 'C');
            $this->Ln(12);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'HON. JEROME M. BORGONIA', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'KAGAWAD', 0, 1, 'C');
            $this->Ln(12);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'HON. RUBY P. BORLAZA', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'KAGAWAD', 0, 1, 'C');
            $this->Ln(12);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'HON. ALMER A. BRITILLER', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'KAGAWAD', 0, 1, 'C');
            $this->Ln(12);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'HON. MARIO A. REYES', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'KAGAWAD', 0, 1, 'C');
            $this->Ln(12);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'HON. PAUL JOSEPH R. BRITILLER', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'KAGAWAD', 0, 1, 'C');
            $this->Ln(12);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'HON. MARK DUFER L. AGAPAY', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'KAGAWAD', 0, 1, 'C');
            $this->Ln(12);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'HON. CLAIRE B. TRILLANA', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'SK CHAIRPERSON', 0, 1, 'C');
            $this->Ln(15);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'HONEYLETTE J. VILLANUEVA', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'BARANGAY SECRETARY', 0, 1, 'C');
            $this->Ln(10);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'MENALYN M. REYES', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'BARANGAY TREASURER', 0, 1, 'C');


            // Clearance details
            $this->SetFont('Arial', 'B', 23);
            $this->SetXY(70, 43);
            $this->MultiCell(0, 30, 'BARANGAY CLEARANCE', 0, 'C');
            $this->SetFont('Arial', 'B', 12);
            $this->SetXY(70, 70);
            $this->Cell(70, 0, "TO WHOM IT MAY CONCERN:", 0, 'J');
            $this->SetFont('Arial', '', 12);
            $this->SetXY(75, 80);
            $this->Cell(70, 0, "This is to certify that ______________________________________,", 0, 'J');
            $this->SetXY(120, 79);
            $this->SetFont('Arial', 'B', 12);
            $this->MultiCell(80, 0, strtoupper($data["firstname"] . " " . $data["middlename"] . " " . $data["lastname"]), 0, 'C');
            $this->SetFont('Arial', '', 12);
            $this->SetXY(70, 85);
            $this->MultiCell(0, 8, 'is a resident of _________', 0, 'J');
            $this->SetXY(70.5, 88);
            $this->SetFont('Arial', 'B', 12);
            $this->MultiCell(80, 0, strtoupper($data["purok"]), 0, 'C');
            $this->SetXY(70, 93);
            $this->SetFont('Arial', '', 12);
            $this->MultiCell(0, 8, 'is known to me to be a person of Good Moral Character and Law abiding citizen.', 0, 'J');
            $this->SetXY(121.7, 85);
            $this->SetFont('Arial', 'B', 12);
            $this->MultiCell(0, 8, 'Barangay Kanlurang Bukal Liliw, Laguna', 0, 'J');
            $this->SetXY(75, 115);
            $this->SetFont('Arial', '', 12);
            $this->Cell(70, 0, "Subject has no criminal record nor any pending case filed against him", 0, 'J');
            $this->SetFont('Arial', '', 12);
            $this->SetXY(70, 123);
            $this->MultiCell(70, 0, '/ her barangay record.', 0, 'J');
            $this->SetFont('Arial', 'B', 12);
            $this->SetXY(70, 130);
            $this->MultiCell(0, 8, 'Date of Birth:________________________________________', 0, '');
            $this->SetXY(100, 132);
            $this->SetFont('Arial', 'B', 15);
            $birthday = date('F d, Y', strtotime($data["birthday"]));
            $this->MultiCell(80, 0, strtoupper($birthday), 0, 'C');
            $this->SetXY(70, 140);
            $this->SetFont('Arial', 'B', 12);
            $this->MultiCell(0, 8, 'Civil Status: __________________    Sex: ________________', 0, '');
            $this->SetXY(78, 143);
            $this->SetFont('Arial', 'B', 15);
            $this->MultiCell(80, 0, strtoupper($data["civilstatus"]), 0, 'C');
            $this->SetXY(130, 143);
            $this->SetFont('Arial', 'B', 15);
            $this->MultiCell(80, 0, strtoupper($data["sex"]), 0, 'C');
            $this->SetXY(70, 155);
            $this->SetFont('Arial', '', 12);
            $this->Cell(70, 0, "Issued upon request of the above subject person in connection to his/her", 0, 'J');
            $this->SetXY(70, 163);
            $this->SetFont('Arial', '', 12);
            $this->Cell(70, 0, "application for:", 0, 'J');
            $this->SetXY(70, 170);
            $this->SetFont('Arial', 'B', 12);
            $this->MultiCell(0, 8, 'Purpose: _______________________________________________', 0, '');
            $this->SetXY(100, 172);
            $this->SetFont('Arial', 'B', 15);
            $this->MultiCell(80, 0, strtoupper($data["purpose"]), 0, 'C');
            $this->SetXY(70, 190);
            $this->SetFont('Arial', 'B', 12);
            $this->MultiCell(0, 8, '_________________________', 0, '');
            $this->SetXY(78, 197);
            $this->SetFont('Arial', 'B', 12);
            $this->MultiCell(0, 8, 'Applicants Signature', 0, '');
            $this->Rect(166.5, 180, 25, 30, 'D');
            $this->SetXY(160, 210);
            $this->SetFont('Arial', 'B', 12);
            $this->MultiCell(0, 8, 'Right Thumbmark', 0, '');
            $this->SetFont('Arial', 'B', 12);
            $this->SetXY(76, 131);
            //$issuanceDate = $data['issue_date'];
            //$dayOfIssuance = date('d', strtotime($issuanceDate));
            //$this->Cell(70, 0, $dayOfIssuance, 0, 'J');
            //$this->SetXY(110, 131);
            //$issuanceDate = $data['issue_date'];
            $monthOfIssuance = date('F', strtotime($issuanceDate));
            $monthNames = [
                'January' => 'Enero',
                'February' => 'Pebrero',
                'March' => 'Marso',
                'April' => 'Abril',
                'May' => 'Mayo',
                'June' => 'Hunyo',
                'July' => 'Hulyo',
                'August' => 'Agosto',
                'September' => 'Setyembre',
                'October' => 'Oktubre',
                'November' => 'Nobyembre',
                'December' => 'Disyembre',
            ];
            //$filipinoMonth = $monthNames[$monthOfIssuance];
            $this->Cell(70, 0, $filipinoMonth, 0, 'J');
            $this->SetXY(140, 132);
            $issuanceDate = $data['issue_date'];
            //$yearOfIssuance = date('Y', strtotime($issuanceDate));
            $this->Cell(70, 0, $yearOfIssuance, 0, 'J');
            $this->SetFont('Arial', 'BU', 15);
            $this->SetXY(109, 230);
            $this->Cell(0, 8, 'HON. HENRY O. DULLER', 0, '');
            $this->SetFont('Arial', '', 12);
            $this->SetXY(119.5, 237);
            $this->Cell(0, 8, 'PUNONG BARANGAY', 0, 'J');
            $this->SetFont('Arial', 'B', 12);
            $this->SetXY(128, 251);
            $this->Cell(0, 8, '<<NOT VALID WITHOUT DRY SEAL>>', 0, 'J');


            // Output PDF
            $this->Output();
        }
    }
}

// Usage example
$pdf = new BarangayClearancePDF('P', 'mm', 'Letter');
$title = $data["firstname"] . " " . $data["lastname"] . " | " . " Barangay Clearance";
$pdf->SetTitle($title);
$pdf->AddFont('BrushScriptRegularSWFTE', '', 'brtswfte.php');
$pdf->AliasNbPages();
$pdf->AddPage();

// Generate the Barangay Clearance with sample data
$pdf->generateClearance($data);
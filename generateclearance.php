<?php
session_start();

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
            $this->Cell(0, 15, 'Office of the Barangay Captain', 0, 1, 'C');
        }

        // Generate the Barangay Clearance
        function generateClearance($data)
        {
            // Content
            $this->SetFont('Arial', '', 12);

            // Box for officials
            $this->Ln(20);
            $this->Rect(68, 52, 140, 210, 'D');

            // Officials t itle
            $this->SetFont('Arial', 'B', 15);
            $this->SetXY(15, 45);
            $this->Ln(12);
            $this->Cell(50, 0, 'BARANGAY OFFICIALS', 0, 1, 'C');
            $this->Ln(14);
            $this->SetFont('Arial', 'BU', 12);
            $this->Cell(50, 0, 'HON. HENRY O. DULLER', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'BI', 12);
            $this->Cell(50, 0, 'Brgy. Captain', 0, 1, 'C');
            $this->Ln(14);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(50, 0, 'Hon. Ruby P. Borlaza', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'I', 12);
            $this->Cell(50, 0, 'Infrastracture', 0, 1, 'C');
            $this->Ln(14);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(50, 0, 'Hon. Henry O. Duller', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'I', 12);
            $this->Cell(50, 0, 'CCA', 0, 1, 'C');
            $this->Ln(14);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(50, 0, 'Hon. Mark Dufer L. Agapay', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'I', 12);
            $this->Cell(50, 0, 'Health', 0, 1, 'C');
            $this->Ln(14);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(50, 0, 'Hon. Ruby P. Borlaza', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'I', 12);
            $this->Cell(50, 0, 'Women and Children', 0, 1, 'C');
            $this->Ln(14);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(50, 0, 'Mario A. Reyes', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'I', 12);
            $this->Cell(50, 0, 'Education', 0, 1, 'C');
            $this->Ln(14);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(50, 0, 'Hon. Baltazar C. Panaglima', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'I', 12);
            $this->Cell(50, 0, 'Agriculture', 0, 1, 'C');
            $this->Ln(14);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(50, 0, 'Hon. Amanda D. Borlaza', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'I', 12);
            $this->Cell(50, 0, 'Peace and Order', 0, 1, 'C');
            $this->Ln(14);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'Honeylette J. Villanueva', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'I', 10);
            $this->Cell(50, 0, 'Barangay Secretary', 0, 1, 'C');
            $this->Ln(14);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50, 0, 'Menalyn M. Reyes', 0, 1, 'C');
            $this->Ln(6);
            $this->SetFont('Arial', 'I', 10);
            $this->Cell(50, 0, 'Barangay Treasurer', 0, 1, 'C');


            // Clearance details
            $this->SetFont('Arial', 'B', 15);
            $this->SetXY(70, 43);
            $this->MultiCell(0, 30, 'BARANGAY CLEARANCE', 0, 'C');
            $this->SetFont('Arial', '', 12);
            $this->SetXY(75, 70);
            $this->Cell(70, 0, "Ito'y nagpapatunay na si ___________________________________,", 0, 'J');
            $this->SetXY(125, 69);
            $this->SetFont('Arial', 'B', 12);
            $this->MultiCell(80, 0, strtoupper($data["firstname"] . " " . $data["middlename"] . " " . $data["lastname"]), 0, 'C');
            $this->SetFont('Arial', '', 12);
            $this->SetXY(70, 75);
            $this->MultiCell(0, 8, '____ taong gulang, na naninirahan sa Purok ____ Barangay Kanlurang Bukal Liliw, Laguna, ay napatunayan na siya ay walang anumang kinasangkutan na kahit anong krimen o kasong nakatala dito sa Barangay.', 0, 'J');
            $this->SetXY(70, 123);
            $this->SetFont('Arial', 'B', 12);
            $this->MultiCell(0, 0, $data["purpose"], 0, 'C');
            $this->SetXY(-100, 78);
            $this->SetFont('Arial', 'B', 12);
            //$this->MultiCell(0, 0, $data[''], 0, 'C');
            $this->SetFont('Arial', '', 12);
            $this->SetXY(75, 115);
            $this->Cell(70, 0, 'Ibinigay sa kanyang kahilingan upang ito ay magamit bilang legal na', 0, 'J');
            $this->SetFont('Arial', '', 12);
            $this->SetXY(70, 120);
            $this->MultiCell(0, 8, 'batayan sa ______________________________ ngayong ika _______ ng ___________________', 0, 'J');
            $this->SetFont('Arial', 'B', 12);
            $this->SetXY(76, 131);
            $issuanceDate = $data['issue_date'];
            $dayOfIssuance = date('d', strtotime($issuanceDate));
            $this->Cell(70, 0, $dayOfIssuance, 0, 'J');
            $this->SetXY(105, 131);
            $issuanceDate = $data['issue_date'];
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
            $filipinoMonth = $monthNames[$monthOfIssuance];
            $this->Cell(70, 0, $filipinoMonth, 0, 'J');
            $this->SetXY(140, 132);
            $issuanceDate = $data['issue_date'];
            $yearOfIssuance = date('Y', strtotime($issuanceDate));
            $this->Cell(70, 0, $yearOfIssuance, 0, 'J');
            $this->SetFont('Arial', 'BU', 12);
            $this->SetXY(153, 200);
            $this->Cell(0, 8, 'HON. HENRY O. DULLER', 0, '');
            $this->SetFont('Arial', '', 12);
            $this->SetXY(157, 207);
            $this->Cell(0, 8, 'PUNONG BARANGAY', 0, 'J');
            $this->SetFont('Arial', 'B', 12);
            $this->SetXY(100, 250);
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
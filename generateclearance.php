<?php
require('fpdf/fpdf.php');

class BarangayClearancePDF extends FPDF {
    // Page header
    function Header() {
        // Logo
        $this->Image('kanlurangbukal.png', 30, 10, 25);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 12);
        // Title
        $this->Cell(0, 15, 'Republic of the Philippines', 0, 1, 'C');
        $this->Ln(-10);
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 15, 'Municipality of Liliw', 0, 1, 'C');
        $this->Ln(-10);
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 15, 'Province of Laguna', 0, 1, 'C');
        $this->Ln(-5);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 15, 'BARANGAY KANLURANG BUKAL', 0, 1, 'C');
        $this->SetFont('BrushScriptRegularSWFTE', '', 20);
        $this->Ln(-8);
        $this->SetTextColor(255, 192, 0);
        $this->Cell(0, 15, 'Office of the Barangay Captain', 0, 1, 'C');
    }

    // Page footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    // Generate the Barangay Clearance
    function generateClearance($data) {
        // Content
        $this->SetFont('Arial', '', 12);

        // Box for officials
        $this->Ln(18);
        $this->Rect(10, 45, 60, 100, 'D');

        // Officials title
        $this->SetFont('Arial', 'B', 12);
        $this->SetXY(15, 45);
        $this->Cell(70, 10, 'BARANGAY OFFICIALS', 0, 1, 'L');

        // Officials names
        $this->SetFont('Arial', '', 12);
        $officials = array(
            'Barangay Captain: John Smith',
            'Barangay Councilor: Jane Doe',
            'Barangay Secretary: Mark Johnson',
            'Barangay Treasurer: Anna Williams'
        );
        foreach ($officials as $official) {
            $this->SetX(15);
            $this->Cell(70, 10, $official, 0, 1, 'L');
        }

        // Clearance details
        $this->SetFont('Arial', '', 12);
        $this->SetXY(85, 45);
        $this->MultiCell(0, 10, 'This is to certify that', 0, 'C');
        $this->Ln(10);

        $this->SetFont('Arial', 'B', 12);
        $this->Cell(50, 10, 'Name:', 0, 0, 'L');
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, $data['name'], 0, 1, 'L');
        $this->Ln(5);

        $this->SetFont('Arial', 'B', 12);
        $this->Cell(50, 10, 'Address:', 0, 0, 'L');
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, $data['address'], 0, 1, 'L');
        $this->Ln(5);

        $this->SetFont('Arial', 'B', 12);
        $this->Cell(50, 10, 'Date of Birth:', 0, 0, 'L');
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, $data['dob'], 0, 1, 'L');
        $this->Ln(5);

        $this->SetFont('Arial', 'B', 12);
        $this->Cell(50, 10, 'Purpose:', 0, 0, 'L');
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, $data['purpose'], 0, 1, 'L');
        $this->Ln(20);

        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, 'Issued on: ' . date('Y-m-d'), 0, 1);

        // Output PDF
        $this->Output();
    }
}

// Usage example
$pdf = new BarangayClearancePDF();
$pdf->AddFont('BrushScriptRegularSWFTE','','brtswfte.php');
$pdf->AliasNbPages();
$pdf->AddPage();

// Sample data
$data = array(
    'name' => 'John Doe',
    'address' => '123 Main Street',
    'dob' => '1990-01-01',
    'purpose' => 'Employment'
);

// Generate the Barangay Clearance with sample data
$pdf->generateClearance($data);

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
        $this->Cell(0, 15, 'Province of Laguna', 0, 1, 'C');
        $this->Ln(-10);
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 15, 'Municipality of Liliw', 0, 1, 'C');
        $this->Ln(-5);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 15, 'BARANGAY KANLURANG BUKAL', 0, 1, 'C');
        $this->SetFont('BrushScriptRegularSWFTE', '', 20);
        $this->Ln(-8);
        $this->SetTextColor(255, 192, 0);
        $this->Cell(0, 15, 'Office of the Barangay Captain', 0, 1, 'C');
    }

    // Generate the Barangay Clearance
    function generateClearance($data) {
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
        $this->Cell(50, 0, 'HON. ROMEO M. BORGONIA', 0, 1, 'C');
        $this->Ln(6);
        $this->SetFont('Arial', 'I', 12);
        $this->Cell(50, 0, 'Barangay Captain', 0, 1, 'C');
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
        $this->Cell(50, 0, 'Hon. Almer A. Britiller', 0, 1, 'C');
        $this->Ln(6);
        $this->SetFont('Arial', 'I', 12);
        $this->Cell(50, 0, 'Health', 0, 1, 'C');
        $this->Ln(14);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(50, 0, 'Hon. Victorio C. Britiller', 0, 1, 'C');
        $this->Ln(6);
        $this->SetFont('Arial', 'I', 12);
        $this->Cell(50, 0, 'Women and Children', 0, 1, 'C');
        $this->Ln(14);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(50, 0, 'Hon. Ricardo B. Agapay', 0, 1, 'C');
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
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(50, 0, 'Honeylette J. Villanueva', 0, 1, 'C');
        $this->Ln(6);
        $this->SetFont('Arial', 'I', 12);
        $this->Cell(50, 0, 'Barangay Secretary', 0, 1, 'C');
        $this->Ln(14);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(50, 0, 'Mercelita C. Coligado', 0, 1, 'C');
        $this->Ln(6);
        $this->SetFont('Arial', 'I', 12);
        $this->Cell(50, 0, 'Barangay Treasurer', 0, 1, 'C');


        // Clearance details
        $this->SetFont('Arial', 'B', 15);
        $this->SetXY(70, 43);
        $this->MultiCell(0, 30,'BUSINESS CLEARANCE', 0, 'C');
        $this->SetFont('Arial', '', 12);
        $this->SetXY(75, 70);
        $this->Cell(70, 0, "Ito'y nagpapatunay na si G./Gng. ___________________________" , 0, 'J');
        $this->SetXY(135, 69);
        $this->SetFont('Arial', 'B', 12);
        $this->MultiCell(70, 0, $data['name'], 0, 'C');
        $this->SetFont('Arial', '', 12);
        $this->SetXY(70, 75);
        $this->MultiCell(0, 8, 'ay na mamalakad/mamahala/, magtayo nagtatayo ng ________________________________________________________ sa Barangay Kanlurang Bukal Liliw, Laguna simula ______________ ng', 0, 'J');
        $this->SetXY(70, 86);
        $this->SetFont('Arial', 'B', 12);
        $this->MultiCell(0, 0, $data['business'] , 0, 'C');

        // Output PDF
        $this->Output();
    }
}

// Usage example
$pdf = new BarangayClearancePDF('P','mm','Letter');
$pdf->AddFont('BrushScriptRegularSWFTE','','brtswfte.php');
$pdf->AliasNbPages();
$pdf->AddPage();

// Sample data
$data = array(
    'name' => 'Kendrix B. Brosas',
    'address' => '123 Main Street',
    'business' => 'John Marcus Water Refilling Station and Grocery',
    'dob' => '1990-01-01',
    'purpose' => 'Employment'
);

// Generate the Barangay Clearance with sample data
$pdf->generateClearance($data);

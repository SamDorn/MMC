<?php

namespace App\utilities;

use App\core\Application;

class Pdf
{
    public static function generatePdf()
    {
        require Application::$ROOT_DIR . "/vendor/fpdf185/fpdf.php";
        $pdf = new \FPDF();

        // Add a new page to the PDF document
        $pdf->AddPage();

        // Set the font and font size for the PDF
        $pdf->SetFont('Arial', 'B', 16);

        // Write text to the PDF
        $pdf->Cell(40, 10, 'Hello World!');

        // Output the PDF
        $pdf->Output();
    }
}

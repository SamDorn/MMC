<?php

namespace App\utilities;

use FPDF;
use App\core\Application;
use App\models\EvaluationModel;
use App\models\UserModel;

class Pdf
{
    public static function generatePdf()
    {

        require Application::$ROOT_DIR . "/vendor/fpdf185/fpdf.php";
        $evaluationModel = new EvaluationModel();
        $userModel = new UserModel();
        $evaluationModel->setId($_GET['id']);
        $infoEval =  $evaluationModel->getById();
        $userModel->setId($infoEval['id_utente']);
        $infoUser = $userModel->getById();
        $pdf = new FPDF();

        $data = $infoEval['data_emissione'];
        $data = $data[8] . $data[9] . "/" . $data[5] . $data[6] . "/" . $data[0] . $data[1] . $data[2] . $data[3];
        if (str_contains($infoEval['ora_frequenza'], "&"))
            $infoEval['ora_frequenza'] = "< 1 ora";
        $pdf->SetTitle("valutazione_{$infoEval['ragione_sociale']}_$data");
        // Add a new page to the PDF document
        $pdf->AddPage();

        $pdf->SetX(180);
        $pdf->SetFont('Arial','I',10);
        $pdf->Cell(0,0,date("d/m/Y"),0,0,'L');
        $pdf->Ln(3);
        // Set the font and font size for the PDF
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->SetFillColor(207, 209, 212);

        // Write text to the PDF
        $pdf->Cell(190, 20, "DOCUMENTO UNICO DI VALUTAZIONE DEI RISCHI", 1, 2, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 10, "Azienda appaltatrice", 0, 2, 'L', true);
        $pdf->Ln(0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(30, 10, 'OscarMMC S.p.A.', 0, 2, 'L', true);

        $pdf->SetFillColor(207, 209, 212);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 10, "Azienda committente", 0, 2, 'L', true);
        $pdf->Ln(0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(30, 10, $infoEval['ragione_sociale'], 0, 2, 'L', true);

        $pdf->SetFillColor(207, 209, 212);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 10, "Autore valutazione", 0, 2, 'L', true);
        $pdf->Ln(0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(30, 10, $infoUser, 0, 2, 'L', true);
        $pdf->Ln(0);

        $pdf->SetFillColor(207, 209, 212);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 10, "Dati rilevati dalla valutazione", 0, 2, 'L', true);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetFillColor(255, 255, 255);

        $pdf->Ln(10);
        
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(73, 10, "Peso: ", 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(28, 10, $infoEval['peso'] . " kg", 1);
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(73, 10, "Altezza da terra: ", 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(28, 10, $infoEval['altezza_da_terra'] . " cm", 1);
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(73, 10, "Distanza verticale: ", 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(28, 10, $infoEval['distanza_verticale'] . " cm", 1);
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(73, 10, "Distanza orizzontale: ", 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(28, 10, $infoEval['distanza_orizzontale'] . " cm", 1);
        $pdf->Ln(10);


        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(73, 10, "Disclocazione angolare: ", 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(28, 10, $infoEval['dislocazione_angolare'] . " gradi", 1);
        $pdf->Ln(10);


        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(73, 10, "Giudizio: ", 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(28, 10, $infoEval['giudizio'], 1);
        $pdf->Ln(10);


        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(73, 10, "Frequenza al minuti: ", 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(28, 10, $infoEval['frequenza'] . " ogni minuto", 1);
        $pdf->Ln(10);


        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(73, 10, "Ora frequenza: ", 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(28, 10, $infoEval['ora_frequenza'], 1);
        $pdf->Ln(10);


        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(73, 10, "Costo: ", 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(28, 10,  " $" . $infoEval['costo'], 1);
        $pdf->Ln(10);


        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(73, 10, "Una mano: ", 1);
        $pdf->SetFont('Arial', '', 10);
        $infoEval['una_mano'] == 1 ? $pdf->Cell(28, 10, "Si", 1) : $pdf->Cell(28, 10, "No", 1);
        $pdf->Ln(10);


        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(73, 10, "Due persone: ", 1);
        $pdf->SetFont('Arial', '', 10);
        $infoEval['due_persone'] == 1 ? $pdf->Cell(28, 10, "Si", 1) : $pdf->Cell(28, 10, "No", 1);
        $pdf->Ln(10);


        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(73, 10, "Peso massimo sollevabile consigliato: ", 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(28, 10, $infoEval['peso_massimo'] . " kg", 1);
        $pdf->Ln(10);


        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(73, 10, "Indice di sollevamento: ", 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(28, 10, $infoEval['indice'], 1);
        $pdf->Ln(13);


        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(207, 209, 212);
        if ($infoEval['indice'] <= 0.85) {
            $pdf->Cell(190, 10, "Situazione accettabile: non e' necessario nessun provvedimento", 1, 1, 'C', true);
        } else if ($infoEval['indice'] <= 0.99) {
            $pdf->Cell(190, 10, "E' necessario attivare la sorveglianza sanitaria e la formazione e informazione del personale", 1, 1, 'C', true);
        } else {
            
            $pdf->Cell(190, 10, "E' necessario attivare interventi di prevenzione, la sorveglianza sanitaria annuale", 0, 1, 'C', true);
            $pdf->Ln(0.0001);
            $pdf->Cell(190, 10, " e la formazione e informazione del personale", 3, 1, 'C', true);
        }

        $pdf->Output('D', "valutazione_{$infoEval['ragione_sociale']}_$data");
    }
}

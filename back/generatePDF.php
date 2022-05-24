<?php
    /* Clase fpdf */
    require("fpdf184/fpdf.php");
    require("tfpdf/tfpdf.php");

    class PDF extends tFPDF
    {
        // Cabecera de página
        function Header()
        {
            // Logo
            $this->Image('./encabezado.fw.png',10,8,200);
            $this->Ln(20);
        }

        // Pie de página
        function Footer()
        {
            // Posición: a 1.5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','',8);
            // Número de página
            $this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->AddFont('Arial','','arial.ttf',true);
    $pdf->SetFont('Arial','',12);

    $pdf->Cell(0,10,"Formulario de Inscripción",0,1,"C");

    for($i=1;$i<=40;$i++){
        $pdf->Cell(0,10,'Renglón: D'.$i,0,1);
    }
    $pdf->Output();

?>
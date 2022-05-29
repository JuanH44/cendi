<?php
    /* Clase fpdf */
   
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

    $pdf = new PDF("P","mm","Letter");
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->AddFont('Arial','','arial.ttf',true);
    $pdf->AddFont('Arial','B','arialbd.ttf',true);
    $pdf->SetFont('Arial','B',12);

    
    $pdf->Cell(0,10,"FICHA DE REISNCRIPCIÓN",0,1,"C");

    $pdf->Cell(0,10,"DATOS DE LA NIÑA O EL NIÑO:",0,1,"L");

    $pdf->SetFont('Arial','',12);

    $pdf->MultiCell(0, 5, "This method allows printing text with line breaks. They can be automatic (as soon as the text reaches the right border of the cell) or explicit (via the character). As many cells as necessary are output, one below the other.", 1);
    
    //GetPageWidth();
    $pdf->Cell($this->GetPageWidth(),10,"Primer Apellido",1,1,"L");  //Investigar si se puede hace automático para cualqueire tamaño
    $pdf->Cell(40,10,"Segundo Apellido",1,1,"L");
    $pdf->Cell(40,10,"Nombre(s)",1,1,"L");

    $pdf->MultiCell(30, 15, "Hollaaaa", 1);
    $pdf->SetTitle("Formulario de Inscripción", true);
    $pdf->SetSubject("Hola", true);
    $pdf->SetKeywords("Hola", true);

    $pdf->Output();

?>
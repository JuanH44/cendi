<?php 
    //require("fpdf184/fpdf.php");
    require("tfpdf/tfpdf.php");

    //define('FPDF_FONTPATH',"fpdf184/fontType/");
  //  require("fpdf184/makefont/makefont.php");
   // MakeFont('fpdf184/fontType/Arial.ttf','cp1250');


   
   
    class PDF extends tFPDF
    {
    // Cabecera de página
    function Header()
    {
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,'Title',1,0,'C');
        // Line break
        $this->Ln(20);
        // Logo
    //    $this->Image('./encabezado.fw.png',10,8,200);
      //  $this->Ln(20);
    }

    // Pie de página
        function Footer()
        {
            // Posición: a 1.5 cm del final
            $this->SetY(-30);
            // Arial italic 8
            $pdf->SetFont($fontName,'',12);
            // Número de página
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        //    $pdf ->Cell(0,10, 'Formulario de inscripción',1, 1 , 'C');
           
        }
    }

    $pdf = new tFPDF();
    $pdf -> AddPage();
    $fontName = 'Arial';
    $pdf->AddFont($fontName,'','arial.ttf',true);
   // $pdf->AddFont($fontName,'B','arial.ttf',true);
    $pdf->SetFont($fontName,'',12);
 //   $pdf->SetFont('Helvetica','',12);
    
    
  
    $pdf ->Cell(0,10, 'Formulario de inscripción',1, 1 , 'C');
    $pdf->AliasNbPages();
    
    $pdf ->Output();

?>
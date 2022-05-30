<?php
[![require_once('tfpdf/tfpdf.php')

$pdf = new FPDF(); 


$pdf->AddPage();
$pdf->Image('pleca_flores_magon.jpg',0,0,210,0); ob_start();
$pdf->SetFont('Arial','B',22);
 $pdf->Cell(0,20,'Your Shipping',0,1); 
$pdf->SetFont('Arial','',12); 

          $pdf->SetFillColor(224,224,224); //Set background of the cell to be that grey color
           $pdf->Cell(40,12,"Label",1,0,'C',true);
          $pdf->Cell(40,12,"Quanitity",1,1,'C',true); //the 1 before the 'C' instead of 0 in previous lines tells it to move down by the height of the cell after writing this
           $pdf->Cell(40,12,"SIZE",1,0,'C');
          $pdf->Cell(40,12,"1",1,1,'C');
            $pdf->Cell(40,12,"COLOR",1,0,'C');
          $pdf->Cell(40,12,"2",1,1,'C');
            $pdf->Cell(40,12,"NECK",1,0,'C');
          $pdf->Cell(40,12,"3",1,1,'C');
            $pdf->Cell(40,12,"HANDLE",1,0,'C');
          $pdf->Cell(40,12,"4",1,1,'C');
            $pdf->Cell(40,12,"VENTS",1,0,'C');
          $pdf->Cell(40,12,"5",1,1,'C');
$pdf->Output();
ob_end_flush();][1]][1]

?>
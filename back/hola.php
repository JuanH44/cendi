<?php 
    require("fpdf184/fpdf.php");

    $pdf = new FPDF();
    $pdf -> AddPage();
    $pdf ->SetFont('helvetica','B',20);
    $pdf ->Cell(0,20, 'Hola grupo 4CM4!',1);
    $pdf ->Output();
?>
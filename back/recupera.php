<?php 
    require("fpdf184/fpdf.php");

    $folio = $_REQUEST['folio'];

    $pdf = new FPDF();
    $pdf -> AddPage();
    $pdf ->SetFont('helvetica','B',20);
    $pdf ->Cell(0,12, "Hola $folio",1);
    $pdf ->Output();
//    header("location: hola.php");

?>
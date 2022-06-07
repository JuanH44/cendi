<?php 
    require("fpdf184/fpdf.php");

    

    $alumno = $_REQUEST['alumno'];
    $derecho = $_REQUEST['derechoHab'];
    $conyuge = $_REQUEST['conyuge'];

    $curp = $alumno['curp'];
    $folio = $alumno['folio'];
    echo "{curp: $curp}";

    

    $pdf = new FPDF();
    $pdf -> AddPage();
    $pdf ->SetFont('helvetica','B',20);
    $pdf ->Cell(0,12, 'Hola grupo 4CM4!',1);
    $pdf -> AddPage();
    $pdf ->Cell(10,20,("curp: $curp"),70);
    $pdf ->Cell(20,50,("folio: $folio"),110);
    $pdf ->Output();
?>
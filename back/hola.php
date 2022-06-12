<?php 
    require("fpdf184/fpdf.php");

    

    $folio = $_REQUEST['folio'];

    $respuesta = array('estado' => 0, 'folio' => $folio);

    
    echo json_encode($respuesta);

    /*

    $pdf = new FPDF();
    $pdf -> AddPage();
    $pdf ->SetFont('helvetica','B',20);
    $pdf ->Cell(0,12, 'Hola grupo 4CM4!',1);
    $pdf -> AddPage();
    $pdf ->Cell(10,20,("curp: si"),70);
    $pdf ->Cell(20,50,("folio: mon"),110);
    $pdf ->Output();
    */
?>
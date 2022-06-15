<?php
if (isset($_REQUEST['folio'])) {
    $folio = $_REQUEST['folio'];
    /*$alumno = array(
        'curpo' => $_REQUEST['curp'],
        'nombra' => $_REQUEST['nombre'],
    );
    */
    // do user authentication as per your requirements
    // ...
    // ...
    // based on successful authentication
    //echo json_encode(array('success' => 1));
    //$arro = array('a', 'b', 'c', 'd');
    //$dato = array('success' => 1, 'simon' => 'claro', 'arre' => $arro);
    $respuesta = array('state' => 0, 'folio' => $folio, 'mensaje' => 'Subido exitosamente');
    echo json_encode($respuesta);
}else if (isset($_REQUEST['correo'])){
    session_start(); // Iniciar la sesión
    $_SESSION["correo"]="admin";
    echo json_encode(array('success' => 1));
} else {
    echo json_encode(array('state' => 2));
}

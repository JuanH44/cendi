<?php
if (isset($_REQUEST['curp'])) {
    $alumno = array(
        'curpo' => $_REQUEST['curp'],
        'nombra' => $_REQUEST['nombre'],
    );
    // do user authentication as per your requirements
    // ...
    // ...
    // based on successful authentication
    //echo json_encode(array('success' => 1));
    $arro = array('a', 'b', 'c', 'd');
    $dato = array('success' => 1, 'simon' => 'claro', 'arre' => $arro);
    echo json_encode($alumno);
} else {
    echo json_encode(array('success' => 0));
}

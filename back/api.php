<?php
if (isset($_GET['correo'])) {
    // do user authentication as per your requirements
    // ...
    // ...
    // based on successful authentication
    //echo json_encode(array('success' => 1));
    $arro = array('a', 'b', 'c', 'd');
    $dato = array('success' => 1, 'simon' => 'claro', 'arre' => $arro);
    echo json_encode($dato);
} else {
    echo json_encode(array('success' => 0));
}

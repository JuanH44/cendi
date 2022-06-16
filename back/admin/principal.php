<?php
    session_start();

    $usuario = $_SESSION['username'];

    echo "bienvenido $usuario ";

    echo "<a href = 'logout.php'>Salir</a>";
?>
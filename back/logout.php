<?php 
    session_start();
    unset($_SESSION["correo"]);
    echo "<h3> Cerraste sesion </h3>";
    echo "<a href='../front/login.php'> Regresar a Iniciar sesion </a>";
?>
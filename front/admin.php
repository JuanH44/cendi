<?php
// verificacion de que se inicio sesión
//if ( !(isset($_SESSION['acceso']) && $_SESSION['acceso'] == 10)) {
//header("location: login.php");
//}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/cssProyecto.css" media="screen,projection" />
    <!--Jquery-->
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script type="text/javascript" src="js/admin.js"></script>
    <title>.::Admin::.</title>
    
</head>

<body>
    <header id="navegacion"></header>
    <div class="row">
        <a class="waves-effect waves-light right btn" id="actualizar">Actualizar</a>
    </div>
    
    <div class="row">
        <ul class="collection" id="alumnos">
            
        </ul>
    </div>
    <footer id="futer"></footer>
</body>

</html>
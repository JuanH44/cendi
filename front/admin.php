<?php
session_start();
// verificacion de que se inicio sesión
if ( !(isset($_SESSION['correo']) && $_SESSION['correo'] == 'admin')) {
    header("location: login.php");
}

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
<div class="row blue lighten-4">
    <div id="cuadros">
        <header id="navegacion"></header>
    </div>
    <div class="row"></div>
    <div class="row">
<<<<<<< HEAD
        <p id="textoAdmin" class="white-text center-align">Este apartado es solo para personar autorizado</p>
        <a class="waves-effect waves-light right btn" id="actualizar">Actualizar</a>
=======
        <a class="waves-effect waves-light left btn" id="actualizar">Actualizar</a>
>>>>>>> 75d556fa3589e526fefb598d93d020d7a36f324b
    </div>
    
    <div class="row">
<<<<<<< HEAD
        <ul class="collection" id="resultados">

        </ul>
    </div>
    <div class="row">
        <ul class="collection">
            <div id=cuardro-1>
        <fieldset class="z-depth-3">
            <li class="collection-item avatar blue lighten-4">
                <img src="https://picsum.photos/100/100" alt="" class="circle">
                <span class="title">Alexis</span>
                <p>First Line <br>
                    Second Line
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                <div class="row">
                    <a href="./actualiza.php?folio=<?php echo '99199' ?>" class="waves-effect waves-light right btn">Editar</a>
                    <a class="waves-effect waves-light right btn red" id="elimina-1">Eliminar</a>
                </div>
            </li>
            </fieldset>
            </div>
            <div id=cuardro-2>
            <fieldset class="z-depth-3">
            <li class="collection-item avatar blue lighten-4">
                <img src="https://picsum.photos/100/100" alt="" class="circle">
                <span class="title">Jose</span>
                <p>First Line <br>
                    Second Line
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                <div class="row">
                    <a href="./registro.html" class="waves-effect waves-light right btn">Editar</a>
                    <a class="waves-effect waves-light right btn red" id="elimina-2">Eliminar</a>
                </div>
            </li>
    </fieldset>
    </div>
    <div id=cuardro-3>
    <fieldset class="z-depth-3">
            <li class="collection-item avatar blue lighten-4">
                <img src="https://picsum.photos/100/100" alt="" class="circle">
                <span class="title">Juan</span>
                <p>First Line <br>
                    Second Line
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                <div class="row">
                    <a href="./registro.html" class="waves-effect waves-light right btn">Editar</a>
                    <a class="waves-effect waves-light right btn red" id="elimina-3">Eliminar</a>
                </div>
            </li>
    </fieldset>
    </div>
    <div id=cuardro-4>
    <fieldset class="z-depth-3">
            <li class="collection-item avatar blue lighten-4">
                <img src="https://picsum.photos/100/100" alt="" class="circle">
                <span class="title">Luis</span>
                <p>First Line <br>
                    Second Line
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                <div class="row">
                    <a href="./registro.html" class="waves-effect waves-light right btn">Editar</a>
                    <a class="waves-effect waves-light right btn red" id="elimina-4">Eliminar</a>
                </div>  
            </li>
            </fieldset> 
            </div>
=======
        <ul class="collection" id="alumnos">
>>>>>>> 75d556fa3589e526fefb598d93d020d7a36f324b
            
        </ul>
    </div>
    <footer id="futer"></footer>
</div>
</body>

</html>
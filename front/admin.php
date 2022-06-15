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
    <title>.::Inicio::.</title>
    <script>
        $(document).ready(function() {
            $("#navegacion").load("./compartidos/barranavadmin.html");
            $("#futer").load("./compartidos/futer.html");

            //Activaciones
            //$(".dropdown-trigger").dropdown();


            var contenido = $('#resultados');
            var numero = 1;
            $('#actualizar').click(function() {
                var nuevo = $("<ul class=\"collection\" id=\"resultados\"> ");
                for (var i = 0; i < numero; i++) {
                    var otro = $("                <li class=\"collection-item avatar\">                <img src=\"https://picsum.photos/100/100\" alt=\"\" class=\"circle\">                <span class=\"title\">" + (numero - i) + "</span>                <p>First Line <br>                    Second Line                </p>        <a href=\"#!\" class=\"secondary-content\"><i class=\"material-icons\">grade</i></a>            <div class=\"row\">           <a href=\"./registro.html\" class=\"waves-effect waves-light right btn\">Editar</a>                   <a class=\"waves-effect waves-light right btn red\">Eliminar</a>               </div>            </li>");
                    nuevo.append(otro);
                }
                nuevo.append($("</ul>"));
                numero += 1;
                contenido.replaceWith(nuevo);
                contenido = $('#resultados');
            });
            $('#elimina-12345').click(function() {
                $.ajax({
                    type: "GET",
                    url: '../back/api.php?ide=12345',
                    success: function(response) {
                        var jsonData = JSON.parse(response);

                        // user is logged in successfully in the back-end
                        // let's redirect
                        if (jsonData.success == "1") {
                            //location.href = 'inicio.html';
                            alert(jsonData.arre[0]);
                        } else {
                            alert('Invalid Credentials!');
                        }
                    }
                });
            });
        });
    </script>
</head>

<body>
<div class="row blue lighten-4">
    <div id="cuadros">
        <header id="navegacion"></header>
    </div>
    <div class="row"></div>
    <div class="row">
        <a class="waves-effect waves-light right btn" id="actualizar">Actualizar</a>
    </div>
    <div class="row">
        <ul class="collection" id="resultados">

        </ul>
    </div>
    <div class="row">
        <ul class="collection">
            <li class="collection-item avatar">
                <img src="https://picsum.photos/100/100" alt="" class="circle">
                <span class="title">Alexis</span>
                <p>First Line <br>
                    Second Line
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                <div class="row">
                    <a href="./actualiza.php?folio=<?php echo '99199' ?>" class="waves-effect waves-light right btn">Editar</a>
                    <a class="waves-effect waves-light right btn red" id="elimina-12345">Eliminar</a>
                </div>

            </li>
            <li class="collection-item avatar">
                <img src="https://picsum.photos/100/100" alt="" class="circle">
                <span class="title">Jose</span>
                <p>First Line <br>
                    Second Line
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                <div class="row">
                    <a href="./registro.html" class="waves-effect waves-light right btn">Editar</a>
                    <a class="waves-effect waves-light right btn red">Eliminar</a>
                </div>
            </li>
            <li class="collection-item avatar">
                <img src="https://picsum.photos/100/100" alt="" class="circle">
                <span class="title">Juan</span>
                <p>First Line <br>
                    Second Line
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                <div class="row">
                    <a href="./registro.html" class="waves-effect waves-light right btn">Editar</a>
                    <a class="waves-effect waves-light right btn red">Eliminar</a>
                </div>
            </li>
            <li class="collection-item avatar">
                <img src="https://picsum.photos/100/100" alt="" class="circle">
                <span class="title">Luis</span>
                <p>First Line <br>
                    Second Line
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                <div class="row">
                    <a href="./registro.html" class="waves-effect waves-light right btn">Editar</a>
                    <a class="waves-effect waves-light right btn red">Eliminar</a>
                </div>
            </li>
        </ul>
    </div>
    <footer id="futer"></footer>
</div>
</body>

</html>
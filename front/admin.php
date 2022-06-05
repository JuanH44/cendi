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
    <!--Jquery-->
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <title>.::Admin::.</title>
    <script>
        $(document).ready(function() {
            $("#navegacion").load("./compartidos/barranavadmin.html");
            $("#futer").load("./compartidos/futer.html");
            $("#contenido1").load("./compartidos/formol.html");

            //Activaciones
            //$('.modal').modal();
            //$(".dropdown-trigger").dropdown();

            var alumnos = [{
                    nombre: 'Jose Angel',
                    curp: 'EIBA99'
                },
                {
                    nombre: 'David ',
                    curp: 'EIBD92'
                },
                {
                    nombre: 'ultimo ',
                    curp: 'Dale'
                }
            ];
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

            var contenedor = $('#alumnos');
            ///Generar a partir de la query al back
            let nuevaLista = "<ul class='collection' id='alumnos'> ";
            for (let index = 0; index < alumnos.length; index++) {
                let nuevoAlumno = "";
                nuevoAlumno += ("<li class='collection-item avatar' id='usr" + index + "'>");
                nuevoAlumno += ("    <img src='https://picsum.photos/100/100' alt='" + alumnos[index].nombre + "' class='circle'>");
                nuevoAlumno += ("    <span class='title'>" + alumnos[index].nombre + "</span>");
                nuevoAlumno += ("    <p class='parrafo'>" + alumnos[index].curp + " <br>");
                nuevoAlumno += ("        " + alumnos[index].nombre + "");
                nuevoAlumno += ("    </p>");
                nuevoAlumno += ("    <a href='#!' class='secondary-content'><i class='material-icons'>grade</i></a>");
                nuevoAlumno += ("    <div class='row' id='alumno" + index + "'>");
                nuevoAlumno += ("        <a class='waves-effect waves-light btn ver-mas'>Ver mas</a>");
                nuevoAlumno += ("        <a class='waves-effect waves-light btn ver-menos'>Ver menos</a>");
                nuevoAlumno += ("        <a class='waves-effect waves-light btn editar'>Editar</a>");
                nuevoAlumno += ("        <a class='waves-effect waves-light btn cancelar-edicion'>Cancelar edicion</a>");
                nuevoAlumno += ("        <a class='waves-effect waves-light btn btn-reset'>Restablecer valores</a>");
                nuevoAlumno += ("        <a class='waves-effect waves-light right btn red elimina'>Eliminar</a>");
                nuevoAlumno += ("        <form id='formula" + index + "' class='formula' action='../back/api.php' method='get'>");
                nuevoAlumno += ("            <!-- Aqui se inserta solito -->");
                nuevoAlumno += ("        </form>");
                nuevoAlumno += ("    </div>");
                nuevoAlumno += ("</li>");
                nuevaLista += nuevoAlumno;
            }
            nuevaLista += "</ul>";
            contenedor.replaceWith(nuevaLista);
            contenedor = $('#alumnos');
            ///Nested functions para controlar el dom
            function restableceValores(alumnRow, idx) {
                alumnRow.find('.correo').val(alumnos[idx].curp);
                alumnRow.find('.contrasena').val(alumnos[idx].nombre);
            }
            function activarForm(alumnRow, formID) {
                alumnRow.find(formID).find(':input:disabled').prop('disabled',false);
                alumnRow.find('.btn-enviar').show();
            }
            function bloquearForm(alumnRow, formID) {
                alumnRow.find(formID).find(':input:not(:disabled)').prop('disabled',true);
                alumnRow.find('.btn-enviar').hide();
            }
            function activarEdicion(alumnRow, formID) {
                alumnRow.find(".editar").hide();
                alumnRow.find(".cancelar-edicion").show();
                alumnRow.find(".btn-reset").show();
                activarForm(alumnRow, formID);
            }
            function cancelarEdicion(alumnRow, formID) {
                alumnRow.find(".editar").show();
                alumnRow.find(".cancelar-edicion").hide();
                alumnRow.find(".btn-reset").hide();
                bloquearForm(alumnRow, formID);
            }
            function verMas(alumnRow, formID) {
                alumnRow.find(formID).show();
                alumnRow.find(".ver-menos").show();
                alumnRow.find(".ver-mas").hide();
                cancelarEdicion(alumnRow, formID);
            }

            function verMenos(alumnRow, formID) {
                alumnRow.find(formID).hide();
                alumnRow.find(".ver-mas").show();
                alumnRow.find(".ver-menos").hide();
                alumnRow.find(".editar").hide();
                alumnRow.find(".cancelar-edicion").hide();
                alumnRow.find(".btn-reset").hide();
                bloquearForm(alumnRow, formID);
            }
            
            
            


            ///Colocar los controladores de los botones de cada formulario
            $('#resultados').ready(function() {
                for (let index = 0; index < alumnos.length; index++) {
                    const element = alumnos[index];
                    let formID = ("#formula" + index);
                    let alumnID = ("#alumno" + index);

                    $(formID).load("./compartidos/formol.html").ready(function() {
                        let form = $(this);
                        ///

                        ///Enviar un fomrulario a actualizar
                        $(formID).submit(function(e) {
                            alert("Voy a subir");
                            e.preventDefault(); // avoid to execute the actual submit of the form.

                            let subitForm = $(this);
                            let actionUrl = subitForm.attr('action');
                            let alumno = {
                                'curp': subitForm.find('.correo').val(),
                                'nombre': subitForm.find('.contrasena').val()
                            };
                            alert("Tengo el yeison" + alumno + subitForm.find('.contrasena').val());

                            $.ajax({
                                type: "POST",
                                url: actionUrl,
                                //data: form.serialize(), // serializes the form's elements.
                                data: alumno,
                                success: function(data) {

                                    alert("respondido");
                                    alert(data); // show response from the php script.
                                    let jsonData = $.parseJSON(data);
                                    subitForm.find('.correo').val("Enviado chido" + jsonData.curpo);
                                }
                            });

                        });

                        ///Eliminar un elemento
                    });
                    $(alumnID).ready(function() {
                        let alumInicial = $(alumnID);
                        verMenos(alumInicial, formID);
                        restableceValores(alumInicial, index);
                        $(alumnID).find(".ver-mas").click(function() {
                            let alumRow = $(alumnID);
                            verMas(alumRow, formID);
                            restableceValores(alumRow, index);
                        });
                        $(alumnID).find(".ver-menos").click(function() {
                            let alumRow = $(alumnID);
                            verMenos(alumRow, formID);
                            restableceValores(alumRow, index);
                        });
                        $(alumnID).find(".editar").click(function() {
                            let alumRow = $(alumnID);
                            activarEdicion(alumRow, formID);
                        });
                        $(alumnID).find(".cancelar-edicion").click(function() {
                            let alumRow = $(alumnID);
                            cancelarEdicion(alumRow, formID);
                            restableceValores(alumRow, index);
                        });
                        $(alumnID).find(".btn-reset").click(function() {
                            let alumRow = $(this).closest(alumnID);
                            restableceValores(alumRow, index);
                            //$(this).closest(alumnID).find('.contrasena').val(alumnos[index].nombre);

                        });
                        $(alumnID).find('.elimina').click(function() {
                            $.ajax({
                                type: "GET",
                                url: '../back/api.php?ide=12345',
                                success: function(response) {
                                    let jsonData = JSON.parse(response);

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
                }
            });
        });
    </script>
</head>

<body>
    <header id="navegacion"></header>
    <div class="row">
        <a class="waves-effect waves-light right btn" id="actualizar">Actualizar</a>
    </div>
    <div class="row">
        <ul class="collection" id="resultados">

        </ul>
    </div>
    <div class="row">
        <ul class="collection" id="alumnos">
            <li class='collection-item avatar' id='usr1'>

                <img src='https://picsum.photos/100/100' alt='' class='circle'>
                <span class='title'>Alexis</span>
                <p class='parrafo'>First Line <br>
                    Second Line
                </p>
                <a href='#!' class='secondary-content'><i class='material-icons'>grade</i></a>
                <div class='row' id='alumno0'>


                    <form id='formula0' class='formula' action='../back/api.php' method='get'>
                        <!-- Aqui se inserta solito -->
                    </form>
                    <a class='waves-effect waves-light btn btn-reset'>Restablecer</a>
                    <a class='waves-effect waves-light right btn editar'>Editar</a>
                    <a class='waves-effect waves-light right btn red elimina'>Eliminar</a>
                </div>

            </li>
            <li class="collection-item avatar" id="usr2">
                <img src="https://picsum.photos/100/100" alt="" class="circle">
                <span class="title">Jose</span>
                <p class="parrafo">First Line <br>
                    Second Line
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                <div class='row' id='alumno1'>

                    <form id='formula1' class='formula' action='../back/api.php' method='get'>
                        <!-- Aqui se inserta solito -->
                    </form>
                    <a class='waves-effect waves-light btn btn-reset'>Restablecer</a>
                    <a class='waves-effect waves-light right btn editar'>Editar</a>
                    <a class='waves-effect waves-light right btn red elimina'>Eliminar</a>
                </div>
            </li>
        </ul>
    </div>
    <footer id="futer"></footer>
</body>

</html>
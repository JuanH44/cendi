<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/cssProyecto.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Jquery-->
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <title>.::Recuperar PDF::.</title>
    <script>
        $(document).ready(function() {
            $("#navegacion").load("./compartidos/barranav.html");
            $("#futer").load("./compartidos/futer.html");
            /*
            $("#formula").submit(function(event) {
                var formData = {
                    curp: $("#curp").val(),
                    folio: $("#folio").val(),
                    accion: "recuperar",
                };

                $.ajax({
                    type: "POST",
                    url: "genera.php",
                    data: formData,
                    dataType: "json",
                    encode: true,
                }).done(function(data) {
                    console.log(data);
                });

                event.preventDefault();
            });
            */

            $("#btn-reset").click(function() {
                $("#formula").trigger('reset');
            });

        });
    </script>
</head>

<body>
    <div class="row blue lighten-4">
    <header id="navegacion"></header>
    <div class="row"></div>
    <h1 id="otroTitulo" class="center-align">Bienvenido a Recupera tus Datos</h1>
    <form id="formula" action="../back/hola.php" method="get">
<div id="Tabla6">
        <fieldset>
            <legend>BUSCAR COMPROBANTE DE CITA</legend>

            <div class="input-field col s6">
                <input id="curp" name="curp" type="text" data-length="18">
                <label for="curp">CURP</label>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="folio" name="folio" type="text" data-length="10">
                    <label for="folio">Folio (Boleta)</label>
                </div>
            </div>
        </fieldset>
        </div>
        <div class="row">
            <div id="botones2">
                <a id="btn-reset" class="waves-effect waves-light btn">Limpiar</a>
                <button class="btn waves-effect waves-light" type="submit" name="action"> Recuperar
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </form>

    <footer id="futer"></footer>
    </div>
</body>

</html>
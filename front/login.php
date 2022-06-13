<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Jquery-->
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <title>.::Login::.</title>
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

            $("#formula").submit(function(e) {
                alert("minimo");
                e.preventDefault(); // avoid to execute the actual submit of the form.

                var form = $(this);
                var actionUrl = form.attr('action');


                $.ajax({
                    type: "POST",
                    url: actionUrl,
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data) {
                        alert(data); // show response from the php script.
                        let direc = "./admin.php";
                        window.open(direc, '_self');
                    }
                });

            });

        });
    </script>
</head>

<body>
    <header id="navegacion"></header>
    <h1>Bienvenido</h1>
    <form id="formula" action="../back/api.php" method="get">
        <fieldset>
            <legend>ADMIN</legend>
            <div class="row">
                <div class="input-field col s6">
                    <input id="correo" name="correo" type="text">
                    <label for="correo">Correo</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="contrasena" name="contrasena" type="text">
                    <label for="contrasena">Contraseña</label>
                </div>
            </div>
        </fieldset>
        <div class="row">
            <a id="btn-reset" class="waves-effect waves-light btn">Limpiar</a>
            <button class="btn waves-effect waves-light" type="submit" name="action"> Ingresar
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>

    <footer id="futer"></footer>
</body>

</html>
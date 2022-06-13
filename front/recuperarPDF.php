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
    <title>.::Recuperar PDF::.</title>
    <script>
        $(document).ready(function() {
            $("#navegacion").load("./compartidos/barranav.html");
            $("#futer").load("./compartidos/futer.html");
            var alumno;
            
            $("#formula").submit(function(event) {
                event.preventDefault();

                var form = $(this);
                
                var formData = {
                    curp: $("#curp").val(),
                    folio: $("#folio").val(),
                    accion: "recuperar",
                };
                alumno = formData;
                var actionUrl = form.attr('action') + "?folio="+formData.folio;
                window.open(actionUrl,'_self');
                /*
                $.ajax({
                    type: "GET",
                    url: actionUrl,
                    data: formData,
                    dataType: "json",
                    encode: true,
                }).done(function(data) {
                    //if(data.estado == 0 && data.folio == alumno.folio){
                        //alert("Cita recuperada");
                        let direc = "../back/recupera.php?folio="+alumno.folio;
                        window.open(direc,'_blank');
                    //}
                    
                });
                */

                
            });
            

            $("#btn-reset").click(function() {
                $("#formula").trigger('reset');
            });

        });
    </script>
</head>

<body>
    <header id="navegacion"></header>
    <h1>Bienvenido</h1>
    <form id="formula" action="../back/pdf/viewPDF.php" method="get">

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
        <div class="row">
            <a id="btn-reset" class="waves-effect waves-light btn">Limpiar</a>
            <button class="btn waves-effect waves-light" type="submit" name="action"> Recuperar
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>

    <footer id="futer"></footer>
</body>

</html>
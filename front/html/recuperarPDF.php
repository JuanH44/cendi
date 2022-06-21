<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!-- hojas de estilo -->
     <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom.css">
    <!-- scripts -->
    <script type="text/javascript" src="../js/jquery-3.6.0.js"> </script>
    <script type="text/javascript" src="../js/registro.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <!-- datos y metadatos -->
    <link rel="shortcut icon" href="../assets/burrito-sin-f.png">
    <title>Recuperar ficha de registro</title>
    <script>
        $(document).ready(function() {
            $("#navegacion").load("./compartidos/barranav.html");
            $("#futer").load("./compartidos/futer.html");
            var alumno;
            $("#formula").submit(function(event) {
                event.preventDefault();

                var form = $(this);

                var formData = {
                    folio: $("#folio").val(),
                    accion: "recuperar",
                };
                alumno = formData;
                var actionUrl = form.attr('action') + "?folio=" + formData.folio;
                window.open(actionUrl, '_self');
            });
            $("#btn-reset").click(function() {
                $("#formula").trigger('reset');
            });
            $('#recuperar').click(function() {
                let direc = "../back/pdf/generatePDF.php?folio=" + alumno.folio;
                window.open(direc, '_blank');
            });

        });
    </script>
</head>

<body>
    <header id="navigation"></header>
    <div class="container">
      <div class="mt-5">
        <form id="formula" action="../back/pdf/generatePDF.php" method="get">
            <fieldset class="form-group border p-3">
                <legend class="w-auto">BUSCAR COMPROBANTE DE CITA</legend>
                <div class="mb-3">
                    <input id="folio" name="folio" type="text" data-length="10" placeholder="Folio (Boleta)" class="form-control username">
                </div>
                <button id="recuperar" class="btn btn-primary" type="submit" name="action"> Recuperar
                </button>
        </form>
        </fieldset>
        </div>
    </div>
    <script type="text/javascript" src="../js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../js/load-components.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer id="footer"></footer>

</html>
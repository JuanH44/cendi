<?php require '../../back/admin/studentInfo.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="../css/bootstrap-icons.css">
	<link rel="stylesheet" href="../css/custom.css">
	<!-- Scripts -->

	<title>Informacion del infante</title>
</head>
<body>
	<header id="header"></header>



	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<h1>Informacion del infante</h1>
			</div>
		</div>

		<!-- Card with the basic information of the child -->
		
		<form action="#" id="form">
			<fieldset id="general-section"></fieldset>
			<fieldset id="infant-section"></fieldset>
			<fieldset id="parent-section"></fieldset>
			<fieldset id="spouse-section"></fieldset>
		</form>

		<div class="row">
			<div class="col-md-12" id="bottomButtons">
				<button type="button" class="btn btn-primary" id="btnEdit"  data-action="edit">Editar</button>
				<button type="button" class="btn btn-primary" id="btnSave" data-action="save" hidden >Guardar</button>
				<button type="button" class="btn btn-primary" id="btnCancel" data-action="cancel" hidden>Cancelar</button>
				<button type="button" class="btn btn-primary" id="btnDelete"  data-action="delete">Eliminar</button>
				<button type="button" class="btn btn-primary" id="btnBack" data-action="back">Regresar</button>
			</div>
		</div>
	</div>

	<footer id="footer"></footer>
	<script src="../js/script.js"></script>
	<script src="../js/studentInfo.js"></script>
</body>
</html>
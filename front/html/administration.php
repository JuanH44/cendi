<?php include ("../../back/admin/administration.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<!--style sheets-->
	<link type="text/css" rel="stylesheet" href="../css/bootstrap.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="../css/cssProyecto.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="../css/custom.css" />
	<!--scripts-->
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/materialize.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<title>Alumnos</title>
</head>
<body>
	<header id="header"></header>
		
	<div class="container">
		<div class="row"></div>
			<div class="row"> 
        <div id="students-table" method="POST" action="./studentInfo.php"></div>
      </div>
    </div>
  </div>

	<div id="prueba"></div>

  <footer id="footer"></footer>
	<!-- Scripts -->
	<script src="../js/script.js"></script>
	<script type="text/javascript" src="../js/administration.js"></script>
</body>
</html>


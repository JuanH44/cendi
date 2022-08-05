<?php
    require("../BD/conexionBD.php");
    session_start();
		//Credencials sent from the login form
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $q = 
		"SELECT 
			COUNT(*) AS exist 
		FROM 
			admin 
		WHERE 
			usuario = '$user' AND contraseña = '$pass'";

    $sql = mysqli_query($conexion,$q);
    $respSql = mysqli_fetch_array($sql);

    if ($respSql['exist']>0){
        $_SESSION['user'] = $user;
				$response = array(
					'status' => 'success',
					'message' => 'Login correcto'
				);
    }else{
				$response = array(
					'status' => 'error',
					'message' => 'Usuario o contraseña incorrectos'
				);
    }

		echo json_encode($response);
?>
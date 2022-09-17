<?php

function create(){

}


function read(){

	$conexion = mysqli_connect("localhost", "root", "", "bd_proyecto");
	$sql = "select * from datos_generales";
	$respuesta = mysqli_query($conexion, $sql);
	$datos = array();
	while ($fila = mysqli_fetch_assoc($respuesta)) {
		$datos[] = $fila;
	}
	mysqli_close($conexion);
	return $datos;
}

function update(){

}


function delete(){
	$conexion = mysqli_connect("localhost", "root", "", "bd_proyecto");
	$sql = 
	"DELETE 
		* 
	FROM 
		datos_generales 
	WHERE 
		folio = '$_REQUEST['folioBorrar']'
	I";
	$respuesta = mysqli_query($conexion, $sql);
	$datos = array();
	while ($fila = mysqli_fetch_assoc($respuesta)) {
		$datos[] = $fila;
	}
	mysqli_close($conexion);
	return $datos;




}

?>
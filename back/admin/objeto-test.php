<?php
Class Objeto{
	public $id;
	public $nombre;
	public $apellido;

	function __construct($id, $nombre, $apellido){
		$this->id = $id;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
	}

}


$persona = new Objeto(1, "Juan", "Perez");

echo json_encode($persona);


?>
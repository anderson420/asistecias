<?php

/**
* Clase de el usuario
*/

class usuario
{
	
	private $idcursos;
	public $nombre;
	public $creditos;
	public $primerApellido;
	public $segundoApellido;
	private $contrasena;
	public $direccion;
	public $telefono;
	public $email;
	public $dia_nacimiento;
	public $mes_nacimiento;
	public $anio_nacimiento;

	/* Agregar mas info si es requerida*/

	public function __construct($idcursos, $nombre, $creditos)
	{
		$this->idcursos = $idcursos;
		$this->nombre = $nombre;
		$this->creditos = $creditos;
	}

	public function __destruct(){

	}

	public function get_idcursos(){
		return $this->idcursos;
	}

	public function get_nombre(){
		return $this->nombre;
	}

	public function get_creditos(){
		return $this->creditos;
	}

}

?>
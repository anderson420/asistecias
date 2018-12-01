<?php

/**
* Clase de el usuario
*/

class usuario
{
	
	private $idprofesores;
	public $primerNombre;
	public $segundoNombre;
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

	public function __construct($idprofesores, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $contrasena,$direccion, $telefono, $email, $dia_nacimiento, $mes_nacimiento, $anio_nacimiento)
	{
		$this->idprofesores = $idprofesores;
		$this->primerNombre = $primerNombre;
		$this->segundoNombre = $segundoNombre;
		$this->primerApellido = $primerApellido;
		$this->segundoApellido = $segundoApellido;
		$this->contrasena = $contrasena;
		$this->direccion = $direccion;
		$this->telefono = $telefono;
		$this->email = $email;
		$this->dia_nacimiento = $dia_nacimiento;
		$this->mes_nacimiento = $mes_nacimiento;
		$this->anio_nacimiento = $anio_nacimiento;
	}

	public function __destruct(){

	}

	public function getEmail(){
		return $this->email;
	}

	public function getTelefono(){
		return $this->telefono; 
	}

	public function getContrasena(){
		return $this->contrasena;
	}

	public function get_mes_nacimiento(){
		return $this->mes_nacimiento; 
	}

	public function get_dia_nacimiento(){
		return $this->dia_nacimiento;
	}

	public function get_idprofesores(){
		return $this->idprofesores;
	}

	public function get_primerNombre(){
		return $this->primerNombre;
	}

	public function get_primerApellido(){
		return $this->primerApellido;
	}

	public function get_segundoApellido(){
		return $this->segundoApellido;
	}

	public function get_segundoNombre(){
		return $this->segundoNombre;
	}

	public function getDireccion(){
		return $this->direccion;
	}
}

?>
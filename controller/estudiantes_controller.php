<?php

/**
* Clase de el estudiante
*/

class usuario
{
	
	private $idestudiantes;
	public $primerNombre;
	public $segundoNombre;
	public $primerApellido;
	public $segundoApellido;
	public $email;

	/* Agregar mas info si es requerida*/

	public function __construct($idestudiantes, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $email)
	{
		$this->idestudiantes = $idestudiantes;
		$this->primerNombre = $primerNombre;
		$this->segundoNombre = $segundoNombre;
		$this->primerApellido = $primerApellido;
		$this->segundoApellido = $segundoApellido;
		$this->email = $email;
	}

	public function __destruct(){

	}

	public function getEmail(){
		return $this->email;
	}

	public function get_idestudiantes(){
		return $this->idestudiantes;
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

}

?>
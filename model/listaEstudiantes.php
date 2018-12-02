<?php

/**
* Clase de el usuario
*/

class usuario
{
	
	public $id_lista_asistencia;
	public $tema;
	public $cursos_idcursos;
	public $fecha;
    public $hora_inicio;
    public $hora_final;


	public function id_lista_asistencia(){
		return $this->id_lista_asistencia;
	}

	public function tema(){
		return $this->tema;
	}

	public function cursos_idcursos(){
		return $this->cursos_idcursos;
    }
	public function fecha(){
		return $this->fecha;
    }
	public function hora_inicio(){
		return $this->hora_inicio;
    }
	public function hora_final(){
		return $this->hora_final;
	}

}

?>
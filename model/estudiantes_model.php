<?php

	class estudiantes_model{

		private $db;
		private $estudiantes;

		public function __construct()
		{
			require_once("conexion.php");
			$this->db = Conectar::conexion();
			$this->estudiantes = array();
		}
		
		public function get_estudiantes(){
			$consulta = $this->db->query("SELECT * FROM estudiantes");

			while($filas=$consulta->fetch(PDO::FETCH_ASSOC))
			{
				$this->estudiantes[]=$filas;
			}

			return $this->estudiantes;
		}

		public function get_estudiantes_curso($id){

			$consulta = $this->db->query("SELECT DISTINCT idestudiantes, primerNombre, primerApellido FROM cursos INNER JOIN cursos_has_estudiantes on (idcursos=cursos_idcursos AND idcursos = $id) INNER JOIN estudiantes on (idestudiantes=estudiantes_idestudiantes)");

			while($filas=$consulta->fetch(PDO::FETCH_ASSOC))
			{
				$this->estudiantes[]=$filas;
			}

			return $this->estudiantes;
		}
	}
?>

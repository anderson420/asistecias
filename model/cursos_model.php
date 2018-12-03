<?php

	class cursos_model{

		private $db;
		private $cursos;

		public function __construct()
		{
			require_once("conexion.php");
			$this->db = Conectar::conexion();
			$this->cursos = array();
		}

		public function get_cursos($id)
		{
			$consulta = $this->db->query("SELECT * 
			FROM  profesores_has_cursos INNER JOIN cursos ON cursos.idcursos = profesores_has_cursos.cursos_idcursos
			WHERE profesores_has_cursos.profesores_idprofesores =$id;");

			while($filas=$consulta->fetch(PDO::FETCH_ASSOC))
			{
				$this->cursos[] = $filas;
			}

			return $this->cursos;
		}

		public function get_cursos_id($id_curso)
		{
			$consulta = $this->db->query("SELECT * FROM cursos WHERE idcursos = $id_curso");

			while($filas=$consulta->fetch(PDO::FETCH_ASSOC))
			{
				$this->cursos[] = $filas;
			}

			return $this->cursos;
		}

	}
?>

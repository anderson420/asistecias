<?php

	class Usuarios_model{

		private $db;
		private $usuarios;

		public function __construct()
		{
			require_once("conexion.php");
			$this->db = Conectar::conexion();
			$this->usuarios = array();
		}

		public function getUsuarios(){
			$consulta = $this->db->query("SELECT * FROM profesores");

			while($filas=$consulta->fetch(PDO::FETCH_ASSOC))
			{
				$this->usuarios[]=$filas;
			}

			return $this->usuarios;
		}

		public function get_cursos(){

			$consulta = $this->db->query("SELECT * FROM profesores_has_cursos");

			while($filas=$consulta->fetch(PDO::FETCH_ASSOC))
			{
				$this->usuarios[]=$filas;
			}

			return $this->usuarios;
		}

		public function get_profesores_curso($id){

			$consulta = $this->db->query("SELECT idprofesores, primerNombre, primerApellido, salon, hora FROM cursos INNER JOIN profesores_has_cursos on (idcursos=cursos_idcursos AND idcursos = $id) INNER JOIN profesores on (idprofesores=profesores_idprofesores)");

			while($filas=$consulta->fetch(PDO::FETCH_ASSOC))
			{
				$this->usuarios[]=$filas;
			}

			return $this->usuarios;
		}

		public function updatePassword($newPassword){
			$consulta = $this->db->query("UPDATE profesores SET contrasena = $newPassword WHERE idprofesores > 0");

			/*while($filas=$consulta->fetch(PDO::FETCH_ASSOC))
			{
				$this->usuarios[]=$filas;
			}*/

			return "exito";
		}
	}
?>

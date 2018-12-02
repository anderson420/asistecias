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

		public function getEstudiantes(){
			$consulta = $this->db->query("SELECT * FROM estudiantes");

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

		public function updatePassword($newPassword,$idprofesor){
			
			try 
			{
				$sql = "UPDATE profesores 
						SET contrasena = ?
						WHERE idprofesores = ?;";
	
				$this->db->prepare($sql)
					 ->execute(
					array(
						$newPassword,
						$idprofesor
						
						)
					);
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}

			/*while($filas=$consulta->fetch(PDO::FETCH_ASSOC))
			{
				$this->usuarios[]=$filas;
			}*/

			return "exito";
		}

		public function NuevaLista($tema,$idcurso,$fecha,$hora_inicio,$hora_final){
			
			try 
			{
				$sql = "INSERT INTO 
				lista_asistencia (
					tema,
					cursos_idcursos,
					fecha,
					hora_inicio,
					hora_final)
				VALUES (?, ?, ?,?, ?);";
	
				$this->db->prepare($sql)
					 ->execute(
					array(
						$tema,
						$idcurso,
						$fecha,
						$hora_inicio,
						$hora_final
						
						)
					);
					
			} catch (Exception $e) 
			{
				
			}


			return "exito";
		}
		public function CursoId(){
			
			try 
			{
				$sql = "SELECT id_lista_asistencia
				FROM 
				 	lista_asistencia 
				order by id_lista_asistencia desc
				limit 1;";
	
				$result =$this->db->prepare($sql);
				$result->execute();
				foreach ($result->fetchAll(PDO::FETCH_OBJ) as $r) {
					# code...
					$p= $r->id_lista_asistencia;
				} 
			
				return $p;
			} catch (Exception $e) 
			{
				
			}


			return "exito";
		}
		public function addEstudiante($id_estudiante,$id_curo){
			
			try 
			{
				$sql = "INSERT INTO
				 lista_asistencia_estudiantes 
				 (estudiantes_idestudiantes,
				  lista_asistencia_id_lista_asistencia)
				VALUE(?,?);";
	
				$this->db->prepare($sql)
					 ->execute(
					array(
						$id_estudiante,
						$id_curo
						
						)
					);
				
			} catch (Exception $e) 
			{
				
			}


			return "exito";
		}
	}
?>

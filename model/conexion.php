<?php

	class Conectar{

		public static function conexion(){

			try{
				$conexion = new PDO('mysql:host=sql307.epizy.com;port=3306; dbname=epiz_23091224_asistencia', 'epiz_23091224', '6bnlY6g5A8udN');
				//$conexion = new PDO('mysql:host=localhost; dbname=asistencia', 'root', '');
				$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$conexion->exec("SET CHARACTER SET UTF8");

			}catch(Exception $e){
				die("Error".$e->getMessage());
				echo "Linea del error ".$e->getLine();
			}

			return $conexion;
		}
	}

?>

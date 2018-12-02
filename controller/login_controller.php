<?php

	require_once("../model/usuarios_model.php");
	require_once("usuario_controller.php");

	$usuario = new Usuarios_model();
	$matrizUsuarios = $usuario->getUsuarios();

	if(isset($_POST['pass'])){
		$pass = $_POST['pass'];
		$id = $_POST['codigo'];
	}else if(isset($_POST['usuarioFB'])){
		$usuarioFB = $_POST['usuarioFB'];
	}
	$encontro = False;

	foreach ($matrizUsuarios as $registro) {
		if(isset($_POST['pass'])){
			if($registro["idprofesores"] == $id and $registro['contrasena'] == $pass){
				$usuario1 = new usuario($registro["idprofesores"], $registro["primerNombre"], $registro["segundoNombre"], $registro["primerApellido"], $registro["segundoApellido"], $registro["contrasena"], $registro["direccion"], $registro["telefono"], $registro["email"], $registro["dia_nacimiento"], $registro["mes_nacimiento"], $registro["anio_nacimiento"]);
				session_start();
				$_SESSION['usuario'] = serialize($usuario1);
				$_SESSION['id_usuario'] = $id ;
				$encontro = True;
				break;
			}
		}else if(isset($_POST['usuarioFB'])){
			if($registro['usuarioFB'] == $usuarioFB){
				$usuario1 = new usuario($registro["idprofesores"], $registro["primerNombre"], $registro["segundoNombre"], $registro["primerApellido"], $registro["segundoApellido"], $registro["contrasena"], $registro["direccion"], $registro["telefono"], $registro["email"], $registro["dia_nacimiento"], $registro["mes_nacimiento"], $registro["anio_nacimiento"]);
				session_start();
				$_SESSION['usuario'] = serialize($usuario1);
				$_SESSION['id_usuario'] = $registro["idprofesores"];
				$encontro = True;
				break;
			}
		}
	}
	if($encontro){
		if(isset($_POST['usuarioFB'])){
			echo "1";
		}else{
			header("Location: ../view/usuarios_view.php");
		}
	}
	else{
	
		echo '<script>  alert("CONTRSEÑA ERRONEA") ;document.getElementById("boton").onclick= function(e){ e.preventDefault()};  </script>';
		
	}
	if(!isset($_POST['usuarioFB'])){
		$matrizUsuarios = $usuario->getEstudiantes();
		$id = $_POST['codigo'];
		$pass = $_POST['pass'];

		$encontro = False;

		foreach ($matrizUsuarios as $registro) {
			if($registro["idestudiantes"] == $id and $registro['contrasena'] == $pass){
				session_start();
				$_SESSION['nombre'] = $registro["primerNombre"];
				$_SESSION['apellido'] = $registro["primerApellido"];
				$_SESSION['correo'] = $registro["correo"];
				$_SESSION['id_usuario'] = $id ;
				$encontro = True;
				break;
			}
		}
		if($encontro){
			

			header("Location: ../view/estudiante_view.php");
		}
		else{
			echo '<script>  alert("CONTRSEÑA ERRONEA") ;document.getElementById("boton").onclick= function(e){ e.preventDefault()};  </script>';
		}
	}

?>

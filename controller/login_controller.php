<?php

	require_once("../model/usuarios_model.php");
	require_once("usuario_controller.php");

	$usuario = new Usuarios_model();
	$matrizUsuarios = $usuario->getUsuarios();

	$id = $_POST['codigo'];
	$pass = $_POST['pass'];

	$encontro = False;

	foreach ($matrizUsuarios as $registro) {
		if($registro["idprofesores"] == $id and $registro['contrasena'] == $pass){
			$usuario1 = new usuario($registro["idprofesores"], $registro["primerNombre"], $registro["segundoNombre"], $registro["primerApellido"], $registro["segundoApellido"], $registro["contrasena"], $registro["direccion"], $registro["telefono"], $registro["email"], $registro["dia_nacimiento"], $registro["mes_nacimiento"], $registro["anio_nacimiento"]);
			session_start();
			$_SESSION['usuario'] = serialize($usuario1);
			$_SESSION['id_usuario'] = $id ;
			$encontro = True;
			break;
		}
	}

	if($encontro){
		

		header("Location: ../view/usuarios_view.php");
	}
	else{
	
		echo '<script>  alert("CONTRSEÑA ERRONEA") ;document.getElementById("boton").onclick= function(e){ e.preventDefault()};  </script>';
		
	}

?>

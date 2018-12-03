<?php

	require_once("../model/usuarios_model.php");
	require_once("usuario_controller.php");

	$usuario = new Usuarios_model();
	$matrizUsuarios = $usuario->getUsuarios();

	$pass = $_POST['pass'];
	$id = $_POST['codigo'];
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
	} else{
	
	
		
	
	$matrizUsuario = $usuario->getEstudiantes();
	$id = $_POST['codigo'];
	$pass = $_POST['pass'];

	$encontro = False;
	print_r($matrizUsuario);
	foreach ($matrizUsuario as $key) {
		if($key["idestudiantes"] == $id and $key['contrasena'] == $pass){
			session_start();
			$_SESSION['usuario']= "XD";
			$_SESSION['nombre'] = $key["primerNombre"];
			$_SESSION['apellido'] = $key["primerApellido"];
			$_SESSION['correo'] = $key["correo"];
			$_SESSION['id_usuario'] = $id ;
			$_SESSION['logueado'] = true ;
			$encontro = True;
			break;
		}
	}
	if($encontro){
		header("Location: ../view/estudiante_view.php");
	}else {
		echo '<script>alert("Usuario o Contraseña incorrecto")</script>';
		echo "<script>location.href='../index.php'</script>";
	}
}

?>

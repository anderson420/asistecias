<?php
    session_start();
 
     $host_db = "sql307.epizy.com";
      $user_db = "epiz_23091224";
      $pass_db = "6bnlY6g5A8udN";
      $db_name = "epiz_23091224_asistencia";

      $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name); 

      $username = $_POST['usuario'];
      $password = $_POST['password'];
        $sql = "SELECT * FROM admin WHERE user = '$username'";
        $result = $conexion->query($sql);
      
      $row = $stm->fetchAll(PDO::FETCH_ASSOC);
      if ($password == $row['password']) {
          $_SESSION['loggedin'] = true;
          $_SESSION['id'] = $username;

          echo "<script>location.href='../view/manejador.php'</script>";
      } else {
        echo '<script>alert("Usuario o Contraseña incorrecto")</script>';
        echo "<script>location.href='../index.php'</script>";
       
      }
     mysqli_close($conexion); 


	require_once("../../model/usuarios_model.php");
	require_once("usuario_controller.php");

	$usuario = new Usuarios_model();
	$matrizUsuarios = $usuario->getUsuarios();

  $username = $_POST['usuario'];
  $password = $_POST['password'];
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
    
    ?>
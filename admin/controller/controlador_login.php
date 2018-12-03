<?php
    session_start();

      $host_db = "localhost";
      $user_db = "root";
      $pass_db = "";
      $db_name = "asistencia";

      $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

      if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
      }
      $username = $conexion->real_escape_string($_POST['usuario']);
      $password = $_POST['password'];

      $sql = "SELECT * FROM admin WHERE user = '$username'";
      $result = $conexion->query($sql);
      $row = $result->fetch_assoc();
      if ($password == $row['password']) {
          $_SESSION['loggedin'] = true;
          $_SESSION['id'] = $username;

          echo "<script>location.href='../view/manejador.php'</script>";
      } else {
        echo '<script>alert("Usuario o Contraseña incorrecto")</script>';
        echo "<script>location.href='../view/index.php'</script>";
       
      }
      mysqli_close($conexion); 
    
    ?>
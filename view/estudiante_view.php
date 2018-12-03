<?php 

session_start();

if(!isset($_SESSION['usuario'])){
    echo "<script> window.location = '../index.php'; </script> ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil</title>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
        
    <link rel="stylesheet" href="../css/materialize.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../img/faviconn.ico">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h4 class="left">Perfil</h4>
                <div class="right mt">
                    <a href="../model/logout.php">Cerrar sesión<i class="material-icons right">exit_to_app</i></a>
                </div>
            </div>
            <div class="col s12">
                <div class="divider"></div>
            </div>
        </div>
        
        <div class="row">
           
            <div class="col s10">
                <div class="row">
                    <div class="col s4">
                        <img class="responsive-img" src="../img/boy.png"/>
                    </div>
                    <div class="col s6">

                        <h5>Nombres: <strong> <?php echo $_SESSION['nombre']; ?></strong></h5>
                        <h5>Apellido: <strong> <?php echo $_SESSION['apellido']; ?></strong></h5>
                        <h5>Correo: <strong> <?php echo $_SESSION['correo']; ?></strong></h5>
                        <h5>Hora: <strong><?php $hoy = getdate(); echo $hoy['hours']; echo ':';echo $hoy['minutes'] ?> </strong></h5>
                    </div>
                </div>        
            </div>  
              
        </div>
        <form method="post" action="../controller/comentario.php">
                <div>
                    <h5>ingresar comentario de clase</h5>
                </div>
                <div>
                <div class="input-field col s6">
                        <input id="input_text" name="idcurso" type="text" data-length="10">
                        <label for="input_text">ingrese el ID del curso</label>
                </div>
                 </div>
                <div>
                <div class="input-field col s6">
                        <input id="input_text" name="comentario" type="text" data-length="10">
                        <label for="input_text">ingrese el comentario</label>
                </div>
                </div>
                <button type="submit" class="waves-effect waves-light btn">Enviar</button>
                  
         </form>   

         <div>
         <?php
     
         require_once("../model/usuarios_model.php");
         $usuario = new Usuarios_model();
         $result=$usuario->getcurso($_SESSION['id_usuario'] );

         ?>
         <table>
        <thead>
          <tr>
              <th>Nombre Materia</th>
              <th>hora</th>
              <th>salon</th>
              <th>Profesor</th>

          </tr>
        </thead>
        <tbody>
       
          <?php foreach($result as $key ):  ?>
          <tr>
            <td><?php echo $key['nombre']; ?></td>
            <td><?php echo $key['hora']; ?></td>
            <td><?php echo $key['salon']; ?></td>
            <td><?php echo $key['primerNombre']; echo ' ' ;echo $key['primerApellido']; ?></td>
          </tr>
          <?php endforeach;  ?>
        </tbody>
      </table>

         </div>
    </div>
</body>
<footer class="page-footer">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="white-text">Perfil</h5>
              <p class="grey-text text-lighten-4">Creado por Hallel Sarid 2018 Programacion para web.</p>
            </div>
            <div class="col l4 offset-l2 s12">
              <h5 class="white-text">Links</h5>
              <ul>
                <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
          © 2014 Todos los derechos reservados
          <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
          </div>
        </div>
      </footer>
    <script src="../js/jquery.js"></script>
    <script src="../js/materialize.js"></script>
</body>
</html>
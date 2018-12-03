<?php 
require_once('../controller/datatables_control.php');
$result=$usuario->getListas( $_GET['id_curso']);

?>



<!<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/materialize.css">
    <script src="main.js"></script>
</head>
<body>

  <nav>
    <div  class="nav-wrapper">
      <a  class="brand-logo">VISTA DE LISTA DE CLASE EN DATATABLES</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      </ul>
    </div>
  </nav>
    <table>
        <thead>
          <tr>
              <th>Tema</th>
              <th>Curso</th>
              <th>Fecha</th>
              <th>Hora Inicio</th>
              <th>Hora Final</th>
          </tr>
        </thead>
        <tbody>
       
          <?php foreach($result as $key ):  ?>
          <tr>
            <td><?php echo $key['tema']; ?></td>
            <td><?php echo $key['nombre']; ?></td>
            <td><?php echo $key['fecha']; ?></td>
            <td><?php echo $key['hora_inicio']; ?></td>
            <td><?php echo $key['hora_final']; ?></td>
          </tr>
          <?php endforeach;  ?>
        </tbody>
      </table>
    
</body>
</html>
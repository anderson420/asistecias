<?php
 require_once("../model/usuarios_model.php");
 require_once("../model/cursos_model.php");

 $id_curso=$_GET['id_curso'];
 echo '<h5>'.$_GET['nombre'].'</h5>';
$profe = new Usuarios_model();
$matrizProfe = $profe->get_profesores_curso($id_curso);
foreach ($matrizProfe as $registro) {
    echo "<h6>".$registro['primerNombre']." ".$registro['primerApellido']."</h6>";
    echo '<h6> Salon: '.$registro['salon'].'</h6>';
    echo '<h6> Hora: '.$registro['hora'].'</h6>';
}
?>
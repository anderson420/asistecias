<?php
  require_once("../model/estudiantes_model.php");



  if(isset($_POST['value'])){
	  $id_curso = $_POST['value'];
  }



  //json_decode($id_curso);
  $estudiante = 0;

  $estudiantes = new estudiantes_model();
  $matrizEstudiantes = $estudiantes->get_estudiantes_curso($id_curso);

  foreach ($matrizEstudiantes as $registro) {

	echo '<div class="col s4">';
		echo '<div class="card" id="card">';
			echo '<div class="imagen">';
				echo '<img src="../img/boy.png" width="300px">';
			echo "</div>";

			echo '<div class="card-content">';
				echo "<p name=$estudiante>".$registro['primerNombre']." ".$registro['primerApellido']."</p>";
				echo "<p>".$registro['idestudiantes']."</p>";
			echo "</div>";

			echo '<div class="card-action">';
				echo '<i class="material-icons done">done</i>';
				echo '<i class="material-icons clear">clear</i>';
			echo '</div>';
		echo '</div>';
	echo '</div>';

  }

  $estudiante++;
?>

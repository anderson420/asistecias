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
	echo '
		<div class="col s2">
			<div class="card" id="card">
				<div class="card-image">
					<img class="responsive-img" src="../img/boy.png" width="300px">
				</div>
				<div class="card-content">
					<p>'.$registro['primerNombre'].' '.$registro['primerApellido'].'
				</div>
				<div class="card-action">
					<p>
						<label>
							<input name='.$registro['idestudiantes'].' type="checkbox" />
							<span></span>
						</label>
					</p>
				</div>
			</div>
		</div>
	';

  }

  $estudiante++;
?>

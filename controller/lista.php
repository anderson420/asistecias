<?php
require_once("../model/usuarios_model.php");
$curso = new Usuarios_model();

$curso->NuevaLista($_POST['tema'],$_POST['idcurso'],$_POST['fecha'],$_POST['inicio'],$_POST['final']);
    
 if($_POST['estudiantes']!=[]){
    foreach($_POST['estudiantes'] as $key)
    {
        # code...
        $curso->addEstudiante($key,$curso->CursoId());
    }
    echo '1';
}else{
    echo '0';
}
        
?>
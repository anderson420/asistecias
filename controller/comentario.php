<?php
require_once("../model/usuarios_model.php");
session_start();
$usuario = new Usuarios_model();
$usuario->ingresarComentario($_POST['comentario'],$_POST['idcurso']);
header('Location:../view/estudiante_view.php');
?>
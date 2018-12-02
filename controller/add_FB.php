<?php
require_once("../model/usuarios_model.php");
session_start();
$usuario = new Usuarios_model();
$usuario->uptadeFB($_POST['usuarioFB'],$_SESSION['id_usuario']);


?>
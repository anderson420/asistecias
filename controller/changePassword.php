<?php
  session_start();
include_once('../model/usuarios_model.php');

if(isset($_POST['newPassword'])){
	$password = $_POST['newPassword'];


  $profesor = new usuarios_model();
  $profesor->updatePassword($password, $_SESSION['id_usuario']);

	
}










 ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Login Votaciones</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/styleLogin.css" media="screen">
	<link rel="shortcut icon" href="img/faviconn.ico">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body onload="">
	<div id="espacioLogin">
		<img src="img/login1.png" id="imagenLogin">
		<form action="controller/login_controller.php" method="POST">
			<p>Identificacion</p>
			<input type="text" id="idcodigo" name="codigo" placeholder="Ingrese una identificacion">
			<p>Contraseña</p>
			<input type="password" name="pass" placeholder="Ingrese la contraseña">
			<input type="submit" value="Ingresar" id="boton">
		</form>
	</div>
</body>
</html>
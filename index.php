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
<script>
    window.fbAsyncInit = function() {
        FB.init({
        appId      : '284778465545572',
        cookie     : true,
        xfbml      : true,
        version    : 'v3.2'
        });
        
        FB.AppEvents.logPageView();   
        
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    
    function login(response){
		if("connected" == response.status){
			console.log(response.authResponse.userID);
			$.post("controller/login_controller.php",
			{
				usuarioFB: response.authResponse.userID
			},
			function(data, status){
				if(data == 1){
					location.href ="view/usuarios_view.php";
				}else{
					M.toast({html: 'No hay usuario con ese facebook.'});
				}
			});
		}
    }
	function checkLoginState() {
		FB.getLoginStatus(function(response) {
			login(response);
		});
	}
    </script>
	<div id="espacioLogin">
		<img src="img/login1.png" id="imagenLogin">
		<form action="controller/login_controller.php" method="POST">
			<p>Identificacion</p>
			<input type="text" id="idcodigo" name="codigo" placeholder="Ingrese una identificacion">
			<p>Contraseña</p>
			<input type="password" name="pass" placeholder="Ingrese la contraseña">
			<input type="submit" value="Ingresar" id="boton">
		</form>
		<fb:login-button 
			scope="public_profile,email"
			onlogin="checkLoginState();">
		</fb:login-button>
	</div>
</body>
</html>
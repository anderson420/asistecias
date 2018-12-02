<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        echo "<script> window.location = '../index.php'; </script> ";
    }

    $profile = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script src="../js/ajax.js"></script>
    <link rel="stylesheet" href="../css/materialize.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../img/faviconn.ico">
    <title>Registro de Asistencia</title>

    <Script Language="JavaScript">

        function DameLaFechaHora() {
            var hora = new Date()
            var hrs = hora.getHours();
            var min = hora.getMinutes();
            var hoy = new Date();
            var m = new Array();
            var d = new Array()
            m[0] = "Enero";
            m[1] = "Febrero";
            m[2] = "Marzo";
            m[3] = "Abril";
            m[4] = "Mayo";
            m[5] = "Junio";
            m[6] = "Julio";
            m[7] = "Agosto";
            m[8] = "Septiembre";
            m[9] = "Octubre";
            m[10] = "Noviembre";
            m[11] = "Diciembre";
            document.write("Son las " + hrs + ":" + min + " del ");
            document.write(hoy.getDate());
            document.write(" de ");
            document.write(m[hoy.getMonth()]);
        }
    </Script>

</head>

<body>
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
    
    function conectar(response){
		if("connected" == response.status){
			$.post("controller/unir_facebook.php",
			{
				usuarioFB: response.authResponse.userID
			},
			function(data, status){
				console.log(data);
			});
		}
    }
	function checkLoginState() {
		FB.getLoginStatus(function(response) {
			conectar(response);
		});
	}
    </script>
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo titulo">Registro de Asistencia</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li></li>
				<li><a href="#modal1" class="changePassword modal-trigger">Cambiar Contraseña</a></li>
                <li><a href="../model/logout.php">Cerrar Sesión</a></li>
            </ul>
        </div>
    </nav>

		<!-- Modal Structure -->
	<div id="modal1" class="modal">
	    <form class="passwordForm" method="post" action="../controller/changePassword.php">
	        <div class="modal-content" >
			    <div class="row">
		            <div class="input-field col s10">
		                <input required placeholder="Contraseña" id="new_password" type="text" name="password" class="validate">
		                <label for="new_password">Nueva Contraseña</label>
		            </div>
				    <button type="submit" class="col s2 waves-light btn waves-effect waves-green btn-flat" >Enviar</button>
			    </div>
	        </div>
  	    </form>
	</div>
	<div class="row selectDiv">
		<div class="selectDiv input-field col offset-s3 s6">
		  <select id="id_curso" onChange="showHint(this.value,this)"  >
			  <option value="" disabled selected>Escoga una opcion</option>
			  <?php
		        require_once("../model/cursos_model.php");
		        $curso = new cursos_model();
		        $matrizCurso = $curso->get_cursos();

		        foreach ($matrizCurso as $registro) {
		        	echo '<h5>'.$registro['nombre'].'</h5>';
					echo '<option value="'.$registro['idcursos'].'">'.$registro['nombre'].'</option>';
		        }
		      ?>
		  </select>
		  <label>Seleccione el curso</label>
		</div>
	</div>
    <div id="respuestaajax"></div>
    <h6>
        <script>
            DameLaFechaHora();
			$('select').formSelect();
        </script>
    </h6>
    <div class="row estudiantesLista"></div>
    <div class="container">
        <div class="row">
            <div class="input-field  col s6">
                <input placeholder="Tema de la clase" id="tema" type="text" class="validate">
                <label for="tema">Tema</label>
            </div>
            <div class="input-field  col s6">
                <input placeholder="Fecha de la clase" id="fecha" type="date" class="validate">
                <label for="fecha">Fecha</label>
            </div>
            <div class="input-field  col s6">
                <input placeholder="Hora de finalización de la clase" id="horaInicio" type="time" class="validate">
                <label for="horaInicio">Inicio</label>
            </div>
            <div class="input-field  col s6">
                <input placeholder="Hora de finalización de la clase" id="horaFinal" type="time" class="validate">
                <label for="horaFinal">Final</label>
            </div>
            <div class="col s4">
                <a id="listButton" class="waves-effect waves-light btn" name="lista"><i class="material-icons left">assignment</i>Listar</a>
            </div>
        </div>
    </div>
    <footer class="page-footer">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="white-text">Registro de asistencias</h5>
              <p class="grey-text text-lighten-4">Creado por Hallel Sarid 2018 Programacion para web.</p>
            </div>
            <div class="col l4 offset-l2 s12">
              <h5 class="white-text">Links</h5>
              <ul>
                <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
          © 2014 Todos los derechos reservados
          <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
          </div>
        </div>
      </footer>
    <script src="../js/jquery.js"></script>
	<script src="../js/index.js"></script>
    <script src="../js/materialize.js"></script>
</body>
</html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bienvenido!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="LZ">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/javascript" href="bootstrap/js/sweetalert.js">

  </head>
<body data-offset="40" background="images/fondotot.jpg" class="body">
<div class="container">
<header class="header">
</header>
<div class="navbar">
  <div class="navbar-inner">
  <div class="container">
    <div class="nav-collapse">
    <ul class="nav">
      <li class=""><a href="">ADMINISTRADOR DEL SITIO</a></li>
    </ul>
    <ul class="nav pull-right">
    <li><br><strong>
    <?php
    session_start();
    if(isset($_POST['usuario']))
    {
      $host_db = "localhost";
      $user_db = "root";
      $pass_db = "";
      $db_name = "asistencia";

      $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

      if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
      }
      $username = $conexion->real_escape_string($_POST['usuario']);
      $password = $_POST['password'];

      $sql = "SELECT * FROM admin WHERE user = '$username'";
      $result = $conexion->query($sql);
      $row = $result->fetch_assoc();
      if ($password == $row['password']) {
          $_SESSION['loggedin'] = true;
          $_SESSION['id'] = $username;


      } else {
        echo '<script>alert("Usuario o Contraseña incorrecto")</script>';
        echo "<script>location.href='index.php'</script>";
       
      }
      mysqli_close($conexion); 
    }
    else{
      header("location: index.php");
    }
    ?>
    </strong> </a></li>
        <li><a href="logout.php"> Cerrar Sesión </a></li>      
    </ul>
    </div>
  </div>
  </div>
</div>
<div class="row">
  <div class="span12">
    <div class="caption">
    <h2> Administración de usuarios registrados</h2>  
    <div class="well well-small">
    <hr class="soft"/>
    <h4>Para ir a la lista de CRUD</h4>
    <div class="row-fluid">
      <?php

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

        } else {
           echo "Esta pagina es solo para usuarios registrados.<br>";
           echo "<br><a href='index.php'>Login</a>";


        exit;
        }

        
       
        ?>
        <div><br><a href=login_web.php><input type="button" value="Profesor" class="btn btn-success btn-primary">   </a>  CRUD profesores<br></div>
        <div><br><a href=index.estudiante.php><input type="button" value="estudiantes" class="btn btn-success btn-primary">   </a>  CRUD estudiante<br></div>
        
        
        
    <div class="span8">
    
    </div>  
    </div>  
    <br/>
    </div>
</div>

  </div>
</div>
</div>
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </style>
  </body>
</html>



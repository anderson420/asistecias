<?php 
session_start();

require_once 'Profesor.php';
require_once 'profesor.model.php';

// Logica
$alm = new Profesor();
$model = new ProfesorModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {   
        case 'actualizar':
            if($_REQUEST['idprofesores'] != '' )
            {
                $alm->__SET('idprofesores',          $_SESSION['idprof']      );
                $alm->__SET('primerNombre',          $_REQUEST['primerNombre']);
                $alm->__SET('email',        $_REQUEST['email']);
                $alm->__SET('primerApellido',            $_REQUEST['primerApellido']);
                $alm->__SET('segundoNombre',                 $_REQUEST['segundoNombre']);
                $alm->__SET('segundoApellido',                 $_REQUEST['segundoApellido']);
                $alm->__SET('contrasena',              $_REQUEST['contrasena']);
                $alm->__SET('direccion',          $_REQUEST['direccion']);
                $alm->__SET('telefono',        $_REQUEST['telefono']);
                $alm->__SET('dia_nacimiento',            $_REQUEST['dia_nacimiento']);
                $alm->__SET('mes_nacimiento',                 $_REQUEST['mes_nacimiento']);
                $alm->__SET('anio_nacimiento',                 $_REQUEST['anio_nacimiento']);
                $alm->__SET('newid',                    $_REQUEST['idprofesores'] );

                $model->Actualizar($alm);
                header('Location: login_web.php');
            }else{
                echo '<script>alert("Hay campos vacios.")</script>';
            }
            break;

        case 'registrar':
            if($_REQUEST['idprofesores'] != '' )
            {
                $alm->__SET('idprofesores',              $_REQUEST['idprofesores']);
                $alm->__SET('primerNombre',          $_REQUEST['primerNombre']);
                $alm->__SET('email',        $_REQUEST['email']);
                $alm->__SET('primerApellido',            $_REQUEST['primerApellido']);
                $alm->__SET('segundoNombre',                 $_REQUEST['segundoNombre']);
                $alm->__SET('segundoApellido',                 $_REQUEST['segundoApellido']);
                $alm->__SET('contrasena',              $_REQUEST['contrasena']);
                $alm->__SET('direccion',          $_REQUEST['direccion']);
                $alm->__SET('telefono',        $_REQUEST['telefono']);
                $alm->__SET('dia_nacimiento',            $_REQUEST['dia_nacimiento']);
                $alm->__SET('mes_nacimiento',                 $_REQUEST['mes_nacimiento']);
                $alm->__SET('anio_nacimiento',                 $_REQUEST['anio_nacimiento']);
                
                $model->Registrar($alm);
                header('Location: login_web.php');
            }else{
                echo '<script>alert("Hay campos vacios.")</script>';

            }
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['idprofesores']);
            header('Location: login_web.php');
            break;

        case 'editar':
            $_SESSION['idprof'] = $_REQUEST['idprofesores'];
            $alm = $model->Obtener($_REQUEST['idprofesores']);
            
            break;
    }
}

 

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Lista Profesores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="LZ">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
        <li><a href=""></strong> </a></li>
              <li><a href="logout.php"> Cerrar Sesión </a></li>          
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row">
        
    <div class="span12">

        <div class="caption">
        
        <h2>Administración de profesores registrados</h2>    
        <div class="well well-small">
        <hr class="soft"/>
        <h4>Tabla de Profesores</h4>
        <table class="pure-table pure-table-horizontal tableCenter">
            <thead>
                <tr>
                  
                    <th >idprofesores</th>
                    <th >primerNombre</th>
                    <th >email</th>
                    <th >primerApellido</th>
                    <th>segundoNombre</th>
                    <th>segundoApellido</th>  
                    <th >contrasena</th>
                    <th >direccion</th>
                    <th >telefono</th>
                    <th >dia_nacimiento</th>
                    <th>mes_nacimiento</th>
                    <th>anio_nacimiento</th>
                </tr>
            </thead>
            <?php foreach($model->Listar() as $r): ?>
                <tr>
                    <td><?php echo $r->__GET('idprofesores'); ?></td>
                    <td><?php echo $r->__GET('primerNombre'); ?></td>
                    <td><?php echo $r->__GET('email'); ?></td>
                    <td><?php echo $r->__GET('primerApellido'); ?></td>
                    <td><?php echo $r->__GET('segundoNombre'); ?></td>
                    <td><?php echo $r->__GET('segundoApellido'); ?></td>
                    <td><?php echo $r->__GET('contrasena'); ?></td>
                    <td><?php echo $r->__GET('direccion'); ?></td>
                    <td><?php echo $r->__GET('telefono'); ?></td>
                    <td><?php echo $r->__GET('dia_nacimiento'); ?></td>
                    <td><?php echo $r->__GET('mes_nacimiento'); ?></td>
                    <td><?php echo $r->__GET('anio_nacimiento'); ?></td>
                    <td>
                        <a href="?action=editar&idprofesores=<?php echo $r->idprofesores; ?>">Editar</a>
                    </td>
                    <td>
                        <a href="?action=eliminar&idprofesores=<?php echo $r->idprofesores; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table> 
        <br><br><h2><strong>Insertar un usuario</strong></h2>
        <div class="row-fluid">
            <form action="?action=<?php echo $alm->idprofesores > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
            <input type="hidden" name="idprofesores" value="<?php echo $alm->__GET('idprofesores'); ?>" />
                <table >
                    <tr>
                        <th >idprofesores: </th>
                        <td><input type="text" name="idprofesores" value="<?php echo $alm->__GET('idprofesores'); ?>"  /></td>
                    </tr>
                    <tr>
                        <th >primerNombre: </th>
                        <td><input type="text" name="primerNombre" value="<?php echo $alm->__GET('primerNombre'); ?>"  /></td>
                    </tr>
                    <tr>
                        <th >email: </th>
                            <td><input type="text" name="email" value="<?php echo $alm->__GET('email'); ?>"  /></td>
                    </tr>
                    <tr>
                        <th >primerApellido: </th>
                            <td><input type="text" name="primerApellido" value="<?php echo $alm->__GET('primerApellido'); ?>"  /></td>
                    </tr>
                    <tr>
                        <th >segundoNombre: </th>
                            <td><input type="text" name="segundoNombre" value="<?php echo $alm->__GET('segundoNombre'); ?>"  /></td>
                    </tr>
                    <tr>
                        <th >segundoApellido: </th>
                        <td><input type="text" name="segundoApellido" value="<?php echo $alm->__GET('segundoApellido'); ?>"  /></td>
                    </tr>
                    <tr>
                        <th >contrasena: </th>
                        <td><input type="text" name="contrasena" value="<?php echo $alm->__GET('contrasena'); ?>"  /></td>
                    </tr>
                    <tr>
                        <th >direccion: </th>
                            <td><input type="text" name="direccion" value="<?php echo $alm->__GET('direccion'); ?>"  /></td>
                    </tr>
                    <tr>
                        <th >telefono: </th>
                        <td><input type="text" name="telefono" value="<?php echo $alm->__GET('telefono'); ?>"  /></td>
                    </tr>
                    <tr>
                        <th >dia_nacimiento: </th>
                        <td><input type="text" name="dia_nacimiento" value="<?php echo $alm->__GET('dia_nacimiento'); ?>"  /></td>
                    </tr>
                    <tr>
                        <th >mes_nacimiento: </th>
                            <td><input type="text" name="mes_nacimiento" value="<?php echo $alm->__GET('mes_nacimiento'); ?>"  /></td>
                    </tr>
                    <tr>
                        <th >anio_nacimiento: </th>
                            <td><input type="text" name="anio_nacimiento" value="<?php echo $alm->__GET('anio_nacimiento'); ?>"  /></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                        </td>
                    </tr>
                </table>
            </form>
        <div class="span8">
        </div>  
        </div>
        <div>
            <a href="index.estudiante.php"><button class="pure-button pure-button-primary">CRUD estudiantes</button></a>
        </div>
        <br/>

        </div>
        </div>

    </div>
</div>
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    </style>
  </body>
</html>
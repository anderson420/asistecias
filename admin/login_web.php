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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  </head>
<body>
<div class="container">
    <div class="row"></div>
    <a href="./../admin/manejador.php">ADMINISTRADOR DEL SITIO</a>
    <a class="right" href="logout.php">Cerrar Sesión </a>   
    <div class="row">
        <div class="caption">
        <h3>Administración de profesores registrados</h3>    
        <div class="well well-small">
        <hr class="soft"/>
        <h4>Tabla de Profesores</h4>
        <table class="pure-table pure-table-horizontal tableCenter">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>primer Nombre</th>
                    <th>email</th>
                    <th>primer Apellido</th>
                    <th>segundo Nombre</th>
                    <th>segundo Apellido</th>  
                    <th>contraseña</th>
                    <th>dirección</th>
                    <th>telefono</th>
                    <th>dia</th>
                    <th>mes</th>
                    <th>año</th>
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
                <div class="row">
                <div class="col s6 input-field">
                    <input type="text" name="idprofesores" value="<?php echo $alm->__GET('idprofesores'); ?>"  />
                    <label for="idprofesores">ID de profesores</label>
                </div>
                <div class="col s6 input-field">
                    <input type="text" name="primerNombre" value="<?php echo $alm->__GET('primerNombre'); ?>"  />
                    <label for="primerNombre">Primer nombre del profesor</label>
                </div>
                <div class="col s6 input-field">
                    <input type="text" name="email" value="<?php echo $alm->__GET('email'); ?>"  />
                    <label for="email">Correo del profesor</label>
                </div>
                <div class="col s6 input-field">
                    <input type="text" name="primerApellido" value="<?php echo $alm->__GET('primerApellido'); ?>"  />
                    <label for="primerApellido">Apellido del profesor</label>
                </div>
                <div class="col s6 input-field">
                    <input type="text" name="segundoNombre" value="<?php echo $alm->__GET('segundoNombre'); ?>"  />
                    <label for="segundoNombre">Segundo nombre del profesor</label>
                </div>
                <div class="col s6 input-field">
                    <input type="text" name="segundoApellido" value="<?php echo $alm->__GET('segundoApellido'); ?>"  />
                    <label for="segundoApellido">Segundo apellido del profesor</label>
                </div>
                <div class="col s6 input-field">
                    <input type="text" name="contrasena" value="<?php echo $alm->__GET('contrasena'); ?>"  />
                    <label for="contrasena">Contraseña del profesor</label>
                </div>
                <div class="col s6 input-field">
                    <input type="text" name="direccion" value="<?php echo $alm->__GET('direccion'); ?>"  />
                    <label for="direccion">Dirección</label>
                </div>
                <div class="col s6 input-field">
                    <input type="text" name="telefono" value="<?php echo $alm->__GET('telefono'); ?>"  />
                    <label for="telefono">Telefono</label>
                </div>
                <div class="col s6 input-field">
                    <input type="text" name="dia_nacimiento" value="<?php echo $alm->__GET('dia_nacimiento'); ?>"  />
                    <label for="dia_nacimiento">Día del nacimiento</label>
                </div>
                <div class="col s6 input-field">
                    <input type="text" name="mes_nacimiento" value="<?php echo $alm->__GET('mes_nacimiento'); ?>"  />
                    <label for="mes_nacimiento">Mes del nacimiento</label>
                </div>
                <div class="col s6 input-field">
                    <input type="text" name="anio_nacimiento" value="<?php echo $alm->__GET('anio_nacimiento'); ?>"  />
                    <label for="mes_nacimiento">Año del nacimiento</label>
                </div>
                <button type="submit" class="waves-effect waves-light btn">Guardar</button>
                </div>
                
            </form>
        <div class="span8">
        </div>  
        </div>
        <div>
            <a href="index.estudiante.php"><button class="right waves-effect waves-light btn">CRUD estudiantes</button></a>
        </div>
        <br/>
        </div>
        </div>

    </div>
</div>
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </style>
  </body>
</html>
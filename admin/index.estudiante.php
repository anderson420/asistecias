<?php 
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
require_once 'EstudianteModel.php';
require_once 'Estudiante.php';

// Logica
$alm = new Estudiante();
$model = new EstudianteModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {   
        case 'actualizar':
           
                $alm->__SET('idEstudiante',  $_REQUEST['idEstudiante']);
                $alm->__SET('password', $_REQUEST['password']);
                $alm->__SET('primerNombre', $_REQUEST['primerNombre']);
                $alm->__SET('segundoNombre', $_REQUEST['segundoNombre']);
                $alm->__SET('primerApellido', $_REQUEST['primerApellido']);
                $alm->__SET('segundoApellido',   $_REQUEST['segundoApellido']);
                $alm->__SET('correo', $_REQUEST['correo']);
                $model->Actualizar($alm);
                header('Location: index.estudiante.php');
        
            break;

        case 'registrar':
            if( $_REQUEST['idEstudiante'] != '')
            {
                $alm->__SET('idEstudiante',  $_REQUEST['idEstudiante']);
                $alm->__SET('password', $_REQUEST['password']);
                $alm->__SET('primerNombre', $_REQUEST['primerNombre']);
                $alm->__SET('segundoNombre', $_REQUEST['segundoNombre']);
                $alm->__SET('primerApellido', $_REQUEST['primerApellido']);
                $alm->__SET('segundoApellido',   $_REQUEST['segundoApellido']);
                $alm->__SET('correo', $_REQUEST['correo']);

                $model->Registrar($alm);
                header('Location: index.estudiante.php');
            }else{
                echo '<script>alert("Hay campos vacios.")</script>';

            }
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['idestudiante']);
            header('Location: index.estudiante.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['idestudiante']);
            break;
    }
}
echo "<a  href=logout.php>Cerrar Sesion X </a>";
}


?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>web</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    </head>
    <body class="body">
    <div class="container">
        <h3>CRUD DE ESTUDIANTES</h3>    
        <hr class="soft"/>
        <h4>Insertar tabla de estudiantes</h4> 
        <form action="?action=<?php echo $alm->idEstudiante > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" name="idEstudiante" value="<?php echo $alm->__GET('idEstudiante'); ?>"  />
                    <label for="idEstudiantes">Id del estudiantes</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" name="password" value="<?php echo $alm->__GET('password'); ?>"  />
                    <label for="password">Contraseña</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" name="primerNombre" value="<?php echo $alm->__GET('primerNombre'); ?>"  />
                    <label for="primerNombre">El primer nombre</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" name="segundoNombre" value="<?php echo $alm->__GET('segundoNombre'); ?>"  />
                    <label for="segundoNombre">El segundo nombre</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" name="primerApellido" value="<?php echo $alm->__GET('primerApellido'); ?>"  />
                    <label for="segundoNombre">El segundo nombre</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" name="segundoApellido" value="<?php echo $alm->__GET('segundoApellido'); ?>"  />
                    <label for="segundoApellido">Segundo apellido</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" name="correo" value="<?php echo $alm->__GET('correo'); ?>"  />
                    <label for="correo">Correo</label>
                </div>
                <div class="input-field col s6">
                    <button type="submit" class="waves-effect waves-light btn right">Guardar</button>
                </div>
            </div>

        </form>

    <table class="pure-table pure-table-horizontal">
        <thead>
            <tr>
                <th >idEstudiante</th>
                <th >password</th>
                <th >primerNombre</th>
                <th >segundoNombre</th>
                <th>primerApellido</th>
                <th>segundoApellido a</th>
                <th>correo</th>
                <th>editar</th>
                <th>eliminar</th>
            </tr>
        </thead>
        <?php foreach($model->Listar() as $r): ?>
            <tr>
                <td><?php echo $r->__GET('idEstudiante'); ?></td>
                <td><?php echo $r->__GET('password'); ?></td>
                <td><?php echo $r->__GET('primerNombre'); ?></td>
                <td><?php echo $r->__GET('segundoNombre'); ?></td>
                <td><?php echo $r->__GET('primerApellido'); ?></td>
                <td><?php echo $r->__GET('segundoApellido'); ?></td>
                <td><?php echo $r->__GET('correo'); ?></td>
                <td>
                    <a href="?action=editar&idestudiante=<?php echo $r->idEstudiante; ?>">Editar</a>
                </td>
                <td>
                    <a href="?action=eliminar&idestudiante=<?php echo $r->idEstudiante; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>     
              
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    </body>
</html>